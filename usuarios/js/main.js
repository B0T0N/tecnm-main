$(dame_datos());

function dame_datos(consulta) {
    $.ajax({
        url: 'buscar.php',
        type: 'POST',
        dataType: 'html',
        data: {consulta: consulta},
    })
    .done(function(respuesta) {
        $("#datos").html(respuesta);
    })
    .fail(function () {
        console.log("FAllIDO");
    })

}


$(document).on('keyup', '#caja_busqueda', function() {
    var valor = $(this).val();
    if(valor != ""){
        dame_datos(valor);
    } else {
        dame_datos();
    }
});