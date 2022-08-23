<?php
define ("EXP",6000000);
setlocale (LC_CTYPE, 'es_ES');
ini_set ("display_errors","0");
ini_set ("memory_limit","-1");

$tipo = isset($_GET['tipo']) ? $_GET['tipo'] : '';
if ($tipo=="modificar"){$tipoactivomodificar = " selected='selected' ";}

require_once "../views/registro.php";
?>