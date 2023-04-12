<?php
// Define o nome do arquivo CSV
// Define o nome do arquivo CSV
$filename = sys_get_temp_dir() . '/estoque.csv';

// Define o cabeçalho do arquivo CSV usando ponto e vírgula como separador
$header = "Serial Number;Nome Produto;Categoria;Quantidade;Fornecedor\n";

// Importa o arquivo de conexão com o banco de dados
include 'conexao.php';
if (mysqli_connect_errno()) {
    echo "Erro ao conectar ao MySQL: " . mysqli_connect_error();
    exit();
}

// Envia os cabeçalhos para o navegador
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="' . $filename . '";');

// Abre o arquivo CSV para escrita
$file = fopen('php://output', 'w');

// Escreve o cabeçalho no arquivo CSV
fwrite($file, $header);

// Faz a consulta dos dados dos equipamentos e escreve cada linha no arquivo CSV
$sql = "SELECT `nroproduto`, `nomeproduto`, `categoria`, `quantidade`, `fornecedor`, `setor` FROM `estoque` WHERE 1";
$resultado = mysqli_query($conexao, $sql);
if (!$resultado) {
    echo mysqli_error($conexao);
    exit();
}
while ($equipamento = mysqli_fetch_assoc($resultado)) {
    fputcsv($file, $equipamento, ';');
}

// Fecha o arquivo CSV
fclose($file);

// Encerra o script
exit();


// Define o cabeçalho HTTP para forçar o download do arquivo
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="'.$filename.'"');
header('Pragma: no-cache');
readfile($filename);
