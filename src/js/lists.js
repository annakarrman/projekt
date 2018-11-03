/*
Kod skriven av: Anna Kärrman
Uppgift: Projekt
Kurs: Webbutveckling III
Datum: 2018-11-01
Beskrivning: Webbtjänst, JavaScript, JSON, PHP, Databaser
*/


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
var heading = document.getElementsByTagName("h1"); // rubrik
var outputList = document.getElementById("outputList"); // ul-lista för inköpslistor
var menuListLnk = document.getElementById("mylists"); // länk i huvudmeny för "mina listor"
var noListsMsg = document.getElementById("noListsMsg"); // meddelande om det inte finns några listor

// händelsehanterare
window.addEventListener("load", lists, false);
outputList.addEventListener("click", redirect, false);



// visar listor
function lists(e) {
    // hämtar över HTTP
    var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {

            // kollar att allt är OK
            if (this.readyState === 4 && this.status === 200) {

                // konvertera JSON-sträng
                var info = JSON.parse(xhttp.response);

                    // loopar igenom listor
                    for(var i = 0; i < info.length; i++) {
                            // skriver ut listorna som li-element
                            outputList.innerHTML += "<li id = '" + info[i].ID + "' title = 'Gå till lista'><p id = '" + info[i].ID + "'><span class = 'listname'>" + info[i].name + "</span><br/>" + 
                            "Skapad: " + info[i].date + "</p></li>";
                    }
            }

        };
    xhttp.open('GET', 'webservice.php', true); // url för JSON
    xhttp.send();
}



// omdirigerar till editlist.php
function redirect(e) {
    // gets ID of clicked element
        listID = e.target.id;

        // hämtar över HTTP
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {

            // kollar att allt är OK
            if (this.readyState === 4 && this.status === 200) {

                // konvertera JSON-sträng
                var info = JSON.parse(xhttp.response);

                // loops igenom listor
                for(var i = 0; i < info.length; i++) {
                    // ändrar URL
                    window.location = "editlist.php?listID=" + listID;
                }
            }
};
xhttp.open('GET', 'webservice.php', true); // url för JSON
xhttp.send();  
}
