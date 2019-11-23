/* Clemens Rumpfhuber 3AHIT */

let lebensmittel = [
    {
        Art : "Milch",
        Packungsgroesse : "1 Liter",
        Einkaufspreis : 0.75,
        Verkaufspreis : null,
        Anzahl : 3,
    },
    {
        Art : "Schinken",
        Packungsgroesse : "30 dag",
        Einkaufspreis : 2.35,
        Verkaufspreis : null,
        Anzahl : 1,
    },
    {
        Art : "Käse",
        Packungsgroesse : "100 g",
        Einkaufspreis : 0.95,
        Verkaufspreis : null,
        Anzahl : 3,
    },
    {
        Art : "Bier",
        Packungsgroesse : "10 Liter",
        Einkaufspreis : 60.00,
        Verkaufspreis : null,
        Anzahl : 1,
    },
    {
        Art : "Jägermeister",
        Packungsgroesse : "0,5 Liter",
        Einkaufspreis : 11.00,
        Verkaufspreis : null,
        Anzahl : 3,
    },
];

function berechneKaufpreis(mwst) {
    for (let i = 0; i < lebensmittel.length; i++) {
        lebensmittel[i].Verkaufspreis = (lebensmittel[i].Einkaufspreis * mwst).toFixed(2);
    }
}

berechneKaufpreis(1.1);

lebensmittel.forEach(function (element, index) {
    document.write("<div class='item'>");
    document.write("<table>");
    document.write("<thead><tr><td class='tablehead'>Element</td><td class='tablehead'>Key</td></tr></thead>")
    for (key in element) document.write("<tr>", "<td>", key, "</td>", "<td>", element[key], "</td>", "</tr>");
    document.write("</table>");
    document.write("<br><br>");
    document.write("</div>");
});
