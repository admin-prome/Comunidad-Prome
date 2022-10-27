<?php
include_once "../models/config.php";
include_once '../models/conexion.php';


function consultarMunicipios($municipio=null, $sinselect=null){

    $option = "";

    $sql = "
        SELECT id, nombre 
        FROM municipio 
        WHERE activo = 1
        ORDER BY nombre asc
    ";
    
    $conexion = new Conexion();
    $arrResultado = $conexion->consulta($sql);

    if ($sinselect==""){
        $option = "<option value=''>Seleccioná el municipio</option>";
    }

    foreach($arrResultado as $resultado){

        $id = $resultado["id"];
        $nombre = $resultado["nombre"];

        if ($sinselect!=""){

            $checked = " ";
            if ($municipio!=""){
                foreach($municipio as $getmunicipioDetalle){
                    if($id==$getmunicipioDetalle){
                        $checked = " checked = 'checked' ";
                    }
                }
            }

            $option .="
            <div class='form-check'>
                <input class='form-check-input' $checked name='mb[]' type='checkbox' value='$id' id='municipio_$id'>
                <label class='form-check-label' for='municipio_$id'>
                    $nombre
                </label>
            </div>
            ";
        }else{

            if ($municipio==$id){
                $option .= "<option value='$id' selected='selected'>$nombre</option>";
            }else{
                $option .= "<option value='$id'>$nombre</option>";
            }
    
        }

    }

    return $option;
}

function consultarActividad($actividad=null, $rubro=null){

    $where = "";

    if ($rubro!=""){
        $where = " and actividad.rubro_id = '$rubro' ";
    }

    $sql = "
        SELECT DISTINCT id, nombre 
        FROM actividad 
        WHERE activo = 1 $where
        ORDER BY nombre asc
    ";
    
    $conexion = new Conexion();
    $arrResultado = $conexion->consulta($sql);

    $option = "<option value=''>Seleccioná la actividad</option>";

    foreach($arrResultado as $resultado){

        $id = $resultado["id"];
        $nombre = $resultado["nombre"];

        if ($actividad==$id){
            $option .= "<option value='$id' selected='selected'>$nombre</option>";
        }else{
            $option .= "<option value='$id'>$nombre</option>";
        }

    }

    if (count($arrResultado)==0){
        $option = "<option value=''>No existen actividaddes</option>";
    }

    return $option;
}

function consultarRubros($rubro=null){

    $sql = "
        SELECT id, nombre 
        FROM rubro 
        WHERE activo = 1
        ORDER BY nombre asc
    ";
    
    $conexion = new Conexion();
    $arrResultado = $conexion->consulta($sql);

    $option = "<option value=''>Seleccioná el rubro</option>";

    foreach($arrResultado as $resultado){

        $id = $resultado["id"];
        $nombre = $resultado["nombre"];

        if ($rubro==$id){
            $option .= "<option value='$id' selected='selected'>$nombre</option>";
        }else{
            $option .= "<option value='$id'>$nombre</option>";
        }

    }

    return $option;
}

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

