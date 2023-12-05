function seleccionarTipoBuscador(tipo) {

    document.getElementById("div_buscadorcomercio").classList.remove("tab-active");
    document.getElementById("div_buscadorcomercio").classList.remove("tab-inactive");

    document.getElementById("div_buscadorproduccion").classList.remove("tab-active");
    document.getElementById("div_buscadorproduccion").classList.remove("tab-inactive");

    if (tipo == "div_buscadorcomercio") {
        document.getElementById("div_buscadorcomercio").classList.add("tab-active");
        document.getElementById("div_buscadorproduccion").classList.add("tab-inactive");
    } else if (tipo == "div_buscadorproduccion") {
        document.getElementById("div_buscadorproduccion").classList.add("tab-active");
        document.getElementById("div_buscadorcomercio").classList.add("tab-inactive");
    }
}


function procesarFormBusqueda() {

    var checkCercaMio = document.getElementById('checkCercaMio').checked;
    var type_on = document.getElementById('type_on').value;

    if (checkCercaMio == true && type_on == 'on') {
        if (document.getElementById("buscadordireccion").value != '') {
            var lon = document.getElementById('lon').value;
            var lat = document.getElementById('lat').value;
            var dir = document.getElementById('dir').value;
            if (lon == '' && lat == '' && dir == '') {
                alert("Si ingresa una direcci\u00f3n, debe seleccionarla del desplegable para activar la b\u00fasqueda.");
                document.getElementById("buscadordireccion").value = '';
                return false
            }

        }
        // map.setView([lat, lon], 18);
        // map.setZoom(18);
        // console.log("zoooooom");
    }
    // console.log("estoy en procesarFormBusqueda");

    document.getElementById("formBusqueda").submit();
    // console.log("despues del submit");
}

function verfiltrosbusquedaindex() {

    var div_busquedaavanzada = document.getElementById('div_busquedaavanzada').style.display;
    if (div_busquedaavanzada == "") {
        document.getElementById('div_busquedaavanzada').style.display = "none";
    } else {
        document.getElementById('div_busquedaavanzada').style.display = "";
    }
}

function verfiltrosbusquedabuscador() {

    var checkCercaMio = document.getElementById('checkCercaMio').checked;

    if (checkCercaMio == false) {
        document.getElementById('div_rubros').style.display = "none";

        var div_municipios = document.getElementById('div_municipios').style.display;
        
        if (div_municipios == "") {
            document.getElementById('div_municipios').style.display = "none";
        } else {
            document.getElementById('div_municipios').style.display = "";
        }
    } else {
        document.getElementById('div_municipios').style.display = "none";

        var div_rubros = document.getElementById('div_rubros').style.display;
        
        if (div_rubros == "") {
            document.getElementById('div_rubros').style.display = "none";
        } else {
            document.getElementById('div_rubros').style.display = "";
        }
    }

    //ACTUALIZA TANIO DE MAPA
    map.invalidateSize();
}


