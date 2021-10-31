document.getElementById('anadir-comunidad').onclick = function() {
    document.getElementById("pantalla-completa").style.removeProperty('display');
    document.getElementById("formulario-nueva-comunidad").style.removeProperty('display');
    document.getElementById("accion").style.display = "none";

}
document.getElementById('cancelar-formulario-nueva-comunidad').onclick = function() {
    document.getElementById("formulario-nueva-comunidad").reset();
    document.getElementById("formulario-nueva-comunidad").style.display = "none";
    document.getElementById("pantalla-completa").style.display = "none"; 
    document.getElementById("accion").style.removeProperty('display');
}

document.getElementById('cancelar-formulario-editar-comunidad').onclick = function() {
    document.getElementById("formulario-editar-comunidad").reset();
    document.getElementById("formulario-editar-comunidad").style.setProperty('display', 'none');
    document.getElementById("pantalla-completa").style.display = "none";
}
function editarComunidad(id) {
    document.getElementById("pantalla-completa").style.setProperty('display', '');
    document.getElementById("formulario-editar-comunidad").style.setProperty('display', '');
    document.getElementById("id").value = document.getElementById("id-"+ id).innerText;
    document.getElementById("editar-nombre").value = document.getElementById("nombre-"+ id).innerText;
    document.getElementById("editar-direccion").value = document.getElementById("direccion-"+ id).innerText;
    document.getElementById("editar-administrador").value = document.getElementById("administrador-"+ id).innerText;
    document.getElementById("editar-mail-admin").value = document.getElementById("emailadmin-"+ id).innerText;
    document.getElementById("editar-tel-admin").value = document.getElementById("teladmin-"+ id).innerText;
    document.getElementById("editar-nombre-portero").value = document.getElementById("nomport-"+ id).innerText;
    document.getElementById("editar-tel-port").value = document.getElementById("telport-"+ id).innerText;
}