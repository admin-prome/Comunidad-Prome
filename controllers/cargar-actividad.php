<?php
include_once "../models/config.php";
include_once "../models/funciones.php";

$rubro = isset($_POST['rubro']) ? $_POST['rubro'] : '';

if ($rubro != "") {
    $optionActividad = consultarActividad(null, $rubro);

    echo $optionActividad;
} else {
    echo "";
}
