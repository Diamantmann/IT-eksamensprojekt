<?php
include 'forbindelse.php';

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
	datoForIndlaeg TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	upvotes INT(6),
	downvotes INT(6),
	guld INT(6)
)";

if ($conn->query($sql) === TRUE) {
	echo "Tabellen 'indlæg' er oprettet"."<br>";
} else {
	//echo $sql;
	echo "Fejl ved oprettelse af tabellen 'indlæg'"."<br>" . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS investeringstips.upvoteTransaktioner (
	upvoteID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	brugerIDForUpvoter INT(6) UNSIGNED,
	FOREIGN KEY (brugerIDForUpvoter) REFERENCES bruger(brugerID),
	indlaegsIDForIndlaeg INT(6) UNSIGNED,
	FOREIGN KEY (indlaegsIDForIndlaeg) REFERENCES indlaeg(indlaegsID)
)";

if ($conn->query($sql) === TRUE) {
	echo "Tabellen 'upvoteTransaktioner' er oprettet"."<br>";
} else {
	//echo $sql;
	echo "Fejl ved oprettelse af tabellen 'upvoteTransaktioner'"."<br>" . $conn->error;
}

?>