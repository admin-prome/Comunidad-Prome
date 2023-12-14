<?php
include_once "../models/config.php";
include_once '../models/conexion.php';

$rubro = isset($_POST['rubro']) ? $_POST['rubro'] : null;

function consultar_base_datos($sql)
{
    $conexion = new Conexion();
    return $conexion->consulta($sql);
}

function obtener_comercios($palabra_buscador, $cuentadni, $envios, $latitudbuscar, $longitudbuscar, $getmunicipio, $getactividad, $getrubro, $cercamio, $getmunicipiob, $getrubrob)
{
    $cercamio = (int)$cercamio;
    $latitudbuscar = (float)$latitudbuscar;
    $longitudbuscar = (float)$longitudbuscar;

    $apiUrl = 'https://localhost:7080/api/CommerceSearch';

    $data = [
        "cercaMio" => $cercamio,
        "latitud" => $latitudbuscar,
        "longitud" => $longitudbuscar,
        "palabraClave" => $palabra_buscador ?? "",
        "tieneCuentaDNIComercio" => (int)($cuentadni ?? 0),
        "haceEnviosADomicilio" => (int)($envios ?? 0),
        "municipio" => $getmunicipio ?? "",
        "rubro" => $getrubro ?? "",
        "actividad" => $getactividad ?? ""
    ];

    $dataJson = json_encode($data);
    $ch = curl_init($apiUrl);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataJson);
    curl_setopt($ch, CURLOPT_POST, true);

    $response = curl_exec($ch);

    if ($response === false) {
        return null;
    } else {
        $decodedResponse = json_decode($response, true);
        $result = $decodedResponse['result'];

        if ($decodedResponse !== null) {
            return $result;
        } else {
            return null;
        }
    }

    curl_close($ch);
}

function cargarOpcionesActividad($rubro, $actividad) {
    $option = "<option value='' selected disabled>Seleccionar actividad</option>";
    $columnName = 'nombre';
    $sql = '';

    if ($rubro !== null && $rubro != "") {
        $conexion = new Conexion();
        $query = "SELECT id FROM rubro WHERE nombre = '$rubro' AND activo = 1";
        $resultado = $conexion->consulta($query);
        $rubroId = null;

        if ($resultado) {
            $rubroId = $resultado[0]['id'];
        }

        if ($rubroId !== null) {
            $sql = "SELECT DISTINCT id, nombre FROM actividad WHERE activo = 1 AND rubro_id = '$rubroId' ORDER BY nombre ASC";
        }
    } else {
        $sql = "SELECT DISTINCT id, nombre FROM actividad WHERE activo = 1 ORDER BY nombre ASC";
    }

    if ($sql !== '') {
        $conexion = new Conexion();
        $resultado_consulta = $conexion->consulta($sql);

        foreach ($resultado_consulta as $resultado) {
            $nombre = $resultado[$columnName];
            $selected = ($actividad === $nombre) ? "selected='selected'" : "";
            $option .= "<option value='$nombre' $selected>$nombre</option>";
        }

        if (empty($resultado_consulta)) {
            $option = "<option value='' selected disabled>No existen opciones disponibles en este momento</option>";
        }
    }

    return $option;
}


function obtener_opciones_select($tipo, $rubro = null, $actividad = null)
{
    $option = "<option value='' selected disabled>Seleccionar $tipo</option>";
    $columnName = 'nombre';
    $sql = '';

    switch ($tipo) {
        case 'municipio':
            $sql = "SELECT id, nombre FROM municipio WHERE activo = 1 ORDER BY nombre ASC";
            break;
        case 'rubro':
            $sql = "SELECT id, nombre FROM rubro WHERE activo = 1 ORDER BY nombre ASC";
            break;
        case 'actividad':
            if ($rubro !== null && $rubro != "") {
                $conexion = new Conexion();
                $query = "SELECT id FROM rubro WHERE nombre = '$rubro' AND activo = 1";
                $resultado = $conexion->consulta($query);
                $rubroId = null;
                
                if ($resultado) {
                    $rubroId = $resultado[0]['id'];
                }

                if ($rubroId !== null) {
                    $sql = "SELECT DISTINCT id, nombre FROM actividad WHERE activo = 1 AND rubro_id = '$rubroId' ORDER BY nombre ASC";
                }
            } else {
                $sql = "SELECT DISTINCT id, nombre FROM actividad WHERE activo = 1 ORDER BY nombre ASC";
            }
            break;
        default:
            break;
    }

    if ($sql !== '') {
        $conexion = new Conexion();
        $resultado_consulta = $conexion->consulta($sql);

        foreach ($resultado_consulta as $resultado) {
            $nombre = $resultado[$columnName];
            $selected = ($actividad === $nombre) ? "selected='selected'" : "";
            $option .= "<option value='$nombre' $selected>$nombre</option>";
        }

        if (empty($resultado_consulta)) {
            $option = "<option value='' selected disabled>No existen opciones disponibles en este momento</option>";
        }
    }

    return $option;
}




