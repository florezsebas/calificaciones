/*global $*/
function from_jornada_change()
{
    $('#grado').empty();
    $('#grado').append('<option value="">Seleccione grado</option>');
}

$(document).ready(function() {

    $('#jornada').on('change', function() {
        var jornadaId = $(this).val();
        var form = $('form');
        var data = form.serialize();
        if(jornadaId) {
            $.ajax({
                url: '/admin/gruposparagrupos',
                type:"GET",
                data:data,
                dataType:"json",
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },

                success:function(data){
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
            window.from_jornada_change()
    });

});