<?php
define ("EXP",6000000);
setlocale (LC_CTYPE, 'es_ES');
ini_set ("display_errors","0");
ini_set ("memory_limit","-1");

include_once "../models/funciones.php";

$buscador = isset($_GET['q']) ? $_GET['q'] : '';
$cuentadni = isset($_GET['cuentadni']) ? $_GET['cuentadni'] : '';
if ($cuentadni=="on"){$cuentadnichecked = " checked='checked' ";}

$envios = isset($_GET['envios']) ? $_GET['envios'] : '';
if ($envios=="on"){$envioschecked = " checked='checked' ";}


$comercios = consultarComercios($buscador, $cuentadni, $envios);

$divComercios = $comercios["divComercio"];
$divComercioMarkers = $comercios["divComercioMarkers"];
$divTotalComercios = $comercios["divTotalComercios"];


require_once "../views/buscador.php";
?>