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

$cercamio = isset($_GET['cercamio']) ? $_GET['cercamio'] : '';



$getlatitud = isset($_GET['lat']) ? $_GET['lat'] : '';
$getlongitud = isset($_GET['lon']) ? $_GET['lon'] : '';
$getlatitudactual = isset($_GET['latact']) ? $_GET['latact'] : '';
$getlongitudactual = isset($_GET['lonact']) ? $_GET['lonact'] : '';
$getdireccion = isset($_GET['dir']) ? $_GET['dir'] : '';
$getdireccionmapa = isset($_GET['dirmapa']) ? $_GET['dirmapa'] : '';
$tipodir = isset($_GET['tipodir']) ? $_GET['tipodir'] : '';

if ($tipodir=="1"){
    $tipodirchecked = " checked='checked' ";
    $divbuscadormapa = " ; display: none";
}else{
    $tipodirchecked = "  ";
    $divbuscadormapa = " ";
}

if ($cercamio=="on"){$tipodirchecked = " checked='checked' ";}


$latitudbuscar = -34.6009755;
$longitudbuscar = -58.3826927;

if ($getlatitud!=""){
    $latitudbuscar = $getlatitud;
}

if ($getlongitud!=""){
    $longitudbuscar = $getlongitud;
}


$comercios = consultarComercios($buscador, $cuentadni, $envios, $latitudbuscar, $longitudbuscar);

$divComercios = $comercios["divComercio"];
$divComercioMarkers = $comercios["divComercioMarkers"];
$divTotalComercios = $comercios["divTotalComercios"];



require_once "../views/buscador.php";
?>