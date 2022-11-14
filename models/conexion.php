<?php
include_once "config.php";

class Conexion {

    function consulta($sql){  
        
        $conexion = mysqli_connect(servidor,usuario,clave,basededatos);
        mysqli_set_charset( $conexion, 'utf8');

        $resultado = mysqli_query($conexion, $sql);

        if(!$resultado){  
            echo 'MySQL Error: ' . mysqli_error($conexion).' favor reportar al administrador del sistema<br>'.$sql;  
			exit();  
        }        

        $row =array();

		while ($rowq = mysqli_fetch_assoc($resultado)) {

	        $row[] = $rowq;	

	    }

        return $row;
        
    }

    function ejecucion($sql){  
        
        $conexion = mysqli_connect(servidor,usuario,clave,basededatos);
        mysqli_set_charset( $conexion, 'utf8');

        $resultado = mysqli_query($conexion, $sql);

        if(!$resultado){  
            echo 'MySQL Error: ' . mysqli_error($conexion).' favor reportar al administrador del sistema<br>'.$sql;  
			exit();  
        }        

        return $resultado;
        
    }

}
?>