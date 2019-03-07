<html>
    <body>
        <form action="index.php">
            <input type="submit" value="Log Ud">
        </form>
    </body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
	die("Forbindelse kunne ikke oprettes: " . $conn->connect_error);
} else {
	//echo "Forbindelse oprettet"."<br>";
}
?>