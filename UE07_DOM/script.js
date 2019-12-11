/* Clemens Rumpfhuber 3AHIT */

document.body.innerHTML +=
    "<table><thead><tr>" +
    "<td>Hund</td>" +
    "<td>Katze</td>" +
    "<td>Fuchs</td>" +
    "<td>Schaf</td>" +
    "<td>Friedenslicht</td>" +
    "</tr></thead><tbody><tr>" +
    "<td><img id=\"img1\" src=\"img1.jpg\" alt=\"Preview Image 1\" onclick=\"modify('img1')\"></td>" +
    "<td><img id=\"img2\" src=\"img2.jpg\" alt=\"Preview Image 2\" onclick=\"modify('img2')\"></td>" +
    "<td><img id=\"img3\" src=\"img3.jpg\" alt=\"Preview Image 3\" onclick=\"modify('img3')\"></td>" +
    "<td><img id=\"img4\" src=\"img4.jpg\" alt=\"Preview Image 4\" onclick=\"modify('img4')\"></td>" +
    "<td><img id=\"img5\" src=\"img5.jpg\" alt=\"Preview Image 5\" onclick=\"modify('img5')\"></td>" +
    "</tr></tbody></table>";

function modify(elementId) {
    let element = document.getElementById("imgcontent");
    element.innerHTML = '<img src="' + elementId + '.jpg" alt="Image">';
}
