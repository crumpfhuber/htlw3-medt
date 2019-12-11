var clothes = [
    {
      name: "Pullover",
      size: [38],
      price: 39,
    },{
      name: "Jeans",
      size: [40,36],
      price: 28,
    },{
      name: "Mantel",
      size: [44,42],
      price: 67,
    },{
      name: "Jacke",
      size: [44],
      price: 49,
    },
];

function ausgeben() {
    for (let element in clothes) {
        for (let key in clothes[element]) {
            document.write(key, ": ", clothes[element][key], "<br>");
        }
        document.write("<br>");
    }
}

ausgeben();