function mostrarBuscadorMobile() {
    cerrardetalle();
    var tipovisualizacion = document.getElementById('tipovisualizacion').value;
    if (tipovisualizacion == "") { // Se cambia para lista

        document.getElementById('tipovisualizacion').value = "lista";

        // Oculto lista de resultados para arriba del mapa
        var divComercios2 = document.getElementById("divComercios2");
        var elemento = divComercios2.style.setProperty("display", "none", "important")

        // Muestro el listado de comercios en forma de lista
        document.getElementById("divComercios").style.setProperty("display", "inline", "important")

        // El titulo flotante lo cambio para Mapa
        document.getElementById('tituloBotonFlotante').innerHTML = "Mapa";

        // El icono de Lista lo oculto y muestro el del mapa.
        document.getElementById('iconListaResultado').style.display = "none";
        document.getElementById('iconMapaResultado').style.display = "";

        // Oculto el mapa
        document.getElementById('div_mapa').style.display = "none";


    } else { // Se cambia para mapa

        document.getElementById('tipovisualizacion').value = "";

        // Muestro lista de resultados para arriba del mapa
        var divComercios2 = document.getElementById("divComercios2");
        var elemento = divComercios2.style.setProperty("display", "none", "important")

        // Oculto el listado de comercios en forma de lista
        document.getElementById('divComercios').style.display = "none";

        // El titulo flotante lo cambio para Lista
        document.getElementById('tituloBotonFlotante').innerHTML = "Lista";

        // El icono de Lista lo muestro y oculto el del mapa.
        document.getElementById('iconListaResultado').style.display = "";
        document.getElementById('iconMapaResultado').style.display = "none";

        // Muestro el mapa
        document.getElementById('div_mapa').style.display = "";

        document.getElementById('tipovisualizacion').value = "";
        document.getElementById('divComercios').style.display = "inline";

        var divComercios2 = document.getElementById("divComercios2");
        var elemento = divComercios2.style.setProperty("display", "inline", "important")

        /*
        //  document.getElementById('divComercios2').style.display = "none";
        document.getElementById('tituloBotonFlotante').innerHTML = "Mapa";
        document.getElementById('iconListaResultado').style.display = "none";
        document.getElementById('iconMapaResultado').style.display = "";
        document.getElementById('div_mapa').style.display = "none";
        */

    }
}

function refrescar() {
    procesarFormBusqueda();
}


function btnCheckCercaMioIndex() {

    var checkCercaMio = document.getElementById('checkCercaMio').checked;
    // console.log("entre a la funcion de index");
    if (checkCercaMio == true) {

        document.getElementById('div_direccion').style.display = "";
        document.getElementById('buscadordireccion').value = document.getElementById('actual_direccion').value;

        // var actual_lat = document.getElementById('actual_lat').value;
        // var actual_lon = document.getElementById('actual_lon').value;
        // var actual_direccion = document.getElementById('div_direccion').value;

        //window.location = "buscador.php?lat="+actual_lat+"&lon="+actual_lon+"&dir="+actual_direccion+"&tipodir=1";

        // console.log("entre al if");
        // map.setView([actual_lat, actual_lon], 18);
    } else {
        document.getElementById('div_direccion').style.display = "none";
        //      document.getElementById('div_direccion').style.display = "";
        document.getElementById('lat').value = "";
        document.getElementById('lon').value = "";
        document.getElementById('dir').value = "";
        document.getElementById('buscadordireccion').value = "";
    }
}

function btnCheckCercaMio() {

    //procesarFormBusqueda();

    var checkCercaMio = document.getElementById('checkCercaMio').checked;

    if (checkCercaMio == true) {
        var actual_lat = document.getElementById('actual_lat').value;
        var actual_lon = document.getElementById('actual_lon').value;
        var actual_direccion = document.getElementById('actual_direccion').value;

        //window.location = "buscador.php?cercamio=on&lat="+actual_lat+"&lon="+actual_lon+"&dir="+actual_direccion+"&tipodir=1";
        document.getElementById('div_buscadordireccion').style.display = "";
        console.log("cerca mio checked");
        document.getElementById('actual_lat').value = actual_lat;
        document.getElementById('actual_lon').value = actual_lon;
        document.getElementById('actual_direccion').value = actual_direccion;
        document.getElementById('buscadordireccion').value = actual_direccion;


        document.getElementById('filtro_municipio').style.display = "none";
        document.getElementById('filtro_rubro').style.display = "";
        document.getElementById('filtro_actividad').style.display = "";
        // map.invalidateSize();
        // map.setView([actual_lat, actual_lon], 18);
        // console.log("btnCheckCercaMio");

    } else {
        document.getElementById('div_buscadordireccion').style.display = "none";
        /*
        document.getElementById('actual_lat').value = "";
        document.getElementById('actual_lon').value = "";
        document.getElementById('actual_direccion').value = "";
        document.getElementById('buscadordireccion').value = "";
        */
        document.getElementById('lat').value = "";
        document.getElementById('lon').value = "";
        document.getElementById('dir').value = "";

        document.getElementById('filtro_municipio').style.display = "";
        document.getElementById('filtro_rubro').style.display = "";
        document.getElementById('filtro_actividad').style.display = "";
    }

    //ACTUALIZA TANIO DE MAPA
    map.invalidateSize();
}


