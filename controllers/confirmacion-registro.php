<?php
include_once "../models/config.php";
include_once "../models/funciones.php";

$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';
$document = isset($_POST['document']) ? $_POST['document'] : '';
$message = isset($_POST['message']) ? $_POST['message'] : '';

if ($tipo!=""){
    require_once "../views/confirmacion-registro.php";
}else{
    header("Location: index.php");
}

?>