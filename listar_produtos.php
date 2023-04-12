<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Inventário</title>
	<script src="https://kit.fontawesome.com/eb55db7828.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

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
            <a class="nav-link" href="adicionar_produto.php">Adicionar Estoque</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="pa" href="gerar_csv.php" target="_blank">
              Gerar Relatório <i class="bi bi-download ms-2"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


<?php


include 'conexao.php';
$sql = "SELECT nivel_usuario FROM usuarios WHERE mail_usuario = 'usuario' and status = 'Ativo'";
$buscar = mysqli_query($conexao,$sql);
$array = mysqli_fetch_array($buscar);


?>

<div class="container" style="margin-top: 40px;">
  <div style="text-align: right;">
    <a href="menu.php" role="button" class= "btn btn-sm btn-primary">Voltar</a>  
  </div>

  <h3>Estoque de Equipamentos</h3>
  <div class="container" style="margin-top: 40px;">
  <label for="arquivo" class="form-label" style="font-family: 'Helvetica Neue', sans-serif; font-size: 18px; font-weight: bold;">Busca:</label>
  <form method="post" action="">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Pesquisar por Serial, Nome Produto ou Fornecedor" name="pesquisar" autocomplete="off">
      <button class="btn btn-outline-primary" type="submit" name="buscar"><i class="fas fa-search"></i> Buscar</button>
    </div>
  </form>
</div>





  <br>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">Serial Number</th>
        <th scope="col">Nome Produto</th>
        <th scope="col">Categoria</th>
        <th scope="col">Quantidade</th>
        <th scope="col">Fornecedor</th>
        <th scope="col">Setor</th>
        <th scope="col">Ação</th>
      </tr>
    </thead>
    

    <?php

include 'conexao.php';

$total_itens = 0;




// verifica se a palavra-chave foi enviada pelo formulário
if(isset($_POST['buscar'])) {
  $pesquisar = $_POST['pesquisar'];
  // faz a busca usando a palavra-chave
  $sql = "SELECT * FROM `estoque` WHERE nroproduto LIKE '%$pesquisar%' OR nomeproduto LIKE '%$pesquisar%' OR fornecedor LIKE '%$pesquisar%' OR setor LIKE '%$pesquisar%' OR categoria LIKE '%$pesquisar%'";
} else {
  // mostra todos os itens do estoque
  $sql = "SELECT * FROM `estoque`";
}

$busca = mysqli_query($conexao,$sql);

// array para armazenar os resultados
$resultados = array();

// iterar sobre os resultados da consulta
while ($array = mysqli_fetch_array($busca)) {
  $id_estoque = $array['id_estoque'];
  $nroproduto = $array['nroproduto'];
  $nomeproduto = $array['nomeproduto'];
  $categoria = $array['categoria'];
  $quantidade = $array['quantidade'];
  $fornecedor = $array['fornecedor'];
  $setor = $array['setor'];

  // verifica se o número do produto já existe no array de resultados
  if (!in_array($nroproduto, $resultados)) {

    // adiciona o número do produto ao array de resultados
    array_push($resultados, $nroproduto);

    // adiciona a quantidade do item ao contador de itens
    $total_itens += $quantidade;

    // exibe a linha da tabela
    echo '<tr>
            <td>'.$nroproduto.'</td>
            <td>'.$nomeproduto.'</td>
            <td class="text-uppercase">'.$categoria.'</td>
            <td>'.$quantidade.'</td>
            <td class="text-uppercase">'.$fornecedor.'</td>
            <td>'.$setor.'</td>
            <td>
              <a class="btn btn-info btn-sm mb-3 mb-xl-0" style="color:#fff; margin-right: 10px;"  href="editar_produto.php?id='.$id_estoque.'" role="button"><i class="fa-regular fa-pen-to-square"></i>&nbsp;Editar</a>
              <a class="btn btn-danger btn-sm" style="color:#fff"  href="deletar_produto.php?id='.$id_estoque.'" role="button"><i class="fa-solid fa-trash"></i>&nbsp;Excluir</a>
            </td>
          </tr>';
  }
}

// imprime o contador de itens
echo '<p>Total de itens: '.$total_itens.'</p>';






