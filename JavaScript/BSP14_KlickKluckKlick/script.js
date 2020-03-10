function textChanger(elementId) {
    var el = document.getElementById(elementId);
    switch (el.innerText) {
        case "Klick": el.innerHTML = "Klack"; break;
        case "Klack": el.innerHTML = "Kluck"; break;
        case "Kluck": el.innerHTML = "Klick"; break;
    }
}
