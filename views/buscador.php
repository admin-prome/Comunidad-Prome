<html>
<head>
    <title>
        Comunidad PROME
    </title>
    <?php include_once "head.php"; ?>

<style>
        .scrolling-wrapper{
            overflow-x: auto;
        }

        .card-block{
            height: 300px;
            background-color: #fff;
            border: none;
            background-position: center;
            background-size: cover;
            transition: all 0.2s ease-in-out !important;
            border-radius: 24px;
           
        }

        .card-1{
            background-color: #4158D0;
            background-image: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
        }


    </style>

    

</head>
<body style="background-color: #FFFFFF" id="inicio">

    <div>
        <div class="container" style="background-color: #FFF; opacity: 0.9; padding-bottom: 50px; padding-top: 10px">
            <div class="container">     
                
                <div class="row" style="margin-top: 0px; padding-bottom: 20px; margin-left: 10px">
                    <div class="col-md-4"> 
                        <a href="./">
                            <img src="../img/prome.png" style="height: 40px" />
                        </a>
                    </div>
                </div>
                <div class="row" style="margin-top: 0px">
                    <div class="col-md-4"> 
                        <form name="formBusqueda" id="formBusqueda" action="buscador.php" method="GET" style="margin-bottom: 0px">
                        <div style="background-color: #FBF8F8; border: 1px solid #CFCFCF; box-shadow: 0px 2px #A9A9A9; margin-bottom: 10px">

                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-6"  style="padding-right: 0px; text-align: center">
                                    <div id="div_buscadorcomercio" class="tabactivobuscador" style="border-top-left-radius: 3px; cursor: pointer" onclick="seleccionarTipoBuscador(this.id)">
                                        <h3 style="font-size: 16px; padding: 10px">
                                            Comercios y Servicios
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-6" style="padding-left: 0px; text-align: center">
                                    <div  id="div_buscadorproduccion" class="tabinactivobuscador" style="border-top-right-radius: 3px; cursor: pointer" onclick="seleccionarTipoBuscador(this.id)">
                                        <h3 style="font-size: 16px; padding: 10px">
                                            Producción e Industria
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        
                            
                            <div class="row" style="margin-top: 0px">
                                <div class="col-md-12" style="text-align: left; padding: 0px 30px">
                                    <div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input"  name="cercamio" type="checkbox" id="checkCercaMio" onclick="btnCheckCercaMio()" <?php echo $tipodirchecked;?> >
                                            <label class="form-check-label" for="checkCercaMio"style="color: #626161">Cerca mío</label>
                                        </div>                                               
                                    </div>
                                    <div id="div_buscadordireccion" class="auto-search-wrapper" style="margin-top: 10px; margin-bottom: 10px  <?php echo $divbuscadormapa;?> ">
                                        <input
                                            type="text"
                                            autocomplete="off"
                                            id="buscadordireccion"
                                            name="dirmapa"
                                            class="form-control"
                                            placeholder="Indicá un domicilio"
                                            value="<?php echo $getdireccionmapa;?>"
                                        />
                                    </div>
                                    <div class="row">
                                        <div class="col-md-11 col-sm-11 col-11">
                                            <div class="input-group mb-1" style="margin-top: 5px">
                                                <i class="fa fa-list" style ="border-top: 1px solid #ced4da;border-left: 1px solid #ced4da; border-bottom: 1px solid #ced4da; border-right: 0px solid #ced4da; padding-left: 5px; padding-top: 10px; color: #C4C4C4; cursor: pointer" onclick="verfiltrosbusqueda()"></i>
                                                <input type="text" class="form-control" placeholder="Escribí un producto o servicio" aria-label="Escribí un producto o servicio" name="q" aria-describedby="basic-addon2"  value="<?php echo $buscador;?>" autocomplete="off" style="border-left: 0px solid #FFF">
                                                <span class="input-group-text" id="basic-addon2" style="background-color: #23952E; color: #FFF; cursor: pointer" onclick="procesarFormBusqueda()">
                                                    <i class="fas fa-search"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-1 col-sm-1 col-1" style="padding-left: 0px; padding-top: 14px; <?php echo $displayfiltros;?>">
                                            <span style="cursor: pointer" onclick="verfiltrosbusquedabuscador()">
                                                <i class="fa fa-filter" style="font-size: 20px"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row" id="div_busquedaavanzada" <?php echo $divBusquedaAvanzada;?>>
                                        <div class="col-md-12 mb-3" style="text-align: left; padding: 0px 10px">
                                            <div class="mb-1">
                                                <i class="fa fa-list" style ="padding-left: 5px; padding-top: 10px; color: #C4C4C4; cursor: pointer" onclick="verfiltrosbusqueda()"></i> Búsqueda avanzada
                                            </div>
                                            
                                            <div class="mt-2" id="filtro_municipio" <?php echo $displaymunicipio;?>>
                                                <select class="form-control" name="m">
                                                    <?php echo $optionmunicipio;?>
                                                </select>
                                            </div>
                                            <div class="mt-2" id="filtro_rubro">
                                                <select class="form-control" id="select_rubro" name="r">
                                                    <?php echo $optionrubro;?>
                                                </select>
                                            </div>
                                            <div class="mt-2" id="filtro_actividad">
                                                <select class="form-control" id="select_actividad" name="a">
                                                    <?php echo $optionactividad;?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="div_municipios" <?php echo $divBusquedaMunicipios;?> >
                                        <div class="col-md-12 mb-3" style="text-align: left; padding: 0px 10px">
                                            <div class="mb-1">
                                                Municipio
                                            </div>
                                            
                                            <div class="mt-2">
                                                <?php echo $optionmunicipiob;?>
                                            </div>
                                            <button type="submit" class='btn' style="background-color: #23952E; color: #FFF; font-weight: 700; font-size: 18px; width: 100%; margin-top: 10">
                                                Aplicar filtros
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row" id="div_rubros" <?php echo $divBusquedaRubros;?>>
                                        <div class="col-md-12 mb-3" style="text-align: left; padding: 0px 10px">
                                            <div class="mb-1">
                                                Rubro
                                            </div>
                                            
                                            <div class="mt-2">
                                                <?php echo $optionrubrob;?>
                                            </div>
                                            <button type="submit" class='btn' style="background-color: #23952E; color: #FFF; font-weight: 700; font-size: 18px; width: 100%; margin-top: 10">
                                                Aplicar filtros
                                            </button>
                                        </div>
                                    </div>
                                    
                                    
                                </div>                                   
                            </div>

                            <?php echo $divTotalComercios;?>

                            
                            <?php include_once "include_camposmapa.php"; ?>


                            
                            
                        </div>
                        <div style="background-color: #FFF; border: 0px solid #CFCFCF; box-shadow: 0px 0px #A9A9A9; margin-bottom: 10px">                            
                                <div class="row" style="margin-top: 14px">
                                    <div class="col-md-12" style="text-align: left; padding: 0px 30px">
                                        <div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="checkAdherido" name="cuentadni" <?php echo $cuentadnichecked;?> onclick="refrescar()" >
                                                <label class="form-check-label" for="checkAdherido" style="color: #626161">Adherido a Cuenta DNI Comercios</label>
                                            </div>                                               
                                        </div>
                                        <div style="margin-top: 10px; margin-bottom: 10px">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="checkEnvios" name="envios" <?php echo $envioschecked;?>  onclick="refrescar()">
                                                <label class="form-check-label" for="checkEnvios" style="color: #626161">Hace envíos/Servicio a domicilio</label>
                                            </div>                                               
                                        </div>
                                    </div>                                   
                                </div>
                                
                        </div>
                        </form>


                        <div id="div_detalle" style='background-color: #FBF8F8; border: 1px solid #D5D3D3; cursor: pointer; margin-top: 20px; padding-bottom: 10px; display: none' >
                            <a href="#inicio" id="irdetalle"></a>
                            <div style="float: right; margin-right: 10px; margin-top: 10px" onclick="cerrardetalle()">
                                <i class="far fa-times-circle" style="color: #6E7679; font-size: 20px"></i>
                            </div> 
                            <div class='row'>
                                <div class='col-md-3 col-sm-3 col-3'  style='padding-right: 0px; text-align: center'>
                                    <div style='padding-top: 10px'>
                                        <img id="det_logo" style='height: 60px; max-width: auto'/>
                                    </div>
                                </div>
                                <div class='col-md-9 col-sm-9 col-9'  style='text-align: left; padding-top: 10px'>
                                    <div class='row'>
                                        <div class='col-md-12'>
                                            <h3 id="det_nombre" style='font-size: 18px; margin-bottom: 4px; font-weight: 700'></h3>    
                                            <span id="det_direccion" style='font-size: 15px; margin-bottom: 4px'>
                                                
                                            </span>
                                            <img id="det_dni" title='Cuenta DNI Comercios' src='../img/logocomercios.png' style='height: 23px; margin-right: 10px; margin-top: -5px; display: none' />                                            
                                        </div>                                            
                                    </div>
                                                                            
                                </div>                                    
                            </div>
                            <div class='row'>
                                <div class='col-md-3 col-sm-3 col-3' id="det_div_whatsapp" style='text-align: center; display: none'>
                                    <div style='padding-top: 10px'>
                                        <a id="det_whatsapp" target='_blank' style="; text-decoration: none">
                                            <img src='../img/det_whatsapp.png' style='height: 60px; max-width: auto' alt='Contactar' title='Contactar' />
                                            <p style="color: #23952E">
                                                Contactar
                                            </p>
                                        </a>
                                    </div>
                                </div>
                                <div class='col-md-3 col-sm-3 col-3'  id="det_div_tel" style=' text-align: center; display: none'>
                                    <div style='padding-top: 10px'>
                                        <a id="det_tel" style="; text-decoration: none">
                                            <img src='../img/det_tel.png' style='height: 60px; max-width: auto' alt='Llamar' title='Llamar' />
                                            <p style="color: #23952E">
                                                Llamar
                                            </p>
                                        </a>
                                    </div>
                                </div>
                                <div class='col-md-3 col-sm-3 col-3' id="det_div_web"  style='text-align: center; display: none'>
                                    <div style='padding-top: 10px'>
                                        <a id="det_web" target='_blank' style="; text-decoration: none">
                                            <img src='../img/det_web.png' style='height: 60px; max-width: auto' alt='Ver web' title='Ver web' />
                                            <p style="color: #23952E">
                                                Ver web
                                            </p>
                                        </a>
                                    </div>
                                </div>
                                <div class='col-md-3 col-sm-3 col-3' id="det_div_facebook"  style='text-align: center; display: none'>
                                    <div style='padding-top: 10px'>
                                        <a id="det_facebook" target='_blank' style="; text-decoration: none">
                                            <img src='../img/det_facebook.png' style='height: 60px; max-width: auto' alt='Ver web' title='Ver web' />
                                            <p style="color: #23952E">
                                                Facebook
                                            </p>
                                        </a>
                                    </div>
                                </div>
                                <div class='col-md-3 col-sm-3 col-3' id="det_div_instagram"  style='text-align: center; display: none'>
                                    <div style='padding-top: 10px'>
                                        <a id="det_instagram" target='_blank' style="; text-decoration: none">
                                            <img src='../img/det_instagram.png' style='height: 60px; max-width: auto' alt='Ver web' title='Ver web' />
                                            <p style="color: #23952E">
                                                Instagram
                                            </p>
                                        </a>
                                    </div>
                                </div>
                                <!-- <div class='col-md-3 col-sm-3 col-3 d-block d-sm-none' id="det_div_compartir"  style='text-align: center;'>
                                    <div style='padding-top: 10px'>
                                        <a id="det_compartir" style="text-decoration: none">
                                            <img src='../img/det_compartir.png' style='height: 60px; max-width: auto' alt='Compartir' title='Compartir' />
                                            <p style="color: #23952E">
                                                Compartir
                                            </p>
                                        </a>
                                    </div>
                                </div> -->
                                
                            </div>
                            <div class='row'>                                    
                                <div class='col-md-12' style='text-align: left; padding-left: 20px; padding-right: 20px'>                                        
                                    <div class='row' style="padding-top: 0px;">
                                        <div class='col-md-9 col-sm-9 col-9' style='text-align: left; padding-top: 0px'>
                                            <div id="det2_div_direccion" style="display: none">
                                                <a id="det2_div_direccionurl" target='_blank' title='Abrir Web' href='#' style='color: #5C5B5B; text-decoration: none'>
                                                    <i style='font-size: 18px' class='fa fa-map-marker-alt'></i>
                                                    <span  id="det2_div_direcciontexto"></span>999
                                                </a>
                                            </div> 
                                            <div id="det2_div_tel" style="display: none">
                                                <a id="det2_div_telurl" title='Llamar' href='tel:telefono' style='color: #5C5B5B; text-decoration: none'>
                                                    <i style='font-size: 18px' class='fa fa-phone'></i>
                                                    <span  id="det2_div_teltexto"></span>
                                                </a>
                                            </div> 
                                            <div id="det2_div_email" style="display: none">
                                                <a id="det2_div_emailurl" title='Email' href='mailto:email' style='color: #5C5B5B; text-decoration: none'>
                                                    <i style='font-size: 18px' class='fa fa-envelope'></i>
                                                    <span  id="det2_div_emailtexto"></span>
                                                </a>
                                            </div> 
                                            <div  id="det2_div_instagram"  style="display: none">
                                                <a id="det2_div_instagramurl" target="_blank" title='Instagram' href='#' style='color: #5C5B5B; text-decoration: none; '>
                                                    <i style='font-size: 18px' class='fab fa-instagram'></i>
                                                    <span  id="det2_div_instagramtexto"></span>
                                                </a>
                                            </div>
                                            <div  id="det2_div_facebook"  style="display: none">
                                                <a id="det2_div_facebookurl" target="_blank" title='Facebook' href='#' style='color: #5C5B5B; text-decoration: none; '>
                                                    <i style='font-size: 18px' class='fab fa-facebook-square'></i>
                                                    <span  id="det2_div_facebooktexto"></span>
                                                </a>
                                            </div>
                                            
                                        
                                        </div>
                                        <div class='col-md-3 col-sm-3 col-3' style='text-align: right; padding-top: 0px'>
                                            <span  id="det2_div_metros" style='font-weight: 600'></span>
                                        </div>
                                    </div>

                                </div>
                                
                            </div>

                        </div>
                        
                        <div id="divComercios" class="d-none d-sm-block" style="height: 400px; overflow-y: scroll; overflow-x: hidden;">
                            <div  <?php echo $displaycomercios;?>>
                                <?php echo $divComercios;?>
                            </div>  
                        </div> 
                        

                            
                    </div>  
                    <div class="col-md-8" id="div_mapa" <?php echo $displaymapa;?>>
                        <div id="map"></div> 
                        <br>
                        <div class="d-none d-sm-block"> 
                            <a href="registro.php?tipo=alta">
                                <button class='btn' style="background-color: #23952E; color: #FFF; font-weight: 700; font-size: 18px">
                                    Quiero sumarme a la Comunidad Prome
                                </button>
                            </a> 
                        </div>                                              
                    </div>
                    <div class="d-block d-md-none" onclick="mostrarBuscadorMobile()">
                        <a class="btn-flotante">
                            <i id="iconMapaResultado" class="fa fa-map-marker-alt" style="font-size: 20px; display: none"></i> 
                            <i id="iconListaResultado" class="fa fa-list" style="font-size: 20px"></i> 
                            <span id="tituloBotonFlotante">Lista</span>
                        </a>
                        
                    </div>
                    <div id="divComercios2" class="d-block d-sm-none" <?php echo $divComercios2;?>>
                        <div class="scrolling-wrapper row flex-row flex-nowrap mt-4 pb-4 pt-2">
                            <?php echo $divComercioListaOver;?>
                        </div>
                    </div>  




                </div>
                
            </div>
        </div>
    
    </div>      
   
