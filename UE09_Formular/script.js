/* Clemens Rumpfhuber 3AHIT */

function generateNumbers() {
    let a = parseInt(document.getElementById("number_a").value);
    let b = parseInt(document.getElementById("number_b").value);
    let c = parseInt(document.getElementById("amount").value);
    let txt = "";
    for (let i = 0; i < c; i++) txt += a + Math.round(b*Math.random()) + (i+1 === c ? "" : ", ");
    document.getElementById("output").innerText = txt;
}

function clearField() {
    document.getElementById('output').innerText = ''
}
