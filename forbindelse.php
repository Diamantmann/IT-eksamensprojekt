<?php
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
	die("Forbindelse kunne ikke oprettes: " . $conn->connect_error);
} else {
	echo "Forbindelse oprettet"."<br>";
}
?>