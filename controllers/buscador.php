<?php
include_once "../models/config.php";
include_once "../models/funciones.php";

$cuentadnichecked = "";
$envioschecked = "";
$displaymunicipio = "";
$displaymapa = "";
$getlatitud = "";
$getlongitud = "";
$getdireccion = "";

$buscador = isset($_GET['q']) ? $_GET['q'] : '';
$cuentadni = isset($_GET['cuentadni']) ? $_GET['cuentadni'] : '';

if ($cuentadni == "on") {
    $cuentadnichecked = " checked='checked' ";
}

$envios = isset($_GET['envios']) ? $_GET['envios'] : '';

if ($envios == "on") {
    $envioschecked = " checked='checked' ";
}

$cercamio = isset($_GET['cercamio']) ? $_GET['cercamio'] : '';

$getmunicipio = isset($_GET['m']) ? $_GET['m'] : '';
$getmunicipiob = isset($_GET['mb']) ? $_GET['mb'] : '';

$getrubro = isset($_GET['r']) ? $_GET['r'] : '';
$getrubrob = isset($_GET['rb']) ? $_GET['rb'] : '';

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
$comercio_id = isset($_GET['comercio_id']) ? $_GET['comercio_id'] : '';

if ($getdireccionmapa == "") {
    $cercamio = "";
}

if ($getdireccionactual != "" && $getdireccionmapa == "") {
    $getdireccionmapa = $getdireccionactual;
}


//PARA QUE NO MARQUE EN EL MAPA LAS 2 UBICACIONES
if ($cercamio == "on") {
    if ($getlatitud != "" && $getlongitud != "") {
        $getlatitudactual = '';
        $getlongitudactual = '';
    }
} else {
    $getlatitud = '';
    $getlongitud = '';
    $getlatitudactual = '';
    $getlongitudactual = '';
}


$displaymapaa = " style='display: none' ";
$displaycomercios = " ";
$divComercios2 = "";
//$divComercios2 = " style='display: none !important' ";
// $divBusquedaAvanzada = " style='display: none' ";
$divBusquedaMunicipios = " style='display: none' ";
$divBusquedaRubros = " style='display: none' ";

if ($getmunicipiob != "") {
    $divBusquedaMunicipios = "";
} else if ($getrubrob != "") {
    $divBusquedaRubros = "";
}

if ($cercamio == "on") {
    $getmunicipio = "";
    $tipodirchecked = " checked='checked' ";
    $displaymapa = " ";
    $displaycomercios___ = " style='display: none' ";
    $divbuscadormapa = " ";
    $divComercios2 = "";
    $displaymunicipio = " style='display: none' ";
} else {
    $tipodirchecked = "  ";
    $divbuscadormapa = " ; display: none";
}

$latitudbuscarcomercios  = "";
$longitudbuscarcomercios  = "";

$latitudbuscar = -36.285823;
$longitudbuscar = -60.440858;



if ($cercamio == "on") {
    if ($getlatitud != "") {
        $latitudbuscarcomercios     = $getlatitud;
        $longitudbuscarcomercios    = $getlongitud;
        $latitudbuscar              = $getlatitud;
        $longitudbuscar             = $getlongitud;
    } elseif ($getlatitudactual != "") {
        $latitudbuscarcomercios     = $getlatitudactual;
        $longitudbuscarcomercios    = $getlongitudactual;
        $latitudbuscar              = $getlatitudactual;
        $longitudbuscar             = $getlongitudactual;
    } else {
        $latitudbuscarcomercios     = "";
        $longitudbuscarcomercios    = "";
    }
} else {
    $latitudbuscarcomercios     = "";
    $longitudbuscarcomercios    = "";
}

$comercios = consultar_comercios($buscador, $cuentadni, $envios, $latitudbuscarcomercios, $longitudbuscarcomercios, $getmunicipio, $getactividad, $getrubro, $cercamio, $getmunicipiob,  $getrubrob);

$divComercios = $comercios["divComercio"];
$divComercioListaOver = $comercios["divComercioListaOver"];
$divComercioMarkers = $comercios["divComercioMarkers"];
$divTotalComercios = $comercios["divTotalComercios"];
$optionmunicipiob = $comercios["divMunicipios"];
$optionrubrob = $comercios["divRubros"];
$totalResultados = $comercios["totalResultados"];

$displayfiltros = "";

if ($totalResultados == "0") {
    $displayfiltros = "; display: none";
}

$optionmunicipio = obtener_opciones_select('municipio');
// $optionactividad = obtener_opciones_select('actividad', null, $getactividad);
$optionactividad = cargarOpcionesActividad($getrubro, $getactividad);
$optionrubro = obtener_opciones_select('rubro', $getrubro);






require_once "../views/buscador.php";
