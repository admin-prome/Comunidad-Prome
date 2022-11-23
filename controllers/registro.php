<?php
include_once "../models/config.php";

$tipoactivomodificar = "";
$tipoactivoalta = "";
$displaytiporamite="";

$tipo = isset($_GET['tipo']) ? $_GET['tipo'] : '';
if ($tipo=="modificar"){$tipoactivomodificar = " selected='selected' "; $tipoactivoalta = " style='display: none'";}
if ($tipo=="alta"){$tipoactivoalta = " selected='selected' "; $displaytiporamite="; display: none";}



require_once "../views/registro.php";
?>