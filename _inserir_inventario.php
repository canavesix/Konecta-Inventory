<?php
include 'conexao.php';

$serialn = $_POST['serialn'] ?? '';
$modelo = $_POST['modelo'];
$site = $_POST['site'] ?? '';
$setor = $_POST['setor'] ?? '';
$quant = $_POST['quant'];
$centrocusto = $_POST['centrocusto'];

// Verifica se o número do produto já existe no banco de dados
$verifica_sql = "SELECT * FROM `inventario` WHERE `serialn`='$serialn'";
$verifica = mysqli_query($conexao, $verifica_sql);

if ($verifica) {
    if (mysqli_num_rows($verifica) > 0) {
        // Se o número do produto já existe, exibe a mensagem e redireciona para o formulário
        echo "<script>alert('O serial number já existe, por favor cadastre outro.');</script>";
        echo "<script>window.location.href = 'adicionar_produto.php';</script>";
    } else {
        // Se o número do produto não existe, insere os dados no banco de dados
        $sql = "INSERT INTO `inventario`(`serialn`, `modelo`, `site`, `setor`,`quant`,`centrocusto`) 
                VALUES ('$serialn','$modelo','$site','$setor','$quant','$centrocusto')";
        $inserir = mysqli_query($conexao, $sql);

        if ($inserir) {
            // exibe mensagem de sucesso
            echo '<link rel="stylesheet" href="css/bootstrap.css">
            <div class="container" style="width: 500px; margin-top: 20px;">
                <h4 style="text-align: center;">Produto adicionado com sucesso!</h4>
                <div style="padding-top: 20px;">
                    <center>
                        <a href="adicionar_inventario.php" role="button" class= "btn btn-sm btn-primary">Cadastrar novo ítem</a> 
                    </center>  
                </div>
            </div>';

        } else {
            // exibe mensagem de erro
            echo "Erro ao inserir os dados: " . mysqli_error($conexao);
        }
    }
} else {
    // exibe mensagem de erro
    echo "Erro na consulta: " . mysqli_error($conexao);
}
?>
