function display(id) {
	var objeto = document.getElementById(id);
	if (objeto.style.display === "none") {objeto.style.display = "block"}
	else {objeto.style.display = "none"}
}

function displayClass(id) {
    var objeto = document.getElementsByClassName(id);
    if (objeto.style.display === "none") {objeto.style.display = "block"}
    else {objeto.style.display = "none"}
}

function myFunction() {
    var x = document.getElementById("NovoComentario");
    if (x.style.display === "none") {
        console.log("block");
        x.style.display = "block";
    } else {
        x.style.display = "none";
        console.log("none");
    }
}

