document.getElementById('anadir-usuario').onclick = function() {
    document.getElementById("formulario-nuevo-usuario").style.visibility = "visible";
}
document.getElementById('cancelar-formulario-nuevo-usuario').onclick = function() {
    document.getElementById("formulario-nuevo-usuario").reset();
    document.getElementById("formulario-nuevo-usuario").style.visibility = "hidden";
}