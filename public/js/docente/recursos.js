/*global $*/

function clear() {
    $('#grupo').empty();
    $('#curso').empty();
}
    
$(document).ready(function() {
    
    $('#jornada').on('change', function() {
        var jornadaId = $(this).val();
        var form = $('form');
        var data = form.serialize();
        if(jornadaId) {
            $.ajax({
                url: '/docentes/recursos/cargar_grados',
                type:"GET",
                data:data,
                dataType:"json",
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },

                success:function(data) {
                    $('#grado').empty();
                    $('#grupo').empty();
                    $('#curso').empty();
                    $('#grado').append('<option value="">Seleccione grado</option>');

                    $.each(data, function(key, value) {

                        $('#grado').append('<option value="'+ key +'">' + value + '</option>');
                    });
                },

                complete: function() {
                    $('#loader').css("visibility", "hidden");
                }
            });
        } 
        else{
            $('#grado').empty();
            $('#grupo').empty();
            $('#curso').empty();
        }
    });
    
    $('#grado').on('change', function() {
        var gradoId = $(this).val();
        var form = $('form');
        var data = form.serialize();
        if(gradoId) {
            $.ajax({
                url: '/docentes/recursos/cargar_grupos',
                type:"GET",
                data:data,
                dataType:"json",
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },

                success:function(data) {
                    $('#grupo').empty();
                    $('#grupo').append('<option value="">Seleccione grupo</option>');

                    $.each(data, function(key, value) {

                        $('#grupo').append('<option value="'+ key +'">' + value + '</option>');

                    });
                },

                complete: function() {
                    $('#loader').css("visibility", "hidden");
                }
            });
        } 
        else{
            window.clear();
        }
    });

    $('#grupo').on('change', function() {
        var grupoId = $(this).val();
        var form = $('form');
        var data = form.serialize();
        if(grupoId) {
            $.ajax({
                url: '/docentes/recursos/cargar_cursos',
                type:"GET",
                data:data,
                dataType:"json",
                beforeSend: function() {
                    $('#loader').css("visibility", "visible");
                },

                success:function(data) {
                    $('#curso').empty();
                    $('#curso').append('<option value="">Seleccione curso</option>');

                    $.each(data, function(key, value) {

                        $('#curso').append('<option value="'+ key +'">' + value + '</option>');

                    });
                },

                complete: function() {
                    $('#loader').css("visibility", "hidden");
                }
            });
        }
        else{
            $('#curso').empty();

        }
    });

});