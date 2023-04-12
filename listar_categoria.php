<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Listagem de Produtos</title>
	<link rel="stylesheet" href="css/bootstrap.css">
  <script src="https://kit.fontawesome.com/eb55db7828.js" crossorigin="anonymous"></script>
</head>
<body>

<div class="container" style="margin-top: 40px; width: 500px;">
  <div style="text-align: right;">
    <a href="index.php" role="button" class= "btn btn-sm btn-primary">Voltar</a>  
  </div>

  <h3>Lista de Produtos</h3>

  <br>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">Nome Categoria</th>
        <th scope="col">Ação</th>
      </tr>
    </thead>

    <tbody>
      <?php
        include 'conexao.php';
        $sql = "SELECT * FROM `categoria`";
        $busca = mysqli_query($conexao,$sql);

        while ($array = mysqli_fetch_array($busca)) {             
          $id_categoria = $array['id_categoria'];
          $nome_categoria = $array['nome_categoria'];
          
      ?>

      <tr>
        <td><?php echo $nome_categoria ?></td>

        <td>
          <a class="btn btn-info btn-sm" style="color:#fff; margin-right: 10px;"  href="editar_categoria.php?id=<?php echo $id_categoria ?>" role="button"><i class="fas fa-pen"></i>&nbsp;Editar</a>
          <a class="btn btn-danger btn-sm" style="color:#fff"  href="deletar_categoria.php?id=<?php echo $id_categoria ?>" role="button"><i class="fas fa-trash"></i>&nbsp;Excluir</a>
        </td>
      </tr>   
      <?php } ?>
    </tbody>
  </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>
</html>