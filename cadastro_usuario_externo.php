<!-- Este é um formulário de cadastro de usuário, escrito por [Gustavo Canavesi] -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
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
</head>
<body>
<div class="container" style="width: 400px; margin-top: 40px;">
	<div style="text-align: right;">
		<a href="index.php" role="button" class="btn btn-secondary">Voltar</a>
	</div>	
	<h4 class="text-center mb-4">Cadastro de Usuário</h4>
	<form action="_insert_usuario_externo.php" method="post">
		<div class="form-group">
			<label for="nomeusuario">Nome do Usuário</label>
			<input type="text" name="nomeusuario" id="nomeusuario" class="form-control" required autocomplete="off" placeholder="Nome de Usuário">
		</div>
		<div class="form-group">
			<label for="mailusuario">E-mail</label>
			<input type="email" name="mailusuario" id="mailusuario" class="form-control" required autocomplete="off" placeholder="Seu e-mail ou matrícula">
		</div>


	<div class="form-group">
		<label for="senhausuario">Senha</label>
		<input id="senhausuario" type="password" name="senhausuario" class="form-control" required autocomplete="off" placeholder="Senha">
	</div>

	<div class="form-group">
		<label for="senha2">Confirmar Senha</label>
		<input type="password" name="senha2" id="senha2" class="form-control" required autocomplete="off" placeholder="Confirmar Senha" oninput="validaSenha(this)">
		<small id="senha2-erro" class="text-danger d-none">As senhas devem ser iguais</small>
	</div></br>

<div class="form-group text-end">
	<button type="submit" class="btn btn-primary">Cadastrar</button>	
</div>
</form>

<div id="mensagem-sucesso" class="alert alert-success d-none" role="alert">
	Usuário cadastrado com sucesso!
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script>
	function validaSenha (input){ 
		let senha = document.getElementById('senhausuario').value;
		if (input.value != senha) {
			document.getElementById('senha2-erro').classList.remove('d-none');
	    input.setCustomValidity('Repita a senha corretamente');
	  } else {
	    input.setCustomValidity('');
			document.getElementById('senha2-erro').classList.add('d-none');
	  }
	} 
</script>
</body>
</html>





