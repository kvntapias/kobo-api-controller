$(document).ready(function() {
    console.log("Init Js Ready");

    $(".selectpicker").selectpicker("refresh").show();
});
  
var dttbl_lang = {
    "decimal": "",
    "emptyTable": "No hay información",
    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
    "infoPostFix": "",
    "thousands": ",",
    "lengthMenu": "Mostrar _MENU_ Entradas",
    "loadingRecords": "Cargando...",
    "processing": "Procesando...",
    "search": "Buscar:",
    "zeroRecords": "Sin resultados encontrados",
    "select": {
        rows: {
            _: "%d Fila(s) seleccionadas",
            0: ""
        }
    },
    "paginate": {
        "first": "Primero",
        "last": "Ultimo",
        "next": "Siguiente",
        "previous": "Anterior"
    }
};

const bootboxBtns = {
cancel: {
    label: '<i class="fa fa-times"></i> Cancelar'
},
confirm: {
    label: '<i class="fa fa-check"></i> Confirmar'
}
};
  
  
//CLEAR FORM ERRORS
function clearErrors(){
    $('.invalid-feedback').html("");
    $('.form-control').removeClass('is-invalid');
    $('.alert-danger').html("");
}

function isObject (item) {
    return (typeof item === "object" && !Array.isArray(item) && item !== null);
}
    
    
function dialog(message, time = 2000){
var dialog  = bootbox.dialog({
    message: message,
    closeButton: true
});

dialog.init(function(){
    setTimeout(function(){
        dialog.modal('hide');
    }, time);
});
}
    
function listar_errores_form(form_id, errores, modal = false){
var errorlist = '<ul style="color:red; list-style:none;">';             
$.each(errores, function(key, value){    
    $("#"+form_id+" #"+key+"").addClass('form-control is-invalid');
    $("#"+form_id+" #invalid-"+key).html(value).show();
    errorlist += '<li>'+value+'</li>';
});
errorlist += '</ul>'; 
$(""+form_id+" .invalid-feedback").css('display', 'block');

if (modal) {
    bootbox.dialog({
    title: 'Verifique los campos',
    message: errorlist
    });  
}
}
  
//INICIALIZAR SELECTOR DE FECHA
function selectorFecha(element_id = false, format = 'yyyy-mm-dd', autoclose = true, soloMesAño = false){
//Opciones por default
var optDatepicker = {
    format,
    language: 'es',
    autoclose
}

if (soloMesAño){
    optDatepicker = {
        format : 'yyyy-mm',
        language: 'es',
        autoclose,
        viewMode: "months", 
        minViewMode: "months"
    }
}
//Si es un solo elemento
if (element_id) {
    console.log("Selector fecha individual");
    $("#"+element_id).datepicker(optDatepicker);
}else{
    //Sino inicializar todos los que tengan la clase .dateSelector
    $('.dateSelector').each(function(){
    $(this).datepicker(optDatepicker);
    });
}
}

var coords;
function obtenerLocalizacion() {
    if ("geolocation" in navigator){ 
        navigator.geolocation.getCurrentPosition(function(position){ 
            coords = position.coords;
            if (coords) {
                dialog("Localización obtenida", 1000);
                //alert("Found your location nLat : "+coords.latitude+" nLang :"+ coords.longitude);
            }else{
                alert("No se pudo obtener la ubicación, verifique los servicios de geolocalización");
            }
        },
        function errorCallback(error) {
            alert("No se pudo obtener la ubicación, verifique los servicios de geolocalización: "+ error);
            console.log(error); 
        });
    }else{
        alert("Browser doesn't support geolocation!");
    }
    return coords;
}

function onlyNumberLetters(input){
    $(input).on('keyup blur keypress', function (e) {
        var raw_text =  jQuery(this).val();
        var return_text = raw_text.replace(/[^A-Z0-9]+/i,'');
        $(input).val(return_text);
    });
}

$(".onlyNumbers").bind('keypress keyup paste input', function (e) {
    this.value = this.value.replace(/\D/g,'');
});

$('.onlyAlpha').bind('keyup blur paste input',function(){ 
    var node = $(this);
    node.val(node.val().replace(/[^a-zA-Zà-úÀ-Ú ]/g,'') ); }
);


function show_hide_sub_input(element_id, show = true, required = true){
    if (show) {
        $("#"+element_id).show().attr("required", required).val("").parsley().reset();
    }else{
        $("#"+element_id).hide().attr("required", required).val("").parsley().reset();
    }
}

// Refrescar captcha
function refreshCaptcha(){
    var btn = $("#regen-captcha");
    var captcha = btn.prev('img');

    $.ajax({
        type: "GET",
        url: public_path+'ajax_regen_captcha',
    }).done(function( msg ) {
        captcha.attr('src', msg);
        $("#captcha").val("");
    }).fail(function(xhr, status, error){
        var message = JSON.parse(xhr.responseText);
        var err_text = xhr.status+"-"+message.message;
        alert('Ha ocurrido un error, intentalo nuevamente ('+err_text+")");
        console.log(err_text);
    })
}


// Incializar popovers/textos de ayuda en form
function triggerFormPopovers(){
    $(".form_popover_help").popover({ trigger: "hover focus" });
}


// Timepicker 24 
$(".timeSelector").datetimepicker({
    format : 'HH:mm'
});

$(document).ajaxStart(function() {
    $("#spinner_loading").show();
});
  
$(document).ajaxComplete(function() {
    $("#spinner_loading").hide();
});

$(document).ajaxSuccess(function() {
    $("#spinner_loading").hide();
});

function setSelectedMultipleValues(ids, input_id){
    $("#"+input_id).val(ids);
    $("#"+input_id).selectpicker('refresh');
}