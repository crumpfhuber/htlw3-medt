/* Clemens Rumpfhuber 3AHIT */

var timeout = 2000;

function modify(elementId) {
    let element = document.getElementById("srccontent");
    element.innerText = document.getElementById(elementId).src;
    setTimeout(function(){
        element.innerText = '';
    }, timeout);
}

function showInputAlert () {
    let temp = parseInt(prompt("Zeit eingeben", "5"));
    if (temp <= 0 || temp > 20)  alert("So nicht! Zahlen zwischen 1 und 20 werden akzeptiert!");
    else timeout = temp * 1000;
}
