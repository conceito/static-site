<?php
/*
|==============================================================================
|		MAIL
|------------------------------------------------------------------------------
*/
require_once("config.php");

// SMTP account --------------------------------
define('SMTPHOST', 'smtp..com.br');
define('SMTPEMAIL', 'autentica@.com.br');
define('SMTPPASS', 'pass');
define('SMTPPORT', 587); // 587 - 25
define('SMTPENCR', ''); // TSC

$type = $_GET['t'];

///////////// TIPO DE FORMULÁRIO /////////////////////

if ($type == 'contato'):

	$emailDestino = 'contato@.com.br';

	// dados
	$subject = 'Contato pelo site';
	$nome    = trim($_POST['nome']);
	$email   = trim($_POST['email']);
	// $telefone = trim($_POST['tel']);
	$msg = trim($_POST['mensagem']);

	// salva na session
	$_SESSION['post'] = null;
	$_SESSION['post'] = $_POST;

	// validação
	if (strlen($nome) == 0)
	{
		$_SESSION['error']['msg'] = 'Preencha o nome.';
		$_SESSION['error']['id']  = 1;
		redirect($type);
	}
	else if (filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		$_SESSION['error']['msg'] = 'Preencha o e-mail.';
		$_SESSION['error']['id']  = 1;
		redirect($type);
	}
	else if (strlen($msg) == 0)
	{
		$_SESSION['error']['msg'] = 'Deixe sua mensagem.';
		$_SESSION['error']['id']  = 1;
		redirect($type);
	}

	$body = '<b>Nome: </b>' . $nome . '';
	$body .= '<br>' . PHP_EOL;
	$body .= '<b>E-mail: </b>' . $email;
	$body .= '<br>' . PHP_EOL;
	$body .= $msg;

	$body = load_view($body);


endif;
// contato

///////////////////// PHP MAILER ////////////////////////////////////
// include PHP Mailer
//require_once('file://///CONCEITO-NOTE-1/www/anestesiacarioca.com.br/trunk/classes/language/phpmailer.lang-br.php');
require_once('inc/mailer5/class.phpmailer.php');

// Instancia o phpMailer e coloca as informações que não mudarão nas interações.
$mail            = new PHPMailer();
$mail->SMTPDebug = false;
// autenticação
$mail->Subject  = utf8_decode($subject);
$mail->From     = SMTPEMAIL;
$mail->FromName = utf8_decode($nome);
$mail->IsSMTP(); // telling the class to use SMTP
$mail->SMTPSecure = SMTPENCR;
$mail->Host       = SMTPHOST; // SMTP server
$mail->SMTPAuth   = true; // turn on SMTP authentication
$mail->Username   = SMTPEMAIL; // SMTP username
$mail->Password   = SMTPPASS; // SMTP password
$mail->Sender     = SMTPEMAIL; // <<-- receberá os erros
$mail->Port       = SMTPPORT;
$mail->WordWrap   = 50; // Definição de quebra de linha
// // Finaliza instruções do phpmailer -------------------
$mail->Body    = utf8_decode($mensagem);
$mail->AltBody = utf8_decode($mensagem);
$mail->AddAddress($emailDestino, utf8_decode($titleSite));
$mail->AddReplyTo($email, utf8_decode($nome)); // informando a quem devemos responder. o mail inserido no formulario
// $mail->AddCC($bcc[0]); 
// $mail->AddCC($bcc[1]); 
// $mail->AddCC($bcc[2]); 
// // Envia e pega resultado -----------------------------
// Não enviou!!!

if (!$mail->Send())
{
	$_SESSION['error']['msg'] = $mail->ErrorInfo;
	$_SESSION['error']['id']  = 2;
}
else
{
	$mail->ClearAddresses();

	$_SESSION['error']['msg'] = 'Obrigado pelo contato. Responderemos em breve.';
	$_SESSION['error']['id']  = 0;
}

redirect($type);