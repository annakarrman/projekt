/*
Databasnamn: inkopslista

Tabell 1: lists (webservice.php)
--------------------------------------------------------------
| "ID" (PK) int(11) | "name" varchar(124) | "date" timestamp |
--------------------------------------------------------------

Tabell 2: products (webservice-products.php)
------------------------------------------------------------------
| "productID" int(11) | "name" (varchar, 124) | "listID" int(11) |
------------------------------------------------------------------
*/

// variabler
var outputProd = document.getElementById("outputProd"); // ul-lista för products
var heading = document.getElementsByTagName("h1");      // h1-element
var editList = document.getElementById("editList");     // div för edit list
var deleteBtn = document.getElementById("deleteProd");

// händelsehanterare
window.addEventListener("load", headings, false);
window.addEventListener("load", products, false);





// rubriker på listor
function headings() {
    // rubrikens ID (listans ID)
    var listID = heading[0].getAttribute("id");

    // hämtar över HTTP
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {

        // kollar att allt är OK
        if (this.readyState === 4 && this.status === 200) {

            // konvertera JSON-sträng
            var info = JSON.parse(xhttp.response);

            // loopar igenom listorna
            for(var i = 0; i < info.length; i++) {
                if(listID === info[i].ID) {                                                 // om listans ID är samma som rubrikens ID
                    heading[0].innerHTML = "Lista: " + info[i].name;                        // ändrar rubriken till listans namn
                }  
            }
        }
};
xhttp.open('GET', 'webservice.php', true); // url för JSON
xhttp.send();  
}



// lista med produkter
function products() {
        // rubrikens ID (listans ID)
        var listID = heading[0].getAttribute("id");

        // hämtar över HTTP
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
    
            // kollar att allt är OK
            if (this.readyState === 4 && this.status === 200) {
    
                // konvertera JSON-sträng
                var info = JSON.parse(xhttp.response);
    
                // loops igenom tabell med produkter
                for(var i = 0; i < info.length; i++) {
                    if(listID === info[i].listID) { // om listans ID är samma som rubrikens ID
                        // skriver ut produkterna i en lista där li-elementen har productID som id
                        outputProd.innerHTML += "<li id = '" + info[i].productID + "' class = 'liProd'><p>" + info[i].name + "</p><a href = 'editlist.php?listID=" + info[i].listID + "&&deleteproduct=" + info[i].productID + "' title = 'Radera produkt'><img src = 'images/trash_icon.png' alt = 'trashIcon'/></a></li>"; 
                    }
                }
            }
    };
    xhttp.open('GET', 'webservice-products.php', true); // url för JSON
    xhttp.send();  
}