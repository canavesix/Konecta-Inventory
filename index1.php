<?php

include 'conexao.php';
include 'script/password.php';

$usuario = $_POST['usuario'];
$senhausuario = $_POST['senha'];

$sql = "SELECT mail_usuario, senha_usuario FROM usuarios WHERE mail_usuario = '$usuario' and status= 'Ativo'";
$buscar = mysqli_query($conexao,$sql);

if ($buscar === false) {
    echo "Erro na consulta: " . mysqli_error($conexao);
    exit;
}

$total = mysqli_num_rows($buscar);

if ($total > 0) {
    while ($array = mysqli_fetch_array($buscar)) {
        $senha = $array['senha_usuario'];
    }
    $senhadecodificada = sha1($senhausuario);
    if ($senha == $senhadecodificada) {

        session_start();
        $_SESSION['usuario'] = $usuario;

        header('Location: menu.php');
    } else {
        header('Location: erro.php');
    }
} else {
    header('Location: erro.php');
}

?>
