<html>
<head>
    <title>
        Comunidad PROME
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous"> 

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@40,300,0,0" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
   integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
   crossorigin=""/>


   <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
   integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
   crossorigin=""></script>

   <script async
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgohyH98VEPgrrtHzVjZmm-d89eCNlktw&libraries=places">
    </script>


    <link rel="stylesheet" href="../css/style.css" >

    <style>
        #map { height: 500px; width: 100% }
    </style>

</head>
<body style="background-color: #FFFFFF" id="inicio">
   
        <div >
            <div class="container" style="background-color: #FFF; opacity: 0.9; padding: 20px; padding-bottom: 50px; padding-top: 10px">
                <div class="container">     
                    
                    <div class="row" style="margin-top: 0px; padding-bottom: 20px;">
                        <div class="col-md-4"> 
                            <a href="./">
                                <img src="../img/prome.png" style="height: 40px" />
                            </a>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 0px">
                        <div class="col-md-4"> 
                            <div style="background-color: #FBF8F8; border: 1px solid #CFCFCF; box-shadow: 0px 2px #A9A9A9; margin-bottom: 10px">

                                <div class="row">
                                    <div class="col-md-6"  style="padding-right: 0px; text-align: center">
                                        <div id="div_buscadorcomercio" class="tabactivobuscador" style="border-top-left-radius: 3px; cursor: pointer" onclick="seleccionarTipoBuscador(this.id)">
                                            <h3 style="font-size: 16px; padding: 10px">
                                                Comercios y Servicios
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="col-md-6" style="padding-left: 0px; text-align: center">
                                        <div  id="div_buscadorproduccion" class="tabinactivobuscador" style="border-top-right-radius: 3px; cursor: pointer" onclick="seleccionarTipoBuscador(this.id)">
                                            <h3 style="font-size: 16px; padding: 10px">
                                                Producción e Industria
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                
                                <form name="formBusqueda" id="formBusqueda" action="buscador.php" method="GET" style="margin-bottom: 0px">

                                
                                
                                
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
                                                    placeholder="Escribí la dirección"
                                                    value="<?php echo $getdireccion;?>"
                                                />
                                            </div>
                                            <div class="row">
                                                <div class="col-md-11">
                                                    <div class="input-group mb-1" style="margin-top: 5px">
                                                        <input type="text" class="form-control" placeholder="Escribí una marca, insumo" aria-label="Escribí una marca, insumo" name="q" aria-describedby="basic-addon2"  value="<?php echo $buscador;?>" autocomplete="off">
                                                        <span class="input-group-text" id="basic-addon2" style="background-color: #23952E; color: #FFF; cursor: pointer" onclick="procesarFormBusqueda()">
                                                            <i class="fas fa-search"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-1" style="padding-left: 0px">
                                                    <span style="cursor: pointer" onclick="procesarFormBusqueda()">
                                                        <i class="fa fa-filter"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>                                   
                                    </div>

                                    <div>
                                        

                                    </div>
                                    
                                    <?php echo $divTotalComercios;?>

                                    <div class="row" style="margin-top: 0px">
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
                                    
                                    <input type="hidden" id="actual_lat" name="latact" />
                                    <input type="hidden" id="actual_lon" name="lonact" />
                                    <input type="hidden" id="actual_direccion"  name="diract" />

                                    <input type="hidden"  name="lat" value="<?php echo $getlatitud;?>" />
                                    <input type="hidden"  name="lon" value="<?php echo $getlongitud;?>" />
                                    <input type="hidden"  name="dir" value="<?php echo $getdireccion;?>" />
                                </form>
                            </div>
                            <div id="div_detalle" style='background-color: #FBF8F8; border: 1px solid #D5D3D3; cursor: pointer; margin-top: 20px; padding-bottom: 10px; display: none' onclick='mostrarubicacion(\"".$latitud."\",\"".$longitud."\",\"".$nombre."\",\"".$direccion."\")'>
                                <a href="#inicio" id="irdetalle"></a>
                                <div style="float: right; margin-right: 10px; margin-top: 10px" onclick="cerrardetalle()">
                                    <i class="far fa-times-circle" style="color: #6E7679; font-size: 20px"></i>
                                </div> 
                                <div class='row'>
                                    <div class='col-md-3'  style='padding-right: 0px; text-align: center'>
                                        <div style='padding-top: 10px'>
                                            <img id="det_logo" style='height: 60px; max-width: auto'/>
                                            
                                        </div>
                                    </div>
                                    <div class='col-md-9'  style='text-align: left; padding-top: 10px'>
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
                                    <div class='col-md-3' id="det_div_whatsapp" style='text-align: center; display: none'>
                                        <div style='padding-top: 10px'>
                                            <a id="det_whatsapp" style="; text-decoration: none">
                                                <img src='../img/det_whatsapp.png' style='height: 60px; max-width: auto' alt='Contactar' title='Contactar' />
                                                <p style="color: #23952E">
                                                    Contactar
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class='col-md-3'  id="det_div_tel" style=' text-align: center; display: none'>
                                        <div style='padding-top: 10px'>
                                            <a id="det_tel" style="; text-decoration: none">
                                                <img src='../img/det_tel.png' style='height: 60px; max-width: auto' alt='Llamar' title='Llamar' />
                                                <p style="color: #23952E">
                                                    Llamar
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class='col-md-3' id="det_div_web"  style='text-align: center; display: none'>
                                        <div style='padding-top: 10px'>
                                            <a id="det_web" target='_blank' style="; text-decoration: none">
                                                <img src='../img/det_web.png' style='height: 60px; max-width: auto' alt='Ver web' title='Ver web' />
                                                <p style="color: #23952E">
                                                    Ver web
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class='col-md-3' id="det_div_compartir"  style='text-align: center;'>
                                        <div style='padding-top: 10px'>
                                            <a id="det_compartir" style="text-decoration: none">
                                                <img src='../img/det_compartir.png' style='height: 60px; max-width: auto' alt='Compartir' title='Compartir' />
                                                <p style="color: #23952E">
                                                    Compartir
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class='row'>                                    
                                    <div class='col-md-12' style='text-align: left; padding-left: 20px; padding-right: 20px'>                                        
                                        <div class='row' style="padding-top: 0px;">
                                            <div class='col-md-9' style='text-align: left; padding-top: 0px'>
                                                <div id="det2_div_direccion" style="display: none">
                                                    <a id="det2_div_direccionurl" target='_blank' title='Abrir Web' href='#' style='color: #5C5B5B; text-decoration: none'>
                                                        <i style='font-size: 18px' class='fa fa-map-marker-alt'></i>
                                                        <span  id="det2_div_direcciontexto"></span>
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
                                            <div class='col-md-3' style='text-align: right; padding-top: 0px'>
                                                <span  id="det2_div_metros" style='font-weight: 600'></span>
                                            </div>
                                        </div>

                                    </div>
                                    
                                </div>

                            </div>
                            
                            <?php echo $divComercios;?>

                                
                        </div>  
                        <div class="col-md-8">
                            <div id="map"></div> 
                            <br> 
                            <a href="registro.php?tipo=alta">
                                <button class='btn' style="background-color: #23952E; color: #FFF; font-weight: 700; font-size: 18px">
                                    Quiero sumarme a la Comunidad Prome
                                </button>
                            </a>                                               
                        </div>                       
                    </div>
                   
                </div>
            </div>
       
        </div>      
