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
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
      <a class="navbar-brand" href="https://github.com/canavesix">G.C</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="menu.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="listar_produtos.php">Estoque</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container mt-4">
    <div class="row">
      <div class="col-md-6">
        <form method="post" action="upload.php" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="arquivo" class="form-label">Selecione um arquivo Excel:</label>
            <div class="input-group">
              <input type="file" class="form-control p-0 mr-3" id="arquivo" name="arquivo">
              <button type="submit" class="btn btn-primary" style="background-color: #007bff; font-family: 'Helvetica Neue', sans-serif; font-size: 16px; font-weight: bold;">Enviar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <hr>

    

            <br>
            <h5>Cadastrar manualmente:</h5>
            <form action="_inserir_produto.php" method="post" style="margin-top: 20px">
                <div class="form-group">
                    <label>Serial Number</label>
                    <input type="text" class="form-control" name="nroproduto" placeholder="Insira o número de série do equipamento." autocomplete="off">
                </div>
                  <div class="form-group">
                      <label for="nomeproduto">Nome Produto:</label>
                      <input type="text" class="form-control" id="nomeproduto" name="nomeproduto" placeholder="Insira o nome do produto" autocomplete="off" required>
                    </div>

                    <div class="form-group">
                      <label for="categoria">Categoria:</label>
                      <select class="form-control" id="categoria" name="categoria">

                            <?php
                            include 'conexao.php';
                            $sql2 = "SELECT * FROM categoria";
                            $buscar2 = mysqli_query($conexao, $sql2);

                            while ($array2 = mysqli_fetch_array($buscar2)) {
                                $id_categoria = $array2['id_categoria'];
                                $nome_categoria = $array2['categoria'];


                            ?>


                                <option><?php echo $nome_categoria ?></option>

                            <?php } ?>




                        </select>
                    </div>



                    <div class="form-group">
                        <label>Quantidade</label>
                        <input type="number" class="form-control" name="quantidade" placeholder="Insira quantidade do produto" required>
                    </div>

                    <div class="form-group">
                        <label>Setor</label>
                        <input type="text" class="form-control" name="setor" placeholder="Insira o setor de destino">
                    </div>
                
                    <div class="form-group">
   <label>Fornecedor</label>
   <select class="form-control" name="fornecedor">
      <?php
         include 'conexao.php';
         $sql2 = "SELECT * FROM fornecedor";
         $buscar2 = mysqli_query($conexao, $sql2);

         while ($array2 = mysqli_fetch_array($buscar2)) {
            $id_fornecedor = $array2['id_form'];
            $nome_fornecedor = $array2['nome_form'];
      ?>
            <option><?php echo $nome_fornecedor ?></option>
      <?php } ?> 
   </select>
   
    <div style="text-align: right;"><br>
      <button type="submit" id="botao" class="btn btn-primary" style="color: #fff;margin-right: 12px">Cadastrar</button>
      <a href="menu.php" role="button" class="btn btn-light">Voltar</a>
   </div>
</div>

        <script type="text/javascript" src="js/bootstrap.js"></script>
        

    </body>

    </html>