<?php

include 'funktionsark.php';

$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
	die("Forbindelse kunne ikke oprettes: " . $conn->connect_error);
} else {
	echo "Forbindelse oprettet"."<br>";
}

$sql = "CREATE DATABASE IF NOT EXISTS investeringstips";
if ($conn->query($sql) === TRUE) {
	echo "Database 'investeringstips' er oprettet";
} else {
	echo "Fejl ved oprettelse af databasen: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS investeringstips.bruger (
	brugerID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	guld INT(6),
	navn VARCHAR(30),
	kodeord VARCHAR(30)
)";

if ($conn->query($sql) === TRUE) {
	echo "Tabellen 'bruger' er oprettet";
} else {
	echo "Fejl ved oprettelse af tabellen 'bruger'";
}

$sql = "CREATE TABLE IF NOT EXISTS investeringstips.indlaeg (
	indlaegsID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	indhold VARCHAR(300),
	brugerIDForIndlaegger INT(6),
	datoForIndlae g DATETIME,
	upvotes INT(6),
	downvotes INT(6),
	guld INT(6)
)";

if ($conn->query($sql) === TRUE) {
	echo "Tabellen 'indlæg' er oprettet";
} else {
	echo "Fejl ved oprettelse af tabellen 'indlæg'";
}
?>