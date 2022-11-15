function seleccionarTipoBuscador(tipo){

    document.getElementById("div_buscadorcomercio").classList.remove("tabactivobuscador");
    document.getElementById("div_buscadorcomercio").classList.remove("tabinactivobuscador");

    document.getElementById("div_buscadorproduccion").classList.remove("tabactivobuscador");
    document.getElementById("div_buscadorproduccion").classList.remove("tabinactivobuscador");

    if (tipo=="div_buscadorcomercio"){
        document.getElementById("div_buscadorcomercio").classList.add("tabactivobuscador");
        document.getElementById("div_buscadorproduccion").classList.add("tabinactivobuscador");
    }else if (tipo=="div_buscadorproduccion"){
        document.getElementById("div_buscadorproduccion").classList.add("tabactivobuscador");
        document.getElementById("div_buscadorcomercio").classList.add("tabinactivobuscador");
    }
}


function procesarFormBusqueda(){
    document.getElementById("formBusqueda").submit();
}

function verfiltrosbusqueda(){
        
    var div_busquedaavanzada = document.getElementById('div_busquedaavanzada').style.display;
    if (div_busquedaavanzada==""){
        document.getElementById('div_municipios').style.display = "none";
        document.getElementById('div_busquedaavanzada').style.display = "none";
    }else{
        document.getElementById('div_municipios').style.display = "none";

        var checkCercaMio = document.getElementById('checkCercaMio').checked;
        if (checkCercaMio==true){
            document.getElementById('filtro_municipio').style.display = "none";
            document.getElementById('filtro_rubro').style.display = "";
            document.getElementById('filtro_actividad').style.display = "";            
        }else{
            document.getElementById('filtro_municipio').style.display = "";
            document.getElementById('filtro_rubro').style.display = "";
            document.getElementById('filtro_actividad').style.display = "";         
        }


        document.getElementById('div_busquedaavanzada').style.display = "";        
    }
}


function verfiltrosbusquedaindex(){
        
    var div_busquedaavanzada = document.getElementById('div_busquedaavanzada').style.display;
    if (div_busquedaavanzada==""){
        document.getElementById('div_busquedaavanzada').style.display = "none";
    }else{
        document.getElementById('div_busquedaavanzada').style.display = "";        
    }
}


function verfiltrosbusquedabuscador(){

    var checkCercaMio = document.getElementById('checkCercaMio').checked;
    if (checkCercaMio==false){
        document.getElementById('div_rubros').style.display = "none";

        var div_municipios = document.getElementById('div_municipios').style.display;
        if (div_municipios==""){
            document.getElementById('div_municipios').style.display = "none";
            document.getElementById('div_busquedaavanzada').style.display = "none";
        }else{
            document.getElementById('div_busquedaavanzada').style.display = "none";
            document.getElementById('div_municipios').style.display = "";      
        }        
    }else{
        document.getElementById('div_municipios').style.display = "none";

        var div_rubros = document.getElementById('div_rubros').style.display;
        if (div_rubros==""){
            document.getElementById('div_rubros').style.display = "none";
            document.getElementById('div_busquedaavanzada').style.display = "none";
        }else{
            document.getElementById('div_busquedaavanzada').style.display = "none";
            document.getElementById('div_rubros').style.display = "";      
        }   
    }

    /*
        
    var div_municipios = document.getElementById('div_municipios').style.display;
    if (div_municipios==""){
        document.getElementById('div_municipios').style.display = "none";
        document.getElementById('div_busquedaavanzada').style.display = "none";
    }else{
        document.getElementById('div_busquedaavanzada').style.display = "none";
        document.getElementById('div_municipios').style.display = "";      
    }

    */
}


