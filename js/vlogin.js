var letras = /^([a-zA-Z ñàèìòù]{3,25})$/i;

function validar() {
    var nombre = $("#inputusuario").val(),
        pwd = $("#inputpwd").val();

    if (nombre == "") {
        document.formulario.inputusuario.focus();
        $("#mensaje1").fadeIn();
        return false;
    } else if (nombre.length < 3) {
        $("#mensaje1").fadeOut();
        document.formulario.inputusuario.focus();
        $("#mensaje2").fadeIn();
        return false;
    } else if (!letras.test(nombre)) {
        $("#mensaje2").fadeOut();
        document.formulario.inputusuario.focus();
        $("#mensaje3").fadeIn();
        return false;
    }else if ( pwd == "" ) {
        document.formulario.inputpwd.focus();
        $("#mensaje4").fadeIn();
        return false;
    }else{
        document.formulario.submit();
    }
}


//      Revisar datos contenidos en el campo usuario
function checaMensaje(valor){
    var dato  = valor;

    if ( dato != "" ) {
        $("#mensaje1").fadeOut();
    }
    if ( dato.length >= 3 ) {
        $("#mensaje2").fadeOut();
    }
    if ( letras.test(dato) ) { 
        $("#mensaje3").fadeOut();
    }
}

//      Revisar datos contenidos en el campo pwd

function checaMensaje2(valor){
    var dato = valor;

    if ( dato != "" ){
        $("#mensaje4").fadeOut();
    }
}
