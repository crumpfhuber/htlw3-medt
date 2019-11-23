/* Clemens Rumpfhuber 3AHIT */

function calcVolume(radius) {
    return (4/3 * Math.PI * (radius*radius*radius)).toFixed(2);
}

function calcSurface(radius) {
    return (4 * Math.PI * (radius*radius)).toFixed(2);
}

var args = [3.05, 5, 7.4, 11, 21.1, 1, 2];

for (var i = 0; i < args.length; i++) {
    document.write("<u>Kugel ", (i+1), ":</u><br>");
    document.write("Radius: ", args[i], "<br>");
    document.write("Volume: ", calcVolume(args[i]), "<br>");
    document.write("Surface: ", calcSurface(args[i]), "<br><br>");
}
