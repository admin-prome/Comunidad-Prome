<?php
include_once "../models/config.php";
include_once "../models/funciones.php";

$document = isset($_POST['document']) ? $_POST['document'] : '';
if ($tipo != "") {

    $resultado = registrarFormulario($document, $tipo, $message);
}

require_once "../views/confirmacion-registro.php";