<?php
include_once "../models/config.php";
include_once '../models/conexion.php';

$id = $_GET["id"];

$sql = "
    SELECT longitud, latitud
    FROM centroide 
    WHERE id_municipio = $id";

try {
    $conexion = new Conexion();
    $arrResultado = $conexion->consulta($sql);
    $retorno = "No hay datos para mostrar";
} catch (Exception $e) {
    echo $e;
}

foreach ($arrResultado as $resultado) {
    $longitud = $resultado["longitud"];
    $latitud = $resultado["latitud"];
    $retorno = "Longitud: " . $longitud . " Latitud: " . $latitud;
}

echo $retorno;
return $retorno;