function mostrarBuscadorMobile(){
        
    var tipovisualizacion = document.getElementById('tipovisualizacion').value;
    if (tipovisualizacion==""){ // Se cambia para lista

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

        
    }else{ // Se cambia para mapa

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

function refrescar(){
    procesarFormBusqueda();        
}


function btnCheckCercaMioIndex(){

    var checkCercaMio = document.getElementById('checkCercaMio').checked;
    if (checkCercaMio==true){

        document.getElementById('div_direccion').style.display = "";

        /*
        var actual_lat = document.getElementById('actual_lat').value;
        var actual_lon = document.getElementById('actual_lon').value;
        var actual_direccion = document.getElementById('div_direccion').value;

        window.location = "buscador.php?lat="+actual_lat+"&lon="+actual_lon+"&dir="+actual_direccion+"&tipodir=1";
*/
    }else{
        document.getElementById('div_direccion').style.display = "none";
  //      document.getElementById('div_direccion').style.display = "";
    }
}

function btnCheckCercaMio(){

    //procesarFormBusqueda();
    
    var checkCercaMio = document.getElementById('checkCercaMio').checked;
    if (checkCercaMio==true){
        var actual_lat = document.getElementById('actual_lat').value;
        var actual_lon = document.getElementById('actual_lon').value;
        var actual_direccion = document.getElementById('actual_direccion').value;

        window.location = "buscador.php?cercamio=on&lat="+actual_lat+"&lon="+actual_lon+"&dir="+actual_direccion+"&tipodir=1";

    }else{        
        document.getElementById('div_buscadordireccion').style.display = "none";
        
        document.getElementById('actual_lat').value = "";
        document.getElementById('actual_lon').value = "";
        document.getElementById('actual_direccion').value = "";
        document.getElementById('buscadordireccion').value = "";
        

        document.getElementById('lat').value = "";
        document.getElementById('lon').value = "";
        document.getElementById('dir').value = "";


    }

   
    
}


function cerrardetalle(){
    document.getElementById('div_detalle').style.display = "none";
    limpiarDivDetalle();

    var mobileclickcomercio = document.getElementById('mobileclickcomercio').value;

    if (mobileclickcomercio=="1"){
        document.getElementById('divComercios').style.display = "";
    }
    
}

function limpiarDivDetalle(){
    document.getElementById('div_detalle').style.display = "none";
    document.getElementById('det_logo').src = "";
    document.getElementById('det_nombre').innerHTML = "";
    document.getElementById('det_direccion').innerHTML = "";
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

function mostrarubicacion(latitud, longitud, nombre, direccion, whatsapp, telefono, web, email, instagram, distancia, cuentadni, urlicono, facebookurl, mobile){  

    limpiarDivDetalle();

    var cont = 0;

    document.getElementById('div_detalle').style.display = "";

    // 1:    
    document.getElementById('det_logo').src = urlicono;
    document.getElementById('det_nombre').innerHTML = nombre;
    document.getElementById('det_direccion').innerHTML = direccion;
    
    if (cuentadni=="1"){
        document.getElementById('det_dni').style.display = "";        
    }
    

    // 2:        
    if (whatsapp!=""){
        document.getElementById('det_div_whatsapp').style.display = "";
        document.getElementById('det_whatsapp').href = "https://api.whatsapp.com/send?phone="+whatsapp;

        cont = cont + 1;
    }
    

    if (telefono!=""){
        document.getElementById('det_div_tel').style.display = "";
        document.getElementById('det_tel').href = "tel:"+telefono;

        cont = cont + 1;
    }

    if (web!=""){
        document.getElementById('det_div_web').style.display = "";
        document.getElementById('det_web').href = web;

        cont = cont + 1;
    }    

    if (facebookurl!="" && cont < 4){
        document.getElementById('det_div_facebook').style.display = "";
        document.getElementById('det_facebook').href = facebookurl;

        cont = cont + 1;
    }

    if (instagram!="" && cont < 4){
        document.getElementById('det_div_instagram').style.display = "";
        document.getElementById('det_instagram').href = instagram;

        cont = cont + 1;
    }

    

    //3
    if (latitud!=""){
   
        document.getElementById('det2_div_direccion').style.display = "";
        document.getElementById('det2_div_direccionurl').href = "https://www.google.com.ar/maps/@"+latitud+","+longitud+",13z";
        document.getElementById('det2_div_direcciontexto').innerHTML = direccion+""+cuentadni;
    }


    if (telefono!=""){
        document.getElementById('det2_div_tel').style.display = "";
        document.getElementById('det2_div_telurl').href = "tel:"+telefono;
        document.getElementById('det2_div_teltexto').innerHTML = telefono;
    }
    
    if (email!=""){
        document.getElementById('det2_div_email').style.display = "";
        document.getElementById('det2_div_emailurl').href = "mailto:"+email;
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

    
    if (mobile=="1"){
        document.getElementById('divComercios2').style.display = "none";
        document.getElementById('mobileclickcomercio').value = "1";
        
    }

   

    if (latitud!="0"){

        if (distancia!=""){
            document.getElementById('det2_div_metros').innerHTML = distancia;
        }

        var cant = 0;
        map.eachLayer(function(layer){
            if (cant>0){
                if (latitud==layer._latlng.lat && longitud == layer._latlng.lng){
                    layer.openPopup();
                    map.setView([latitud, longitud], 15);
                }
            }

            cant = cant + 1;
        });
    }

}