const usuario = document.getElementById("usuario")
const email = document.getElementById("email")
const contraseña = document.getElementById("contraseña")
const form = document.getElementById("loginForm")
const parrafo = document.getElementById("warnings")

form.addEventListener("submit", e=> {
    e.preventDefault()
    let warnings = ""
    let entrar = false
    let regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/
    parrafo.innerHTML = ""
    /*if(usuario.value.length < 3){
        warnings += "El nombre no es valido <br>"
        entrar = true;
    }*/
    if(!regexEmail.test(email.value)){
        warnings += "El email no es valido <br>"
        entrar = true
    }
    if(contraseña.value.length < 8){
        warnings += "La contraseña no es valida"
        entrar = true
    }
    if(entrar){
        parrafo.innerHTML = warnings
    }
})
