<html>
<head>
    <title>
        Comunidad PROME
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous"> 

    <link rel="stylesheet" href="../css/style.css" >

</head>
<body>
    

    <div class="container-fluid" style="background-image: url('../img/fondo.jpg'); height: 600px; background-size: cover; padding-top: 100px">
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
                    <div class="row" style="margin-top: 20px">
                        <div class="col-md-2">                           
                        </div>  
                        <div class="col-md-8">
                            <div style="background-color: #FFFFFF;height: 170px; border-radius: 10px ">
                                <div class="row">
                                    <div class="col-md-6"  style="padding-right: 0px; text-align: center">
                                        <div id="div_buscadorcomercio" class="tabactivobuscador" style="border-top-left-radius: 10px; cursor: pointer" onclick="seleccionarTipoBuscador(this.id)">
                                            <h3 style="font-size: 18px; padding: 10px">
                                                Comercios y Servicios
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="col-md-6" style="padding-left: 0px; text-align: center">
                                        <div  id="div_buscadorproduccion" class="tabinactivobuscador" style="border-top-right-radius: 10px; cursor: pointer" onclick="seleccionarTipoBuscador(this.id)">
                                            <h3 style="font-size: 18px; padding: 10px">
                                                Producción e Industria
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                
                                <form name="formBusqueda" id="formBusqueda" action="buscador" method="GET">
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
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Escribí una Marca, insumo, producto o servicio" aria-label="Escribí una marca, insumo, producto o servicio" aria-describedby="basic-addon2" name="q" required="required"  autocomplete="off">
                                                <span class="input-group-text" id="basic-addon2" style="background-color: #23952E; color: #FFF; cursor: pointer" onclick="procesarFormBusqueda()">
                                                    <i class="fas fa-search"></i>
                                                </span>
                                            </div>
                                        </div>                                   
                                    </div>
                                </form>
                            </div>  
                            <div style="margin-top: 20px">
                                <div class="row">
                                    <div class="col-md-12" style="padding-right: 0px; text-align: center">
                                        <a href="registro?tipo=alta">
                                            <button class='btn' style="background-color: #23952E; color: #FFF; font-weight: 700; font-size: 18px">
                                                Quiero sumarme a la Comunidad Prome
                                            </button>
                                        </a>
                                    </div>                                    
                                </div>
                                <div style="margin-top: 10px">
                                    <div class="row">
                                        <div class="col-md-12" style="padding-right: 0px; text-align: center">
                                            <a href="registro?tipo=modificar" style="color: #FFF; text-decoration: none; font-size: 18px">
                                                O modifica tus datos acá
                                            </a>
                                        </div>                                    
                                    </div>
                                </div> 
                            </div>                          
                        </div>                       
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


</body>
</html>