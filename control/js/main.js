window.onload = erlojua();
function erlojua() {
    var data = new Date();
    var ordua = data.getHours();
    var minutuak = data.getMinutes();
    var segunduak = data.getSeconds();

    ordua = (ordua < 10) ?  "0" + ordua : ordua;
    minutuak = (minutuak < 10) ?  "0" + minutuak : minutuak;
    segunduak = (segunduak < 10) ?  "0" + segunduak : segunduak;

    var denbora = ordua + ":" + minutuak + ":" + segunduak;
    document.getElementById("hora").innerText = 'Hora actual: ' + denbora;
    document.getElementById("hora").textContent = 'Hora actual: ' + denbora;
    setTimeout(erlojua, 1000);
}
erlojua();

//Menu movil
document.getElementById("mostrar-menu").onclick = function() {
    var x = document.getElementById("submenu-normal");
    if (x.style.display === "block") {
      x.style.display = "none";
    } else {
      x.style.display = "block";
    }
}