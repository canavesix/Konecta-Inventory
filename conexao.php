<?php
$servername = "localhost"; //padrão - server local
$database = "curso_estoque"; //alterar conforme o nome do seu banco de dados
$username = "root";	//padrão - root
$password ="";
$conexao = mysqli_connect($servername, $username, $password, $database);

$conexao = mysqli_connect("localhost", "root", "", "curso_estoque");

if (!$conexao) {
  die("Conexão falhou: " . mysqli_connect_error());
function check_duplicate_nroproduto($conexao, $nroproduto) {
    $sql = "SELECT * FROM estoque WHERE nroproduto = '$nroproduto'";
    $result = mysqli_query($conexao, $sql);
    if(mysqli_num_rows($result) > 0) {
      return true; // já existe um produto com o mesmo nroproduto
    } else {
      return false; // não existe produto com o mesmo nroproduto
    }
  }
  
}