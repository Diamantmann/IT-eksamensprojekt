<?php

$servername = "root";
$username = "root";
$password = "neger";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
	die("Forbindelse kunne ikke oprettes: " . $conn->connect_error);
} else {
	echo "Forbindelse oprettet"."<br>";
}

$sql = "CREATE DATABASE investeringstips";
if ($conn->query($sql) === TRUE) {
	echo "Database 'investeringstips' er oprettet";
} else {
	echo "Fejl ved oprettelse af databasen: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS investeringstips.bruger (
	brugerID INT(6) UNSIGNED_AUTO_INCREMENT PRIMARY KEY,
	guld INT(6),
	navn VARCHAR(30),
	kodeord VARCHAR(30)
)";

$sql = "CREATE TABLE IF NOT EXISTS investeringstips.indlæg (
	indlægsID INT(6) UNSIGNED_AUTO_INCREMENT PRIMARY KEY,
	indhold VARCHAR(300),
	brugerIDForIndlægger INT(6),
	datoForIndlæg DATETIME,
	upvotes INT(6),
	downvotes INT(6),
	guld INT(6),
)";
?>