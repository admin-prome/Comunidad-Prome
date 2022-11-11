<?php
include_once "../models/config.php";
include_once "../models/funciones.php";

$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';
$tipoget = isset($_GET['tipo']) ? $_GET['tipo'] : '';
$document = isset($_POST['document']) ? $_POST['document'] : '';
$message = isset($_POST['message']) ? $_POST['message'] : '';

if ($tipo!="" || $tipoget!=""){
    require_once "../views/confirmacion-registro.php";
}else{
    header("Location: index.php");
}

?>