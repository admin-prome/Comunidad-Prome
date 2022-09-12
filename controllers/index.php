<?php
define ("EXP",6000000);
setlocale (LC_CTYPE, 'es_ES');
ini_set ("display_errors","0");
ini_set ("memory_limit","-1");

include_once "../models/funciones.php";

$optionmunicipio = consultarMunicipios();
$optionactividad = consultarActividad();
$optionrubro = consultarRubros();

require_once "../views/index.php";
?>