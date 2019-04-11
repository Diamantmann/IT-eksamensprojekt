<?php
@session_start();
include 'forside.php';

//echo $_SESSION['ID'];
$id = $_SESSION['ID'];

//Indsættelse af ens opdaterede indlaeg. Bruger UPDATE kommandoen, som overskrider det gamle indlæg.
if (!empty($_GET["titel"]) && !empty($_GET["indhold"])) {
	$sql = "UPDATE investeringstips.indlaeg 
    SET titel = '".$_GET["titel"]."', indhold = '".$_GET["indhold"]."' 
    WHERE indlaegsID = '".$_GET["indlaegsID"]."'";
}

if ($conn->query($sql) === TRUE) {
	echo "Indlæg opdateret"."<br>";
} else {
	echo "Fejl ved opdatering af indlæg"."<br>";
}


?>