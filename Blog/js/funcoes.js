function display(id) {
	var objeto = document.getElementById(id);
	if (objeto.style.display === "none") {objeto.style.display = "block"}
	else {objeto.style.display = "none"}
}
function myFunction() {
    var x = document.getElementById("NovoComentario");
    if (x.style.display != "none") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}