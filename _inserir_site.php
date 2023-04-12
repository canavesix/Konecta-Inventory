<?php
include 'conexao.php';

$site = $_POST['site'];

$sql = "INSERT INTO `site`(`site`) VALUES ('$site')";

if (mysqli_query($conexao, $sql)) {
    echo "
        <link rel='stylesheet' href='css/bootstrap.css'>
        <div class='container' style='width: 400px'>
            <center>
                <h3 style='margin-top:15px;'>Adicionado com Sucesso!</h3>
                <div style='margin-top: 10px;'>
                    <a href='adicionar_site.php' class='btn btn-sm btn-warning' style='color: #fff'>Voltar</a>
                </div>    
            </center>    
        </div>
    ";
} else {
    echo "Erro ao adicionar categoria: " . mysqli_error($conexao);
}

mysqli_close($conexao);
?>
