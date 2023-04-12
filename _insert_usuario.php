<?php
include 'conexao.php';
include 'script/password.php';

$nomeusuario = $_POST['nomeusuario'];
$mail = $_POST['mailusuario'];
$senha = $_POST['senhausuario'];
$nivel = $_POST['nivelusuario'];
$status = 'Ativo';

$sql = "INSERT INTO `usuarios`(`nome_usuario`, `mail_usuario`, `senha_usuario`, `nivel_usuario`, `status`) VALUES ('$nomeusuario','$mail',sha1('$senha'),'$nivel','$status')";


$inserir = mysqli_query($conexao, $sql);

?>
<link rel="stylesheet" href="css/bootstrap.css">
<div class="container" style="width: 400px">
	<center>
		<h3 style="margin-top:15px;">Usuário adicionado com sucesso!</h3>
		<div style="margin-top: 10px;">
			<a href="cadastro_usuario.php" class="btn btn-sm btn-warning" style="color: #fff">Voltar</a>
		</div>	
	</center>	
</div>

