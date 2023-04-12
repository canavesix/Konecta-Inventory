<?php 
 include 'conexao.php';

 $fornecedor = $_POST['fornecedor'];

 $sql = "INSERT INTO fornecedor (nome_form) values ('$fornecedor')";
 $inserir = mysqli_query($conexao,$sql);

?>
<link rel="stylesheet" href="css/bootstrap.css">
<div class="container" style="width: 400px">
	<center>
		<h3 style="margin-top:15px;">Adicionado com Sucesso!</h3>
		<div style="margin-top: 10px;">
			<a href="adicionar_fornecedor.php" class="btn btn-sm btn-warning" style="color: #fff">Voltar</a>
		</div>	
	</center>	
</div>