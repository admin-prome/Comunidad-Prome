<html>

<head>
    <title> Comunidad PROME </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/index.css">

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
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K2BDTBJ" height="0" width="0" style="display:none; visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div class="container-fluid content-top-padding">
        <div class="container-box">
            <div class="container-fluid big-container">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="title">
                                Construí tu red de proveedores
                            </h1>
                            <h2 class="subtitle font-xl">
                                Te damos la bienvenida a <b class="business-name">Comunidad Prome</b> un espacio pensado para potenciar tu <span style="white-space: nowrap;">negocio <i class="fas fa-info-circle info-icon font-m" data-bs-toggle="tooltip" data-bs-placement="top" title="Formar parte de Comunidad Prome permite que más personas conozcan tu negocio y ponerte en contacto con otros emprendimientos. Estos vínculos ayudan a fortalecer tu red de productores y compradores."></i></span>
                            </h2>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-3 p-4">
                        <div class="col-md-8 col-12 col-sm-12">

                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-6 px-0 text-center">
                                    <div id="div_buscadorcomercio" class="tab tab-active" onclick="seleccionarTipoBuscador(this.id)">
                                        <h3 class="tab-text m-0">
                                            Comercios y Servicios
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-6 pl-0 pr-0 text-center">
                                    <div id="div_buscadorproduccion" class="tab tab-inactive" onclick="seleccionarTipoBuscador(this.id)">
                                        <h3 class="tab-text m-0">
                                            Producción e Industria
                                        </h3>
                                    </div>
                                </div>
                            </div>

                            <form name="formBusqueda" id="formBusqueda" action="buscador.php" method="GET">
                                <div class="row bg-lightest-gray search-form py-3">
                                    <div class="col-md-12 text-left px-4">
                                        <div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" name="cercamio" type="checkbox" id="checkCercaMio" onclick="btnCheckCercaMioIndex()">
                                                <label class="form-check-label" for="checkCercaMio">Cerca mío</label>
                                            </div>
                                        </div>
                                        <div class="my-2" id="div_direccion" style="display: none">
                                            <input type="text" autocomplete="off" id="buscadordireccion" name="dirmapa" class="form-control" placeholder="Indicá un domicilio" onclick="limpiarDireccion()" />
                                        </div>

                                        <div class="input-group my-2">
                                            <input type="text" class="form-control" placeholder="Escribí una marca, insumo, producto o servicio" aria-label="Escribí una marca, insumo, producto o servicio" aria-describedby="basic-addon2" name="q" required="required" id="buscador" autocomplete="off">
                                            <span class="input-group-text primary-button font-m" id="basic-addon2" onclick="procesarFormBusqueda()">
                                                <i class="fas fa-search"></i>
                                            </span>
                                        </div>
                                        <!-- <div class="row">
                                            <div class="secondary-button-outline mb-3" onclick="verfiltrosbusquedaindex()">
                                                <i class="fas fa-chevron-down"></i> Búsqueda avanzada
                                            </div>
                                        </div> -->
                                        <div class="d-flex justify-content-start align-items-center p-0">
                                            <span class="secondary-button-outline p-2 my-2" onclick="verfiltrosbusquedaindex()">
                                                Búsqueda avanzada
                                            </span>
                                        </div>

                                        <div class="row" id="div_busquedaavanzada" style="display: none">
                                            <div class="col-md-6 mb-3 text-left py-0 p-4">
                                                <div>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="checkAdherido" name="cuenta_dni">
                                                        <label class="form-check-label" for="checkAdherido">Adherido a Cuenta DNI Comercios</label>
                                                    </div>
                                                </div>
                                                <div class="my-2">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="checkEnvios" name="envios">
                                                        <label class="form-check-label" for="checkEnvios">Hace envíos/Servicio a domicilio</label>
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
                                    </div>
                                </div>

                                <?php include_once "include_camposmapa.php"; ?>
                            </form>

                            <div class="mt-4">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <a href="registro.php?tipo=alta">
                                            <button class='btn primary-button rounded-button font-l fw-bold'>
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
            <div class="col-md-12 text-center p-2 mt-4">
                <a href="registro.php?tipo=modificar" class="link_solicitar">
                    <button class='btn light-button rounded-button font-m text-danger fw-bold'>
                        Solicitar baja/modificación de Comunidad Prome
                    </button>
                </a>
            </div>

            <div style="margin-top: 30px; display: none">
                <div class="row">
                    <div class="col-md-12" style="padding-right: 0px; text-align: center">
                        <button class='btn' style="background-color: #F0F0F0; color: #3C3B3B; font-weight: 400; font-size: 16px; padding-top: 17px; padding-left: 30px; padding-right: 30px; padding-bottom: 17px;">
                            <img src="../img/logocomercios.svg" style="height: 30px; margin-right: 10px; margin-top: -5px" />
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
                return alert("Tu navegador no soporta el acceso a la ubicación. Por favor, intentá con otro");
            }

            const $latitud = document.querySelector("#actual_lat"),
                $longitud = document.querySelector("#actual_lon");

            const onUbicacionConcedida = ubicacion => {
                const coordenadas = ubicacion.coords;

                var latlng = new google.maps.LatLng(coordenadas.latitude, coordenadas.longitude);
                var geocoder = geocoder = new google.maps.Geocoder();
                geocoder.geocode({
                    'latLng': latlng
                }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[1]) {
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