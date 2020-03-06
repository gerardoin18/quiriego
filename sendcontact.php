<?php

// Define some constants
define( "RECIPIENT_NAME", "Desierto" ); //UPDATE THIS TO YOUR NAME
define( "RECIPIENT_EMAIL", "snoriega@shugert.com.mx" ); //UPDATE THIS TO YOUR EMAIL ID
define( "EMAIL_SUBJECT", "Reservación" ); //UPDATE THIS TO YOUR SUBJECT

// Read the form values
$success = false;
$senderName = isset( $_POST['name'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['name'] ) : "";
$senderEmail = isset( $_POST['email'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email'] ) : "";
$senderPeople = isset( $_POST['people'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['people'] ) : "";
$senderDate = isset( $_POST['date'] ) ? preg_replace( "", "", $_POST['date'] ) : "";
$senderTime = isset( $_POST['time'] ) ? preg_replace( "", "", $_POST['time'] ) : "";
$senderPhone = isset( $_POST['phone'] ) ? preg_replace( "", "", $_POST['phone'] ) : "";

$original_message = isset( $_POST['message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['message'] ) : "";
$message = 'Nombre: '.$senderName.'<br/>Correo electronico: '.$senderEmail.'<br/>Telefono: '.$_POST['phone'].'<br/>Fecha: '.$_POST['date'].'<br/>Hora: '.$_POST['time'].'<br/>Personas: '.$_POST['people'].'<br/>Mensaje: '.$original_message;


// If all values exist, send the email
if ( $senderName && $senderEmail && $message ) {
  $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
  $headers = "From: " . $senderName . " <" . $senderEmail . ">\n";
  $headers .= "MIME-Version: 1.0\n"; 
  $headers .= "Content-Type: text/HTML; charset=ISO-8859-1\n";
  $success = mail( $recipient, EMAIL_SUBJECT, $message, $headers );
}

if ( $success )
{
?>
	<script>
		window.location='gracias.html';
	</script>
<?php
}
else
{
	echo "<h1>Hubo un problema al enviar tu mensaje. Por favor intenta de nuevo</h1>";
}
?>


