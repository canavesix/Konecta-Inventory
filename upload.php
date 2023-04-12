<?php
// Inclui a biblioteca PHPExcel
require_once 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;


// Verifica se o arquivo foi enviado
if(isset($_FILES['arquivo'])) {

  // Verifica se houve algum erro no upload
  if($_FILES['arquivo']['error'] == 0) {
    // Move o arquivo para a pasta desejada
    $destino = 'uploads/' . $_FILES['arquivo']['name'];
    if(!is_dir('uploads')){
      mkdir('uploads', 0777, true);
    }
    if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $destino)) {
      // Arquivo enviado com sucesso
      echo '<script>
              Swal.fire({
                icon: "success",
                title: "Arquivo Enviado!",
                text: "Arquivo enviado com sucesso!",
              });
            </script>';
    
    
      // Cria um objeto PHPExcel a partir do arquivo enviado
      try {
          $excel = IOFactory::load($destino);
      } catch (Exception $e) {
          echo 'Erro ao ler o arquivo: ',  $e->getMessage(), "\n";
          exit();
      }

      // Seleciona a primeira planilha
      $planilha = $excel->getActiveSheet();

      // Obtém o número de linhas e colunas da planilha
      $numLinhas = $planilha->getHighestRow();
      $numColunas = $planilha->getHighestColumn();

      // Cria um array para armazenar os dados da planilha
      $dadosPlanilha = array();

      // Percorre todas as células da planilha
      for($linha = 1; $linha <= $numLinhas; $linha++) {
        for($coluna = 'A'; $coluna <= $numColunas; $coluna++) {
          // Obtém o valor da célula
          $valorCelula = $planilha->getCell($coluna.$linha)->getValue();

          // Armazena o valor da célula no array de dados
          $dadosPlanilha[$linha][$coluna] = $valorCelula;
        }
        // Adiciona o valor da última coluna (setor)
        $dadosPlanilha[$linha]['F'] = $planilha->getCell('F'.$linha)->getValue();
      }

      // Insere os dados da planilha no banco de dados
      // Insere os dados da planilha no banco de dados
include 'conexao.php';

// Variável de contador
$contador = 0;

foreach($dadosPlanilha as $linha) {
  $nroproduto = $linha['A'];
  $nomeproduto = $linha['B'];
  $categoria = $linha['C'];
  $quantidade = $linha['D'];
  $fornecedor = $linha['E'];
  $setor = $linha['F'];

  // Consulta SQL para verificar se o registro já existe
  $sql_select = "SELECT * FROM estoque WHERE nroproduto = ?";
  $stmt_select = $conexao->prepare($sql_select);
  $stmt_select->bind_param('s', $nroproduto);
  $stmt_select->execute();
  $result_select = $stmt_select->get_result();

  // Verifica se já existe um registro com o mesmo número de produto
  if ($result_select->num_rows > 0) {
    // Exibe a mensagem de erro
    echo "As informações que você está tentando adicionar, já existem no sistema para o número de produto $nroproduto.<br>";
    continue;
  }

  // Cria a consulta SQL para inserir os dados na tabela "estoque"
  $sql_insert = "INSERT INTO estoque (nroproduto, nomeproduto, categoria, quantidade, fornecedor, setor) VALUES (?, ?, ?, ?, ?, ?)";

  // Prepara a consulta
  $stmt_insert = $conexao->prepare($sql_insert);
  if (!$stmt_insert) {
    die('Erro na preparação da consulta: ' . $conexao->error);
  }

  // Define os parâmetros da consulta
  $stmt_insert->bind_param('ssssss', $nroproduto, $nomeproduto, $categoria, $quantidade, $fornecedor, $setor);

  // Executa a consulta
  if($stmt_insert->execute()) {
    $contador++;
  }
}

// Imprime a mensagem somente uma vez
if ($contador == $numLinhas) {
  echo "Dados inseridos com sucesso!";
} else {
  echo "Erro ao inserir dados.";
}


    }
}

}
