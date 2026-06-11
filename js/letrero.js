document.addEventListener("DOMContentLoaded", function() {
    var banner = document.getElementById("letrero");
    banner.style.display = "block";
    setTimeout(function() {
        banner.style.display = "none";
    }, 3000);
});
