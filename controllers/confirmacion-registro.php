<?php
define ("EXP",6000000);
setlocale (LC_CTYPE, 'es_ES');
ini_set ("display_errors","0");
ini_set ("memory_limit","-1");

include_once "../models/funciones.php";

$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';
$document = isset($_POST['document']) ? $_POST['document'] : '';
$message = isset($_POST['message']) ? $_POST['message'] : '';

if ($tipo!=""){

    $verificar = verificarExisteDocumento($document);

    //print_r($verificar);

    //exit();
    
    $resultado = registrarFormulario($document, $tipo, $message);
}

require_once "../views/confirmacion-registro.php";
?>