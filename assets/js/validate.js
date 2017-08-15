$(document).ready(function(){
    $('#cliente').validate({
        ignore: '*:not([name])',
        rules: {
            email: "required"
        },
        messages: {
            email: {
                required: "<span alert='danger' role='alert'>"+"Digite o e-mail válido!"+"</span>"
            }
        }
    });

    $('#valid').click(function(){
        $('#cliente').valid();
    });
});