/* Clemens Rumpfhuber 3AHIT */
var colors = ["red", "blue", "purple", "green", "white"];

function modifyColor(elementId) {
    let element = document.getElementById(elementId);
    let color = 0;

    setInterval(function(){
        if (color === colors.length) color = 0;
        element.style.backgroundColor = colors[color++];
    }, 1000);
}
