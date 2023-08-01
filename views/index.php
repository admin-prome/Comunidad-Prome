<html>

<head>
    <title> Comunidad PROME </title>
    <?php include_once "head.php"; ?>
    <!-- Google Tag Manager -->
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
    <!-- End Google Tag Manager -->
</head>

<body style="background-image: url('../img/fondo.jpg'); background-size: cover;">

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K2BDTBJ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div class="container-fluid div-back-index">
        <div class="container-box">
            <div class="container-fluid" style="background-color: #323232; opacity: 0.9; padding: 20px; padding-bottom: 30px; padding-top: 30px; border-radius: 10px">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 style="color: #FFF; text-align: center; font-weight: bold">
                                Construí tu red de proveedores
                            </h1>
                            <h2 style="color: #FFF; text-align: center; font-size: 22px">
                                Te damos la bienvenida a <b>Comunidad Prome</b> un espacio pensado para potenciar tu negocio
                                <i class="fas fa-info-circle" style="color: #0049B0; background-color:#FFFFFF; border-radius: 50%; border-style: none;" data-bs-toggle="tooltip" data-bs-placement="top" title="Formar parte de Comunidad Prome permite que más personas conozcan tu negocio y ponerte en contacto con otros emprendimientos. Estos vínculos ayudan a fortalecer tu red de productores y compradores."></i>
                            </h2>
                        </div>
                    </div>
                    <div class="row justify-content-center" style="margin-top: 20px">
                        <div class="col-md-8 col-12 col-sm-12">
                            <div style="background-color: #FFFFFF;min-height: 170px; border-radius: 10px ">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-6" style="padding-right: 0px; text-align: center">
                                        <div id="div_buscadorcomercio" class="tabactivobuscador" style="border-top-left-radius: 10px; cursor: pointer; background-color: #23952E" onclick="seleccionarTipoBuscador(this.id)">
                                            <h3 style="font-size: 18px; padding: 10px; padding-right: 17px">
                                                Comercios y Servicios
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-6" style="padding-left: 0px; text-align: center">
                                        <div id="div_buscadorproduccion" class="tabinactivobuscador" style="border-top-right-radius: 10px; cursor: pointer" onclick="seleccionarTipoBuscador(this.id)">
                                            <h3 style="font-size: 18px; padding: 10px">
                                                Producción e Industria
                                            </h3>
                                        </div>
                                    </div>
                                </div>

                                <form name="formBusqueda" id="formBusqueda" action="buscador.php" method="GET">
                                    <div class="row" style="margin-top: 10px">
                                        <div class="col-md-12" style="text-align: left; padding: 0px 30px">
                                            <div>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" name="cercamio" type="checkbox" id="checkCercaMio" onclick="btnCheckCercaMioIndex()">
                                                    <label class="form-check-label" for="checkCercaMio">Cerca mío</label>
                                                </div>
                                            </div>
                                            <div id="div_direccion" style="margin-top: 10px; margin-bottom: 10px; display: none">
                                                <input type="text" autocomplete="off" id="buscadordireccion" name="dirmapa" class="form-control" placeholder="Indicá un domicilio" onclick="limpiarDireccion()" />
                                            </div>

                                            <div class="input-group mb-3 mt-2 pl-1">
                                                <div class="d-flex align-items-center" style="margin-right: 8px;">
                                                    <i class="fas fa-info-circle" style="color: #0049B0;" data-bs-toggle="tooltip" data-bs-placement="top" title=" Al hacer clic aquí podrás realizar una búsqueda avanzada para obtener mejores resultados."></i>
                                                </div>
                                                <i class="fas fa-chevron-down" style="border-top: 1px solid #ced4da;border-left: 1px solid #ced4da; border-bottom: 1px solid #ced4da; padding: 10px; color: #C4C4C4; cursor: pointer" onclick="verfiltrosbusquedaindex()"></i>
                                                <input type="text" class="form-control" placeholder="Escribí una marca, insumo, producto o servicio" aria-label="Escribí una marca, insumo, producto o servicio" aria-describedby="basic-addon2" name="q" required="required" id="buscador" autocomplete="off" style="border-left: 0px solid #FFF">
                                                <span class="input-group-text" id="basic-addon2" style="background-color: #23952E; color: #FFF; cursor: pointer" onclick="procesarFormBusqueda()">
                                                    <i class="fas fa-search"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="div_busquedaavanzada" style="display: none">
                                        <div class="col-md-6 mb-3" style="text-align: left; padding: 0px 30px">
                                            <div class="mb-1">
                                                <i class="fas fa-chevron-down" style="padding-left: 5px; padding-top: 10px; color: #C4C4C4; cursor: pointer" onclick="verfiltrosbusquedaindex()"></i> Búsqueda avanzada
                                            </div>
                                            <div>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="checkAdherido" name="cuentadni">
                                                    <label class="form-check-label" for="checkAdherido" style="color: #626161">Adherido a Cuenta DNI Comercios</label>
                                                </div>
                                            </div>
                                            <div style="margin-top: 10px; margin-bottom: 10px">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="checkEnvios" name="envios">
                                                    <label class="form-check-label" for="checkEnvios" style="color: #626161">Hace envíos/Servicio a domicilio</label>
                                                </div>
                                            </div>

                                            <div class="mt-2">
                                                <select class="form-control" id="select_municipio" name="m">
                                                    <?php echo $optionmunicipio; ?>
                                                </select>
                                            </div>
                                            <div class="mt-2">
                                                <select class="form-control" id="select_rubro" name="r">
                                                    <?php echo $optionrubro; ?>
                                                </select>
                                            </div>
                                            <div class="mt-2">
                                                <select class="form-control" id="select_actividad" name="a">
                                                    <?php echo $optionactividad; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <?php include_once "include_camposmapa.php"; ?>
                                </form>
                            </div>
                            <div style="margin-top: 20px">
                                <div class="row">
                                    <div class="col-md-12" style="padding-right: 0px; text-align: center">
                                        <a href="registro.php?tipo=alta">
                                            <button class='btn' style="background-color: #23952E; color: #FFF; font-weight: 700; font-size: 18px">
                                                Quiero sumarme a Comunidad Prome
                                            </button>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="div-solicitar-index">
                <div class="col-md-12 text-center">
                    <a href="registro.php?tipo=modificar" class="link_solicitar">
                        Solicitar baja/modificación de Comunidad Prome
                    </a>
                </div>
            </div>

            <div style="margin-top: 30px; display: none">
                <div class="row">
                    <div class="col-md-12" style="padding-right: 0px; text-align: center">
                        <button class='btn' style="background-color: #F0F0F0; color: #3C3B3B; font-weight: 400; font-size: 16px; padding-top: 17px; padding-left: 30px; padding-right: 30px; padding-bottom: 17px;">
                            <img src="../img/logocomercios.png" style="height: 30px; margin-right: 10px; margin-top: -5px" />
                            ¿Conocés <b>Cuenta DNI Comercios?</b>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include_once "footer.php"; ?>

    <script>
        var input = document.getElementById("buscador");

        input.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                procesarFormBusqueda();
            }
            console.log("index. procesarform");
        });

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

                //window.location = "buscador.php?lat="+near_place.geometry.location.lat()+"&lon="+near_place.geometry.location.lng()+"&dir="+buscadordireccion;

            });
        });
    </script>

    <script>
        const funcionInit = () => {
            if (!"geolocation" in navigator) {
                return alert("Tu navegador no soporta el acceso a la ubicación. Intenta con otro");
            }

            const $latitud = document.querySelector("#actual_lat"),
                $longitud = document.querySelector("#actual_lon");

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
                            document.getElementById('buscadordireccion').value = results[1].formatted_address;
                        }
                    }
                });

                document.getElementById('actual_lat').value = coordenadas.latitude;
                document.getElementById('actual_lon').value = coordenadas.longitude;
            }

            const onErrorDeUbicacion = err => {

                $latitud.value = "";
                $longitud.value = "";
                console.log("Error obteniendo ubicación: ", err);
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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on("change", "#select_rubro", function() {
                var select_rubro = jQuery('#select_rubro').val();

                $.ajax({
                    url: "cargar-actividad.php",
                    type: "POST",
                    cache: false,
                    data: {
                        rubro: select_rubro
                    },
                    success: function(data) {
                        $('#select_actividad').empty().append(data);
                    }
                });
            });
        });
    </script>

    <script type="text/javascript">
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
</body>

</html>