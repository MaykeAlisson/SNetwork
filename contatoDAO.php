<?php

// Caminho da biblioteca PHPMailer
require 'PHPMailerAutoload.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['textarea'];

// Instância do objeto PHPMailer
$mail = new PHPMailer;

// Configura para envio de e-mails usando SMTP
$mail->isSMTP();

// Servidor SMTP
$mail->Host = 'smtp.gmail.com';

// Usar autenticação SMTP
$mail->SMTPAuth = true;

// Usuário da conta
$mail->Username = 'maykealison@gmail.com';

// Senha da conta
$mail->Password = 'maykedev91';

// Tipo de encriptação que será usado na conexão SMTP
$mail->SMTPSecure = 'ssl';

// Porta do servidor SMTP
$mail->Port = 465;

// Informa se vamos enviar mensagens usando HTML
$mail->IsHTML(true);

// Email do Remetente
$mail->From = 'maykealison@gmail.com';

// Nome do Remetente
$mail->FromName = 'Mayke';

// Endereço do e-mail do destinatário
$mail->addAddress('maykealison@gmail.com');

// Assunto do e-mail
$mail->Subject = 'E-mail PHPMailer';

// Mensagem que vai no corpo do e-mail
$mail->Body = '<label>Nome: '.$nome.'</label><br>'.
'<label>e-mail: '.$email.'</label><br>'.
'<label>mensagem: '.$mensagem.'</label><br>'
;

// Envia o e-mail e captura o sucesso ou erro
if($mail->Send()):
    echo 'Enviado com sucesso !';
else:
    echo 'Erro ao enviar Email:' . $mail->ErrorInfo;
endif;