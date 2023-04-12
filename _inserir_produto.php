<?php

include 'conexao.php';

// Verifica se o número do produto já existe no banco de dados
$verifica_sql = "SELECT * FROM `estoque` WHERE `serialn`='$'";
$verifica = mysqli_query($conexao, $verifica_sql);

if (mysqli_num_rows($verifica) > 0) {
    // Se o número do produto já existe, exibe a mensagem e redireciona para o formulário
    echo "<script>alert('O serial number já existe, por favor cadastre outro.');</script>";
    echo "<script>window.location.href = 'adicionar_produto.php';</script>";
} else {
    // Se o número do produto não existe, insere os dados no banco de dados
    $sql = "INSERT INTO `estoque`(`nroproduto`, `nomeproduto`, `categoria`, `quantidade`, `fornecedor`,`setor`) 
            VALUES ('$nroproduto','$nomeproduto','$categoria','$quantidade','$fornecedor','$setor')";
    $inserir = mysqli_query($conexao, $sql);
}

$nroproduto = $_POST['nroproduto']; //recebe o valor do atributo
$nomeproduto = $_POST['nomeproduto'];
$categoria = $_POST['categoria'];
$quantidade = $_POST['quantidade'];
$setor = $_POST['setor'];

$fornecedor = $_POST['fornecedor'];

$sql = "INSERT INTO `estoque`(`nroproduto`, `nomeproduto`, `categoria`, `quantidade`, `fornecedor`,`setor`) 
        VALUES ('$nroproduto','$nomeproduto','$categoria','$quantidade','$fornecedor','$setor')";

$inserir = mysqli_query($conexao, $sql);

?>

<link rel="stylesheet" href="css/bootstrap.css">
<div class="container" style="width: 500px; margin-top: 20px;">
    <h4 style="text-align: center;">Produto adicionado com sucesso!</h4>
    <div style="padding-top: 20px;">
        <center>
            <a href="adicionar_produto.php" role="button" class= "btn btn-sm btn-primary">Cadastrar novo ítem</a> 
        </center>  
    </div>
</div>
