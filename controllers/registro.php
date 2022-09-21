<?php
include_once "../models/config.php";

$tipo = isset($_GET['tipo']) ? $_GET['tipo'] : '';
if ($tipo=="modificar"){$tipoactivomodificar = " selected='selected' ";}
if ($tipo=="alta"){$tipoactivoalta = " selected='selected' ";}


require_once "../views/registro.php";
?>