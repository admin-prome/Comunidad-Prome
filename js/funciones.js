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