<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastro de Usuário</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

<style>
.container {
	background-color: #f8f9fa;
	padding: 20px;
	border-radius: 10px;
	box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

form {
	margin-top: 20px;
}

h4 {
	margin-bottom: 20px;
}

label {
	font-weight: bold;
}

.mb-3 {
	margin-bottom: 1rem;
}

.btn-primary {
	background-color: #007bff;
	border-color: #007bff;
}

.btn-primary:hover {
	background-color: #0069d9;
	border-color: #0062cc;
}

.btn-success {
	background-color: #28a745;
	border-color: #28a745;
}

.btn-success:hover {
	background-color: #218838;
	border-color: #1e7e34;
}

.form-control:focus {
	border-color: #80bdff;
	box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}
</style>
</head>
<body>
<div class="container" style="max-width: 400px; margin-top: 40px;">
	<div style="text-align:right;">
		<a href="menu.php" role="button" class="btn btn-primary">Voltar</a>
	</div>	
	<h4 class="mb-4">Cadastro de Usuário</h4>
	<form action="_insert_usuario.php" method="post">
		<div class="mb-3">
			<label for="nomeusuario" class="form-label">Nome do Usuário</label>
			<input type="text" name="nomeusuario" class="form-control" id="nomeusuario" required autocomplete="off" placeholder="Nome do Usuário">
		</div>
		<div class="mb-3">
			<label for="mailusuario" class="form-label">E-mail</label>
			<input type="text" name="mailusuario" class="form-control" id="mailusuario" required autocomplete="off" placeholder="Seu e-mail ou matrícula">
		</div>
		<div class="mb-3">
			<label for="senhausuario" class="form-label">Senha</label>
			<input type="password" name="senhausuario" class="form-control" id="senhausuario" required autocomplete="off" placeholder="Senha">
		</div>
		<div class="mb-3">
			<label for="senha2" class="form-label">Confirmar Senha</label>
			<input type="password" name="senha2" class="form-control" id="senha2" required autocomplete="off" placeholder="Confirmar Senha" oninput="validaSenha(this)">
			<small>As senhas devem ser iguais</small>
		</div>
		<div class="mb-3">
			<label for="nivelusuario" class="form-label">Nível de Acesso</label>
			<select name="nivelusuario" class="form-control" id="nivelusuario">
				<option value="1">Administrador</option>
				<option value="2">Funcionário</option>
				<option value="3">Conferente</option>
			</select>
		</div>
		<div style="text-align: right">
			<button type="submit" class="btn btn-success">Cadastrar</button>	
		</div>
	</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>

	<script>
	function validaSenha (input){ 
		if (input.value != document.getElementById('txtSenha').value) {
	    input.setCustomValidity('Repita a senha corretamente');
	  } else {
	    input.setCustomValidity('');
	  }
	} 
	</script>
<center>
	  <p style="font-size: 10px; margin-top: 5px;">© 2023 Gustavo Canavesi G.C</p>
</center>
</body>
</html>	
