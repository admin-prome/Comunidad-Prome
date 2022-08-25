<?php
define ('EXP',6000000);
setlocale (LC_CTYPE, 'es_ES');
ini_set ('display_errors','0');
ini_set ('memory_limit','-1');

include_once '../models/conexion.php';

function formatearDistancia($distancia=null){

    $distancia = round($distancia,0);    
    $distanciaFormateo ="";
    if ($distancia>1000){
        $distanciaFormateo =  round(($distancia / 1000),1)." km";
    }else{
        $distanciaFormateo = round(($distancia),0)." m";
    }

    return $distanciaFormateo;
    
}

function consultarComercios($buscador=null, $cuentadni=null, $envios=null, $latitudbuscar=null, $longitudbuscar=null){

    if ($buscador!=""){
        $where .= " and (comercio.nombre like '%$buscador%' or rubrobusqueda.palabra like '%$buscador%' )";

    }

    if ($cuentadni=="on"){
        $where .= " and comercio.cuentadni = '1' ";
    }

    if ($envios=="on"){
        $where .= " and comercio.haceenvios = '1' ";
    }

    if ($latitudbuscar!=""){
        $agregarselect = "         
            , X(coordenadas) as latitud, Y(coordenadas) as longitud,
            ST_Distance_Sphere(
                coordenadas, POINT($latitudbuscar, $longitudbuscar)
            ) as distancia
        ";
        $orderby = " 
            ORDER BY ST_Distance_Sphere(
                coordenadas, POINT($latitudbuscar, $longitudbuscar)
            ) ASC
        ";

    }

    $sql = "
        SELECT DISTINCT comercio.id, comercio.nombre, comercio.direccion, 
        comercio.rubro_id, comercio.actividad_id, comercio.municipio_id, comercio.facebookurl, comercio.facebooknombre, 
        comercio.instagram, comercio.web, comercio.whatsapp, comercio.telefono, comercio.email, 
        comercio.estatus_id, comercio.activo, comercio.eliminado,
        comercio.cuentadni, comercio.haceenvios,
        rubro.nombre as rubro_nombre, rubro.icono as rubro_icono
        $agregarselect

        FROM comercio 
        INNER JOIN rubro ON comercio.rubro_id = rubro.id
        INNER JOIN estatus on estatus.id = comercio.estatus_id

        LEFT JOIN rubrobusqueda ON rubrobusqueda.rubro_id = rubro.id

        
        WHERE comercio.activo = 1 AND estatus.activo = 1 AND estatus.visibleresultado = 1 $where
        $orderby
    ";

    //echo "where:$where";
    //exit();
    
    $conexion = new Conexion();
    $arrResultado = $conexion->consulta($sql);
    /*
     echo "<pre>";
    print_r($arrResultado);
    echo "</pre>";
    exit(); 
    */

    $totalResultados = count($arrResultado);

    foreach($arrResultado as $resultado){

        $rubro_nombre = $resultado["rubro_nombre"];

        $rubro_img = strtolower($rubro_nombre);
        $rubro_img = str_replace(" ", "", $rubro_img);


        $rubro_icono = $resultado["rubro_icono"];

        $id = $resultado["id"];
        $nombre = $resultado["nombre"];
        $direccion = $resultado["direccion"];
        $latitud = $resultado["latitud"];
        $longitud = $resultado["longitud"];
        $rubro_id = $resultado["rubro_id"];
        $actividad_id = $resultado["actividad_id"];
        $municipio_id = $resultado["municipio_id"];
        $facebookurl = $resultado["facebookurl"];
        $facebooknombre = $resultado["facebooknombre"];
        $instagram = $resultado["instagram"];
        $web = $resultado["web"];
        $whatsapp = $resultado["whatsapp"];
        $telefono = $resultado["telefono"];
        $email = $resultado["email"];
        $estatus_id = $resultado["estatus_id"];
        $activo = $resultado["activo"];
        $cuentadni = $resultado["cuentadni"];
        $haceenvios = $resultado["haceenvios"];
        $distancia = $resultado["distancia"];

        $distancia = formatearDistancia($distancia);

        $div_cuentadni = "";
        $div_cuentadniMapa = "";

        if ($cuentadni=="1"){
            $div_cuentadni = "
            <img title='Cuenta DNI Comercios' src='../img/logocomercios.png' style='height: 30px; margin-right: 10px; margin-top: -5px' />
            ";

        }

        $div_iconos = "";

        if ($whatsapp!=""){
            $div_iconos .= "
            <a title='Contactar por WhatsApp' style='color: #5C5B5B'><i style='font-size: 18px' class='fab fa-whatsapp'></i></a>
            ";
        }

        if ($email!=""){
            $div_iconos .= "
            <a title='Contactar por Email' style='color: #5C5B5B'><i style='font-size: 18px' class='fa fa-envelope'></i></a>
            ";
        }

        if ($web!=""){
            $div_iconos .= "
            <a title='Abrir Web'  target='_blank' style='color: #5C5B5B'><i style='font-size: 18px' class='fa fa-globe'></i></a>
            ";
        }

        if ($instagram!=""){
            $div_iconos .= "
            <a title='Abrir Instagram' target='_blank' style='color: #5C5B5B'><i style='font-size: 18px' class='fab fa-instagram'></i></a>
            ";
        }

        if ($facebookurl!=""){
            $div_iconos .= "
            <a title='Abrir Facebook' target='_blank' style='color: #5C5B5B'><i style='font-size: 18px' class='fab fa-facebook-square'></i></a>
            ";
        }
        

        $divComercioMarkers .= " L.marker([$latitud, $longitud]).addTo(map).bindPopup('<b>$nombre </b><br>$direccion'); ";
        /*
        <div style='padding-top: 10px'>
                            <span class='material-symbols-outlined' style='font-size: 40px; background-color: #23952E; border-radius: 50%; padding: 10px; color: #FFF'>
                                $rubro_icono
                            </span>
                        </div>
        */

        $urlicono = "../img/rubro/icono/icono_$rubro_img.png";

        $divComercio .="
            <div style='background-color: #FBF8F8; border: 1px solid #D5D3D3; cursor: pointer; margin-top: 10px; padding-bottom: 10px' onclick='mostrarubicacion(\"".$latitud."\",\"".$longitud."\",\"".$nombre."\",\"".$direccion."\",\"".$whatsapp."\",\"".$telefono."\",\"".$web."\",\"".$email."\",\"".$instagram."\",\"".$distancia."\",\"".$cuentadni."\",\"".$urlicono."\",\"".$facebookurl."\",\"".$facebooknombre."\")'>


                <div class='row'>
                    <div class='col-md-3'  style='padding-right: 0px; text-align: center'>
                        <div style='padding-top: 10px'>
                            <img src='$urlicono' style='height: 60px; max-width: auto' alt='$nombre' title='$nombre' />
                        </div>
                    </div>
                    <div class='col-md-9'  style='text-align: left; padding-top: 10px'>
                        <div class='row'>
                            <div class='col-md-9'>
                                <h3 style='font-size: 18px; margin-bottom: 4px'>
                                    $nombre
                                </h3>                                                
                            </div>
                            <div class='col-md-3' style='padding-right: 20px; text-align: right'>
                                $div_cuentadni
                            </div>
                        </div>
                        <p style='font-size: 16px; margin-bottom: 0px; color: #5C5B5B'>
                            $rubro_nombre
                        </p>
                        <p style='font-size: 16px; margin-bottom: 4px; color: #5C5B5B'>
                            $direccion
                        </p>
                        
                        <div class='row'>
                            <div class='col-md-8'>
                                $div_iconos
                            </div>
                            <div class='col-md-4' style='padding-right: 30px'>
                                <p style='font-size: 17px; margin-bottom: 4px; color: #5C5B5B; text-align: right; font-weight: 600'>
                                    $distancia
                                </p>
                            </div>

                        </div>
                        
                    </div>
                    
                </div>

            </div>
        ";

    }

    $totalDivResultados = "
            <div class='row' style='margin-top: 0px'>
                <div class='col-md-12' style='text-align: right; padding: 0px 30px'>
                    <div>
                        <p style='margin-bottom: 0px; color: #23952E'>
                            $totalResultados resultados
                        </p>
                    </div>                                            
                </div>                                   
            </div>
        ";

    if ($divComercio==""){
        $divComercio ="
            <div>
                <div class='alert alert-info' role='alert' style='text-align: center'>
                    No se encontraron resultados
                </div>
            </div>
        ";

        $resultado = array(            
            "divComercio" => $divComercio, 
            "divComercioMarkers" => 0,
            "divTotalComercios" => $totalDivResultados
        );

    }else{


        $resultado = array(            
            "divComercio" => $divComercio, 
            "divComercioMarkers" => $divComercioMarkers,
            "divTotalComercios" => $totalDivResultados
        );
    }

    

    return $resultado;
}

function verificarExisteDocumento($document=null){

    $query = array(
        "client_id" => "123", 
        "client_secret" => "456"
    );		

    $urlAPI = "https://api.publicapis.org/entries";

    $ch = curl_init($urlAPI);
    curl_setopt($ch, CURLOPT_URL, $urlAPI);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    curl_close($ch);
    
    $result = json_decode($result, true);

    return $result;
}


function registrarFormulario($document=null, $tipoformulario=null, $mensaje=null){

    $conexion = new Conexion();

    $fechaactual = fechaActual();
    $estatusinicial = 4;

    $sql = "INSERT INTO formulario
        (documento, tipoformulario_id, mensaje, estatus_id, fecharegistro, activo, eliminado) 
        VALUES ('$document', '$tipoformulario', '$mensaje', '$estatusinicial',  '$fechaactual', '1', '0')";

    $resultado = $conexion->ejecucion($sql);

    return $resultado;
}

function fechaActual(){

    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $fechaactual = date('Y-m-d h:i:s', time());  

    return $fechaactual;
}

?>