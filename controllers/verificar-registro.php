<?php
include_once "../models/config.php";
include_once "../models/funciones.php";

$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';
$document = isset($_POST['documento']) ? $_POST['documento'] : '';
$message = isset($_POST['message']) ? $_POST['message'] : '';

if ($tipo!=""){
    //24628312
    $verificar = verificarExisteDocumento($document);

    if ($verificar=="false"){
        echo "false";
    }else{
        $resultado = registrarFormulario($document, $tipo, $message);
        echo "true";
    }

}else{
    header("Location: index.php");
}

?>