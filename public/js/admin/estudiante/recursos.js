/*global $*/
function from_jornada_change()
{
    $('#grado').empty();
    $('#grupo').empty();
    $('#grado').append('<option value="">Seleccione grado</option>');
    $('#grupo').append('<option value="">Seleccione grupo</option>');
}

function from_grado_change()
{
    $('#grupo').empty();
    $('#grupo').append('<option value="">Seleccione grupo</option>');
}

$(document).ready(function() {
    
    $('#jornada').on('change', function() {
        var jornadaId = $(this).val();
        var form = $('form');
        var data = form.serialize();
        if(jornadaId){
            $.ajax({
                url: '/admin/gradosparaestudiante',
                type:"GET",
                data:data,
                dataType:"json",
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },

                success:function(data) {
                    window.from_jornada_change();
                    $.each(data, function(key, value){

                        $('#grado').append('<option value="'+ key +'">' + value + '</option>');

                    });
                },
                complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
            });
        } 
        else
            window.from_jornada_change();

    });


    $('#grado').on('change', function() {
        var gradoId = $(this).val();
        var form = $('form');
        var data = form.serialize();
        if(gradoId){
            $.ajax({
                url: '/admin/gruposparaestudiante',
                type:"GET",
                data:data,
                dataType:"json",
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },

                success:function(data) {
                    window.from_grado_change();
                    $.each(data, function(key, value){

                        $('#grupo').append('<option value="'+ key +'">' + value + '</option>');

                    });
                },
                complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
            });
        } 
        else
            window.from_grado_change();

    });

});