function construir_lista_comercios_html($comercios)
{
    $html = '';

    foreach ($comercios as $comercio) {

        $id = $comercio['id'];
        $nombre = $comercio['nombre'];
        $direccion = $comercio['direccion'];
        $municipio = $comercio['municipio'];
        $rubro = $comercio['rubro'];
        $latitud = $comercio['latitud'];
        $longitud = $comercio['longitud'];
        $facebook_url = $comercio['facebookurl'];
        $instagram_url = $comercio['instagramurl'];
        $web = $comercio['web'];
        $whatsapp = $comercio['whatsapp'];
        $whatsapp_msg = $comercio['whatsappMsg'];
        $telefono = $comercio['telefono'];
        $email = $comercio['email'];
        $cuenta_dni = $comercio['cuentadni'];

        $distancia = formatear_distancia($comercio['distancia']);

        $rubro_formateado = eliminar_caracteres_especiales(str_replace(' ', '', $rubro));

        if ($rubro == "") {
            $url_icono_rubro = "../img/rubro/icono/icono_varios.svg";
        } else {
            $url_icono_rubro = "../img/rubro/icono/icono_" . $rubro_formateado . ".svg";
        }

        $cursor_pointer = " cursor: hand; ";
        $arrow_right = "<i class='fas fa-chevron-right font-l'></i>";

        $direccion_completa = ($direccion != "") ? $direccion . " - " . $municipio : $municipio;

        $iconos_redes = '';
        $iconos_redes = agregar_icono($iconos_redes, 'Contactar por WhatsApp', 'fab fa-whatsapp', $whatsapp);
        $iconos_redes = agregar_icono($iconos_redes, 'Contactar por Email', 'fa fa-envelope', $email);
        $iconos_redes = agregar_icono($iconos_redes, 'Abrir Web', 'fa fa-globe', $web, true);
        $iconos_redes = agregar_icono($iconos_redes, 'Abrir Instagram', 'fab fa-instagram', $instagram_url, true);
        $iconos_redes = agregar_icono($iconos_redes, 'Abrir Facebook', 'fab fa-facebook-square', $facebook_url, true);

        $icono_cuenta_dni = ($cuenta_dni == "1") ? "<img title='Cuenta DNI Comercios' src='../img/logocomercios.svg' class='cuenta-dni-icon'/>" : "";


        $html .= "
            <div id='comercio_$id' class='div_comercio card-container bg-lightest-gray' style='$cursor_pointer' onclick='mostrarubicacion(\"" . $latitud . "\",\"" . $longitud . "\",\"" . $nombre . "\",\"" . $direccion_completa . "\",\"" . $whatsapp . "\",\"" . $whatsapp_msg . "\",\"" . $telefono . "\",\"" . $web . "\",\"" . $email . "\",\"" . $instagram_url . "\",\"" . $distancia . "\",\"" . $cuenta_dni . "\",\"" . $url_icono_rubro . "\",\"" . $facebook_url . "\",\"0\",\"" . $id . "\")'>

                <div class='row'>
                    <div class='col-md-3 col-sm-3 col-3 pr-0 text-center d-flex align-items-center'>
                        <img src='$url_icono_rubro' alt='$nombre' title='$nombre' class='card-logo'/>
                    </div>
                    <div class='col-md-9 col-sm-9 col-9 text-left p-2'>
                        <div class='row'>
                            <div class='col-md-9 col-sm-9 col-9 pr-0'>
                                <h3 class='detail-view-card-title font-l mb-1'>
                                    $nombre                                   
                                </h3> 
                                <p class='detail-view-card-subtitle font-m mb-0'>
                                    $rubro
                                </p>
                                <p class='detail-view-card-subtitle mb-1'>
                                    $direccion_completa
                                </p>                                               
                            </div>
                            <div class='col-md-3 col-sm-3 col-3 pl-0 text-center pr-2'>
                                $icono_cuenta_dni
                                
                                <div class='mt-3'>
                                    $arrow_right
                                </div>
                            </div>
                        </div>
                        
                        <div class='row'>
                            <div class='col-md-8 col-sm-8 col-8'>
                                $iconos_redes
                            </div>
                            <div class='col-md-4 col-sm-4 col-4 pr-2 pl-0'>
                                <p class='distance-label font-m'>
                                    $distancia
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";
    }

    return $html;
}


function construir_lista_comercios_mobile_html($comercios)
{
    $html = '';

    foreach ($comercios as $comercio) {
        $nombre = $comercio['nombre'];
        $direccion = $comercio['direccion'];
        $rubro = $comercio['rubro_nombre'];

        $html .= "
            <div class='comercio-card'>
                <h2>$nombre</h2>
                <p>Dirección: $direccion</p>
                <p>Rubro: $rubro</p>
            </div>
        ";
    }

    return $html;
}

