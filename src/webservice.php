<?php

include("includes/config.php");

/* DB-anslutning */
$db = mysqli_connect(DBHOST, DBUSER, DBPASS, DBDATABASE) or die('Fel vid anslutning');


/* SQL-fråga */
$sqlList = "SELECT * FROM lists ORDER BY date DESC";
$resultList = mysqli_query($db, $sqlList) or die('Fel vid SQL-fråga');

/* Loopa genom resultet och spara till ny array */
$rowsList = array();
while($rowList = mysqli_fetch_assoc($resultList))
array_push($rowsList, $rowList);

/* Konvertera till JSON */
$jsonList = json_encode($rowsList, JSON_PRETTY_PRINT);

/* Utskrift */
header('content-type: application/json; charset=utf-8');
header("access-control-allow-origin: *");

echo $jsonList;

?>