document.getElementById('anadir-usuario').onclick = function() {
    document.getElementById("pantalla-completa").style.removeProperty('display');
    document.getElementById("formulario-nuevo-usuario").style.removeProperty('display');
    document.getElementById("accion").style.display = "none";

}
document.getElementById('cancelar-formulario-nuevo-usuario').onclick = function() {
    document.getElementById("formulario-nuevo-usuario").reset();
    document.getElementById("formulario-nuevo-usuario").style.display = "none";
    document.getElementById("pantalla-completa").style.display = "none"; 
    document.getElementById("accion").style.removeProperty('display');
}

document.getElementById('cancelar-formulario-editar-usuario').onclick = function() {
    document.getElementById("formulario-editar-usuario").reset();
    document.getElementById("formulario-editar-usuario").style.display = "none";
    document.getElementById("pantalla-completa").style.display = "none";
}
function editarUsuario(id) {
    document.getElementById("pantalla-completa").style.setProperty('display', '');
    document.getElementById("formulario-editar-usuario").style.setProperty('display', '');
    console.log("iobani %d", id);
    document.getElementById("editar-nombre").value = document.getElementById("nombre-"+ id).innerText;
    document.getElementById("editar-apellido").value = document.getElementById("apellido-"+ id).innerText;
    document.getElementById("editar-email").value = document.getElementById("email-"+ id).innerText;
    document.getElementById("editar-telefono").value = document.getElementById("telefono-"+ id).innerText;
    document.getElementById("id").value = document.getElementById("id-"+ id).innerText;
    if(document.getElementById("su-" + id) != "No")
        document.getElementById("editar-su").checked = true;

  
}