function construir_mapa_comercios_html($comercios)
{
    $comercios_markers = "";

    foreach ($comercios as $comercio) {
        $id = $comercio['id'];
        $nombre = $comercio['nombre'];
        $direccion = $comercio['direccion'];
        $municipio = $comercio['municipio'];
        $rubro = $comercio['rubro'];
        $latitud = $comercio['latitud'];
        $longitud = $comercio['longitud'];
        $facebook_url = $comercio['facebookurl'];
        $instagram_url = $comercio['instagramurl'];
        $web = $comercio['web'];
        $whatsapp = $comercio['whatsapp'];
        $whatsapp_msg = $comercio['whatsappMsg'];
        $telefono = $comercio['telefono'];
        $email = $comercio['email'];
        $cuenta_dni = $comercio['cuentadni'];

        $distancia = formatear_distancia($comercio['distancia']);

        $rubro_formateado = eliminar_caracteres_especiales(str_replace(' ', '', $rubro));

        if ($direccion != "") {
            $direccion_completa = $direccion . " - " . $municipio;
            $url_icono_marker = "../img/rubro/mapa/icono_" . $rubro_formateado . ".png";
        } else {
            $direccion_completa = $municipio;
            $url_icono_marker = "../img/rubro/mapa/icono_" . $rubro_formateado . "_negativo.png";
        }

        if ($latitud != "" && $longitud != "") {
            $comercios_markers .= "L.marker([$latitud, $longitud], {
                                        icon: L.icon({
                                            iconUrl: '$url_icono_marker',
                                            iconSize: [38, 50],
                                            shadowSize: [50, 64],
                                            iconAnchor: [38, 50],
                                            shadowAnchor: [4, 62],
                                            popupAnchor: [-3, -46]
                                        })
                                    }).addTo(map).bindPopup('<b>$nombre</b><br>$direccion_completa').on('click', () => {
                                        mostrarubicacion(\"$latitud\",\"$longitud\",\"$nombre\",\"$direccion_completa\",\"$whatsapp\",\"$whatsapp_msg\",\"$telefono\",\"$web\",\"$email\",\"$instagram_url\",\"$distancia\",\"$cuenta_dni\",\"$url_icono_marker\",\"$facebook_url\",\"0\",\"$id\");
                                    });";
        }
    }

    return $comercios_markers;
}

function construir_total_resultados_html($comercios)
{
    if (empty($comercios)) {
        return "
        <div class='row d-flex text-center'>
            <div class='col-md-12'>
                <div class='alert alert-info mx-3 my-3 text-center' role='alert'>
                    No se encontraron resultados
                </div>
            </div>
        </div>
        ";
    }

    $count = count($comercios);
    $text = ($count === 1) ? "resultado" : "resultados";

    return "<div class='d-flex justify-content-end'>
                <p class='result-count-label m-0'>$count $text</p>
            </div>";
}

function construir_checkboxes_html($campo, $elementos_seleccionados = null)
{
    $option = "";

    $tabla = ($campo === 'municipio') ? 'municipio' : 'rubro';

    $sql = "
        SELECT id, nombre 
        FROM $tabla 
        WHERE activo = 1
        ORDER BY nombre ASC
    ";

    $conexion = new Conexion();
    $resultado_consulta = $conexion->consulta($sql);

    foreach ($resultado_consulta as $resultado) {
        $id = $resultado["id"];
        $nombre = $resultado["nombre"];

        $checked = "";
        if ($elementos_seleccionados != null && in_array($id, $elementos_seleccionados)) {
            $checked = " checked='checked' ";
        }

        $option .= "
            <div class='form-check'>
                <input class='form-check-input' $checked name='{$campo}[]' type='checkbox' value='$id' id='{$campo}_$id'>
                <label class='form-check-label' for='{$campo}_$id'>
                    $nombre
                </label>
            </div>
        ";
    }

    return $option;
}


function consultar_comercios($palabra_buscador = null, $cuenta_dni = null, $hace_envios = null, $latitudbuscar = null, $longitudbuscar = null, $getmunicipio = null, $getactividad = null, $getrubro = null, $cercamio = null, $getmunicipiob = null, $getrubrob = null)
{
    $optionMunicipio = "";
    $optionRubro = "";

    $divComercioListaOver = "";
    $comercios_lista_html = "";
    $comercios_mapa_html = "";
    $total_comercios_html = "";
    $total_comercios = "";

    $comercios = obtener_comercios($palabra_buscador, $cuenta_dni, $hace_envios, $latitudbuscar, $longitudbuscar, $getmunicipio, $getactividad, $getrubro, $cercamio, $getmunicipiob, $getrubrob);

    if (empty($comercios)) {

        $total_comercios_html = construir_total_resultados_html($comercios);

        $resultado = array(
            "divComercio" => $comercios_lista_html,
            "divMunicipios" => $optionMunicipio,
            "divRubros" => $optionRubro,
            "divComercioMarkers" => 0,
            "divTotalComercios" => $total_comercios_html,
            "divComercioListaOver" => $divComercioListaOver,
            "totalResultados" => $total_comercios
        );
        return $resultado;
    } else {
        $comercios_lista_html = construir_lista_comercios_html($comercios);
        $comercios_mapa_html = construir_mapa_comercios_html($comercios);
        $total_comercios_html = construir_total_resultados_html($comercios);
        $total_comercios = count($comercios);
        $checkboxes_municipio_html = construir_checkboxes_html('municipio');
        $checkboxes_rubro_html = construir_checkboxes_html('rubro');


        $resultado = array(
            "divComercio" => $comercios_lista_html,
            "divMunicipios" => $checkboxes_municipio_html,
            "divRubros" => $checkboxes_rubro_html,
            "divComercioMarkers" => $comercios_mapa_html,
            "divTotalComercios" => $total_comercios_html,
            "divComercioListaOver" => $divComercioListaOver,
            "totalResultados" => $total_comercios
        );
    }

    return $resultado;
}