function cerrardetalle() {
    document.getElementById('div_detalle').style.display = "none";
    limpiarDivDetalle();

    var mobileclickcomercio = document.getElementById('mobileclickcomercio').value;

    if (mobileclickcomercio == "1") {
        document.getElementById('divComercios').style.display = "inline !important";
    }
}

function limpiarDivDetalle() {
    document.getElementById('div_detalle').style.display = "none";
    document.getElementById('det_logo').src = "";
    document.getElementById('det_nombre').innerHTML = "";
    document.getElementById('det_id').value = "";
    document.getElementById('det_direccionCompleta').innerHTML = "";
    document.getElementById('det_dni').style.display = "none";
    document.getElementById('det_div_whatsapp').style.display = "none";
    document.getElementById('det_whatsapp').href = "";

    document.getElementById('det_div_tel').style.display = "none";
    document.getElementById('det_tel').href = "";

    document.getElementById('det_div_web').style.display = "none";
    document.getElementById('det_web').href = "";

    document.getElementById('det_div_facebook').style.display = "none";
    document.getElementById('det_facebook').href = "";

    document.getElementById('det_div_instagram').style.display = "none";
    document.getElementById('det_instagram').href = "";

    document.getElementById('det2_div_direccion').style.display = "none";
    document.getElementById('det2_div_direccionurl').href = "";
    document.getElementById('det2_div_direcciontexto').innerHTML = "";

    document.getElementById('det2_div_tel').style.display = "none";
    document.getElementById('det2_div_telurl').href = "";
    document.getElementById('det2_div_teltexto').innerHTML = "";

    document.getElementById('det2_div_email').style.display = "none";
    document.getElementById('det2_div_emailurl').href = "";
    document.getElementById('det2_div_emailtexto').innerHTML = "";

    /*
    document.getElementById('det2_div_instagram').style.display = "none";
    document.getElementById('det2_div_instagramurl').href = "";
    document.getElementById('det2_div_instagramtexto').innerHTML = ""

    document.getElementById('det2_div_facebook').style.display = "none";
    document.getElementById('det2_div_facebookurl').href = "";
    document.getElementById('det2_div_facebooktexto').innerHTML = ""
    */

    document.getElementById('det2_div_metros').innerHTML = "";
}

function limpiarDireccion() {
    document.getElementById('buscadordireccion').value = "";
    document.getElementById('lon').value = "";
    document.getElementById('lat').value = "";
    document.getElementById('dir').value = "";
    document.getElementById('type_on').value = "on";
}

