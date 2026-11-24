// Mostrar u ocultar la contraseña (cada botón lleva el id de su campo en data-target)
document.querySelectorAll(".toggle-password").forEach(function (boton) {
    boton.addEventListener("click", function () {
        var campo = document.getElementById(boton.dataset.target);
        var visible = campo.type === "text";
        campo.type = visible ? "password" : "text";
        boton.querySelector("use").setAttribute("href", visible ? "#i-eye" : "#i-eye-off");
        boton.setAttribute("aria-label", visible ? "Mostrar contraseña" : "Ocultar contraseña");
    });
});
