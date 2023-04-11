<?php
include_once "../models/config.php";
include_once "../models/funciones.php";


$getlatitud ="";
$getlongitud ="";
$getdireccion ="";
$gettipovisualizacion ="";

$optionmunicipio = consultarMunicipios();
$optionactividad = consultarActividad();
$optionrubro = consultarRubros();

require_once "../views/index.php";