//extras

function formatear_distancia($distancia = null)
{
    if (is_null($distancia) || $distancia == '') {
        return null;
    }

    $distancia = round($distancia, 0);
    $distanciaFormateo = "";
    if ($distancia > 1000) {
        $distanciaFormateo =  round(($distancia / 1000), 1) . " km";
    } else {
        $distanciaFormateo = round(($distancia), 0) . " m";
    }

    return $distanciaFormateo;
}

function eliminar_caracteres_especiales($cadena)
{
    $cadena_limpia = preg_replace(
        '/[^a-z0-9]/i',
        '',
        iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $cadena)
    );

    return strtolower($cadena_limpia);
}

function agregar_icono($html, $title, $icon_class, $url, $external = false)
{
    if ($url != "") {
        $target = $external ? ' target="_blank"' : '';
        $html .= "
            <a class='social-icon font-l' title='$title' href='$url' $target><i class='$icon_class'></i></a>
        ";
    }
    return $html;
}






























function consultarMunicipios($municipio = null, $sinselect = null)
{
    $option = "";

    $sql = "
        SELECT id, nombre 
        FROM municipio 
        WHERE activo = 1
        ORDER BY nombre asc
    ";

    $conexion = new Conexion();
    $arrResultado = $conexion->consulta($sql);

    if ($sinselect == "") {
        $option = "<option value=''>Seleccioná el municipio</option>";
    }

    foreach ($arrResultado as $resultado) {

        $id = $resultado["id"];
        $nombre = $resultado["nombre"];

        if ($sinselect != "") {

            $checked = " ";
            if ($municipio != "") {
                foreach ($municipio as $getmunicipioDetalle) {
                    if ($id == $getmunicipioDetalle) {
                        $checked = " checked = 'checked' ";
                    }
                }
            }

            $option .= "
            <div class='form-check'>
                <input class='form-check-input' $checked name='mb[]' type='checkbox' value='$id' id='municipio_$id'>
                <label class='form-check-label' for='municipio_$id'>
                    $nombre
                    
                </label>
            </div>
            ";
        } else {

            if ($municipio == $id) {
                $option .= "<option value='$id' selected='selected'>$nombre</option>";
            } else {
                $option .= "<option value='$id'>$nombre</option>";
            }
        }
    }
    return $option;
}

function consultarActividad($actividad = null, $rubro = null)
{
    $where = "";

    if ($rubro != "") {
        $where = " and actividad.rubro_id = '$rubro' ";
    }

    $sql = "
        SELECT DISTINCT nombre 
        FROM actividad 
        WHERE activo = 1 $where
        ORDER BY nombre asc
    ";

    $conexion = new Conexion();
    $arrResultado = $conexion->consulta($sql);

    $option = "<option value=''>Seleccioná la actividad</option>";

    foreach ($arrResultado as $resultado) {

        //$id = $resultado["id"];
        $nombre = $resultado["nombre"];

        if ($actividad == $nombre) {
            $option .= "<option value='$nombre' selected='selected'>$nombre</option>";
        } else {
            $option .= "<option value='$nombre'>$nombre</option>";
        }
    }

    if (count($arrResultado) == 0) {
        $option = "<option value=''>No existen actividades</option>";
    }

    return $option;
}

function consultarRubros($rubro = null)
{
    $sql = "
        SELECT id, nombre 
        FROM rubro 
        WHERE activo = 1
        ORDER BY nombre asc
    ";

    $conexion = new Conexion();
    $arrResultado = $conexion->consulta($sql);

    $option = "<option value=''>Seleccioná el rubro</option>";

    foreach ($arrResultado as $resultado) {

        $id = $resultado["id"];
        $nombre = $resultado["nombre"];

        if ($rubro == $id) {
            $option .= "<option value='$id' selected='selected'>$nombre</option>";
        } else {
            $option .= "<option value='$id'>$nombre</option>";
        }
    }

    return $option;
}



