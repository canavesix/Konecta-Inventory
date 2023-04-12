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

		@media (max-width: 992px) { 
			.card .card-body {
				min-height: 11.5rem;
				display: flex;
				flex-direction: column;
				justify-content: center;
				align-items: center;
			}
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="https://github.com/canavesix">G.C</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="inventario.php">Inventário</a>
					</li>
				</ul>
			</div>
	
		</div>
	</nav>


	<?php

		session_start();
		$usuario = $_SESSION['usuario'];

		if(!isset($_SESSION['usuario'])){
			header('Location: index.php');
		}
	
	include 'conexao.php';

    $sql = "SELECT nivel_usuario FROM usuarios WHERE mail_usuario = '$usuario' and status = 'Ativo'";
	$buscar = mysqli_query($conexao, $sql);
	$array = mysqli_fetch_array($buscar);
	$nivel = $array['nivel_usuario'];	

	?>
	

	<div class="container" style="margin-top: 100px;">
		<div class="row">
	<?php
	if(($nivel == 1) || ($nivel == 2)){

	
	

	?>
  
  
  <span class="navbar-text text-uppercase">
  Usuário logado: <?php echo $_SESSION['usuario']; ?>
</span>


<div class="col-sm-6">
    <div class="card shadow-sm">
        <div class="card-body text-center">
            <h5 class="card-title">Adicionar Equipamentos em Estoque</h5>
            <p class="card-text">Adicione novos equipamentos ao estoque com facilidade.</p>
            <a href="adicionar_produto.php" class="btn btn-primary btn-sm">
        <i class="fas fa-plus"></i> Cadastrar Equipamentos
</a>

        </div>
    </div>
</div>

		<?php } ?>		

	
<div class="col-sm-6">
  <div class="card shadow-sm">
    <div class="card-body text-center">
      <h5 class="card-title">Lista de Equipamentos em Estoque</h5>
      <p class="card-text">Visualizar, editar e excluir os equipamentos.</p>
      <div class="text-center">
      <a href="listar_produtos.php" class="btn btn-primary btn-sm">
    <i class="fas fa-box-open"></i> Ver Equipamentos
</a>
      </div>
    </div>
  </div>
</div>


		
		<?php
		if ($nivel == 1) {
		
		?>

		

<div class="col-sm-6">
  <div class="card shadow-sm">
    <div class="card-body text-center">
      <h5 class="card-title">Adicionar Categoria</h5>
      <p class="card-text">Opção para adicionar Categoria de produtos.</p>
      <div class="text-center">
      <a href="adicionar_categoria.php" class="btn btn-primary btn-sm">
    <i class="fas fa-tags"></i> Cadastrar Categoria
</a>

      </div>
    </div>
  </div>
</div>
	<?php	}?>


		
	<?php
		if ($nivel == 1) {
		
		?>	
		
<div class="col-sm-6">
  <div class="card shadow-sm">
    <div class="card-body text-center">
      <h5 class="card-title">Adicionar Fornecedor</h5>
      <p class="card-text">Opção para adicionar Fornecedor.</p>
      <div class="text-center">
      <a href="adicionar_fornecedor.php" class="btn btn-primary btn-sm">
  <i class="fas fa-truck"></i> Fabricante
</a>

      </div>
    </div>
  </div>
</div>

	<?php	}?>		


    <?php
		if ($nivel == 1) {
	?>	
	
	<div class="col-sm-6">
  <div class="card shadow-sm">
    <div class="card-body text-center">
      <h5 class="card-title">Aprovar Usuários Externos</h5>
      <p class="card-text">Aprovar usuários solicitantes.</p>
      <div class="text-center">
      <a href="aprovar_usuario.php" class="btn btn-primary btn-sm"><i class="fa fa-users"></i> Aprovar Usuários</a>
      </div>
    </div>
  </div>
</div>
	  
	<?php }?>	  

	<?php
		if ($nivel == 1) {
	?>
<div class="col-sm-6">
  <div class="card shadow-sm">
    <div class="card-body text-center">
      <h5 class="card-title">Cadastrar Usuários</h5>
      <p class="card-text">Opção para o administrador cadastrar usuários.</p>
      <div class="text-center">
      <a href="cadastro_usuario.php" class="btn btn-primary btn-sm">
  <i class="fas fa-user-plus"></i> Cadastrar Usuários
</a>

      </div>
    </div>
  </div>
</div>
	
	  <?php }?>

	  
	  <!--<div class="col-sm-6" style="margin-top: 20px;">
			    <div class="card">
			      <div class="card-body">
			        <h5 class="card-title">OFFICE</h5>
			        <p class="card-text">Opção para cadastrar novas licenças.</p>
			        <a href="cadastrar_office.php" class="btn btn-primary">OFFICE</a>
			      </div>
			</div>
			</div>

			<div class="col-sm-6" style="margin-top: 20px;">
			    <div class="card">
			      <div class="card-body">
			        <h5 class="card-title">Lista de licenças Office.</h5>
			        <p class="card-text">Visualizar e editar licenças.</p>
			        <a href="listar_office.php" class="btn btn-primary">Licenças</a>
			      </div>
			</div>
			</div>-->
			

	<div style="text-align: right; margin-top: 10px;">
    <a href="index.php" class="btn btn-sm btn-danger" style="background-color: #f0ad4e; color: #fff; border-color: #eea236;">
        <i class="fas fa-sign-out-alt"></i> Sair
    </a>
    <center>
	  <p style="font-size: 10px; margin-top: 5px;">© 2023 Gustavo Canavesi G.C</p>
    </center>
</div>
	

		

	</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>
</html>