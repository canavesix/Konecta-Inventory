<?php

include 'conexao.php';

$id=$_GET['id'];

$deletar = "DELETE FROM usuarios where id_usuario =$id";
$fila = mysqli_query($conexao, $deletar);

header("location: aprovar_usuario.php"); //redireciona novamente para página de aprovação.





?>