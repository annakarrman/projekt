<?php

include("includes/config.php");

/* DB-anslutning */
$db = mysqli_connect(DBHOST, DBUSER, DBPASS, DBDATABASE) or die('Fel vid anslutning');


/* SQL-fråga */
$sqlProd = "SELECT * FROM products";
$resultProd = mysqli_query($db, $sqlProd) or die('Fel vid SQL-fråga');

/* Loopa genom resultet och spara till ny array */
$rowsProd = array();
while($rowProd = mysqli_fetch_assoc($resultProd))
array_push($rowsProd, $rowProd);

/* Konvertera till JSON */
$jsonProd = json_encode($rowsProd, JSON_PRETTY_PRINT);

/* Utskrift */
header('content-type: application/json; charset=utf-8');
header("access-control-allow-origin: *");

echo $jsonProd;

?>