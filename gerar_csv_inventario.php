<?php
// Define o nome do arquivo CSV
$filename = sys_get_temp_dir() . '/estoque.csv';

// Define o cabeçalho do arquivo CSV usando ponto e vírgula como separador
$header = "Serial Number; Nome Produto; Categoria; Quantidade; Fornecedor";

// Importa o arquivo de conexão com o banco de dados
include 'conexao.php';
if (mysqli_connect_errno()) {
    echo "Erro ao conectar ao MySQL: " . mysqli_connect_error();
    exit();
}

// Faz a consulta dos dados dos equipamentos
$sql = "SELECT `serialn`, `modelo`, `site`, `setor`, `quant`, `centrocusto` FROM `inventario` WHERE 1";
$resultado = mysqli_query($conexao, $sql);
if (!$resultado) {
    echo mysqli_error($conexao);
    exit();
}

// Recupera todos os dados da consulta em um array multidimensional
$equipamentos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

// Envia os cabeçalhos para o navegador
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="' . $filename . '";');

// Abre o arquivo CSV para escrita
$file = fopen('php://output', 'w');

// Escreve o cabeçalho no arquivo CSV
fputcsv($file, explode(';', $header));

// Escreve os dados dos equipamentos no arquivo CSV em lotes de 1000
$batchSize = 1000;
$numRows = count($equipamentos);
for ($i = 0; $i < $numRows; $i += $batchSize) {
    $batch = array_slice($equipamentos, $i, $batchSize);
    foreach ($batch as $equipamento) {
        fputcsv($file, $equipamento);
    }
    // Limpa a memória do servidor a cada lote
    ob_flush();
    flush();
}

// Fecha o arquivo CSV
fclose($file);

// Encerra o script
exit();
