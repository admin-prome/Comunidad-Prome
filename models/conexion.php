<?php
include_once "config.php";

class Conexion extends mysqli
{
    function consulta($sql)
    {
        $conexion = mysqli_connect(servidor, usuario, clave, basededatos);
        mysqli_set_charset($conexion, 'utf8');

        $resultado = mysqli_query($conexion, $sql);

        if (!$resultado) {
            echo 'MySQL Error: ' . mysqli_error($conexion) . ' favor reportar al administrador del sistema<br>' . $sql;
            exit();
        }

        $row = array();

        while ($rowq = mysqli_fetch_assoc($resultado)) {

            $row[] = $rowq;
        }

        return $row;
    }

    function ejecucion($sql)
    {
        $conexion = mysqli_connect(servidor, usuario, clave, basededatos);
        mysqli_set_charset($conexion, 'utf8');

        $resultado = mysqli_query($conexion, $sql);

        if (!$resultado) {
            echo 'MySQL Error: ' . mysqli_error($conexion) . ' favor reportar al administrador del sistema<br>' . $sql;
            exit();
        }

        return $resultado;
    }
}

class Conection extends mysqli
{
    private $servername = "localhost";
    private $username = "usuario";
    private $password = "contraseña";
    private $dbname = "basedatos";

    public function __construct()
    {
        parent::__construct($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->connect_error) {
            die("Conexión fallida: " . $this->connect_error);
        }
    }
}