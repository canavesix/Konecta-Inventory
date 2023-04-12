<?php

require 'vendor/autoload.php'; // Inclui a biblioteca PHPSpreadsheet

function gerarRelatorioEmExcel() {

    // Cria uma instância da classe Spreadsheet
    $planilha = new \PhpOffice\PhpSpreadsheet\Spreadsheet();

    // Define as propriedades do documento
    $planilha->getProperties()
        ->setTitle('Relatório de Produtos')
        ->setCreator('Meu Sistema')
        ->setDescription('Relatório gerado automaticamente pelo sistema.');

    // Cria uma planilha e define as células com os dados do relatório
    $planilha->setActiveSheetIndex(0);
    $planilha->getActiveSheet()->setTitle('Produtos');

    $planilha->getActiveSheet()->setCellValue('A1', 'Serial Number');
    $planilha->getActiveSheet()->setCellValue('B1', 'Nome Produto');
    $planilha->getActiveSheet()->setCellValue('C1', 'Categoria');
    $planilha->getActiveSheet()->setCellValue('D1', 'Quantidade');
    $planilha->getActiveSheet()->setCellValue('E1', 'Fornecedor');
    $planilha->getActiveSheet()->setCellValue('F1', 'Setor');

    $linha = 2;

    include 'conexao.php';
    $sql = "SELECT * FROM `estoque`";

    // Verifica se foi feita uma busca por nome de produto
    if(isset($_GET['buscar'])){
        $buscar = $_GET['buscar'];
        $sql .= " WHERE nomeproduto LIKE '%$buscar%' OR nroproduto LIKE '$buscar%' OR categoria LIKE '%$buscar%' OR fornecedor LIKE '%$buscar%' OR setor LIKE '%$buscar%'";
    }

    $busca = mysqli_query($conexao,$sql);

    while ($array = mysqli_fetch_array($busca)) {           
        $nroproduto = $array['nroproduto'];
        $nomeproduto = $array['nomeproduto'];
        $categoria = $array['categoria'];
        $quantidade = $array['quantidade'];
        $fornecedor = $array['fornecedor'];
        $setor = $array['setor'];

        $planilha->getActiveSheet()->setCellValue('A' . $linha, $nroproduto);
        $planilha->getActiveSheet()->setCellValue('B' . $linha, $nomeproduto);
        $planilha->getActiveSheet()->setCellValue('C' . $linha, $categoria);
        $planilha->getActiveSheet()->setCellValue('D' . $linha, $quantidade);
        $planilha->getActiveSheet()->setCellValue('E' . $linha, $fornecedor);
        $planilha->getActiveSheet()->setCellValue('F' . $linha, $setor);
    
        $linha++;
    }
    
    // Define a largura das colunas
    $planilha->getActiveSheet()->getColumnDimension('A')->setWidth(15);
    $planilha->getActiveSheet()->getColumnDimension('B')->setWidth(40);
    $planilha->getActiveSheet()->getColumnDimension('C')->setWidth(25);
    $planilha->getActiveSheet()->getColumnDimension('D')->setWidth(15);
    $planilha->getActiveSheet()->getColumnDimension('E')->setWidth(30);
    $planilha->getActiveSheet()->getColumnDimension('F')->setWidth(20);
    
    // Cria um objeto Writer para salvar o arquivo
    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($planilha, 'Xlsx');
    
    // Define o nome do arquivo e o caminho para salvar
    $filename = 'relatorio_produtos.xlsx';
    $path = __DIR__ . '/' . $filename;
    
    // Salva o arquivo
    $writer->save($path);
    
    // Retorna o nome do arquivo gerado
    return $filename;
    

}