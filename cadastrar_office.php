<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Formulário de Cadastro</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <style type="text/css">
            #tamanhoContainer {
                width: 500px;
            }
        </style>
    </head>
    <body>
          
    <div class="container" id="tamanhoContainer" style="margin-top:40px">
    <h4>Formulário de Cadastro</h4> 
     <form action="_inserir_office.php" method="post" style="margin-top:20px">

        <div class="form-group">
            <label>CW</label>
            <input type="text" class="form-control" name="cw" placeholder="CW atrelado a licença">
        </div>
        
        
        <div class="form-group">
            <label>Hostname</label>
            <input type="text" class="form-control" name="hostname" placeholder="Insira o Hostname da máquina">
        </div>
        
        <div class="form-group">
            <label>Tipo da Licença</label>
            <input type="text" class="form-control" name="tipo" placeholder="Insira a licença adquirida">
        </div> 

        <div class="form-group">
            <label>SU</label>
            <input type="number" class="form-control" name="su" placeholder="Insira o número da SU">
        </div> 

        <div class="form-group">
            <label>Setor</label>
            <input type="text" class="form-control" name="setor" placeholder="Insira o setor atrelado à licença">
        </div>

        <div class="form-group">
            <label>Centro de Custo</label>
            <input type="text" class="form-control" name="custo" placeholder="Insira o Centro de Custo">
        </div> 

        <div class="form-group">
            <label>Usuário</label>
            <input type="text" class="form-control" name="user" placeholder="Insira o usuário atrelado à licença">
        </div> 

        <div style="text-align: right;"> 
                <button type="submit" id="botao" class="btn btn-primary" style="color: #fff;margin-right: 12px">Cadastrar</button>
                <a href="menu.php" role="button" class= "btn btn-light">Voltar</a>         
        </div> 



        </div>

     </form>       



    </div>

