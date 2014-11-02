var cargando = '<div class="text-center" style="padding: 2em 0"><i class="icon-spinner icon-spin blue bigger-125"></i></div>';
var buscador = '<form class="form-search"><span class="input-icon"><input type="text" id="search" class="nav-search-input" name="search" autocomplete="off" placeholder="Buscar..." /><i class="icon-search nav-search-icon"></i></span><button type="submit" id="LoadRecordsButton" class="hide"></button></form>';

//validar vacios
$(function () {
    $.fn.required = function () {
        if ($(this).val() == '') {
            $(this).addClass('required');
            $(this).focus();
            return false;
        } else {
            $(this).removeClass('required');
            $('#msg').html('');
            return true;
        }
    };
});

//validar solo letras
var soloLetras = function (e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = [8, 9, 37, 39, 46];
    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }
    if (letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
}

//validar solo numeros
function soloNumeros(evt) {
    evt = (evt) ? evt : event; //Validar la existencia del objeto event
    var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : ((evt.which) ? evt.which : 0)); //Extraer el codigo del caracter de uno de los diferentes grupos de codigos
    var respuesta = true; //Predefinir como valido
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        respuesta = false;
    }
    return respuesta;
}

//validar numero telefonico
function numeroTelefonico(evt) {
    evt = (evt) ? evt : event; //Validar la existencia del objeto event
    var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : ((evt.which) ? evt.which : 0));
    var respuesta = true; //Predefinir como valido
    if (charCode > 31 && (charCode < 48 || charCode > 57) && (charCode != 42 && charCode != 35 && charCode != 32 && charCode != 40 && charCode != 41 && charCode != 45)) {
        respuesta = false;
    }
    return respuesta;
}

function dosDecimales(evt, control) {
    //Limita un control a números con dos decimales.
    var texto = control.value;
    var punto = texto.indexOf('.');

    if (evt.keyCode <= 13 || (evt.keyCode >= 48 && evt.keyCode <= 57)) {
        if ((punto != -1) && (texto.length - (punto + 1)) >= 2) {
            return false;
        }
    }
    else if (evt.keyCode == 46 && texto.length >= 1) {
        if (punto != -1 && texto.indexOf('.', punto) != -1) {
            return false;
        }
    } else {
        return false;
    }
    return true;
}
var mensajes_validador = function (data) {
    var div_mensaje = $(".mensajes_validador");

    if (data != '') {
        var mensaje = '<div class="alert alert-block alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>';
        for (var property in data) {
            mensaje += '- ' + data[property] + '<br/>';
        }
        mensaje += '</div>';
        div_mensaje.html(mensaje);
    }
}

var limpiar_validaciones = function () {
    $(".mensajes_validador").html('');
}

$("#cartelera-avatar").click(function () {
    console.log("click");
})

var viewMessage = function (messages) {
    var html = '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="im-cancel alert-icon s24"></i>';
    html += '<strong>Hubierón estos errores</strong>';
    var errores = "";
    for (var item in messages) {
        errores += '<li>' + messages[item] + "</li>";
    }
    html += errores;
    $(".error_message").addClass('alert alert-danger fade in');
    $(".error_message").html(html);
}

function saltar(me, e, t) {
    var k = null;
    (e.keyCode) ? k = e.keyCode : k = e.which;
    if (k == 13 && me.value != '') document.getElementById(t).focus();
}
