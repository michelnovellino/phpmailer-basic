<?php


require("class.phpmailer.php");
require("class.smtp.php");

// Valores enviados desde el formulario
/* if ( !isset($_POST["nombre"]) || !isset($_POST["email"]) || !isset($_POST["telefono"])  || !isset($_POST["asunto"])  || !isset($_POST["mensaje"]) ) {
    die ("Es necesario completar todos los datos del formulario");
}

 */



$nombre = $_POST["nombre"] = "user pureba";

$email = $_POST["email"]= "correito";

$telefono = $_POST["telefono"] = "314241";

$asunto = $_POST["asunto"] = "lol";

$mensaje = $_POST["mensaje"] ="jejejejej";


$destinatario = "prueba@dominio";


// Datos de la cuenta de correo utilizada para enviar v�a SMTP
$smtpHost = "mail.dominio";  // Dominio alternativo brindado en el email de alta 
$smtpUsuario = "prueba@dominio";  // Mi cuenta de correo
$smtpClave = "clavesita";  // Mi contrase�a




$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Port = 465; 
$mail->IsHTML(true); 
$mail->CharSet = "utf-8";

// VALORES A MODIFICAR //
$mail->Host = $smtpHost; 
$mail->Username = $smtpUsuario; 
$mail->Password = $smtpClave;


$mail->From = $email; // Email desde donde env�o el correo.
$mail->FromName = $nombre;
$mail->AddAddress($destinatario); // Esta es la direcci�n a donde enviamos los datos del formulario

$mail->Subject = "Formulario desde el Sitio Web"; // Este es el titulo del email.
$mensajeHtml = nl2br($mensaje);
$mail->Body = "
<html> 

<body> 

<h1>Recibiste un nuevo mensaje desde el formulario de contacto</h1>

<p>Informacion enviada por el usuario de la web:</p>

<p>nombre: {$nombre}</p>

<p>email: {$email}</p>

<p>telefono: {$telefono}</p>

<p>asunto: {$asunto}</p>

<p>mensaje: {$mensaje}</p>

</body> 

</html>

<br />"; // Texto del email en formato HTML
$mail->AltBody = "{$mensaje} \n\n "; // Texto sin formato HTML
// FIN - VALORES A MODIFICAR //

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

$estadoEnvio = $mail->Send(); 
echo $estadoEnvio;
/* 
if($estadoEnvio){
    echo $estadoEnvio;
} else {
    echo "Ocurri� un error inesperado.".$mail->ErrorInfo;
} */







?>

