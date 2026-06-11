function updateTime() {
    var now = new Date();
    var timeString = now.toLocaleTimeString();
    document.getElementById("hora").textContent = "Hora actual: " + timeString;
}

setInterval(updateTime, 1000); // Actualiza la hora cada segundo
updateTime(); // Muestra la hora inmediatamente
