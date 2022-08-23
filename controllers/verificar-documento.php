<?php
define ("EXP",6000000);
setlocale (LC_CTYPE, 'es_ES');
ini_set ("display_errors","0");
ini_set ("memory_limit","-1");

include_once "../models/funciones.php";

$document = isset($_POST['document']) ? $_POST['document'] : '';
if ($tipo!=""){
    
    $resultado = registrarFormulario($document, $tipo, $message);
}

require_once "../views/confirmacion-registro.php";
?>