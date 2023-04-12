<?php 

include 'conexao.php';
$id = $_GET['id'];

$sql = "DELETE FROM `inventario` WHERE id_inventario = $id";
$deletar = mysqli_query($conexao, $sql);

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<div class="container" style="width: 400px; margin-top: 20px;">
	<center>
		<h3 style="text-align: center; margin-top:15px">Deletado com Sucesso!</h3>
		<div style="margin-top: 20px">
			<a href="listar_inventario.php" class="btn btn-sm btn-warning" style="color:#fff;">Voltar</a>
		</div>	
	</center>
</div>