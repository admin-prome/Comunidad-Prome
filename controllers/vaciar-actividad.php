<?php
include_once "../models/config.php";
include_once "../models/funciones.php";

$optionActividad = obtener_opciones_select('actividad', null);

echo $optionActividad;