function mostrarubicacion(latitud, longitud, nombre, direccionCompleta, whatsapp, whatsapp_msg, telefono, web, email, instagram, distancia, cuentadni, urlicono, facebookurl, mobile, id) {

    limpiarDivDetalle();

    var cont = 0;
    var last = '';
    var text = '';

    document.getElementById('div_detalle').style.display = "";

    //MUEVE EL DIV LISTADO HACIA ARRIBA
    window.scroll(0, 0);
    document.getElementById('divComercios').scroll(0, 0);

    // 1:    
    document.getElementById('det_logo').src = urlicono;
    document.getElementById('det_nombre').innerHTML = nombre;
    document.getElementById('det_id').value = id;
    document.getElementById('det_direccionCompleta').innerHTML = direccionCompleta;

    //DETALLE PARA COMPARTIR
    text = nombre + "\n";
    if (direccionCompleta != '') {
        text = text + direccionCompleta + "\n";
    }
    if (whatsapp != '') {
        text = text + whatsapp + "\n";
    }
    if (web != '') {
        text = text + web + "\n";
    }
    if (facebookurl != '') {
        text = text + facebookurl + "\n";
    }
    if (instagram != '') {
        text = text + instagram + "\n";
    }
    if (email != '') {
        text = text + email + "\n";
    }

    document.getElementById('det_detalle').value = text;
    //FIN DETALLE PARA COMPARTIR

    if (cuentadni == "1") {
        document.getElementById('det_dni').style.display = "";
    }

    // 2:        
    if (whatsapp != "") {
        document.getElementById('det_div_whatsapp').style.display = "";
        document.getElementById('det_whatsapp').href = "https://api.whatsapp.com/send?phone=" + whatsapp + "&text=" + whatsapp_msg;

        cont = cont + 1;
        last = 'det_div_whatsapp';
    }

    if (telefono != "") {
        document.getElementById('det_div_tel').style.display = "";
        document.getElementById('det_tel').href = "tel:" + telefono;

        cont = cont + 1;
        last = 'det_div_tel';
    }

    if (web != "") {
        document.getElementById('det_div_web').style.display = "";
        document.getElementById('det_web').href = web;

        cont = cont + 1;
        last = 'det_div_web';
    }

    if (facebookurl != "" && cont < 4) {
        document.getElementById('det_div_facebook').style.display = "";
        document.getElementById('det_facebook').href = facebookurl;

        cont = cont + 1;
        last = 'det_div_facebook';
    }

    if (instagram != "" && cont < 4) {
        document.getElementById('det_div_instagram').style.display = "";
        document.getElementById('det_instagram').href = instagram;

        cont = cont + 1;
        last = 'det_div_instagram';
    }

    if (cont == 4) {
        if ($('#det_div_compartir').is(':visible')) {
            //SOLO OSULTA SI HAY 4 ICONOS Y COMPARTIR ES VISIBLE PORQUE ES CELULAR
            document.getElementById(last).style.display = "none";
        }
    }

    //3
    if (latitud != "") {
        document.getElementById('det2_div_direccion').style.display = "";
        document.getElementById('det2_div_direccionurl').href = "https://www.google.com.ar/maps/@" + latitud + "," + longitud + ",13z";
        document.getElementById('det2_div_direcciontexto').innerHTML = direccionCompleta;
    }


    if (telefono != "") {
        document.getElementById('det2_div_tel').style.display = "";
        document.getElementById('det2_div_telurl').href = "tel:" + telefono;
        document.getElementById('det2_div_teltexto').innerHTML = telefono;
    }

    if (email != "") {
        document.getElementById('det2_div_email').style.display = "";
        document.getElementById('det2_div_emailurl').href = "mailto:" + email;
        document.getElementById('det2_div_emailtexto').innerHTML = email;
    }

    /* if (instagram!=""){
        document.getElementById('det2_div_instagram').style.display = "";
        document.getElementById('det2_div_instagramurl').href = "https://www.instagram.com/"+instagram;
        document.getElementById('det2_div_instagramtexto').innerHTML = "@"+instagram;
    }

    if (facebookurl!=""){
        document.getElementById('det2_div_facebook').style.display = "";
        document.getElementById('det2_div_facebookurl').href = facebookurl;
        document.getElementById('det2_div_facebooktexto').innerHTML = facebooknombre;
    } */


    if (mobile == "1") {
        document.getElementById('divComercios2').style.display = "none";
        document.getElementById('mobileclickcomercio').value = "1";
    }


    if (latitud != "0") {

        if (distancia != "") {
            document.getElementById('det2_div_metros').innerHTML = distancia;
        }

        var cant = 0;
        map.eachLayer(function (layer) {
            if (cant > 0) {
                if (latitud == layer._latlng.lat && longitud == layer._latlng.lng) {
                    layer.openPopup();
                    map.setView([latitud, longitud], 15);

                }
            }

            cant = cant + 1;
        });


        var checkCercaMio = document.getElementById('checkCercaMio').checked;
        // console.log("checkCercaMio", checkCercaMio);
        // if (checkCercaMio == true) {
        //     map.setZoom(18);
        // }

        // if (checkCercaMio == true && type_on == 'on') {
        //     console.log("hola");
        // }

    }
}