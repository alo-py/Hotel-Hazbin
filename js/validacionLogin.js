document.addEventListener("DOMContentLoaded", function() {
    console.log("JavaScript cargado"); // Verifica que el script se carga correctamente

    const email = document.getElementById("email");
    const contraseña = document.getElementById("contraseña");
    const form = document.getElementById("loginForm");
    const parrafo = document.getElementById("warnings");

    form.addEventListener("submit", function(e) {
        let warnings = "";
        let entrar = false;
        let regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
        parrafo.innerHTML = "";

        if (!regexEmail.test(email.value)) {
            warnings += "El email no es valido <br>";
            entrar = true;
        }

        if (contraseña.value.length < 8) {
            warnings += "La contraseña debe tener al menos 8 caracteres <br>";
            entrar = true;
        }

        if (entrar) {
            e.preventDefault(); // Solo previene el envío si hay errores
            parrafo.innerHTML = warnings;
        } else {
            console.log("Formulario válido y enviado");
        }
    });
});
