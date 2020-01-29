/* Clemens Rumpfhuber 3AHIT */

function generateNumbers() {
    let a = parseInt(window.document.generator.number_a.value);
    let b = parseInt(window.document.generator.number_b.value);
    let c = parseInt(window.document.generator.amount.value);
    let txt = "";
    for (let i = 0; i < c; i++) txt += a + Math.round((b-1)*Math.random()) + (i+1 === c ? "" : ", ");
    document.getElementById('output').innerText = txt;
}

function clearField() {
    document.getElementById('output').innerText = '';
}