<input type="hidden" id="mobileclickcomercio" />

<?php include_once "footer.php"; ?>


<script>
/* 
    async function share(titulo, url) {
        try {
            await navigator.share({
            text: titulo,
            url: url
            })
        } catch (error) {
            console.log('Sharing failed!', error)
        }
    }

    const shareButton = document.getElementById("det_compartir");
 
    // Creamos una función que se ejecutará cuando el usuario haga click en el botón
    shareButton.addEventListener("click", (event) => {
        if ("share" in navigator) {
            share(document.getElementById('det_nombre').innerHTML, "http://catalogo-prome.provinciamicrocreditos.com/");
        }else{
            alert('Lo siento, este navegador no tiene soporte para compartir')
        }
    }); */
    /*
    // Verificamos si el navegador tiene soporte para el API compartir
    if ("share" in navigator) {
        navigator
        .share({
            
        })
    
        // Mensaje en Consola cuando se presiona el botón de compartir 
        .then(() => {
            console.log("Contenido Compartido !");
        })
        .catch(console.error);
    } else {
        // Si el navegador no tiene soporte para la API compartir, le enviamos un mensaje al usuario
        alert('Lo siento, este navegador no tiene soporte para recursos compartidos.')
    }
    */
    //
    
   
    const funcionInit = () => {
        if (!"geolocation" in navigator) {
            return alert("Tu navegador no soporta el acceso a la ubicación. Intenta con otro");
        }

        const $latitud = document.querySelector("#actual_lat"),
            $longitud = document.querySelector("#actual_lon");
            //$enlace = document.querySelector("#enlace");


        const onUbicacionConcedida = ubicacion => {
            console.log("Tengo la ubicación: ", ubicacion);
            
            const coordenadas = ubicacion.coords;

            try{
                if (google==undefined){
                    //alert("si esta definido google");
                }
            }catch{
                //window.location.reload();
            }

            var latlng = new google.maps.LatLng(coordenadas.latitude, coordenadas.longitude);
            var geocoder = geocoder = new google.maps.Geocoder();
            geocoder.geocode({ 'latLng': latlng }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[1]) {
                        //alert("Location: " + results[1].formatted_address);
                        document.getElementById('actual_direccion').value = results[1].formatted_address;
                    }
                }
            });

            document.getElementById('actual_lat').value = coordenadas.latitude;
            document.getElementById('actual_lon').value = coordenadas.longitude;
            /*
 var iconActual = L.icon({
                iconUrl: '../img/icono_puntero.png',		
                iconSize:     [38, 50], 
                shadowSize:   [50, 64], 
                iconAnchor:   [22, 94], 
                shadowAnchor: [4, 62], 
                popupAnchor:  [-3, -76]
            });
            */

            // Icono ubicacion actual
            var iconActual = L.icon({
                iconUrl: '../img/icono_puntero.png',		
                iconSize:     [38, 45], 
                shadowSize:   [50, 64], 
                iconAnchor:   [45, 50], 
                shadowAnchor: [4, 62], 
                popupAnchor:  [-3, -46]
            });

            
            var latitudget = "<?php echo $getlatitudactual;?>"; 
            if (latitudget ==""){
                //L.marker([coordenadas.latitude, coordenadas.longitude], {icon: iconActual}).addTo(map).bindPopup('<b>Mi Ubicación Actual </b>'); 
            }else{
                L.marker([<?php echo $getlatitudactual;?>, <?php echo $getlongitudactual;?>], {icon: iconActual}).addTo(map).bindPopup('<b><?php echo $getdireccionactual;?> </b>');                 
            }

            
            // Icono ubicacion buscada
            var iconBusqueda = L.icon({
                iconUrl: '../img/icono_puntero.png',		
                iconSize:     [45, 50], 
                shadowSize:   [50, 64], 
                iconAnchor:   [45, 50], 
                shadowAnchor: [4, 62], 
                popupAnchor:  [-3, -46]
            });
            
            var latitudget = "<?php echo $getlatitud;?>"; 
            if (latitudget ==""){
                //L.marker([coordenadas.latitude, coordenadas.longitude], {icon: iconActual}).addTo(map).bindPopup('<b>Mi Ubicación Actual </b>');
                //console.log(1); 
            }else{
                //console.log(2); 
                L.marker([<?php echo $getlatitud;?>, <?php echo $getlongitud;?>], {icon: iconBusqueda}).addTo(map).bindPopup('<b><?php echo $getdireccion;?> </b>');                 
            }

            



        }
        const onErrorDeUbicacion = err => {

            //$latitud.value = "Error obteniendo ubicación: " + err.message;
            //$longitud.value = "Error obteniendo ubicación: " + err.message;
            $latitud.value = "";
            $longitud.value = "";
            //console.log("Error obteniendo ubicación: ", err);
            //console.log(3); 

            // Icono ubicacion buscada
            var iconBusqueda = L.icon({
                iconUrl: '../img/icono_puntero.png',		
                iconSize:     [45, 50], 
                shadowSize:   [50, 64], 
                iconAnchor:   [45, 50], 
                shadowAnchor: [4, 62], 
                popupAnchor:  [-3, -76]
            });
            
            var latitudget = "<?php echo $getlatitud;?>"; 
            if (latitudget ==""){
                //L.marker([coordenadas.latitude, coordenadas.longitude], {icon: iconActual}).addTo(map).bindPopup('<b>Mi Ubicación Actual </b>');
                //console.log(1); 
            }else{
                //console.log(2); 
                L.marker([<?php echo $getlatitud;?>, <?php echo $getlongitud;?>], {icon: iconBusqueda}).addTo(map).bindPopup('<b><?php echo $getdireccion;?> </b>');                 
            }
        }

        const opcionesDeSolicitud = {
            enableHighAccuracy: true, 
            maximumAge: 0, 
            timeout: 5000 
        };
        navigator.geolocation.getCurrentPosition(onUbicacionConcedida, onErrorDeUbicacion, opcionesDeSolicitud);



    };

    document.addEventListener("DOMContentLoaded", funcionInit);
    
</script>

<script>

	var map = L.map('map').setView([<?php echo $latitudbuscar;?>, <?php echo $longitudbuscar;?>], 8);

	var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19,
		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	}).addTo(map);

    <?php echo $divComercioMarkers; ?>


    var searchInput = 'buscadordireccion';
    
    $(document).ready(function () {
        var autocomplete;
        autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
            types: ['geocode'],
            componentRestrictions: {
                country: "AR"
            }
        });
            
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var near_place = autocomplete.getPlace();

            var buscadordireccion = document.getElementById('buscadordireccion').value;

            window.location = "buscador.php?lat="+near_place.geometry.location.lat()+"&lon="+near_place.geometry.location.lng()+"&dir="+buscadordireccion;
        });
    });



    

</script>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){
    $(document).on("change","#select_rubro", function(){
        var select_rubro = jQuery('#select_rubro').val();

        $.ajax({
            url:"cargar-actividad.php",
            type:"POST",
            cache:false,
            data:{rubro:select_rubro},
            success:function(data){                
                $('#select_actividad').empty().append(data);             
            }
        });
    });
});
</script>


</body>
</html>