<?php
define ('EXP',6000000);
setlocale (LC_CTYPE, 'es_ES');
ini_set ('display_errors','0');
ini_set ('memory_limit','-1');

define("servidor", $_ENV['DB']); // Servidor Base de Datos 172.31.28.121     .
define("basededatos", "prome"); // Nombre de Base de Datos
define("usuario", "prome"); // Usuario de Base de Datos
define("clave", "prome"); // Clave de Usuario de Base de Datos

//SMTP

define("host", ""); //Servidor SMTP
define("port", ""); //Puerto de conexión al servidor SMTP
define("user", ""); //Usuario, normalmente el correo electrónico
define("password", ""); //contraseña
define("from", "comunidadprome@provinciamicrocreditos.com"); //Correo electrónico que estamos autenticando
define("fromname", "Catalogo Prome"); //Puedes poner tu nombre, el de tu empresa, nombre de tu web, etc.
define("to", "comunidadprome@provinciamicrocreditos.com");
define("security", "tls");
?>
