// El script permitira extender grupos a partir de un grado seleccionado
/*global $*/
$(document).ready(function() {

    $('#jornada').on('change', function() {
        var jornadaId = $(this).val();
        var form = $('form');
        var data = form.serialize();
        if(jornadaId) {
            $.ajax({
                url: '/admin/cargarGrupos',
                type:"GET",
                data:data,
                dataType:"json",
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },

                success:function(data){
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
        else{
            $('#grado').empty();
            $('#grado').append('<option value="">Seleccione grado</option>');
        }

    });

});