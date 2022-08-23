<html>
<head>
    <title>
        Comunidad PROME
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous"> 

    <link rel="stylesheet" href="../css/style.css" >

</head>
<body style="background-color: #F3F3F3">
   
        <div >
            <div class="container" style="background-color: #F3F3F3; opacity: 0.9; padding: 20px; padding-bottom: 50px; padding-top: 30px">
                <div class="container">
                    <div class="row" >
                        <div class="col-10 offset-1">
                            <h1 style="color: #23952E; text-align: left; font-weight: 600">
                                Te damos la bienvenida a la Comunidad Prome
                            </h1>
                            <h2 style="color: #4E4E4E; text-align: left; font-size: 24px">
                                un espacio pensado para potenciar tu negocio
                            </h2>
                        </div>                       
                    </div>
                    <div class="row" style="margin-top: 20px">
                        <div class="col-3">                           
                        </div>  
                        <div class="col-6">
                            <div style="background-color: #FFFFFF; border-radius: 10px; padding: 15px ">
                               <form method="POST" action="confirmacion-registro.php">
                                    <div class="row" style="margin-top: 10px">
                                        <div class="col-12" style="text-align: left; padding: 0px 30px">
                                            <div>
                                                <h3 style="font-size: 16px">
                                                    Completá el formulario y  te contactamos a la brevedad
                                                </h3>
                                            </div>                                        
                                        </div>                                   
                                    </div>
                                    <div class="row" style="margin-top: 10px">
                                        <div class="col-8" style="text-align: left; padding: 0px 30px">
                                            <label>
                                                Datos del titular
                                            </label>
                                            <div style="margin-top: 5px">
                                                <input type="text" class="form-control" placeholder="Ingresá tu DNI, CUIT o CUIL" name="document" required="required">
                                            </div>
                                        </div>                                   
                                    </div>
                                    <div class="row" style="margin-top: 10px">
                                        <div class="col-8" style="text-align: left; padding: 0px 30px">
                                            <label>
                                                Tipo de tramite
                                            </label>
                                            <div style="margin-top: 5px">
                                                <select class="form-control" required="required" name="tipo">
                                                    <option value="">
                                                        Seleccioná el tipo de gestión
                                                    </option>
                                                    <option value="1">Alta</option>
                                                    <option value="2">Baja</option>
                                                    <option value="3" <?php echo $tipoactivomodificar;?> >Modificación</option>
                                                </select>
                                            </div>
                                        </div>                                   
                                    </div>
                                    <div class="row" style="margin-top: 10px">
                                        <div class="col-12" style="text-align: left; padding: 0px 30px">
                                            <label>
                                                ¿Querés dejarnos un mensaje?
                                            </label>
                                            <div style="margin-top: 5px">
                                                <textarea class="form-control" name="message" style="width: 100%; height: 180px"></textarea>
                                            </div>
                                        </div>                                   
                                    </div>
                                    <div class="row" style="margin-top: 40px">
                                        <div class="col-6" style="text-align: center; padding: 0px 30px; padding-right: 15px">
                                            <a href="../">
                                                <button type="button" class='btn' style="background-color: #FFF; color: #23952E; font-weight: 500; font-size: 18px; border: 1px solid #23952E; width: 100%">
                                                    volver
                                                </button>
                                            </a>
                                        </div> 
                                        <div class="col-6" style="text-align: center; padding: 0px 30px; padding-left: 15px">
                                            <button type="submit" class='btn' style="background-color: #23952E; color: #FFFFFF; font-weight: 500; font-size: 18px; border: 1px solid #23952E; width: 100%">
                                                Enviar
                                            </button>
                                        </div>                                   
                                    </div> 
                                </form>                               
                            </div>                                                  
                        </div>                       
                    </div>
                   
                </div>
            </div>
       
        </div>           


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>