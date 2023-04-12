<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

include 'conexao.php';
$id = $_GET['id'];

// Busca informações do item antes de excluí-lo
$sql_select = "SELECT * FROM `estoque` WHERE id_estoque = $id";
$select = mysqli_query($conexao, $sql_select);
$item = mysqli_fetch_assoc($select);

// Exclui o item
$sql_delete = "DELETE FROM `estoque` WHERE estoque = $id";
$deletar = mysqli_query($conexao, $sql_delete);

// Se a exclusão foi realizada com sucesso, envia e-mail

if ($deletar) {
	
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
	
		// Set the email content
        $mail->setFrom('gustavo13c13c@gmail.com', 'Canavesi');
        $mail->addAddress('gustavo.canavesi@outlook.com', 'IT SUPPORT');
        $mail->Subject = 'Item excluído do estoque';
        $mail->Body = 'O seguinte item foi excluído do estoque:' . "\n\n" .
                      'ID: ' . $item['id_estoque'] . "\n" .
                      'Nome: ' . $item['nome'] . "\n" .
                      'Usuário que excluiu: ' . $_SESSION['usuario'] . "\n";
		// Tenta enviar o email
		try {
			$mail->send();
			echo 'O email foi enviado com sucesso.';
		} catch (Exception $e) {
			echo "O email não pôde ser enviado. Erro: {$mail->ErrorInfo}";
		}

    $mail = new PHPMailer(true);
    try {
  // Set the SMTP settings
        $mail = new PHPMailer(true);
    $mail->SMTPDebug = SMTP::DEBUG_OFF; // Habilita o debug SMTP
    $mail->isSMTP(); // Define o método de envio
    $mail->Host = 'smtp.gmail.com'; // Endereço do servidor SMTP
    $mail->SMTPAuth = true; // Habilita a autenticação SMTP
    $mail->Username = 'gustavo13c13c@gmail.com'; // Seu email do Gmail
    $mail->Password = 'eijtrhdxdfyoyqjs'; // Senha do seu email do Gmail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Define a criptografia
    $mail->Port = 587; // Porta TCP para a conexão

        

        // Send the email
        $mail->send();
        echo 'Email enviado com sucesso';
    } catch (Exception $e) {
        echo 'Erro ao enviar email: ' . $e->getMessage();
    }
}
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<div class="container" style="width: 400px; margin-top: 20px;">
    <center>
        <h3 style="text-align: center; margin-top:15px">Deletado com Sucesso!</h3>
        <div style="margin-top: 20px">
            <a href="listar_produtos.php" class="btn btn-sm btn-warning" style="color:#fff;">Voltar</a>
        </div>
    </center>
</div>
