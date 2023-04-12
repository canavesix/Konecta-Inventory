<?php

include 'conexao.php';

$id = $_POST['id'];
//$serialn = $_POST['serialn'];
$serialn = $_POST['serialn'];
$modelo = $_POST['modelo'];
$site = $_POST['site'];
$setor = $_POST['setor'];
$quant = $_POST['quant'];
$centrocusto = $_POST['centrocusto'];

$sql = "UPDATE `inventario` SET `serialn`='$serialn',`modelo`='$modelo',`site`= '$site',`setor`='$setor', `quant` = '$quant',`centrocusto` = '$centrocusto'  WHERE id_inventario = $id";

$atualizar = mysqli_query($conexao, $sql);

?>

<link rel="stylesheet" href="css/bootstrap.css">
<div class="container" style="width: 400px">
	<center>
		<h3 style="margin-top:15px;">Atualizado com Sucesso!</h3>
		<div style="margin-top: 10px;">
			<a href="listar_inventario.php" class="btn btn-sm btn-warning" style="color: #fff">Voltar</a>
		</div>	
	</center>	
</div>