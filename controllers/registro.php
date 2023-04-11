<?php
include_once "../models/config.php";

$tipo = isset($_GET['tipo']) ? $_GET['tipo'] : '';

$tipoactivomodificar = "";
$tipoactivoalta = "";
$displaytiporamite = "";

if ($tipo == "modificar") {
    $tipoactivomodificar = " selected='selected' ";
    $tipoactivoalta = " style='display: none'";
    $tituloFormulario = "Completá el formulario y te contactaremos a la brevedad.";
    $colorAlerta = "alert-danger";
    $alerta = "El DNI ingresado no está dado de alta en Comunidad Prome.";
}
if ($tipo == "alta") {
    $tipoactivoalta = " selected='selected' ";
    $displaytiporamite = "; display: none";
    $tituloFormulario = "Ingresá tu DNI y accedé al formulario de registro.";
    $colorAlerta = "alert-info";
    $alerta = "Comunidad Prome es una plataforma para clientes Prome. Conocé nuestros créditos <a href='https://www.provinciamicrocreditos.com.ar/creditos/'>acá.</a>";
}

require_once "../views/registro.php";