<main role="main" class="container" style="display: none">
    <div class="row">
        <div class="col-md-12">
        <input type="hiddenn" id="loc_lat" />
                                <input type="hiddenn" id="loc_long" />   
                                <div class="latlong-view">
                                <p><b>Latitude:</b> <span id="latitude_view"></span></p>
                                <p><b>Longitude:</b> <span id="longitude_view"></span></p>
                            </div>
            <h1>Acceder a la ubicación con JavaScript</h1>
            <a href="//parzibyte.me/blog" target="_blank">By Parzibyte</a>
            <br>
            <strong>Latitud: </strong> <p id="latitud"></p>
            <br>
            <strong>Longitud: </strong> <p id="longitud"></p>
            <br>
            <a target="_blank" id="enlace" href="#">Abrir en Google Maps</a>
        </div>
        
    </div>
</main>     


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../js/funciones.js"></script>
<!-- <script src="../js/geolocalizacion.js"></script>
 -->
 <script>
    function refrescar(){
        procesarFormBusqueda();        
    }

    function btnCheckCercaMio(){
        
        var checkCercaMio = document.getElementById('checkCercaMio').checked;
        if (checkCercaMio==true){
            var actual_lat = document.getElementById('actual_lat').value;
            var actual_lon = document.getElementById('actual_lon').value;
            var actual_direccion = document.getElementById('actual_direccion').value;

            window.location = "buscador.php?lat="+actual_lat+"&lon="+actual_lon+"&dir="+actual_direccion+"&tipodir=1";

        }else{
            document.getElementById('div_buscadordireccion').style.display = "";
            
        }
    }
