$(document).ready(function(){

    $.validator.addMethod("regex", function(value, element, regexp) {
        var re = new RegExp(regexp);
        return this.optional(element) || re.test(value);
    }, "El formato es inválido.");
    $('input[name="Patente"]').on('input', function() {
        this.value = this.value.toUpperCase();
    });

    $("#form").validate({
        rules: {
            Patente: {
                required: true,
                regex: /^[A-Z]{3} \d{3}$|^[A-Z]{2} \d{3} [A-Z]{2}$/
            },
            NroDni: {
                required: true,
                regex: /^\d{8,10}$/
            }

        },
        messages: {
            Patente:{
                required: "Por favor ingrese la patente",
                regex: "La patente debe tener el formato 'ABC 123' o 'AB 123 CD'"
            },
            NroDni: {
                required: "Por favor ingrese el DNI",
                regex: "El DNI debe tener entre 8 y 10 dígitos numéricos"
            }
        }
    });


});