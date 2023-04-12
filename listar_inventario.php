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
            <a class="nav-link" href="adicionar_inventario.php">Adicionar novos itens</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="pa" href="gerar_csv_inventario.php" target="_blank">
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
    <a href="inventario.php" role="button" class= "btn btn-sm btn-primary">Voltar</a>  
  </div>

  <h3>Inventário de Equipamentos</h3>
  <div class="container" style="margin-top: 40px;">
  <label for="arquivo" class="form-label" style="font-family: 'Helvetica Neue', sans-serif; font-size: 18px; font-weight: bold;">Busca:</label>
  <form method="post" action="">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Pesquisar por Serial, modelo, site ,setor ou Centro de Custo" name="pesquisar" autocomplete="off">
      <button class="btn btn-outline-primary" type="submit" name="buscar"><i class="fas fa-search"></i> Buscar</button>
    </div>
  </form>
</div>





  <br>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">Serial Number</th>
        <th scope="col">Modelo</th>
        <th scope="col">Site</th>
        <th scope="col">Setor</th>
        <th scope ="col">Quantidade</th>
        <th scope="col">Centro de Custo</th>
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
  $sql = "SELECT * FROM `inventario` WHERE serialn LIKE '%$pesquisar%' OR modelo LIKE '%$pesquisar%' OR site LIKE '%$pesquisar%' OR setor LIKE '%$pesquisar%' OR centrocusto LIKE '%$pesquisar%'";
} else {
  // mostra todos os itens do estoque
  $sql = "SELECT * FROM `inventario`";
}

$busca = mysqli_query($conexao,$sql);

// array para armazenar os resultados
$resultados = array();

// iterar sobre os resultados da consulta
while ($array = mysqli_fetch_array($busca)) {
  $id_inventario = $array['id_inventario'];
  $serialn = $array['serialn'];
  $modelo = $array['modelo'];
  $site = $array['site'];
  $setor = $array['setor'];
  $quant = $array['quant'];
  $centrocusto = $array['centrocusto'];
  

  // verifica se o número do produto já existe no array de resultados
  if (!in_array($serialn, $resultados)) {

    // adiciona o número do produto ao array de resultados
    array_push($resultados, $serialn);

    // adiciona a quantidade do item ao contador de itens
    $total_itens += $quant;

    // exibe a linha da tabela
    echo '<tr>
            <td>'.$serialn.'</td>
            <td>'.$modelo.'</td>
            <td class="text-uppercase">'.$site.'</td>
            <td>'.$setor.'</td>
            <td>'.$quant.'</td>
            <td class="text-uppercase">'.$centrocusto.'</td>
            
            <td>
              <a class="btn btn-info btn-sm mb-3 mb-xl-0" style="color:#fff; margin-right: 10px;"  href="editar_inventario.php?id='.$id_inventario.'" role="button"><i class="fa-regular fa-pen-to-square"></i>&nbsp;Editar</a>
              <a class="btn btn-danger btn-sm" style="color:#fff"  href="deletar_inventario.php?id='.$id_inventario.'" role="button"><i class="fa-solid fa-trash"></i>&nbsp;Excluir</a>
            </td>
          </tr>';
  }
}

// imprime o contador de itens
echo '<p>Total de itens: '.$total_itens.'</p>';






while ($array = mysqli_fetch_array($busca)) {
  $id_inventario = $array['id_inventario'];
  $serialn = $array['serialn'];
  $modelo = $array['modelo'];
  $site = $array['site'];
  $setor = $array['setor'];
  $quant = $quant['quant'];
  $centrocusto = $array['centrocusto'];
  


          
        ?>

    	


      <tr>
        <td><?php echo $serialn ?></td>

        <td><?php echo $modelo ?></td>

        <td class="text-uppercase"><?php echo $site ?></td>

        <td><?php echo $setor ?></td>

        <td><?php echo $quant ?></td>

        <td class="text-uppercase"><?php echo $centrocusto ?></td>

        

        
          
         <td> 
          <a class="btn btn-info btn-sm mb-3 mb-xl-0" style="color:#fff; margin-right: 10px;"  href="editar_inventario.php?id=<?php echo $id_inventario ?>" role="button"><i class="fa-regular fa-pen-to-square"></i>&nbsp;Editar</a>
          
          
         
          <a class="btn btn-danger btn-sm" style="color:#fff"  href="deletar_inventario.php?id=<?php echo $id_inventario ?>" role="button"><i class="fa-solid fa-trash"></i>&nbsp;Excluir</a>
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
$sql = "SELECT * FROM inventario";
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





 
</table>
<center>
	  <p style="font-size: 10px; margin-top: 5px;">© 2023 Gustavo Canavesi G.C</p>
</center>
</body>

</html>

<!-- Importando a biblioteca Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3"></script>
<!-- Adicionando o canvas para o gráfico -->
<canvas id="myChart"></canvas>

<script>
// Obter dados do banco de dados e criar um array de setores e quantidades de máquinas
<?php
// Consulta SQL para obter as informações necessárias para o gráfico
$sql = "SELECT setor, COUNT(*) AS quantidade FROM inventario GROUP BY setor ORDER BY quantidade DESC";
$resultado = mysqli_query($conexao, $sql);

// Criando arrays para armazenar os dados de setores e quantidades
$setores = array();
$quantidades = array();
while ($linha = mysqli_fetch_array($resultado)) {
    array_push($setores, $linha['setor']);
    array_push($quantidades, $linha['quantidade']);
}
?>

// Criando um objeto Chart para o gráfico
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($setores); ?>,
        datasets: [{
            label: 'Quantidade de máquinas por setor',
            data: <?php echo json_encode($quantidades); ?>,
            backgroundColor: 'rgba(78, 115, 223, 0.5)',
            borderColor: 'rgba(78, 115, 223, 1)',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        legend: {
            display: false
        },
        title: {
            display: true,
            text: 'Quantidade de máquinas por setor'
        },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>