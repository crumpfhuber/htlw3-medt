/* Clemens Rumpfhuber 3AHIT */

var b = true;

function modify(elementID) {
    document.getElementById(elementID).style = "background-color: " + ((b = !b) ? "orange" : "yellow");
    document.getElementById(elementID).innerText = (b ? "CLACK" : "CLICK");
}
