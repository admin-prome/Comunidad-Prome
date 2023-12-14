<?php
include_once "../models/config.php";
include_once "../models/funciones.php";

$rubro = isset($_POST['rubro']) ? $_POST['rubro'] : '';

if ($rubro != "") {
    //$optionActividad = consultarActividad(null, $rubro);
    $optionActividad = obtener_opciones_select('actividad', $rubro);

    echo $optionActividad;
} else {
    echo "";
}
