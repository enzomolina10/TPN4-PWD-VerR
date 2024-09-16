$(document).ready(function () {
  $.validator.addMethod(
    "regex",
    function (value, element, regexp) {
      var re = new RegExp(regexp);
      return this.optional(element) || re.test(value);
    },
    "Por favor, ingrese un valor válido."
  );
  $('input[name="Patente"]').on("input", function () {
    this.value = this.value.toUpperCase();
  });
  $("#form").validate({
    rules: {
      DniDuenio: {
        required: true,
        regex: /^\d{8,10}$/,
      },
      Patente: {
        required: true,
        regex: /^[A-Z]{3} \d{3}$|^[A-Z]{2} \d{3} [A-Z]{2}$/,
      },
      Marca: {
        required: true,
        minlenght: 2,
        maxlenght: 50,
      },
      Modelo: {
        required: true,
        minlenght: 2,
        maxlenght: 4,
      },
    },
    messages: {
      DniDuenio: {
        required: "Por favor ingrese el DNI del dueño",
        regex: "El DNI debe tener entre 8 y 10 dígitos numéricos.",
      },
      Patente: {
        required: "Por favor ingrese la patente",
        regex: "La patente debe tener el formato 'ABC 123' o 'AB 123 CD'",
      },
      Marca: {
        required: "Por favor ingrese la marca",
        minlenght: "La marca debe tener al menos 2 caracteres",
        maxlenght: "La marca no puede tener más de 50 caracteres",
      },
      Modelo: {
        required: "Por favor ingrese el modelo",
        minlenght: "El modelo debe tener al menos 2 caracteres",
        maxlenght: "El modelo no puede tener más de 4 caracteres",
      },
    },
  });
});
