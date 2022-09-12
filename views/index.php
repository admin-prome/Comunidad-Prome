<html>
<head>
    <title>
        Comunidad PROME
    </title>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous"> 

    
   <script async
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgohyH98VEPgrrtHzVjZmm-d89eCNlktw&libraries=places">
    </script>

    <link rel="stylesheet" href="../css/style.css" >

</head>
<body>
    

    <div class="container-fluid" style="background-image: url('../img/fondo.jpg'); height: 100%; background-size: cover; padding-top: 100px">
        <div >
            <div class="container-fluid" style="background-color: #323232; opacity: 0.9; padding: 20px; padding-bottom: 30px; padding-top: 30px">
                <div class="container">
                    <div class="row" >
                        <div class="col-md-12">
                            <h1 style="color: #FFF; text-align: center; font-weight: bold">
                                Construí tu red de proveedores
                            </h1>
                            <h2 style="color: #FFF; text-align: center; font-size: 22px">
                                Te damos la bienvenida a la <b>Comunidad Prome</b> un espacio pensado para potenciar tu negocio
                            </h2>
                        </div>                       
                    </div>
                    <div class="row justify-content-center" style="margin-top: 20px">                       
                        <div class="col-md-8 col-12 col-sm-12">
                            <div style="background-color: #FFFFFF;min-height: 170px; border-radius: 10px ">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-6"  style="padding-right: 0px; text-align: center">
                                        <div id="div_buscadorcomercio" class="tabactivobuscador" style="border-top-left-radius: 10px; cursor: pointer" onclick="seleccionarTipoBuscador(this.id)">
                                            <h3 style="font-size: 18px; padding: 10px">
                                                Comercios y Servicios
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-6" style="padding-left: 0px; text-align: center">
                                        <div  id="div_buscadorproduccion" class="tabinactivobuscador" style="border-top-right-radius: 10px; cursor: pointer" onclick="seleccionarTipoBuscador(this.id)">
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
                                                    <input class="form-check-input"   type="checkbox" id="flexSwitchCheckChecked">
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">Cerca mío</label>
                                                </div>
                                                <p style="color: #4B4B4B; text-align: left">
                                                    
                                                </p>
                                            </div>
                                            <div class="input-group mb-3 pl-1">
                                                <i class="fa fa-list" style ="border-top: 1px solid #ced4da;border-left: 1px solid #ced4da; border-bottom: 1px solid #ced4da; padding-left: 5px; padding-top: 10px; color: #C4C4C4; cursor: pointer" onclick="verfiltrosbusqueda()"></i>
                                                <input type="text" class="form-control" placeholder="Escribí un producto o servicio" aria-label="Escribí un producto o servicio" aria-describedby="basic-addon2" name="q" required="required" id="buscador"  autocomplete="off" style="border-left: 0px solid #FFF"  >
                                                <span class="input-group-text" id="basic-addon2" style="background-color: #23952E; color: #FFF; cursor: pointer" onclick="procesarFormBusqueda()">
                                                    <i class="fas fa-search"></i>
                                                </span>
                                            </div>
                                        </div>                                   
                                    </div>
                                    <div class="row" id="div_busquedaavanzada" style="display: none">
                                        <div class="col-md-6 mb-3" style="text-align: left; padding: 0px 30px">
                                            <div class="mb-1">
                                                <i class="fa fa-list" style ="padding-left: 5px; padding-top: 10px; color: #C4C4C4; cursor: pointer" onclick="verfiltrosbusqueda()"></i> Búsqueda avanzada
                                            </div>
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
                                            <div>
                                                <input
                                                    type="text"
                                                    autocomplete="off"
                                                    id="buscadordireccion"
                                                    name="dirmapa"
                                                    class="form-control"
                                                    placeholder="Indicá un domicilio"
                                                    value="<?php echo $getdireccion;?>"
                                                />
                                            </div>
                                            <div class="mt-2">
                                                <select class="form-control" name="m">
                                                    <?php echo $optionmunicipio;?>
                                                </select>
                                            </div>
                                            <div class="mt-2">
                                                <select class="form-control" name="r">
                                                    <?php echo $optionrubro;?>
                                                </select>
                                            </div>
                                            <div class="mt-2">
                                                <select class="form-control" name="a">
                                                    <?php echo $optionactividad;?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>  
                            <div style="margin-top: 20px">
                                <div class="row">
                                    <div class="col-md-12" style="padding-right: 0px; text-align: center">
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
                   
                </div>
            </div>
            <div style="margin-top: 20px">
                <div class="row">
                    <div class="col-md-12" style="padding-right: 0px; text-align: center">
                        <a href="registro.php?tipo=modificar" style="color: #FFF; font-size: 18px">
                            Solicitar baja/modificación de Comunidad Prome
                        </a>
                    </div>                                    
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

<main role="main" class="container" style="display: none">
    <div class="row">
        <div class="col-md-12">
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="../js/funciones.js"></script>
<script src="../js/geolocalizacion.js"></script>


<script>

    // Get the input field
    var input = document.getElementById("buscador");

    // Execute a function when the user presses a key on the keyboard
    input.addEventListener("keypress", function(event) {
    // If the user presses the "Enter" key on the keyboard
    if (event.key === "Enter") {
        // Cancel the default action, if needed
        event.preventDefault();
        // Trigger the button element with a click
        procesarFormBusqueda();
    }
    });

    function verfiltrosbusqueda(){
        
        var div_busquedaavanzada = document.getElementById('div_busquedaavanzada').style.display;
        if (div_busquedaavanzada==""){
            document.getElementById('div_busquedaavanzada').style.display = "none";
        }else{
            document.getElementById('div_busquedaavanzada').style.display = "";
            
        }
    }
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


</body>
</html>