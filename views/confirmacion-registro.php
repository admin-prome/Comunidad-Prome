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
    <script type="text/javascript">
        <?php if ($tipoget == 1) { ?>
            window.open('https://www.provinciamicrocreditos.com.ar/comunidad-prome-alta/');
        <?php } ?>
    </script>
</head>

<body style="background-color: #F3F3F3">

    <div>
        <div class="container" style="background-color: #F3F3F3; opacity: 0.9; padding: 20px; padding-bottom: 50px; padding-top: 30px">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-1">
                        <h1 style="color: #23952E; text-align: center; font-weight: 600">
                            Comunidad Prome
                        </h1>
                        <h2 style="color: #4E4E4E; text-align: center; font-size: 24px">
                            Un espacio pensado para potenciar tu negocio.
                        </h2>
                    </div>
                </div>
                <div class="row" style="margin-top: 40px">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <div style="background-color: #FFFFFF; border-radius: 10px; padding: 15px ">
                            <div class="row" style="margin-top: 30px">
                                <div class="col-md-12" style="text-align: center; padding: 0px 30px">
                                    <div>
                                        <img src="../img/confirmacion.png" style="height: 140px" />
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 30px">
                                <div class="col-md-12" style="text-align: center; padding: 0px 30px">

                                    <?php if ($error != '') { ?>
                                        <p style="color: #C11120; text-align: center; font-weight: 600; font-size: 20px; margin-bottom: 0px">
                                            Error, el mensaje no se ha enviado.
                                        </p>
                                        <p style="color: #4E4E4E; text-align: center;">
                                            <?php echo $error ?>
                                        </p>
                                    <?php } else { ?>
                                        <p style="color: #23952E; text-align: center; font-weight: 600; font-size: 20px; margin-bottom: 0px">
                                            <?php echo $titulo; ?>
                                        </p>
                                        <p style="color: #4E4E4E; text-align: center;">
                                            <?php echo $subtitulo; ?>
                                        </p>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="margin-top: 50px">
                    <div class="row">
                        <div class="col-md-12" style="padding-right: 0px; text-align: center">
                            <a href="./" style="color: #23952E; text-decoration: none">
                                Volver al buscador
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>