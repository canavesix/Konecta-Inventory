<?php
include 'conexao.php';
include 'script/password.php';

$nomeusuario = $_POST['nomeusuario'];
$mail = $_POST['mailusuario'];
$senha = $_POST['senhausuario'];
//$nivel = $_POST['nivelusuario'];
$status = 'Inativo';

$sql = "INSERT INTO `usuarios`(`nome_usuario`, `mail_usuario`, `senha_usuario`,`status`) VALUES ('$nomeusuario','$mail',sha1('$senha'),'$status')";

$inserir = mysqli_query($conexao,$sql);

?>
<link rel="stylesheet" href="css/bootstrap.css">
<div class="container" style="width: 400px">
	<center>
		<h3 style="margin-top:15px;">Usuário adicionado com sucesso, esperando aprovação</h3>
		<div style="margin-top: 10px;">
			<a href="index.php" class="btn btn-sm btn-warning" style="color: #fff">Voltar</a>
		</div>	
	</center>	
</div>

