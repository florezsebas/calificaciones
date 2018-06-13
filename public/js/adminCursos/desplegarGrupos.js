/*global $*/
$(document).ready(function() {
    
    $('#jornada').on('change', function() {
        var jornadaId = $(this).val();
        var form = $('form');
        var data = form.serialize();
        if(jornadaId){

            $.ajax({
                url: '/admin/cargarGrados',
                type:"GET",
                data:data,
                dataType:"json",
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },

                success:function(data) {
                    $('#grado').empty();
                    $('#grado').append('<option value="">Seleccione grado</option>');
                    $.each(data, function(key, value){

                        $('#grado').append('<option value="'+ key +'">' + value + '</option>');

                    });
                },
                complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
            });
        } 
        else {
            $('#grado').empty();
            $('#grupo').empty();
            $('#grado').append('<option value="">Seleccione grado</option>');
            $('#grupo').append('<option value="">Seleccione grupo</option>');
        }

    });


    $('#grado').on('change', function() {
        var gradoId = $(this).val();
        var form = $('form');
        var data = form.serialize();
        if(gradoId){

            $.ajax({
                url: '/admin/cargarGrupos2',
                type:"GET",
                data:data,
                dataType:"json",
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },

                success:function(data) {
                    $('#grupo').empty();
                    $('#grupo').append('<option value="">Seleccione grupo</option>');
                    $.each(data, function(key, value){

                        $('#grupo').append('<option value="'+ key +'">' + value + '</option>');

                    });
                },
                complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
            });
        } 
        else {
            $('#grupo').empty();
            $('#grupo').append('<option value="">Seleccione grupo</option>');
        }

    });

});