</script>
<script>

    

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
            //$latitud.value = coordenadas.latitude;
            //$longitud.value = coordenadas.longitude;

            try{
                if (google==undefined){
                    //alert("si esta definido google");
                }
            }catch{
                window.location.reload();
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
            
            
            
            //$enlace.href = `https://www.google.com/maps/@${coordenadas.latitude},${coordenadas.longitude},20z`;

            var iconActual = L.icon({
                iconUrl: '../img/mapuser.png',		
                iconSize:     [38, 55], 
                shadowSize:   [50, 64], 
                iconAnchor:   [22, 94], 
                shadowAnchor: [4, 62], 
                popupAnchor:  [-3, -76]
            });
            
            var latitudget = "<?php echo $getlatitud;?>"; 
            if (latitudget ==""){
                //L.marker([coordenadas.latitude, coordenadas.longitude], {icon: iconActual}).addTo(map).bindPopup('<b>Mi Ubicación Actual </b>'); 
            }else{
                L.marker([<?php echo $getlatitud;?>, <?php echo $getlongitud;?>], {icon: iconActual}).addTo(map).bindPopup('<b><?php echo $getdireccion;?> </b>');                 
            }



        }
        const onErrorDeUbicacion = err => {

            $latitud.value = "Error obteniendo ubicación: " + err.message;
            $longitud.value = "Error obteniendo ubicación: " + err.message;
            console.log("Error obteniendo ubicación: ", err);
        }

        const opcionesDeSolicitud = {
            enableHighAccuracy: true, // Alta precisión
            maximumAge: 0, // No queremos caché
            timeout: 5000 // Esperar solo 5 segundos
        };

        //$latitud.value = "Cargando...";
        //$longitud.value = "Cargando...";
        
        navigator.geolocation.getCurrentPosition(onUbicacionConcedida, onErrorDeUbicacion, opcionesDeSolicitud);



    };

    document.addEventListener("DOMContentLoaded", funcionInit);
</script>
<script>
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
            /*
            document.getElementById('loc_lat').value = near_place.geometry.location.lat();
            document.getElementById('loc_long').value = near_place.geometry.location.lng();
                    
            document.getElementById('latitude_view').innerHTML = near_place.geometry.location.lat();
            document.getElementById('longitude_view').innerHTML = near_place.geometry.location.lng();
            */
        });
    });
    
</script>

