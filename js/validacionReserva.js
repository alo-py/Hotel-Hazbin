document.addEventListener("DOMContentLoaded", function() {
    var formReserva = document.getElementById("formReserva");

    formReserva.addEventListener("submit", function(event) {
        event.preventDefault();

        var fechaEntrada = formReserva.FechaEntrada.value.trim();
        var fechaSalida = formReserva.FechaSalida.value.trim();

        if (fechaEntrada === "" || fechaSalida === "") {
            alert("Por favor, selecciona fechas de entrada y salida.");
            return false;
        }

        // Otras validaciones según sea necesario

        formReserva.submit();
    });
});