while ($array = mysqli_fetch_array($busca)) {
  $id_estoque = $array['id_estoque'];
  $nroproduto = $array['nroproduto'];
  $nomeproduto = $array['nomeproduto'];
  $categoria = $array['categoria'];
  $quantidade = $array['quantidade'];
  $fornecedor = $array['fornecedor'];
  $setor = $array['setor'];


          
        ?>



    	


      <tr>
        <td><?php echo $nroproduto ?></td>

        <td><?php echo $nomeproduto ?></td>

        <td class="text-uppercase"><?php echo $categoria ?></td>

        <td><?php echo $quantidade ?></td>

        <td class="text-uppercase"><?php echo $fornecedor ?></td>

        <td><?php echo $setor ?></td>

        
          
         <td> 
          <a class="btn btn-info btn-sm mb-3 mb-xl-0" style="color:#fff; margin-right: 10px;"  href="editar_produto.php?id=<?php echo $id_estoque ?>" role="button"><i class="fa-regular fa-pen-to-square"></i>&nbsp;Editar</a>
          
          
         
          <a class="btn btn-danger btn-sm" style="color:#fff"  href="deletar_produto.php?id=<?php echo $id_estoque ?>" role="button"><i class="fa-solid fa-trash"></i>&nbsp;Excluir</a>
        <?php } ?>  

        </td>
         
      </tr>


      </tr>  	
      
    </tr>
  </table>
  
</div>

    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<?php
// Verifica se o arquivo foi enviado
if(isset($_FILES['arquivo'])) {
  // Verifica se houve algum erro no upload
  if($_FILES['arquivo']['error'] == 0) {
    // Move o arquivo para a pasta desejada
    $destino = 'uploads/' . $_FILES['arquivo']['name'];
    if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $destino)) {
      // Arquivo enviado com sucesso
      echo "Arquivo enviado com sucesso!";
    } else {
      // Erro ao mover o arquivo
      echo "Erro ao mover o arquivo!";
    }
  } else {
    // Erro no upload do arquivo
    echo "Erro no upload do arquivo!";
  }
}


?>

<?php
// Importa o arquivo de conexão com o banco de dados
include 'conexao.php';

// Faz a consulta dos dados dos equipamentos
$sql = "SELECT * FROM estoque";
$resultado = mysqli_query($conexao, $sql);

// Cria um array para guardar os dados dos equipamentos
$equipamentos = array();

// Verifica se a consulta retornou algum resultado
if (mysqli_num_rows($resultado) > 0) {
    // Adiciona os dados de cada equipamento ao array
    while ($equipamento = mysqli_fetch_assoc($resultado)) {
        $equipamentos[] = $equipamento;
    }
}
?>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Função para enviar e-mail
function enviarEmail($assunto, $corpo) {
    // Configurações do servidor SMTP
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = SMTP::DEBUG_OFF; // Habilita o debug SMTP
    $mail->isSMTP(); // Define o método de envio
    $mail->Host = 'smtp.gmail.com'; // Endereço do servidor SMTP
    $mail->SMTPAuth = true; // Habilita a autenticação SMTP
    $mail->Username = 'gustavo13c13c@gmail.com'; // Seu email do Gmail
    $mail->Password = 'eijtrhdxdfyoyqjs'; // Senha do seu email do Gmail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Define a criptografia
    $mail->Port = 587; // Porta TCP para a conexão

    // Configurações do email a ser enviado
    $mail->setFrom('gustavo13c13c@gmail.com', 'Canavesi');
    $mail->addAddress('gustavo.canavesi@outlook.com'); // Destinatário
    $mail->isHTML(true); // Define que o email será enviado como HTML
    $mail->Subject = $assunto;
    $mail->Body = $corpo;

    // Tenta enviar o email
    try {
        $mail->send();
        echo 'O email foi enviado com sucesso.';
    } catch (Exception $e) {
        echo "O email não pôde ser enviado. Erro: {$mail->ErrorInfo}";
    }
}

// Atualiza o $total_itens
$total_itens = $total_itens;

// Verifica se o $total_itens é menor ou igual a 10
if ($total_itens <= 10) {
    // Envia o e-mail informando que há poucas máquinas em estoque
    $assunto = 'Poucas maquinas em estoque';
    $corpo = 'Ha poucas maquinas em estoque. Atualmente, temos apenas ' . $total_itens . ' em estoque.';
    enviarEmail($assunto, $corpo);
}



?>

 
</table>

<?php
if ($total_itens <= 10) {
  echo '<script>
    Swal.fire({
      icon: "warning",
      title: "Estoque Baixo!",
      text: "O estoque está ficando baixo!",
    });
  </script>';
}
?>



<center>
	  <p style="font-size: 10px; margin-top: 5px;">© 2023 Gustavo Canavesi G.C</p>
</center>
</body>

</html>