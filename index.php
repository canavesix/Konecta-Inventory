<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tela de Login</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
	<style>
		body {
			background-color: #f8f9fa;
		}

		.container {
			background-color: #ffffff;
			border-radius: 10px;
			box-shadow: 0px 0px 10px #d4d4d4;
			margin-top: 100px;
			padding: 30px;
			max-width: 400px;
		}

		.form-group label {
			font-size: 14px;
			font-weight: 600;
			color: #333333;
			margin-bottom: 5px;
		}

		.form-control {
			border-radius: 5px;
			border-color: #ced4da;
			box-shadow: none;
			font-size: 14px;
			padding: 12px;
			height: 50px;
			color: #333333;
			transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
		}

		.form-control:focus {
			border-color: #02aeef;
			box-shadow: 0 0 0 0.2rem rgba(2, 174, 239, 0.25);
		}

		.btn-success {
			background-color: #02aeef;
			border-color: #02aeef;
			color: #3b579d;
			font-weight: 600;
			text-transform: uppercase;
			letter-spacing: 1px;
			padding: 12px 30px;
			border-radius: 25px;
			transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out;
		}

		.btn-success:hover {
			background-color: #0099cc;
			border-color: #0099cc;
		}

		.link-cadastro {
			font-size: 14px;
			color: #02aeef;
			text-decoration: none;
			transition: color 0.15s ease-in-out;
		}

		.link-cadastro:hover {
			color: #0099cc;
		}

		.small {
			font-size: 10px;
			color: #999999;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="text-center mb-4">
			<h1 class="h3 mb-3 font-weight-normal">G.C INVENTORY</h1>	
		</div>
		<span class="bi bi-box-seam bi-green fs-4"></span>

	<form action="index1.php" method="post">
		<div class="form-group">
			<label for="usuario">Usuário</label>
			<input type="text" name="usuario" class="form-control" id="usuario" placeholder="Digite seu usuário" autocomplete="off" required>
		</div>

		<div class="form-group">
			<label for="senha">Senha</label>
			<input type="password" name="senha" class="form-control" id="senha" placeholder="Digite sua senha" autocomplete="off" required>
		</div>

		<div class="text-right">
			<button type="submit" class="btn btn-lg btn-entrar">Entrar</button>
		</div>
	</form>

	<div class="mt-3 text-center">
		<small>Não possui cadastro? Clique <a href="cadastro_usuario_externo.php" class="link-cadastro">aqui</a></small>
	</div>
</div>

<footer class="footer">
	<center>
	<p>© 2023 Gustavo Canavesi G.C</p>
	</center>
</footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>