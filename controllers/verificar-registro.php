<?php
include_once "../models/config.php";
include_once "../models/funciones.php";

$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';
$document = isset($_POST['documento']) ? $_POST['documento'] : '';
$message = isset($_POST['message']) ? $_POST['message'] : '';

if ($tipo!=""){
    $verificar = verificarExisteDocumento($document);
    if ($verificar=="true"){
        $resultado = registrarFormulario($document, $tipo, $message);
        echo "true";
    }else{
        echo "false";
    }    
}else{
    header("Location: index.php");
}
?>