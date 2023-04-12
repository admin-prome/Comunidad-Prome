<?php
include_once "../models/config.php";
include_once "../models/funciones.php";

include_once "../includes/mailer/PHPMailer.php";
include_once "../includes/mailer/SMTP.php";
include_once "../includes/mailer/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$tipo           = isset($_GET['tipo']) ? $_GET['tipo'] : '';
$tipoget        = isset($_GET['tipo']) ? $_GET['tipo'] : '';
$document       = isset($_GET['document']) ? $_GET['document'] : '';
$message        = isset($_GET['message']) ? $_GET['message'] : '';
$error          = '';


if ($tipo != "" || $tipoget != "") {
    //ENVIA CORREO
    if (user != '' && password != "") {

        switch ($tipo) {
            case '1':
                $subject = "Comunidad Prome: Alta";
                $titulo = "Redireccionando…";
                $subtitulo = "Si no podés acceder al Formulario de Alta, hacé click <a href='https://www.provinciamicrocreditos.com.ar/comunidad-prome-alta/'>acá</a>.";
                break;
            case '2':
                $subject = "Comunidad Prome: Baja";
                $titulo = "Mensaje enviado con éxito.";
                $subtitulo = "Te enviaremos un correo electrónico al actualizar tu registro.";
                break;
            case '3':
                $subject = "Comunidad Prome: Modificación";
                $titulo = "Mensaje enviado con éxito.";
                $subtitulo = "Te enviaremos un correo electrónico al actualizar tu registro.";
                break;
            default:
                $subject = "Comunidad Prome";
                break;
        }

        if ($tipo > 1) {
            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                //$mail->SMTPDebug = 1                                      //Enable verbose debug output

                $mail->isSMTP();                                            //Send using SMTP
                //$mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) );
                //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //SMTPS (implicit TLS on port 465) / Enable implicit TLS encryption
                //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //STARTTLS (explicit TLS on port 587) / Enable explicit TLS encryption 

                $mail->CharSet    = "utf-8";                                 //Set the body charset
                $mail->SMTPSecure = security;                               //Enable security encryption
                $mail->Host       = host;                                   //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = user;                                   //SMTP username
                $mail->Password   = password;                               //SMTP password
                $mail->Port       = port;                                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                $mail->From       = from;                                   //Correo electrónico que estamos autenticando
                $mail->FromName   = fromname;                               //Puedes poner tu nombre, el de tu empresa, nombre de tu web, etc.

                //Recipients
                $mail->addAddress(to);
                $mail->addReplyTo(to);

                //Content
                $mail->isHTML(true);                                        //Set email format to HTML
                $mail->Subject = $subject . " [" . $document . "]";
                $mail->Body    = $message;

                $mail->send();
            } catch (Exception $e) {
                $error         = $mail->ErrorInfo;
            }
        } //FIN ($tipo>1)
    } else {
        $error = 'Error 300: Credenciales incorrectas';
    } //FIN (user!='' && password !="")

    require_once "../views/confirmacion-registro.php";
} else {
    header("Location: index.php");
}
