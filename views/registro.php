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
    <link rel="stylesheet" href="../css/style.css">
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

<body style="background-color: #F3F3F3">

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K2BDTBJ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    
    <div>
        <div class="container" style="background-color: #F3F3F3; opacity: 0.9; padding: 20px; padding-bottom: 50px; padding-top: 30px">
            <div class="container">
                <div class="row">
                    <div class="col-md-1 ">
                    </div>
                    <div class="col-md-10 ">
                        <h1 style="color: #23952E; text-align: center; font-weight: 600">
                            Comunidad Prome
                        </h1>
                        <h2 style="color: #4E4E4E; text-align: center; font-size: 24px">
                            Un espacio pensado para potenciar tu negocio.
                        </h2>
                    </div>
                </div>
                <div class="row" style="margin-top: 20px">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6">
                        <div style="background-color: #FFFFFF; border-radius: 10px; padding: 15px ">
                            <form method="POST" id="formRegistro" name="formRegistro" action="confirmacion-registro.php">
                                <div class="row" style="margin-top: 10px">
                                    <div class="col-md-12" style="text-align: left; padding: 0px 30px">
                                        <div>
                                            <h3 style="font-size: 16px">
                                                <?php echo $tituloFormulario; ?>
                                            </h3>
                                        </div>
                                        <div id="mensajeprocesar"></div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 10px">
                                    <div class="col-md-8" style="text-align: left; padding: 0px 30px">
                                        <label>
                                            DNI del titular
                                        </label>
                                        <div style="margin-top: 5px">
                                            <input type="text" class="form-control" placeholder="Sin guiones ni puntos" name="document" id="document" required="required" autocomplete="off" maxlength="11" onkeypress="return validaNumero(event);">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 10px;<?php echo $displaytiporamite; ?>">
                                    <div class="col-md-8" style="text-align: left; padding: 0px 30px">
                                        <label>
                                            Tipo de trámite
                                        </label>
                                        <div style="margin-top: 5px">
                                            <select class="form-control" required="required" name="tipo" id="tipo">
                                                <option value="">
                                                    Seleccioná el tipo de gestión
                                                </option>
                                                <option value="1" <?php echo $tipoactivoalta; ?>>Alta</option>
                                                <option value="2">Baja</option>
                                                <option value="3" <?php echo $tipoactivomodificar; ?>>Modificación</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 10px">
                                    <div class="col-md-12" style="text-align: left; padding: 0px 30px">
                                        <label>
                                            ¿Querés dejarnos un mensaje?
                                        </label>
                                        <div style="margin-top: 5px">
                                            <textarea class="form-control" id="message" name="message" style="width: 100%; height: 180px"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 40px">
                                    <div class="col-md-6 col-sm-6 col-6" style="text-align: center; padding: 0px 30px; padding-right: 15px">
                                        <a href="./">
                                            <button type="button" class='btn' style="background-color: #FFF; color: #23952E; font-weight: 500; font-size: 18px; border: 1px solid #23952E; width: 100%">
                                                Volver
                                            </button>
                                        </a>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-6" style="text-align: center; padding: 0px 30px; padding-left: 15px">
                                        <button type="button" id="btnRegistro" class='btn' style="background-color: #23952E; color: #FFFFFF; font-weight: 500; font-size: 18px; border: 1px solid #23952E; width: 100%">
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on("click", "#btnRegistro", function() {
                var documento = jQuery('#document').val();
                var tipo = jQuery('#tipo').val();
                var message = jQuery('#message').val();

                $("#btnRegistro").prop("disabled", true);

                if (documento == "") {
                    $("#mensajeprocesar").html("<div class='alert alert-info' role='alert'>El DNI es obligatorio.</div> ");
                    $("#btnRegistro").prop("disabled", false);
                    return false;
                }

                $("#mensajeprocesar").html("<div class='alert alert-info' role='alert'>Por favor, espere...</div> ");

                $.ajax({
                    url: "verificar-registro.php",
                    type: "POST",
                    cache: false,
                    data: {
                        documento: documento,
                        tipo: tipo,
                        message: message
                    },
                    success: function(data) {
                        if (data == "true") {
                            //if (tipo=="1"){
                            //SE ABRE EN confirmacion-registro.php
                            //window.open('https://www.provinciamicrocreditos.com.ar/comunidad-prome-alta/');
                            //}

                            window.location = "confirmacion-registro.php?" + $("#formRegistro").serialize();
                            /*
                            $("#mensajeprocesar").html("<div class='alert alert-success' role='alert'><a href='https://www.provinciamicrocreditos.com.ar/comunidad-prome-alta/' style='text-decoration: none; color: #000000' target='_blank'>Por favor completar la solicitud en la ventana que se le abrió o haz click aquí</a></div>");
                            */
                            //document.getElementById('formRegistro').submit();
                        } else {
                            $("#mensajeprocesar").html("<div class='alert <?php echo $colorAlerta; ?>' role='alert'><?php echo $alerta; ?></div> ");
                            $("#btnRegistro").prop("disabled", false);
                        }
                    }
                });
            });
        });


        function validaNumero(evt) {

            // code is the decimal ASCII representation of the pressed key.
            var code = (evt.which) ? evt.which : evt.keyCode;

            if (code == 8) { // backspace.
                return true;
            } else if (code >= 48 && code <= 57) { // is a number.
                return true;
            } else { // other keys.
                return false;
            }
        }
    </script>

</body>

</html>