function consultarComercios($buscador=null, $cuentadni=null, $envios=null, $latitudbuscar=null, $longitudbuscar=null, $getmunicipio=null, $getactividad=null, $getrubro=null, $cercamio=null, $getmunicipiob=null){

    $where = "";
    $agregarselect = "";
    $orderby = "";
    $divComercioMarkers = "";
    $divComercio = "";
    $divComercioListaOver = "";

    if ($buscador!=""){
        $where .= " and (comercio.nombre like '%$buscador%' or rubrobusqueda.palabra like '%$buscador%' )";

    }

    if ($getmunicipio!=""){
        $where .= " and (comercio.municipio_id = '$getmunicipio')";
    }

    $filtrowheremunicipiomultiple = "";
    if ($getmunicipiob!=""){
        foreach($getmunicipiob as $getmunicipioDetalle){
            if($filtrowheremunicipiomultiple==""){
                $filtrowheremunicipiomultiple = $getmunicipioDetalle;
            }else{
                $filtrowheremunicipiomultiple .= ",".$getmunicipioDetalle;
            }
        }
    }

    if($filtrowheremunicipiomultiple!=""){
        $where = " and comercio.municipio_id in ($filtrowheremunicipiomultiple)  ";
    }

    if ($getmunicipio!=""){
        $where .= " and (comercio.municipio_id = '$getmunicipio')";
    }

    if ($getactividad!=""){
        $where .= " and (comercio.actividad_id = '$getactividad')";
    }

    if ($getrubro!=""){
        $where .= " and (comercio.rubro_id = '$getrubro')";
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
        $where  .=" and 
            ST_Distance_Sphere(
                coordenadas, POINT($latitudbuscar, $longitudbuscar)
            ) <= 2000 and  
            ST_Distance_Sphere(
                coordenadas, POINT($latitudbuscar, $longitudbuscar)
            ) > 0
        
        ";
        $orderby = " 
            ORDER BY ST_Distance_Sphere(
                coordenadas, POINT($latitudbuscar, $longitudbuscar)
            ) ASC
        ";

    }

    $sql = "
        SELECT DISTINCT comercio.id, comercio.nombre, comercio.direccion, 
        comercio.rubro_id, comercio.actividad_id, comercio.municipio_id, comercio.facebookurl, 
        comercio.instagramurl, comercio.web, comercio.whatsapp, comercio.telefono, comercio.email, 
        comercio.estatus_id, comercio.activo, comercio.eliminado,
        comercio.cuentadni, comercio.haceenvios,
        rubro.nombre as rubro_nombre
        $agregarselect

        FROM comercio 
        INNER JOIN rubro ON comercio.rubro_id = rubro.id
        INNER JOIN estatus on estatus.id = comercio.estatus_id

        LEFT JOIN rubrobusqueda ON rubrobusqueda.rubro_id = rubro.id

        
        WHERE comercio.activo = 1 AND estatus.activo = 1 AND estatus.visibleresultado = 1 $where
        $orderby
    ";

    $sqlMunicipio = "
        SELECT DISTINCT municipio.id as id, municipio.nombre as nombre
        FROM comercio 
        INNER JOIN rubro ON comercio.rubro_id = rubro.id
        INNER JOIN estatus on estatus.id = comercio.estatus_id
        INNER JOIN municipio ON municipio.id = comercio.municipio_id
        LEFT JOIN rubrobusqueda ON rubrobusqueda.rubro_id = rubro.id
        WHERE comercio.activo = 1 AND estatus.activo = 1 AND estatus.visibleresultado = 1 $where
        
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

    ini_set ('display_errors','0');
    ini_set ('memory_limit','-1');

    foreach($arrResultado as $resultado){

        $rubro_nombre = $resultado["rubro_nombre"];

        $rubro_img = strtolower($rubro_nombre);
        $rubro_img = str_replace(" ", "", $rubro_img);

        $id = $resultado["id"];
        $nombre = $resultado["nombre"];
        $direccion = $resultado["direccion"];
        $latitud = $resultado["latitud"];
        $longitud = $resultado["longitud"];
        $rubro_id = $resultado["rubro_id"];
        $actividad_id = $resultado["actividad_id"];
        $municipio_id = $resultado["municipio_id"];
        $facebookurl = $resultado["facebookurl"];
        $instagramurl = $resultado["instagramurl"];
        $web = $resultado["web"];
        $whatsapp = $resultado["whatsapp"];
        $telefono = $resultado["telefono"];
        $email = $resultado["email"];
        $estatus_id = $resultado["estatus_id"];
        $activo = $resultado["activo"];
        $cuentadni = $resultado["cuentadni"];
        $haceenvios = $resultado["haceenvios"];
        $distancia = $resultado["distancia"];
		$facebooknombre = "";


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

        if ($instagramurl!=""){
            $div_iconos .= "
            <a title='Abrir Instagram' target='_blank' style='color: #5C5B5B'><i style='font-size: 18px' class='fab fa-instagram'></i></a>
            ";
        }

        if ($facebookurl!=""){
            $div_iconos .= "
            <a title='Abrir Facebook' target='_blank' style='color: #5C5B5B'><i style='font-size: 18px' class='fab fa-facebook-square'></i></a>
            ";
        }

        /*
        var iconBusqueda = L.icon({
            iconUrl: '../img/icono_varios.png',		
            iconSize:     [38, 50], 
            shadowSize:   [50, 64], 
            iconAnchor:   [22, 94], 
            shadowAnchor: [4, 62], 
            popupAnchor:  [-3, -76]
        });
        
        var latitudget = "<?php echo $getlatitud;?>"; 
        if (latitudget ==""){
            //L.marker([coordenadas.latitude, coordenadas.longitude], {icon: iconActual}).addTo(map).bindPopup('<b>Mi Ubicación Actual </b>'); 
        }else{
            L.marker([<?php echo $getlatitud;?>, <?php echo $getlongitud;?>], {icon: iconBusqueda}).addTo(map).bindPopup('<b><?php echo $getdireccion;?> </b>');                 
        }
        */

        $iconocolocarrrr = "
            var iconBusqueda = L.icon({
                iconUrl: '../img/icono_varios.png',		
                iconSize:     [38, 50], 
                shadowSize:   [50, 64], 
                iconAnchor:   [22, 94], 
                shadowAnchor: [4, 62], 
                popupAnchor:  [-3, -76]
            });
        ";
        

        $divComercioMarkers .= " L.marker([$latitud, $longitud], {icon: L.icon({
            iconUrl: '../img/rubro/mapa/icono_$rubro_img.png',		
            iconSize:     [38, 50], 
            shadowSize:   [50, 64], 
            iconAnchor:   [22, 94], 
            shadowAnchor: [4, 62], 
            popupAnchor:  [-3, -76]
        })}).addTo(map).bindPopup('<b>$nombre </b><br>$direccion'); ";

        if ($rubro_img==""){
            $urlicono = "../img/rubro/icono/icono_varios.svg";
        }else{
            $urlicono = "../img/rubro/icono/icono_$rubro_img.svg";
        }
        

        if ($cercamio!="on"){
            $distancia ="";
        }

        // 

        $divComercio .="
            <div style='background-color: #FBF8F8; border: 1px solid #D5D3D3; cursor: pointer; margin-top: 10px; padding-bottom: 10px; box-shadow: 2px 2px #B9B9B9' onclick='mostrarubicacion(\"".$latitud."\",\"".$longitud."\",\"".$nombre."\",\"".$direccion."\",\"".$whatsapp."\",\"".$telefono."\",\"".$web."\",\"".$email."\",\"".$instagramurl."\",\"".$distancia."\",\"".$cuentadni."\",\"".$urlicono."\",\"".$facebookurl."\",\"".$facebooknombre."\")'>


                <div class='row'>
                    <div class='col-md-3 col-sm-3 col-3'  style='padding-right: 0px; text-align: center'>
                        <div style='padding-top: 10px'>
                            <img src='$urlicono' style='max-height: 60px; max-width: auto' alt='$nombre' title='$nombre' />
                        </div>
                    </div>
                    <div class='col-md-9 col-sm-9 col-9'  style='text-align: left; padding-top: 10px'>
                        <div class='row'>
                            <div class='col-md-9 col-sm-9 col-9' style='padding-right: 0px'>
                                <h3 style='font-size: 18px; margin-bottom: 4px'>
                                    $nombre
                                </h3> 
                                <p style='font-size: 16px; margin-bottom: 0px; color: #5C5B5B'>
                                    $rubro_nombre
                                </p>
                                <p style='font-size: 16px; margin-bottom: 4px; color: #5C5B5B'>
                                    $direccion
                                </p>                                               
                            </div>
                            <div class='col-md-3 col-sm-3 col-3' style='padding-right: 20px; padding-left: 0px; text-align: center'>
                                $div_cuentadni
                                
                                <div style='margin-top: 15px'>
                                    <i style='font-size: 18px' class='fas fa-chevron-right'></i>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class='row'>
                            <div class='col-md-8 col-sm-8 col-8'>
                                $div_iconos
                            </div>
                            <div class='col-md-4 col-sm-4 col-4' style='padding-right: 30px'>
                                <p style='font-size: 17px; margin-bottom: 4px; color: #5C5B5B; text-align: right; font-weight: 600'>
                                    $distancia
                                </p>
                            </div>

                        </div>
                        
                    </div>
                    
                </div>

            </div>
        ";
        $mobile = 1;
        $divComercioListaOver .="
            <div style='background-color: #FBF8F8; border: 1px solid #D5D3D3; cursor: pointer; margin-top: 10px; padding-bottom: 10px; margin-right: 10px' onclick='mostrarubicacion(\"".$latitud."\",\"".$longitud."\",\"".$nombre."\",\"".$direccion."\",\"".$whatsapp."\",\"".$telefono."\",\"".$web."\",\"".$email."\",\"".$instagramurl."\",\"".$distancia."\",\"".$cuentadni."\",\"".$urlicono."\",\"".$facebookurl."\",\"".$facebooknombre."\",\"".$mobile."\")'>
                <div class='row'>
                    <div class='col-md-3 col-sm-3 col-3'  style='padding-right: 0px; text-align: center'>
                        <div style='padding-top: 10px'>
                            <img src='$urlicono' style='max-height: 60px; max-width: auto' alt='$nombre' title='$nombre' />
                        </div>
                    </div>
                    <div class='col-md-9 col-sm-9 col-9'  style='text-align: left; padding-top: 10px'>
                        <div class='row'>
                            <div class='col-md-9 col-sm-9 col-9' style='padding-right: 0px'>
                                <h3 style='font-size: 18px; margin-bottom: 4px'>
                                    $nombre
                                </h3> 
                                <p style='font-size: 16px; margin-bottom: 0px; color: #5C5B5B'>
                                    $rubro_nombre
                                </p>
                                <p style='font-size: 16px; margin-bottom: 4px; color: #5C5B5B'>
                                    $direccion
                                </p>                                               
                            </div>
                            <div class='col-md-3 col-sm-3 col-3' style='padding-right: 20px; padding-left: 0px; text-align: center'>
                                $div_cuentadni
                                
                                <div style='margin-top: 15px'>
                                    <i style='font-size: 18px' class='fas fa-chevron-right'></i>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class='row'>
                            <div class='col-md-8 col-sm-8 col-8'>
                                $div_iconos
                            </div>
                            <div class='col-md-4 col-sm-4 col-4' style='padding-right: 30px'>
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
    $totalDivResultados = "";

    if ($totalResultados>0){

    
    $totalDivResultados = "
            <div class='row' style='margin-top: 0px; margin-bottom: 5px'>
                <div class='col-md-12' style='text-align: right; padding: 0px 30px'>
                    <div>
                        <p style='margin-bottom: 0px; color: #23952E'>
                            $totalResultados resultados
                        </p>
                    </div>                                            
                </div>                                   
            </div>
        ";
    }

    // Municipios
    $arrResultado = $conexion->consulta($sqlMunicipio);
    $optionMunicipio = "";

    foreach($arrResultado as $resultado){

        $id = $resultado["id"];
        $nombre = $resultado["nombre"];

        $checked = "";

        if ($getmunicipiob!=""){
            foreach($getmunicipiob as $getmunicipioDetalle){
                if($getmunicipioDetalle==$id){
                    $checked = " checked='checked' ";
                }
            }
        }

        $optionMunicipio .="
        <div class='form-check'>
            <input class='form-check-input' $checked name='mb[]' type='checkbox' value='$id' id='municipio_$id'>
            <label class='form-check-label' for='municipio_$id'>
                $nombre
            </label>
        </div>
        ";
    }

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
            "divMunicipios" => $optionMunicipio, 
            "divComercioMarkers" => 0,
            "divTotalComercios" => $totalDivResultados,
            "divComercioListaOver" => $divComercioListaOver
        );
        
    }else{


        $resultado = array(            
            "divComercio" => $divComercio, 
            "divMunicipios" => $optionMunicipio, 
            "divComercioMarkers" => $divComercioMarkers,
            "divTotalComercios" => $totalDivResultados,
            "divComercioListaOver" => $divComercioListaOver
        );
    }

    

    return $resultado;
}

function verificarExisteDocumento($document=null){

    $result = file_get_contents("https://catalogoprome.azurewebsites.net/Catalogo/$document");
    return $result;

    /*


    $urlAPI = "https://catalogoprome.azurewebsites.net/Catalogo/$document";

    $ch = curl_init($urlAPI);
    curl_setopt($ch, CURLOPT_URL, $urlAPI);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    curl_close($ch);
    
    $result = json_decode($result, true);

    return $result;


    */
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