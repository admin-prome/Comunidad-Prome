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

    <link rel="stylesheet" href="../css/style.css" >

    <style>
        #map { height: 500px; width: 100% }
    </style>

</head>
<body style="background-color: #FFFFFF">
   
        <div >
            <div class="container" style="background-color: #FFF; opacity: 0.9; padding: 20px; padding-bottom: 50px; padding-top: 10px">
                <div class="container">     
                    
                    <div class="row" style="margin-top: 0px; padding-bottom: 20px;">
                        <div class="col-4"> 
                            <a href="./">
                                <img src="../img/prome.png" style="height: 40px" />
                            </a>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 0px">
                        <div class="col-4"> 
                            <div style="background-color: #FBF8F8; border: 1px solid #CFCFCF; box-shadow: 0px 2px #A9A9A9; margin-bottom: 10px">

                                <div class="row">
                                    <div class="col-6"  style="padding-right: 0px; text-align: center">
                                        <div id="div_buscadorcomercio" class="tabactivobuscador" style="border-top-left-radius: 3px; cursor: pointer" onclick="seleccionarTipoBuscador(this.id)">
                                            <h3 style="font-size: 16px; padding: 10px">
                                                Comercios y Servicios
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="col-6" style="padding-left: 0px; text-align: center">
                                        <div  id="div_buscadorproduccion" class="tabinactivobuscador" style="border-top-right-radius: 3px; cursor: pointer" onclick="seleccionarTipoBuscador(this.id)">
                                            <h3 style="font-size: 16px; padding: 10px">
                                                Producción e Industria
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                
                                <form name="formBusqueda" id="formBusqueda" action="buscador" method="GET" style="margin-bottom: 0px">
                                    <div class="row" style="margin-top: 0px">
                                        <div class="col-12" style="text-align: left; padding: 0px 30px">
                                            <div>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input"   type="checkbox" id="flexSwitchCheckChecked">
                                                    <label class="form-check-label" for="flexSwitchCheckChecked"style="color: #626161">Cerca mío</label>
                                                </div>                                               
                                            </div>
                                            <div class="input-group mb-1" style="margin-top: 5px">
                                                <input type="text" class="form-control" placeholder="Escribí una Marca, insumo" aria-label="Escribí una Marca, insumo" name="q" aria-describedby="basic-addon2"  value="<?php echo $buscador;?>" autocomplete="off">
                                                <span class="input-group-text" id="basic-addon2" style="background-color: #23952E; color: #FFF; cursor: pointer" onclick="procesarFormBusqueda()">
                                                    <i class="fas fa-search"></i>
                                                </span>
                                            </div>
                                        </div>                                   
                                    </div>
                                    
                                    <?php echo $divTotalComercios;?>

                                    <div class="row" style="margin-top: 0px">
                                        <div class="col-12" style="text-align: left; padding: 0px 30px">
                                            <div>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="checkAdherido" name="cuentadni" <?php echo $cuentadnichecked;?> >
                                                    <label class="form-check-label" for="checkAdherido" style="color: #626161">Adherido a Cuenta DNI Comercios</label>
                                                </div>                                               
                                            </div>
                                            <div style="margin-top: 10px; margin-bottom: 10px">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="checkEnvios" name="envios" <?php echo $envioschecked;?> >
                                                    <label class="form-check-label" for="checkEnvios" style="color: #626161">Hace envíos/Servicio a domicilio</label>
                                                </div>                                               
                                            </div>
                                        </div>                                   
                                    </div>
                                </form>
                            </div>
                            
                            <?php echo $divComercios;?>
                        </div>  
                        <div class="col-8">
                            <div id="map"></div>                                                 
                        </div>                       
                    </div>
                   
                </div>
            </div>
       
        </div>           

<script src="../js/funciones.js"></script>
<script>

    function mostrarubicacion(latitud, longitud, nombre, direccion){  
        var marker = L.marker([latitud, longitud]).addTo(map)
		.bindPopup('<b>'+nombre+'</b><br>'+direccion).openPopup();
    }

	var map = L.map('map').setView([-34.6009755, -58.3826927], 13);

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
    */

	map.on('click', onMapClick);

</script>

</body>
</html>