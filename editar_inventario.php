<?php
include 'conexao.php';
$id = $_GET['id'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Inventário</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style type="text/css">
        #tamanhoContainer {
            width: 500px;
        }

        #botao{
            background-color: #00BFFF;
            color: #ffffff;
        }
    </style>
</head>
<body>

<div class="container" id="tamanhoContainer" style="margin-top: 40px">
    <h4>Editar Inventário</h4>
    <form action="_atualizar_inventario.php" method="post" style="margin-top: 20px">
        <?php
        $sql = "SELECT * FROM `inventario` WHERE id_inventario = $id";
        $buscar = mysqli_query($conexao,$sql);
        $array = mysqli_fetch_array($buscar);
        if ($array) {
            $id_inventario = $array['id_inventario'];
            $serialn = $array['serialn'];
            $modelo = $array['modelo'];
            $site = $array['site'];
            $setor = $array['setor'];
            $quant = $array['quant'];
            $centrocusto = $array['centrocusto'];
        ?>

        <div class="form-group">
            <label>Serial Number</label>
            <input type="number" class="form-control" name="serialn" value="<?php echo $serialn?>">
            <input type="hidden" name="id" value="<?php echo $id ?>">
        </div>

        <div class="form-group">
            <label>Modelo</label>
            <input type="text" class="form-control" name="modelo" value="<?php echo $modelo ?>">
        </div>

        <div class="form-group">
            <label>Site</label>
            <select class="form-control" name="site">
            <?php
                $sql = "SELECT * FROM `site`";
                $buscar = mysqli_query($conexao,$sql);

                while ($arraySite = mysqli_fetch_array($buscar)){
                    $id_site = $arraySite['id_site'];
                    $nome_site = $arraySite['site'];
                
                    $selected = ($site == $nome_site) ? "selected" : "";
                    echo "<option value='$nome_site' $selected>$nome_site</option>";
                }
            ?> 
            </select>
        </div>  

        <div class="form-group">
            <label>Setor</label>
            <select class="form-control" name="setor">
            <?php
                $sql = "SELECT * FROM `setor`";
                $buscar = mysqli_query($conexao,$sql);

                while ($arraySetor = mysqli_fetch_array($buscar)){
                    $id_setor = $arraySetor['id_setor'];
                    $nome_setor = $arraySetor['setor'];
                
                    $selected = ($setor == $nome_setor) ? "selected" : "";
                    echo "<option value='$nome_setor' $selected>$nome_setor</option>";
                }
            ?> 
            </select>
        </div> 


          <div class="form-group">
                <label >Quantidade</label>
                <input type="number" class="form-control" name="quant" value="<?php echo $quant?>">
            </div>

            <div class="form-group">
                <label >Centro de Custo</label>
                <input type="number" class="form-control" name="centrocusto" value="<?php echo $centrocusto?>">
            </div>
            
            
            
            
        

      
            

        <div style="text-align: right;">
            <button type="submit" id="botao" class="btn">Atualizar</button>
        </div>
      <?php } ?>       
    </form>
</div>    

<script type="text/javascript" src="js/bootstrap.js"></script>

</body>
</html>