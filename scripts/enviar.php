<?php

	//instancio un objeto de la clase PHPMailer
    $nombre=$_REQUEST["name"];
    $telefono=$_REQUEST["subject_"];	
    $email=$_REQUEST["email"];
    $comentarios = $_REQUEST["message"];
    
	$body="";
	$body.="<table width='100%' style='font-weight: bold; font-size: 16px;'>";	
	$body.="<tr valign='top'>
				<td align='right'>Nombre:</td>
				<td align='left'>$nombre</td>
			</tr>";	
	$body.="<tr valign='top'>
				<td align='right'>Teléfono:</td>
				<td align='left'>$telefono</td>
			</tr>";	
	$body.="<tr valign='top'>
				<td align='right'>E-mail:</td>
				<td align='left'>$email</td>
			</tr>";	
	$body.="<tr valign='top'>
		<td align='right'>Comentarios:</td>
		<td align='left'>$comentarios</td>
	</tr>";
	$body.="</table>";			

	require 'PHPMailerAutoload.php';

	$mail = new PHPMailer;
	
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'wel.weliketo.mx';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'email@gruposecom.com';                 // SMTP username
	$mail->Password = 'insane7';                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
	$mail->CharSet = 'UTF-8';
	$mail->From = 'no-reply@gruposecom.com.mx';
	$mail->FromName = $nombre;
	/*$mail->addAddress('jhernandez@consultoriaintegra.com.mx','jhernandez@consultoriaintegra.com.mx');     // Add a recipient
	$mail->addAddress('ldiaz@consultoriaintegra.com.mx','ldiaz@consultoriaintegra.com.mx');     // Add a recipient
	$mail->addAddress('jozher57@gmail.com','ldiaz@consultoriaintegra.com.mx');*/
	$mail->addAddress('operaciones@gruposecom.com','operaciones');
	$mail->addAddress('administracion@gruposecom.com','administracion');     // Add a recipient
	
	$mail->isHTML(true);                                  // Set email format to HTML
	
	$mail->Subject = "Formulario de contacto [$email]";
	$mail->Body    = $body;
		
	if(!$mail->send()) {
	    echo 'Message could not be sent.';
	    echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
	    echo 'Message has been sent';
	}
?>