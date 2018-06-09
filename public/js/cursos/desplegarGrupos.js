// El script permitira extender grupos a partir de un grado seleccionado
/*global $*/
    $(document).ready(function() {
    $('#grado').on('change', function() {
        var gradoId = $(this).val();
        var form = $('form');
        var data = form.serialize();
        if(gradoId) {
            $.ajax({
                url: '/admin/empty',
                type:"GET",
                data:data,
                dataType:"json",
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },

                success:function(data) {
                    $('#grupo').empty();

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
        }

    });

});