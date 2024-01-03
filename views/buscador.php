<html>

<head>
    <title>
        Comunidad PROME
    </title>
    <?php include_once "head.php"; ?>
    <link rel="stylesheet" type="text/css" href="../css/buscador.css">
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-K2BDTBJ');
    </script>
</head>

<body id="inicio">
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K2BDTBJ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

    <div class="container main-container py-2">

        <div class="row justify-content-between align-items-center my-2">
            <div class="col-4 text-start">
                <a href="./"><img src="../img/LogoComunidadPromeHorizontalCortado.png" class="logo" /></a>
            </div>
            <div class="col-4 text-end">
                <a href="./" class="btn primary-button rounded-button">Volver</a>
            </div>
        </div>

        <div class="row m-0">
            <div class="col-md-4">

                <div class="search-form bg-lightest-gray">

                    <div class="row m-0 bg-white">
                        <div class="col-md-6 col-sm-6 col-6 p-0">
                            <div id="div_buscadorcomercio" class="tab tab-active" onclick="seleccionarTipoBuscador(this.id)">
                                <h3 class="tab-text m-0">Comercios y Servicios</h3>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-6 p-0">
                            <div id="div_buscadorproduccion" class="tab tab-inactive" onclick="seleccionarTipoBuscador(this.id)">
                                <h3 class="tab-text m-0">Producción e Industria</h3>
                            </div>
                        </div>
                    </div>



                    <div class="row" style="padding: 0.8rem;">
                        <div class="col-md-12 my-2">
                            <div class="d-flex justify-content-around">
                                <button type="button" class="btn primary-button my-2" data-bs-toggle="modal" data-bs-target="#newSearch">
                                    Nueva búsqueda
                                </button>

                                <button type="button" class="btn secondary-button-outline my-2" data-bs-toggle="modal" data-bs-target="#filterResults">
                                    Filtrar resultados
                                </button>
                            </div>
                        </div>

                        <?php echo $divTotalComercios; ?>

                        <?php include_once "include_camposmapa.php"; ?>
                    </div>
                </div>

                <!-- Modal Nueva búsqueda -->
                <div class="modal fade" id="newSearch" tabindex="-1" aria-labelledby="newSearchLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form name="formBusqueda" id="formBusqueda" action="buscador.php" method="GET">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="newSearchLabel">Nueva búsqueda</h1>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="form-check form-switch my-3">
                                                    <input class="form-check-input" name="cercamio" type="checkbox" id="checkCercaMio" onclick="btnCheckCercaMio()" <?php echo $tipodirchecked; ?>>
                                                    <label class="form-check-label" for="checkCercaMio">Cerca mío</label>
                                                </div>

                                                <div class="auto-search-wrapper my-3" id="div_buscadordireccion" style="<?php echo $divbuscadormapa; ?>">
                                                    <input type="text" autocomplete="off" id="buscadordireccion" name="dirmapa" class="form-control" placeholder="Indicá un domicilio" value="<?php echo $getdireccionmapa; ?>" onclick="limpiarDireccion()" />
                                                </div>


                                                <div class="input-group my-3">
                                                    <input type="text" class="form-control" placeholder="Escribí una marca, insumo, producto o servicio" aria-label="Escribí una marca, insumo, producto o servicio" name="q" value="<?php echo $buscador; ?>" autocomplete="off">
                                                </div>

                                                <div class="my-3">
                                                    <div class="my-3" id="filtro_municipio" <?php echo $displaymunicipio; ?>>
                                                        <select class="form-control" name="m">
                                                            <?php echo $optionmunicipio; ?>
                                                        </select>
                                                    </div>
                                                    <div class="my-3" id="filtro_rubro">
                                                        <select class="form-control" id="select_rubro" name="r">
                                                            <?php echo $optionrubro; ?>
                                                        </select>
                                                    </div>
                                                    <div class="my-3" id="filtro_actividad">
                                                        <select class="form-control" id="select_actividad" name="a">
                                                            <?php echo $optionactividad; ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-check form-switch my-3">
                                                    <input class="form-check-input" type="checkbox" id="cuenta_dni" name="cuenta_dni" value="1">
                                                    <label class="form-check-label" for="cuenta_dni">Adherido a Cuenta DNI Comercios</label>
                                                </div>

                                                <div class="form-check form-switch my-3">
                                                    <input class="form-check-input" type="checkbox" id="envios" name="envios" value="1">
                                                    <label class="form-check-label" for="envios">Hace envíos/Servicio a domicilio</label>
                                                </div>
                                                <?php include_once "include_camposmapa.php"; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary rounded-button" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-secondary rounded-button" onclick="limpiarCampos()">Limpiar</button>
                                    <button type="submit" class="btn primary-button rounded-button" onclick="procesarFormBusqueda()">Aplicar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal Filtrar resultados -->
                <div class="modal fade" id="filterResults" tabindex="-1" aria-labelledby="filterResultsLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="filterResultsLabel">Filtrar resultados</h1>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6 border-end">
                                            <h5>Municipio</h5>
                                            <div class="mt-2" style="max-height: 300px; overflow-y: auto;">
                                                <?php echo $optionmunicipiob; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h5>Rubro</h5>
                                            <div class="mt-2" style="max-height: 300px; overflow-y: auto;">
                                                <?php echo $optionrubrob; ?>
                                            </div>
                                        </div>
                                        <?php include_once "include_camposmapa.php"; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary rounded-button" data-bs-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn primary-button rounded-button">Aplicar</button>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- div_detalle -->
                <div id="div_detalle" draggable="true" class="detail-view-card" style='display: none'>
                    <a href="#inicio" id="irdetalle"></a>
                    <div class="close-icon font-xl" onclick="cerrardetalle()">
                        <i class="far fa-times-circle"></i>
                    </div>
                    <div class='row'>
                        <div class='col-md-3 col-sm-3 col-3' style='padding-right: 0px; text-align: center'>
                            <div style='padding-top: 10px'>
                                <img id="det_logo" src="" class="det-logo" />
                            </div>
                        </div>
                        <div class='col-md-9 col-sm-9 col-9' style='text-align: left; padding-top: 10px'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <h3 id="det_nombre" style='font-size: 18px; margin-bottom: 4px; font-weight: 700'></h3>
                                    <input type='hidden' id='det_id' name='det_id' value='' />
                                    <input type='hidden' id='det_detalle' name='det_detalle' value='' />
                                    <span id="det_direccionCompleta" style='font-size: 15px; margin-bottom: 4px'></span>

                                    <img id="det_dni" title='Cuenta DNI Comercios' src='../img/logocomercios.svg' style='height: 23px; margin-right: 10px; margin-top: -5px; display: none' />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='row' style="font-size:14px">
                        <div class='col-md-3 col-sm-3 col-3' id="det_div_whatsapp" style='text-align: center; display: none'>
                            <div style='padding-top: 10px'>
                                <a id="det_whatsapp" target='_blank' style="text-decoration: none">
                                    <img src='../img/det_whatsapp.png' style='height: 60px; max-width: auto' alt='Contactar' title='Contactar' />
                                    <p style="color: #23952E">
                                        Contactar
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class='col-md-3 col-sm-3 col-3' id="det_div_tel" style=' text-align: center; display: none'>
                            <div style='padding-top: 10px'>
                                <a id="det_tel" style=" text-decoration: none">
                                    <img src='../img/det_tel.png' style='height: 60px; max-width: auto' alt='Llamar' title='Llamar' />
                                    <p style="color: #23952E">
                                        Llamar
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class='col-md-3 col-sm-3 col-3' id="det_div_web" style='text-align: center; display: none'>
                            <div style='padding-top: 10px'>
                                <a id="det_web" target='_blank' style="text-decoration: none">
                                    <img src='../img/det_web.png' style='height: 60px; max-width: auto' alt='Ver web' title='Ver web' />
                                    <p style="color: #23952E">
                                        Ver web
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class='col-md-3 col-sm-3 col-3' id="det_div_facebook" style='text-align: center; display: none'>
                            <div style='padding-top: 10px'>
                                <a id="det_facebook" target='_blank' style=" text-decoration: none">
                                    <img src='../img/det_facebook.png' style='height: 60px; max-width: auto' alt='Ver web' title='Ver web' />
                                    <p style="color: #23952E">
                                        Facebook
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class='col-md-3 col-sm-3 col-3' id="det_div_instagram" style='text-align: center; display: none'>
                            <div style='padding-top: 10px'>
                                <a id="det_instagram" target='_blank' style="text-decoration: none">
                                    <img src='../img/det_instagram.png' style='height: 60px; max-width: auto' alt='Ver web' title='Ver web' />
                                    <p style="color: #23952E">
                                        Instagram
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class='col-md-3 col-sm-3 col-3 d-block d-sm-none' id="det_div_compartir" style='text-align: center;'><!---->
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
                                <div class='col-md-9 col-sm-9 col-9' style='text-align: left; padding-top: 0px'>
                                    <div id="det2_div_direccion" style="display: none">
                                        <a id="det2_div_direccionurl" target='_blank' title='Abrir Web' href='#' style='color: #5C5B5B; text-decoration: none'>
                                            <i class='fa fa-map-marker-alt font-l'></i>
                                            <span id="det2_div_direcciontexto"></span>
                                        </a>
                                    </div>
                                    <div id="det2_div_tel" style="display: none">
                                        <a id="det2_div_telurl" title='Llamar' href='tel:telefono' style='color: #5C5B5B; text-decoration: none'>
                                            <i class='fa fa-phone font-l'></i>
                                            <span id="det2_div_teltexto"></span>
                                        </a>
                                    </div>
                                    <div id="det2_div_email" style="display: none">
                                        <a id="det2_div_emailurl" title='Email' href='mailto:email' style='color: #5C5B5B; text-decoration: none'>
                                            <i class='fa fa-envelope font-l'></i>
                                            <span id="det2_div_emailtexto"></span>
                                        </a>
                                    </div>
                                    <div id="det2_div_instagram" style="display: none">
                                        <a id="det2_div_instagramurl" target="_blank" title='Instagram' href='#' style='color: #5C5B5B; text-decoration: none; '>
                                            <i class='fab fa-instagram font-l'></i>
                                            <span id="det2_div_instagramtexto"></span>
                                        </a>
                                    </div>
                                    <div id="det2_div_facebook" style="display: none">
                                        <a id="det2_div_facebookurl" target="_blank" title='Facebook' href='#' style='color: #5C5B5B; text-decoration: none; '>
                                            <i class='fab fa-facebook-square font-l'></i>
                                            <span id="det2_div_facebooktexto"></span>
                                        </a>
                                    </div>
                                </div>
                                <div class='col-md-3 col-sm-3 col-3' style='text-align: right; padding-top: 0px'>
                                    <span id="det2_div_metros" style='font-weight: 600; color: #5C5B5B'></span><!-- antes color: #212529-->
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- FIN div_detalle -->

                <!-- div lista comercios -->
                <div id="divComercios" class="d-none d-sm-block" style="height: 340px; overflow-y: auto; overflow-x: hidden;" onclick="highlightDetailView()">
                    <div <?php echo $displaycomercios; ?>>
                        <?php echo $divComercios; ?>
                    </div>
                </div>
                <!-- FIN div lista comercios -->

            </div>

            <!-- div mapa -->
            <div class="col-md-8" id="div_mapa" style="padding: 0px; float:right; border-radius: 30px" <?php echo $displaymapa; ?>>
                <div id="map"></div>
            </div>
            <!-- FIN div mapa -->

            <div class="col-md-12 d-none d-sm-block" style="border-top: 1px solid #ddd; margin-top:10px;">
                <div class="d-none d-sm-block" style="padding: 8px; text-align: center;">
                    <a href="registro.php?tipo=alta">
                        <button class='btn primary-button' style="font-weight: 700; font-size: 18px; padding-left:30px; padding-right:30px; letter-spacing:1px; border-radius: 30px">
                            Quiero sumarme a Comunidad Prome
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

            <!-- div lista comercios mobile -->
            <div id="divComercios2" class="d-block d-sm-none" style="margin-left: -10px; margin-bottom:-20px" <?php echo $divComercios2; ?>>
                <div class="scrolling-wrapper row flex-row flex-nowrap mt-4 pb-4 pt-2 pl-0">
                    <?php echo $divComercioListaOver; ?>
                </div>
            </div>
            <!-- FIN div lista comercios mobile -->
        </div>
    </div>

    <input type="hidden" id="mobileclickcomercio" />

    <?php include_once "footer.php"; ?>

    <script>
        //BOTON COMPARTIR
        shareButton = document.getElementById("det_compartir");
        shareButton.addEventListener("click", (event) => {
            if (navigator.share) {
                //var url = window.location+'&comercio_id='+document.getElementById('det_id').value;
                navigator.share({
                    title: document.getElementById('det_nombre').innerHTML,
                    text: document.getElementById('det_detalle').value
                })
                //navigator.share({ title: "titulo", text: "detalle", url: url})
            } else {
                alert('Lo sentimos, éste navegador no tiene soporte para compartir.')
            }
        })

        //CARGA MAPA
        const funcionInit = () => {
            if (!"geolocation" in navigator) {
                return alert("Tu navegador no soporta el acceso a la ubicación. Por favor, intentá con otro.");
            }

            const $latitud = document.querySelector("#actual_lat"),
                $longitud = document.querySelector("#actual_lon");
            //$enlace = document.querySelector("#enlace");


            const onUbicacionConcedida = ubicacion => {
                //console.log("Tengo la ubicación: ", ubicacion);

                const coordenadas = ubicacion.coords;

                try {
                    if (google == undefined) {
                        //alert("si esta definido google");
                    }
                } catch {
                    //window.location.reload();
                }

                var latlng = new google.maps.LatLng(coordenadas.latitude, coordenadas.longitude);
                var geocoder = geocoder = new google.maps.Geocoder();
                geocoder.geocode({
                    'latLng': latlng
                }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[1]) {
                            //alert("Location: " + results[1].formatted_address);
                            document.getElementById('actual_direccion').value = results[1].formatted_address;
                        }
                    }
                });

                document.getElementById('actual_lat').value = coordenadas.latitude;
                document.getElementById('actual_lon').value = coordenadas.longitude;

                // Icono ubicacion actual
                var iconActual = L.icon({
                    iconUrl: '../img/icono_estoy_aqui.png',
                    iconSize: [32, 40],
                    shadowSize: [50, 64],
                    iconAnchor: [45, 50],
                    shadowAnchor: [4, 62],
                    popupAnchor: [-3, -46]
                });

                //AGREGAR EN $divComercioMarkers el .on('click', onMapClick)

                var latitudget = "<?php echo $getlatitudactual; ?>";
                if (latitudget == "") {
                    //L.marker([coordenadas.latitude, coordenadas.longitude], {icon: iconActual}).addTo(map).bindPopup('<b>Mi Ubicación Actual </b>'); 
                } else {
                    L.marker([<?php echo $getlatitudactual; ?>, <?php echo $getlongitudactual; ?>], {
                        icon: iconActual
                    }).addTo(map).bindPopup('<b><?php echo $getdireccionactual; ?> </b>');
                }


                // Icono ubicacion buscada
                var iconBusqueda = L.icon({
                    iconUrl: '../img/icono_estoy_aqui.png',
                    iconSize: [32, 40],
                    shadowSize: [50, 64],
                    iconAnchor: [45, 50],
                    shadowAnchor: [4, 62],
                    popupAnchor: [-3, -46]
                });

                var latitudget = "<?php echo $getlatitud; ?>";
                if (latitudget == "") {
                    //L.marker([coordenadas.latitude, coordenadas.longitude], {icon: iconActual}).addTo(map).bindPopup('<b>Mi Ubicación Actual </b>');
                    //console.log(1); 
                } else {
                    //console.log(2); 
                    L.marker([<?php echo $getlatitud; ?>, <?php echo $getlongitud; ?>], {
                        icon: iconBusqueda
                    }).addTo(map).bindPopup('<b><?php echo $getdireccion; ?> </b>');
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
                    iconUrl: '../img/icono_estoy_aqui.png',
                    iconSize: [32, 40],
                    shadowSize: [50, 64],
                    iconAnchor: [45, 50],
                    shadowAnchor: [4, 62],
                    popupAnchor: [-3, -76]
                });


                var latitudget = "<?php echo $getlatitud; ?>";
                if (latitudget == "") {
                    //L.marker([coordenadas.latitude, coordenadas.longitude], {icon: iconActual}).addTo(map).bindPopup('<b>Mi Ubicación Actual </b>');
                    //console.log(1); 
                } else {
                    //console.log(2); 
                    L.marker([<?php echo $getlatitud; ?>, <?php echo $getlongitud; ?>], {
                        icon: iconBusqueda
                    }).addTo(map).bindPopup('<b><?php echo $getdireccion; ?> </b>');
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

        ///MAPA
        var map = L.map('map').setView([<?php echo $latitudbuscar; ?>, <?php echo $longitudbuscar; ?>], 7);

        var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var pillsContainer = L.control({
            position: 'topright'
        });

        pillsContainer.onAdd = function() {
            var container = L.DomUtil.create('div', 'container pills-container');

            var pillReal = L.DomUtil.create('div', 'pill');
            var pillApprox = L.DomUtil.create('div', 'pill');

            pillReal.innerHTML = '<div class="d-flex align-items-center">' +
                '<img src="../img/refe_verde.png" alt="Imagen real" style="width: 16px; margin: 0 6px">' +
                '<span>Ubicación real</span>' +
                '</div>';

            pillApprox.innerHTML = '<div class="d-flex align-items-center">' +
                '<img src="../img/refe_blanca.png" alt="Imagen aproximada" style="width: 16px; margin: 0 6px">' +
                '<span>Ubicación aproximada</span>' +
                '</div>';

            container.appendChild(pillReal);
            container.appendChild(pillApprox);

            return container;
        };

        pillsContainer.addTo(map);
        tiles.bringToBack();


        <?php echo $divComercioMarkers; ?>


        var searchInput = 'buscadordireccion';

        $(document).ready(function() {
            var autocomplete;
            autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
                types: ['geocode'],
                componentRestrictions: {
                    country: "AR"
                }
            });

            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var near_place = autocomplete.getPlace();

                var buscadordireccion = document.getElementById('buscadordireccion').value;

                document.getElementById('lat').value = near_place.geometry.location.lat();
                document.getElementById('lon').value = near_place.geometry.location.lng();
                document.getElementById('dir').value = buscadordireccion;
                document.getElementById('type_on').value = "off";
                //window.location = "buscador.php?lat="+near_place.geometry.location.lat()+"&lon="+near_place.geometry.location.lng()+"&dir="+buscadordireccion;
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function() {

            $(document).on("change", "#select_rubro", function() {
                var select_rubro = $('#select_rubro').val();

                $.ajax({
                    url: "cargar-actividad.php",
                    type: "POST",
                    cache: false,
                    data: {
                        rubro: select_rubro
                    },
                    success: function(data) {
                        $('#select_actividad').empty().append(data);
                        console.log("sucesss" + data);
                    }
                });
            });

            <?php if ($comercio_id != "") { ?>
                $("#comercio_<?php echo $comercio_id ?>").click();
            <?php } ?>

        });

        function limpiarCampos() {
            var formulario = document.getElementById('formBusqueda');
            var selectActividad = formulario.querySelector('#select_actividad');

            for (var i = 0; i < formulario.elements.length; i++) {
                var elemento = formulario.elements[i];
                var tipoElemento = elemento.type.toLowerCase();

                switch (tipoElemento) {
                    case 'text':
                    case 'textarea':
                    case 'select-one':
                        elemento.value = '';
                        break;
                    case 'checkbox':
                    case 'radio':
                        elemento.checked = false;
                        break;
                }
            }

            $(document).ready(function() {

                $.ajax({
                    url: "vaciar-actividad.php",
                    type: "POST",
                    cache: false,
                    success: function(data) {
                        $('#select_actividad').empty().append(data);
                    }
                });
            });
        }
    </script>
    <script>
        var idMunicipioPostBusqueda = null;
        var idMunicipioInicio = <?php echo ($getmunicipio !== null && $getmunicipio !== '') ? $getmunicipio : 'null' ?>;
        var marcadorActual = null;

        $(document).ready(function() {
            $('select[name="m"]').on('change', function() {
                idMunicipioPostBusqueda = $(this).val();
                obtenerCentroide(idMunicipioPostBusqueda || idMunicipioInicio);
            });
        });

        if (idMunicipioInicio !== null || idMunicipioPostBusqueda !== null) {
            obtenerCentroide(idMunicipioInicio || idMunicipioPostBusqueda);
        }

        function obtenerCentroide(idMunicipio) {
            if (idMunicipio != null) {
                if (marcadorActual !== null) {
                    map.removeLayer(marcadorActual);
                }
                $.ajax({
                    url: 'obtener-centroide.php?id=' + idMunicipio,
                    type: 'GET',
                    success: function(data) {
                        if (data !== null) {
                            const regex = /-?\d+\.\d+/g;
                            const numeros = data.match(regex);
                            if (numeros !== null) {
                                const longitud = parseFloat(numeros[0]);
                                const latitud = parseFloat(numeros[1]);
                                const markerOptions = {
                                    icon: L.icon({
                                        iconUrl: '../img/icono_estoy_aqui.png',
                                        iconSize: [32, 40],
                                        iconAnchor: [15, 30]
                                    })
                                };
                                marcadorActual = L.marker([longitud, latitud], markerOptions).addTo(map);
                                map.setView([longitud, latitud], 9);
                            }
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            }
        }
    </script>
    <script>
        //Animacion al mostrar detail-view
        function highlightDetailView() {
            event.stopPropagation();

            const divDetalle = document.getElementById('div_detalle');
            const originalBackgroundColor = window.getComputedStyle(divDetalle).getPropertyValue('background-color');
            const highlightBackgroundColor = '#C9E6CB';

            divDetalle.style.transition = 'background-color 0.5s';
            divDetalle.style.backgroundColor = highlightBackgroundColor;

            setTimeout(function() {
                divDetalle.style.backgroundColor = originalBackgroundColor;
                setTimeout(function() {
                    divDetalle.style.transition = 'none';
                }, 500);
            }, 3000);
        }
    </script>


</body>

</html>