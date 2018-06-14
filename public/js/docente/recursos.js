/*global $*/
function formateo_por_jornada() {
    $('#grado').empty(); $('#grupo').empty(); $('#curso').empty();

    $('#grado').append('<option value="">Seleccione grado</option>');
    $('#grupo').append('<option value="">Seleccione grupo</option>');
    $('#curso').append('<option value="">Seleccione curso</option>');
}

function formateo_por_grado() {
    $('#grupo').empty(); $('#curso').empty();

    $('#grupo').append('<option value="">Seleccione grupo</option>');
    $('#curso').append('<option value="">Seleccione curso</option>');
}

function formateo_por_grupo() {
    $('#curso').empty();

    $('#curso').append('<option value="">Seleccione curso</option>');
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
                    window.formateo_por_jornada();
                    $.each(data, function(key, value) {
                        $('#grado').append('<option value="'+ key +'">' + value + '</option>');
                    });
                },

                complete: function() {
                    $('#loader').css("visibility", "hidden");
                }
            });
        } 
        else
            window.formateo_por_jornada();
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
                    window.formateo_por_grado();
                    $.each(data, function(key, value) {
                        $('#grupo').append('<option value="'+ key +'">' + value + '</option>');
                    });
                },

                complete: function() {
                    $('#loader').css("visibility", "hidden");
                }
            });
        } 
        else
            window.formateo_por_grado();
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
                    window.formateo_por_grupo();
                    $.each(data, function(key, value) {
                        $('#curso').append('<option value="'+ key +'">' + value + '</option>');
                    });
                },

                complete: function() {
                    $('#loader').css("visibility", "hidden");
                }
            });
        }
        else
            window.formateo_por_grupo();
    });

});