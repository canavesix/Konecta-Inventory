<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Inventário</title>
	<script src="https://kit.fontawesome.com/eb55db7828.js" crossorigin="anonymous"></script>

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
	rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
	crossorigin="anonymous">

	<!-- Custom CSS -->
	<style>
		body {
			background-color: #f7f7f7;
		}

		.card {
			margin-bottom: 40px;
			box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
			border-radius: 0.25rem;
			border: none;
		}

		.card-title {
			font-size: 1.25rem;
			font-weight: 600;
			color: #333;
		}

		.card-text {
			font-size: 1rem;
			color: #666;
		}

		.btn-primary {
			background-color: #4e73df;
			border-color: #4e73df;
		}

		.btn-primary:hover {
			background-color: #2e59d9;
			border-color: #2e59d9;
		}

		h1 {
			margin-top: 100px;
			margin-bottom: 30px;
			font-size: 2rem;
			text-align: center;
			color: #333;
		}

		/* Additional customizations for visual enhancement */
		.navbar-brand {
			font-size: 2rem;
			color: #4e73df;
			font-weight: bold;
		}

		.navbar {
			background-color: #f7f7f7;
			padding: 20px;
			background-color: #343a40;
			box-shadow: 0px 2px 10px rgba(0,0,0,0.3);
		}

		.nav-link {
			font-size: 1.25rem;
			color: white;
			font-weight: bold;
			text-transform: uppercase;
			padding: 10px;
		}

		.nav-link:hover {
			color: #4e73df;
		}
	</style>
  
<div class="container" style="margin-top: 40px;">
  <div style="text-align: right;">
    <a href="menu.php" role="button" class= "btn btn-sm btn-primary">Voltar</a>  
  </div>

  <h3>Lista de Aprovação de Usuários</h3>

  <br>
</head>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Nome Usuário</th>
        <th scope="col">E-mail usuário</th>
        <th scope="col">Nível usuário</th>
        <th scope="col">Ação</th>
      </tr>
    </thead>

    <?php
  include 'conexao.php';
  $sql = "SELECT * FROM usuarios WHERE status = 'Inativo'";
  $busca = mysqli_query($conexao,$sql);

  while ($array = mysqli_fetch_array($busca)){

    $id_usuario = $array['id_usuario'];
    $nomeusuario = $array['nome_usuario'];
    $mail = $array['mail_usuario'];
    $nivel = $array['nivel_usuario'];
?>
<tr>
  <td><?php echo $nomeusuario ?></td>
  <td><?php echo $mail ?></td>
  <td><?php echo $nivel ?></td>
  <td>
    <a class="btn btn-success btn-sm" style="color:#fff; margin-right: 10px;"  href="_aprovar_usuario.php?id=<?php echo $id_usuario ?>&nivel=1" role="button"><i class="fa-solid fa-user-plus"></i></i>&nbsp;Administrador</a>
    <a class="btn btn-warning btn-sm" style="color:#fff; margin-right: 10px;"  href="_aprovar_usuario.php?id=<?php echo $id_usuario ?>&nivel=2" role="button"><i class="fa-solid fa-user-plus"></i></i>&nbsp;Funcionario</a>
    <a class="btn btn-dark btn-sm" style="color:#fff; margin-right: 10px;"  href="_aprovar_usuario.php?id=<?php echo $id_usuario ?>&nivel=3" role="button"><i class="fa-solid fa-user-plus"></i></i>&nbsp;Conferente</a>
    <a class="btn btn-danger btn-sm" style="color:#fff"  href="_deletar_usuario.php?id=<?php echo $id_usuario ?>&nivel=" role="button"><i class="fa-solid fa-trash"></i>&nbsp;Excluir</a>
  </td>
</tr>
<?php } ?>

  </table>
</div>

<center>
	  <p style="font-size: 10px; margin-top: 5px;">© 2023 Gustavo Canavesi G.C</p>
</center>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>
</html>