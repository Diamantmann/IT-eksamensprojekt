<?php
include 'funktionsark.php';

$servername = "localhost";
$username = "root";
$password = "neger";
$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
	die("Forbindelse kunne ikke oprettes: " . $conn->connect_error);
} else {
	echo "Forbindelse oprettet"."<br>";
}

$sql = "CREATE DATABASE IF NOT EXISTS investeringstips";

if ($conn->query($sql) === TRUE) {
	echo "Database 'investeringstips' er oprettet"."<br>";
} else {
	echo "Fejl ved oprettelse af databasen: " . $conn->error."<br>";
}

$sql = "CREATE TABLE IF NOT EXISTS investeringstips.bruger (
	brugerID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	guld INT(6),
	navn VARCHAR(30),
	kodeord VARCHAR(30)
)";

if ($conn->query($sql) === TRUE) {
	echo "Tabellen 'bruger' er oprettet"."<br>";
} else {
	echo "Fejl ved oprettelse af tabellen 'bruger'"."<br>";
}

$sql = "CREATE TABLE IF NOT EXISTS investeringstips.indlaeg (
	indlaegsID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	titel VARCHAR(100),
	indhold VARCHAR(300),
	brugerIDForIndlaegger INT(6) UNSIGNED,
	FOREIGN KEY (brugerIDForIndlaegger) REFERENCES bruger(brugerID),
	datoForIndlaeg DATETIME,
	upvotes INT(6),
	downvotes INT(6),
	guld INT(6)
)";

if ($conn->query($sql) === TRUE) {
	echo "Tabellen 'indlæg' er oprettet"."<br>";
} else {
	echo "Fejl ved oprettelse af tabellen 'indlæg'"."<br>";
}

if (!empty($_GET["titel"]) && !empty($_GET["indhold"])) {
	$sql = "INSERT INTO investeringstips.indlaeg (
	titel, indhold, brugerIDForIndlaegger, datoForIndlaeg, upvotes, downvotes, guld) 
	VALUES ('".$_GET["titel"]."', '".$_GET["indhold"]."', 2, '2019-02-02 1:11:11', 0, 0, 0)";
}

if ($conn->query($sql) === TRUE) {
	echo "Indlæg indsendt"."<br>";
} else {
	echo "Fejl ved indsendelse af indlæg"."<br>";
}
?>