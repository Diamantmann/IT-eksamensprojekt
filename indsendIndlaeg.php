<?php
session_start();
include 'forbindelse.php';

echo $_SESSION['ID'];
$id = $_SESSION['ID'];

if (!empty($_GET["titel"]) && !empty($_GET["indhold"])) {
	$sql = "INSERT INTO investeringstips.indlaeg (
	titel, indhold, brugerIDForIndlaegger, datoForIndlaeg, upvotes, downvotes, guld) 
	VALUES ('".$_GET["titel"]."', '".$_GET["indhold"]."',". $id .", '2019-02-02 1:11:11', 0, 0, 0)";
}

if ($conn->query($sql) === TRUE) {
	echo "Indlæg indsendt"."<br>";
} else {
	echo "Fejl ved indsendelse af indlæg"."<br>";
}
?>