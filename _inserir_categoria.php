<?php
include 'conexao.php';

$categoria = $_POST['categoria'];

$sql = "INSERT INTO `categoria`(`categoria`) VALUES ('$categoria')";

if (mysqli_query($conexao, $sql)) {
    echo "
        <link rel='stylesheet' href='css/bootstrap.css'>
        <div class='container' style='width: 400px'>
            <center>
                <h3 style='margin-top:15px;'>Adicionado com Sucesso!</h3>
                <div style='margin-top: 10px;'>
                    <a href='adicionar_categoria.php' class='btn btn-sm btn-warning' style='color: #fff'>Voltar</a>
                </div>    
            </center>    
        </div>
    ";
} else {
    echo "Erro ao adicionar categoria: " . mysqli_error($conexao);
}

mysqli_close($conexao);
?>
