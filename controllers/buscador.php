<?php
include_once "../models/config.php";
include_once "../models/funciones.php";

$cuentadnichecked = "";
$envioschecked = "";
$displaymunicipio = "";
$displaymapa = "";
$getlatitud ="";
$getlongitud ="";
$getdireccion ="";
$gettipovisualizacion ="";


$buscador = isset($_GET['q']) ? $_GET['q'] : '';
$cuentadni = isset($_GET['cuentadni']) ? $_GET['cuentadni'] : '';
if ($cuentadni=="on"){$cuentadnichecked = " checked='checked' ";}

$envios = isset($_GET['envios']) ? $_GET['envios'] : '';
if ($envios=="on"){$envioschecked = " checked='checked' ";}

$cercamio = isset($_GET['cercamio']) ? $_GET['cercamio'] : '';

$getmunicipio = isset($_GET['m']) ? $_GET['m'] : '';
$getrubro = isset($_GET['r']) ? $_GET['r'] : '';
$getmunicipiob = isset($_GET['mb']) ? $_GET['mb'] : '';

$getactividad = isset($_GET['a']) ? $_GET['a'] : '';
$gettipovisualizacion = isset($_GET['tp']) ? $_GET['tp'] : '';


$getlatitud = isset($_GET['lat']) ? $_GET['lat'] : '';
$getlongitud = isset($_GET['lon']) ? $_GET['lon'] : '';
$getlatitudactual = isset($_GET['latact']) ? $_GET['latact'] : '';
$getlongitudactual = isset($_GET['lonact']) ? $_GET['lonact'] : '';
$getdireccion = isset($_GET['dir']) ? $_GET['dir'] : '';
$getdireccionmapa = isset($_GET['dirmapa']) ? $_GET['dirmapa'] : '';
$getdireccionactual = isset($_GET['diract']) ? $_GET['diract'] : '';

$tipodir = isset($_GET['tipodir']) ? $_GET['tipodir'] : '';

/*
if ($tipodir=="1"){
    $tipodirchecked = " checked='checked' ";
    $divbuscadormapa = " ; display: none";
}else{
    $tipodirchecked = "  ";
    $divbuscadormapa = " ";
}
*/

$displaymapaa = " style='display: none' ";
$displaycomercios = " ";
$divComercios2 = " style='display: none' ";
$divBusquedaAvanzada = " style='display: none' ";
$divBusquedaMunicipios = " style='display: none' ";

if ($getmunicipiob!=""){
    $divBusquedaMunicipios = "";
}

if ($cercamio=="on"){
    $getmunicipio = "";
    $tipodirchecked = " checked='checked' ";
    $displaymapa = " ";
    $displaycomercios___ = " style='display: none' ";
    $divbuscadormapa = " ";
    $gettipovisualizacion = "mapa";
    $divComercios2 = "";
    $displaymunicipio = " style='display: none' ";

}else{
    $tipodirchecked = "  ";    
    $divbuscadormapa = " ; display: none";
    $gettipovisualizacion = "";
}

if ($getmunicipio!="" || $getrubro!="" || $getactividad!=""){
    $divBusquedaAvanzada = "";

}

$latitudbuscar = -34.6009755;
$longitudbuscar = -58.3826927;

if ($getlatitud!=""){
    $latitudbuscar = $getlatitud;
}

if ($getlongitud!=""){
    $longitudbuscar = $getlongitud;
}



$comercios = consultarComercios($buscador, $cuentadni, $envios, $latitudbuscar, $longitudbuscar, $getmunicipio, $getactividad, $getrubro, $cercamio, $getmunicipiob);

$divComercios = $comercios["divComercio"];
$divComercioListaOver = $comercios["divComercioListaOver"];
$divComercioMarkers = $comercios["divComercioMarkers"];
$divTotalComercios = $comercios["divTotalComercios"];

$optionmunicipio = consultarMunicipios($getmunicipio);
$optionmunicipiob = consultarMunicipios($getmunicipiob, true);
$optionactividad = consultarActividad($getactividad);
$optionrubro = consultarRubros($getrubro);


require_once "../views/buscador.php";
?>