<script>

    function cerrardetalle(){
        document.getElementById('div_detalle').style.display = "none";
        limpiarDivDetalle();
    }

    function limpiarDivDetalle(){
        document.getElementById('div_detalle').style.display = "none";
        document.getElementById('det_logo').src = "";
        document.getElementById('det_nombre').innerHTML = "";
        document.getElementById('det_direccion').innerHTML = "";
        document.getElementById('det_dni').style.display = "none";  
        document.getElementById('det_div_whatsapp').style.display = "none";
        document.getElementById('det_whatsapp').href = "";
        

        document.getElementById('det_div_tel').style.display = "none";
        document.getElementById('det_tel').href = "";

        document.getElementById('det_div_web').style.display = "none";
        document.getElementById('det_web').href = "";

        document.getElementById('det2_div_direccion').style.display = "none";
        document.getElementById('det2_div_direccionurl').href = "";
        document.getElementById('det2_div_direcciontexto').innerHTML = "";

        document.getElementById('det2_div_tel').style.display = "none";
        document.getElementById('det2_div_telurl').href = "";
        document.getElementById('det2_div_teltexto').innerHTML = "";

        document.getElementById('det2_div_email').style.display = "none";
        document.getElementById('det2_div_emailurl').href = "";
        document.getElementById('det2_div_emailtexto').innerHTML = "";

        document.getElementById('det2_div_instagram').style.display = "none";
        document.getElementById('det2_div_instagramurl').href = "";
        document.getElementById('det2_div_instagramtexto').innerHTML = ""

        document.getElementById('det2_div_facebook').style.display = "none";
        document.getElementById('det2_div_facebookurl').href = "";
        document.getElementById('det2_div_facebooktexto').innerHTML = ""

        document.getElementById('det2_div_metros').innerHTML = "";


    }

    function mostrarubicacion(latitud, longitud, nombre, direccion, whatsapp, telefono, web, email, instagram, distancia, cuentadni, urlicono, facebookurl, facebooknombre){  

        limpiarDivDetalle();

        document.getElementById('div_detalle').style.display = "";

        // 1:    
        document.getElementById('det_logo').src = urlicono;
        document.getElementById('det_nombre').innerHTML = nombre;
        document.getElementById('det_direccion').innerHTML = direccion;
        
        if (cuentadni=="1"){
            document.getElementById('det_dni').style.display = "";        
        }
        

        // 2:        
        if (whatsapp!=""){
            document.getElementById('det_div_whatsapp').style.display = "";
            document.getElementById('det_whatsapp').href = "https://api.whatsapp.com/send?phone="+whatsapp;
        }
        

        if (telefono!=""){
            document.getElementById('det_div_tel').style.display = "";
            document.getElementById('det_tel').href = "tel:"+telefono;
        }

        if (web!=""){
            document.getElementById('det_div_web').style.display = "";
            document.getElementById('det_web').href = web;
        }

        

        //3
        
        document.getElementById('det2_div_direccion').style.display = "";
        document.getElementById('det2_div_direccionurl').href = "https://www.google.com.ar/maps/@"+latitud+","+longitud+",13z";
        document.getElementById('det2_div_direcciontexto').innerHTML = direccion+""+cuentadni;


        if (telefono!=""){
            document.getElementById('det2_div_tel').style.display = "";
            document.getElementById('det2_div_telurl').href = "tel:"+telefono;
            document.getElementById('det2_div_teltexto').innerHTML = telefono;
        }
        
        if (email!=""){
            document.getElementById('det2_div_email').style.display = "";
            document.getElementById('det2_div_emailurl').href = "mailto:"+email;
            document.getElementById('det2_div_emailtexto').innerHTML = email;
        }        

        if (instagram!=""){
            document.getElementById('det2_div_instagram').style.display = "";
            document.getElementById('det2_div_instagramurl').href = "https://www.instagram.com/"+instagram;
            document.getElementById('det2_div_instagramtexto').innerHTML = "@"+instagram;
        }

        if (facebookurl!=""){
            document.getElementById('det2_div_facebook').style.display = "";
            document.getElementById('det2_div_facebookurl').href = facebookurl;
            document.getElementById('det2_div_facebooktexto').innerHTML = facebooknombre;
        }
        
        if (distancia!=""){
            document.getElementById('det2_div_metros').innerHTML = distancia;
        }
        
        document.getElementById('irdetalle').click();
        
        
        

        var marker = L.marker([latitud, longitud]).addTo(map)
		.bindPopup('<b>'+nombre+'</b><br>'+direccion).openPopup();
    }

	var map = L.map('map').setView([<?php echo $latitudbuscar;?>, <?php echo $longitudbuscar;?>], 13);

	var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19,
		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	}).addTo(map);

    <?php echo $divComercioMarkers; ?>

    /* 

	var marker = L.marker([51.5, -0.09]).addTo(map)
		.bindPopup('<b>Hello world!</b><br />I am a popup.').openPopup();

	var circle = L.circle([51.508, -0.11], {
		color: 'red',
		fillColor: '#f03',
		fillOpacity: 0.5,
		radius: 500
	}).addTo(map).bindPopup('I am a circle.');

	var polygon = L.polygon([
		[51.509, -0.08],
		[51.503, -0.06],
		[51.51, -0.047]
	]).addTo(map).bindPopup('I am a polygon.');


	var popup = L.popup()
		.setLatLng([51.513, -0.09])
		.setContent('I am a standalone popup.')
		.openOn(map);

	function onMapClick(e) {
		popup
			.setLatLng(e.latlng)
			.setContent('You clicked the map at ' + e.latlng.toString())
			.openOn(map);
	} 

    map.on('click', onMapClick);
    */

	

</script>

</body>
</html>