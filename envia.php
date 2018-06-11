<?php
require_once("class.phpmailer.php"); 
$nome = $_POST['name'];
$email = $_POST['email'];
$mensagem = $_POST['message'];

$conteudo ='Nome: ' .$nome;
$conteudo .='<br/>'.'Email: ' .$email;
$conteudo .='<br/>'.'Mensagem: ' .$mensagem;
try {
$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->IsSMTP();		
$mail->SMTPDebug = 0;		
$mail->SMTPAuth = true;		
$mail->SMTPSecure = 'ssl';	
$mail->Host = 'email-ssl.com.br';	
$mail->Port = '465';  		
$mail->Username = "contato@arielconsultor.com.br"; 
$mail->Password = "Djarielnunes1234"; 
$mail->From = "contato@arielconsultor.com.br";
$mail->FromName = "Contato do site Ariel";
$mail->AddAddress("contato@arielconsultor.com.br");
$mail->IsHTML(true); 
$mail->Subject = "Mensagem do formulário de Contato";
$mail->Body = $conteudo;
if(isset($upload)){
$mail->AddAttachment($upload, $uploadNome);	
} 
$mail->Send(); 
    echo "<script>
	alert('Mensagem enviada com sucesso! Em breve responderemos.');
	window.location.href = 'index.html#three';
	</script>";
} catch (Exception $e) {
  	echo "<script>
		alert('Mensagem n\u00e3o enviada! Tente novamente mais tarde.');
		window.location.href = 'index.html#three';
	</script>";
}
?>
