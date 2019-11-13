function printArray() {
    document.write("[");
    myArray.forEach(function (element, index) {
        document.write(element, index == myArray.length-1 ? "" : ", ");
    });
    document.write("]");
}

let myArray = [1, 2.2, 3, 4, "apfel", "birne", 7, 8, 9, 9.03];

document.write("<h4>Anzahl der Elemente:</h4>", myArray.length, "<hr>");

document.write("<h4>Ausgabe des Arrays:</h4>");
printArray();
document.write("<hr>");


document.write("<h4>Löschen des zweiten Elements:</h4>");
myArray.splice(2,1);
printArray();
document.write("<hr>");


document.write("<h4>Suchen des Elements \"birne\":</h4>");
let birneIndex = myArray.indexOf("birne");
document.write("birneIndex: ", birneIndex);
document.write("<hr>");


document.write("<h4>Löschen des Elements \"birne\":</h4>");
myArray.splice(birneIndex, 1);
printArray();
document.write("<hr>");


document.write("<h4>Element \"anfang\" am Anfang hinzufügen:</h4>");
myArray.unshift("anfang");
printArray();
document.write("<hr>");


document.write("<h4>Element \"ende\" am Anfang hinzufügen:</h4>");
myArray.push("ende");
printArray();
document.write("<hr>");
