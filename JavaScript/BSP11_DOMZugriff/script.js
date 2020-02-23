function modify(elementId){
    var el = document.getElementById(elementId);
    var innerHTML = '<table><tbody>';
    var cnt = 0;

    for(var row = 0; row < 4; row++){
        innerHTML += '<tr style=\'background-color:#0000C0; color: white;\'>';

        for(var col = 0; col < 3; col++){
            innerHTML += '<td style=\'padding: 4px; text-align: right;\'>'+ ++cnt + '</td>';
        }
        innerHTML += '</tr>';
    }
    innerHTML += '</tbody></table>';
    el.innerHTML = innerHTML;
}