function consultarComerciosOLD($buscador = null, $cuentadni = null, $envios = null, $latitudbuscar = null, $longitudbuscar = null, $getmunicipio = null, $getactividad = null, $getrubro = null, $cercamio = null, $getmunicipiob = null, $getrubrob = null)
{
    $where = "";
    $agregarselect = "";
    $orderby = "";
    $divComercioMarkers = "";
    $divComercio = "";
    $divComercioListaOver = "";

    if ($buscador != "") {
        $buscador = preg_replace('/\s+/', ' ', trim($buscador));

        $where .= "AND comercio.nombre LIKE '$buscador'
                   OR comercio.nombre LIKE '$buscador%'
                   OR comercio.nombre LIKE '%$buscador%'
                   OR actividad.nombre LIKE '$buscador'
                   OR actividad.nombre LIKE '$buscador%'
                   OR actividad.nombre LIKE '%$buscador%'
                   OR actividadbusqueda.palabra LIKE '$buscador'
                   OR actividadbusqueda.palabra LIKE '$buscador%'
                   OR actividadbusqueda.palabra LIKE '%$buscador%'";
    }

    if ($getmunicipio != "") {
        $where .= " and (comercio.municipio_id = '$getmunicipio')";
    }

    $filtrowheremunicipiomultiple = "";
    if ($getmunicipiob != "") {
        foreach ($getmunicipiob as $getmunicipioDetalle) {
            if ($filtrowheremunicipiomultiple == "") {
                $filtrowheremunicipiomultiple = $getmunicipioDetalle;
            } else {
                $filtrowheremunicipiomultiple .= "," . $getmunicipioDetalle;
            }
        }
    }

    if ($filtrowheremunicipiomultiple != "") {
        $where .= " and comercio.municipio_id in ($filtrowheremunicipiomultiple)  ";
    }

    $filtrowhererubromultiple = "";
    if ($getrubrob != "") {
        foreach ($getrubrob as $getrubroDetalle) {
            if ($filtrowhererubromultiple == "") {
                $filtrowhererubromultiple = $getrubroDetalle;
            } else {
                $filtrowhererubromultiple .= "," . $getrubroDetalle;
            }
        }
    }

    if ($filtrowhererubromultiple != "") {
        $where .= " and comercio.rubro_id in ($filtrowhererubromultiple)  ";
    }

    if ($getmunicipio != "") {
        $where .= " and (comercio.municipio_id = '$getmunicipio')";
    }

    if ($getactividad != "") {
        //$where .= " and (comercio.actividad_id = '$getactividad')";
        $where .= " and (actividad.nombre = '$getactividad')";
    }

    if ($getrubro != "") {
        $where .= " and (comercio.rubro_id = '$getrubro')";
    }

    if ($cuentadni == "on") {
        $where .= " and comercio.cuentadni = '1' ";
    }

    if ($envios == "on") {
        $where .= " and comercio.haceenvios = '1' ";
    }

    $tieneubicacion = 0;

    if ($latitudbuscar != "" && $cercamio == "on") {

        $where  .= " and 
            ST_Distance_Sphere(
                coordenadas, POINT($latitudbuscar, $longitudbuscar)
            ) <= 5000 and  
            ST_Distance_Sphere(
                coordenadas, POINT($latitudbuscar, $longitudbuscar)
            ) > 0
        
        ";
        $orderby = " 
            ORDER BY ST_Distance_Sphere(
                coordenadas, POINT($latitudbuscar, $longitudbuscar)
            ) ASC
        ";

        $agregarselect = ",        
            ST_Distance_Sphere(
                coordenadas, POINT($latitudbuscar, $longitudbuscar)
            ) as distancia
        ";

        $tieneubicacion = 1;
    } else {
        //$tieneubicacion=0;
        //$latitudbuscar = 0;
        //$longitudbuscar = 0;

        $agregarselect = ",'' as distancia ";

        $orderby = " 
            ORDER BY comercio.cuentadni DESC, rubro.nombre ASC, RAND()
        ";
    }

    $sql = "
        SELECT DISTINCT comercio.id, comercio.nombre, comercio.direccion, 
        comercio.rubro_id, comercio.actividad_id, comercio.municipio_id, comercio.facebookurl, 
        comercio.instagramurl, comercio.web, comercio.whatsapp, comercio.whatsapp_msg, comercio.telefono, comercio.email, 
        comercio.estatus_id, comercio.activo, comercio.eliminado,
        comercio.cuentadni, comercio.haceenvios,
        rubro.nombre as rubro_nombre,municipio.nombre as municipio_nombre,
        ST_X(coordenadas) as latitud, ST_Y(coordenadas) as longitud
        $agregarselect

        FROM comercio 
        INNER JOIN rubro ON comercio.rubro_id = rubro.id
        INNER JOIN estatus on estatus.id = comercio.estatus_id
        LEFT JOIN municipio ON municipio.id = comercio.municipio_id
        LEFT JOIN actividad ON actividad.id = comercio.actividad_id
        LEFT JOIN actividadbusqueda ON actividadbusqueda.actividad_id = actividad.id
        WHERE comercio.activo = 1 AND estatus.activo = 1 AND estatus.visibleresultado = 1 AND actividadbusqueda.activo = 1 $where
        $orderby
    ";

    $sqlMunicipio = "
        SELECT DISTINCT municipio.id as id, municipio.nombre as nombre
        FROM comercio 
        INNER JOIN rubro ON comercio.rubro_id = rubro.id
        INNER JOIN estatus on estatus.id = comercio.estatus_id
        INNER JOIN municipio ON municipio.id = comercio.municipio_id
        LEFT JOIN actividadbusqueda ON actividadbusqueda.rubro_id = rubro.id
        LEFT JOIN actividad ON actividad.id = comercio.actividad_id
        WHERE comercio.activo = 1 AND estatus.activo = 1 AND estatus.visibleresultado = 1 $where
        ORDER BY municipio.nombre asc
    ";

    $sqlRubro = "
        SELECT DISTINCT rubro.id as id, rubro.nombre as nombre
        FROM comercio 
        INNER JOIN rubro ON comercio.rubro_id = rubro.id
        INNER JOIN estatus on estatus.id = comercio.estatus_id
        INNER JOIN municipio ON municipio.id = comercio.municipio_id
        LEFT JOIN actividad ON actividad.id = comercio.actividad_id
        LEFT JOIN actividadbusqueda ON actividadbusqueda.rubro_id = rubro.id
        WHERE comercio.activo = 1 AND estatus.activo = 1 AND estatus.visibleresultado = 1 $where
        ORDER BY rubro.nombre asc
    ";

    $conexion = new Conexion();
    $arrResultado = $conexion->consulta($sql);

    if ($tieneubicacion != "1") { // Colocar aleatorio resultados cuando no tiene ubicacion colocada
        //shuffle($arrResultado);
    }

    $totalResultados = count($arrResultado);

    foreach ($arrResultado as $resultado) {

        $rubro_nombre = $resultado["rubro_nombre"];
        $rubro_nombreimg = str_replace("Á", "A", $rubro_nombre);
        $rubro_nombreimg = str_replace("É", "E", $rubro_nombreimg);
        $rubro_nombreimg = str_replace("Í", "I", $rubro_nombreimg);
        $rubro_nombreimg = str_replace("Ó", "O", $rubro_nombreimg);
        $rubro_nombreimg = str_replace("Ú", "U", $rubro_nombreimg);

        $rubro_img = strtolower($rubro_nombreimg);
        $rubro_img = str_replace(" ", "", $rubro_img);
        $rubro_img = str_replace("á", "a", $rubro_img);
        $rubro_img = str_replace("é", "e", $rubro_img);
        $rubro_img = str_replace("Í", "i", $rubro_img);
        $rubro_img = str_replace("ó", "o", $rubro_img);
        $rubro_img = str_replace("ú", "u", $rubro_img);
        $rubro_img = str_replace("ñ", "n", $rubro_img);

        $id = $resultado["id"];
        $nombre = $resultado["nombre"];
        $direccion = $resultado["direccion"];
        $latitud = $resultado["latitud"];
        $longitud = $resultado["longitud"];
        $rubro_id = $resultado["rubro_id"];
        $actividad_id = $resultado["actividad_id"];
        $municipio_id = $resultado["municipio_id"];
        $municipio_nombre = $resultado["municipio_nombre"];
        $facebookurl = $resultado["facebookurl"];
        $instagramurl = $resultado["instagramurl"];
        $web = $resultado["web"];
        $whatsapp = $resultado["whatsapp"];
        $whatsapp_msg = $resultado["whatsapp_msg"];
        $telefono = $resultado["telefono"];
        $email = $resultado["email"];
        $estatus_id = $resultado["estatus_id"];
        $activo = $resultado["activo"];
        $cuentadni = $resultado["cuentadni"];
        $haceenvios = $resultado["haceenvios"];
        $distancia = $resultado["distancia"];
        $distancia = formatear_distancia($distancia);
        $div_cuentadni = "";
        $div_cuentadniMapa = "";

        if ($cuentadni == "1") {
            $div_cuentadni = "
            <img title='Cuenta DNI Comercios' src='../img/logocomercios.svg' style='height: 30px; margin-right: 10px; margin-top: -5px' />
            ";
        }

        $div_iconos = "";

        if ($whatsapp != "") {
            $div_iconos .= "
            <a title='Contactar por WhatsApp' style='color: #5C5B5B'><i style='font-size: 18px' class='fab fa-whatsapp'></i></a>
            ";
        }

        if ($email != "") {
            $div_iconos .= "
            <a title='Contactar por Email' style='color: #5C5B5B'><i style='font-size: 18px' class='fa fa-envelope'></i></a>
            ";
        }

        if ($web != "") {
            $div_iconos .= "
            <a title='Abrir Web'  target='_blank' style='color: #5C5B5B'><i style='font-size: 18px' class='fa fa-globe'></i></a>
            ";
        }

        if ($instagramurl != "") {
            $div_iconos .= "
            <a title='Abrir Instagram' target='_blank' style='color: #5C5B5B'><i style='font-size: 18px' class='fab fa-instagram'></i></a>
            ";
        }

        if ($facebookurl != "") {
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
        
        var latitudget = "$getlatitud"; 
        if (latitudget ==""){
            //L.marker([coordenadas.latitude, coordenadas.longitude], {icon: iconActual}).addTo(map).bindPopup('<b>Mi Ubicación Actual </b>'); 
        }else{
            L.marker([$getlatitud, $getlongitud], {icon: iconBusqueda}).addTo(map).bindPopup('<b>$getdireccion </b>');                 
        }
        */


        $iconocolocarrrr = "
            var iconBusqueda = L.icon({
                iconUrl: '../img/icono_varios.png',		
                iconSize:     [38, 50], 
                shadowSize:   [50, 64], 
                iconAnchor:   [22, 94], 
                shadowAnchor: [4, 62], 
                popupAnchor:  [-3, -46]
            });
        ";

        $arrowright = "<i style='font-size: 18px' class='fas fa-chevron-right'></i>";
        $cursorpointer = " cursor: hand; ";

        if ($rubro_img == "") {
            $urlicono = "../img/rubro/icono/icono_varios.svg";
        } else {
            $urlicono = "../img/rubro/icono/icono_$rubro_img.svg";
        }

        if ($direccion != "") {
            $direccionCompleta = $direccion . " - " . $municipio_nombre;
        } else {
            $direccionCompleta = $municipio_nombre;
            $urlIconoMapa = "../img/rubro/mapa/icono_" . $rubro_img . "_negativo.png";
        }


        if ($latitud != "" && $longitud != "") {
            $divComercioMarkers .= " L.marker([$latitud, $longitud], {icon: L.icon({
                iconUrl: '../img/rubro/mapa/icono_$rubro_img.png',	
                iconSize:     [38, 50], 
                shadowSize:   [50, 64], 
                iconAnchor:   [38, 50], 
                shadowAnchor: [4, 62], 
                popupAnchor:  [-3, -46]
            })}).addTo(map).bindPopup('<b>$nombre </b><br>$direccion').on('click', () => {
             
                mostrarubicacion(\"" . $latitud . "\",\"" . $longitud . "\",\"" . $nombre . "\",\"" . $direccionCompleta . "\",\"" . $whatsapp . "\",\"" . $whatsapp_msg . "\",\"" . $telefono . "\",\"" . $web . "\",\"" . $email . "\",\"" . $instagramurl . "\",\"" . $distancia . "\",\"" . $cuentadni . "\",\"" . $urlicono . "\",\"" . $facebookurl . "\",\"0\",\"" . $id . "\")
            }); ";

            if ($direccion == "") {
                $divComercioMarkers .= " L.marker([$latitud, $longitud], {icon: L.icon({
                    iconUrl: '$urlIconoMapa',	
                    iconSize:     [38, 50], 
                    shadowSize:   [50, 64], 
                    iconAnchor:   [38, 50], 
                    shadowAnchor: [4, 62], 
                    popupAnchor:  [-3, -46]
                })}).addTo(map).bindPopup('<b>$nombre </b><br>$direccion').on('click', () => {
                 
                    mostrarubicacion(\"" . $latitud . "\",\"" . $longitud . "\",\"" . $nombre . "\",\"" . $direccionCompleta . "\",\"" . $whatsapp . "\",\"" . $whatsapp_msg . "\",\"" . $telefono . "\",\"" . $web . "\",\"" . $email . "\",\"" . $instagramurl . "\",\"" . $distancia . "\",\"" . $cuentadni . "\",\"" . $urlicono . "\",\"" . $facebookurl . "\",\"0\",\"" . $id . "\")
                }); ";
            }
        } else {
            $arrowright = "";
            $cursorpointer = "";
            $latitud = 0;
            $longitud = 0;
        }

        if ($cercamio != "on") {
            $distancia = "";
        }

        if ($tieneubicacion != "1") {
            $distancia = "";
        }

        if ($cuentadni == "0") {
            $cuentadni = "";
        }

        $divComercio .= "
            <div id='comercio_$id' class='div_comercio' style='$cursorpointer' onclick='mostrarubicacion(\"" . $latitud . "\",\"" . $longitud . "\",\"" . $nombre . "\",\"" . $direccionCompleta . "\",\"" . $whatsapp . "\",\"" . $whatsapp_msg . "\",\"" . $telefono . "\",\"" . $web . "\",\"" . $email . "\",\"" . $instagramurl . "\",\"" . $distancia . "\",\"" . $cuentadni . "\",\"" . $urlicono . "\",\"" . $facebookurl . "\",\"0\",\"" . $id . "\")'>

                <div class='row'>
                    <div class='col-md-3 col-sm-3 col-3 pr-0 text-center '>
                        <img src='$urlicono' class='commerce-logo' alt='$nombre' title='$nombre' />
                    </div>
                    <div class='col-md-9 col-sm-9 col-9 text-left'>
                        <div class='row'>
                            <div class='col-md-9 col-sm-9 col-9 pr-0'>
                                <h3 class='detail-commerce-card-title mb-2'>
                                    $nombre                                   
                                </h3> 
                                <p class='detail-commerce-card-subtitle'>
                                    $rubro_nombre
                                </p>
                                <p class='detail-commerce-card-subtitle' style='margin-bottom: 4px;'>
                                    $direccionCompleta
                                </p>                                               
                            </div>
                            <div class='col-md-3 col-sm-3 col-3 text-center pl-0' style='padding-right: 20px;'>
                                $div_cuentadni
                                
                                <div style='margin-top: 15px'>
                                    $arrowright
                                </div>
                            </div>
                        </div>
                        
                        <div class='row'>
                            <div class='col-md-8 col-sm-8 col-8'>
                                $div_iconos
                            </div>
                            <div class='col-md-4 col-sm-4 col-4 pl-0' style='padding-right: 30px;'>
                                <p class='text-right detail-commerce-card-subtitle' style='margin-bottom: 4px; font-weight: 600'>
                                    $distancia
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        ";
        $mobile = 1;
        $divComercioListaOver .= "
        <div id='comercio_$id' class='div_comercio' style='cursor: pointer; margin-right: 10px' onclick='mostrarubicacion(\"" . $latitud . "\",\"" . $longitud . "\",\"" . $nombre . "\",\"" . $direccionCompleta . "\",\"" . $whatsapp . "\",\"" . $whatsapp_msg . "\",\"" . $telefono . "\",\"" . $web . "\",\"" . $email . "\",\"" . $instagramurl . "\",\"" . $distancia . "\",\"" . $cuentadni . "\",\"" . $urlicono . "\",\"" . $facebookurl . "\",\"" . $mobile . "\",\"" . $id . "\")'>
                <div class='row'>
                    <div class='col-md-3 col-sm-3 col-3'  style='padding-right: 0px; text-align: center'>
                        <div style='padding-top: 10px; padding-left: 5'>
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
                                
                            </div>

                        </div>
                        
                    </div>
                    
                </div>

            </div>
        ";
    }

    if ($totalResultados > 0) {
        $color = "#23952E";
    } else {
        $color = "#ff0000; font-weight: bold";
    }
    if ($totalResultados == 1) {
        $text = "resultado";
    } else {
        $text = "resultados";
    }

    $totalDivResultados = "
            <div class='row margin-box' style='margin-top: 0px; margin-bottom: 5px'>
                <div class='col-md-12' style='text-align: right; padding: 0px 30px'>
                    <div>
                        <p style='margin-bottom: 0px; color: $color'>
                            $totalResultados $text
                        </p>
                    </div>                                            
                </div>                                   
            </div>
        ";


    // Municipios
    $arrResultado = $conexion->consulta($sqlMunicipio);
    $optionMunicipio = "";

    foreach ($arrResultado as $resultado) {

        $id = $resultado["id"];
        $nombre = $resultado["nombre"];

        $checked = "";

        if ($getmunicipiob != "") {
            foreach ($getmunicipiob as $getmunicipioDetalle) {
                if ($getmunicipioDetalle == $id) {
                    $checked = " checked='checked' ";
                }
            }
        }

        $optionMunicipio .= "
        <div class='form-check'>
            <input class='form-check-input' $checked name='mb[]' type='checkbox' value='$id' id='municipio_$id'>
            <label class='form-check-label' for='municipio_$id'>
                $nombre
            </label>
        </div>
        ";
    }

    // Rubros
    $arrResultado = $conexion->consulta($sqlRubro);
    $optionRubro = "";

    foreach ($arrResultado as $resultado) {

        $id = $resultado["id"];
        $nombre = $resultado["nombre"];

        $checked = "";

        if ($getrubrob != "") {
            foreach ($getrubrob as $getrubroDetalle) {
                if ($getrubroDetalle == $id) {
                    $checked = " checked='checked' ";
                }
            }
        }

        $optionRubro .= "
        <div class='form-check'>
            <input class='form-check-input' $checked name='rb[]' type='checkbox' value='$id' id='rubro_$id'>
            <label class='form-check-label' for='rubro_$id'>
                $nombre
            </label>
        </div>
        ";
    }

    if ($divComercio == "") {
        $divComercio = "
            <!--<div>
                <div class='alert alert-info' role='alert' style='text-align: center'>
                    No se encontraron resultados
                </div>
            </div>-->
        ";

        $resultado = array(
            "divComercio" => $divComercio,
            "divMunicipios" => $optionMunicipio,
            "divRubros" => $optionRubro,
            "divComercioMarkers" => 0,
            "divTotalComercios" => $totalDivResultados,
            "divComercioListaOver" => $divComercioListaOver,
            "totalResultados" => $totalResultados
        );
    } else {
        $resultado = array(
            "divComercio" => $divComercio,
            "divMunicipios" => $optionMunicipio,
            "divRubros" => $optionRubro,
            "divComercioMarkers" => $divComercioMarkers,
            "divTotalComercios" => $totalDivResultados,
            "divComercioListaOver" => $divComercioListaOver,
            "totalResultados" => $totalResultados
        );
    }



    return $resultado;
}


