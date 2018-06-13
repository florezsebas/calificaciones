/*global $*/

function clear() {
    $('#grupo').empty();
    $('#curso').empty();
}
    
function reveal() {
    var x = document.getElementById("acciones");
    x.style.visibility = "visible";
}

function hide() {
    var x = document.getElementById("acciones");
    x.style.visibility="hidden";
}

$(document).ready(function() {
    window.hide();
    
    $('#jornada').on('change', function() {
        var jornadaId = $(this).val();
        var form = $('form');
        var data = form.serialize();
        if(jornadaId) {
            $.ajax({
                url: '/docentes/cargarGrados',
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
            window.hide();
        }
    });
    
    $('#grado').on('change', function() {
        var gradoId = $(this).val();
        var form = $('form');
        var data = form.serialize();
        if(gradoId) {
            $.ajax({
                url: '/docentes/cargarGrupos',
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
            window.hide();
        }
    });

    $('#grupo').on('change', function() {
        var grupoId = $(this).val();
        var form = $('form');
        var data = form.serialize();
        if(grupoId) {
            $.ajax({
                url: '/docentes/cargarCursos',
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
            window.hide();
        }
    });


    $('#curso').on('change', function() {
        var cursoId = $(this).val();
        if(cursoId)
            window.reveal();
        else
            window.hide();
    });
});