function verificarExisteDocumento($document = null)
{
    $result = file_get_contents("https://catalogoprome.azurewebsites.net/Catalogo/$document");
    return $result;
}

function registrarFormulario($document = null, $tipoformulario = null, $mensaje = null)
{
    $conexion = new Conexion();
    $fechaactual = fechaActual();
    $estatusinicial = 4;

    $sql = "INSERT INTO formulario
        (documento, tipoformulario_id, mensaje, estatus_id, fecharegistro, activo, eliminado) 
        VALUES ('$document', '$tipoformulario', '$mensaje', '$estatusinicial',  '$fechaactual', '1', '0')";

    $resultado = $conexion->ejecucion($sql);

    return $resultado;
}

function fechaActual()
{
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $fechaactual = date('Y-m-d h:i:s', time());
    return $fechaactual;
}

function consultarCentroidePorId($id)
{
    $sql = "
    SELECT longitud, latitud
    FROM centroide";
    $conexion = new Conexion();
    $arrResultado = $conexion->consulta($sql, [':id' => $id]);
    var_dump($arrResultado);
    $resultado_str = "vacio";
    var_dump($arrResultado);

    foreach ($arrResultado as $resultado) {

        $longitud = $resultado["longitud"];
        $latitud = $resultado["latitud"];

        $resultado_str = "<p>Longitud: " . $longitud . "</p><p>Latitud: " . $latitud . "</p>";
    }
    var_dump($resultado_str);
    return $resultado_str;
}
