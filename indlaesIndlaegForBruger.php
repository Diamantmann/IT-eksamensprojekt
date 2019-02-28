<?php
session_start();
include 'forbindelse.php';
include 'forside.php';

$sql = "SELECT titel, indhold, guld, datoForIndlaeg FROM investeringstips.indlaeg WHERE brugerIDForIndlaegger = " . $_SESSION['ID'];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<br>" . $row["titel"]. "<br>" . $row["indhold"] . "<br>Guld: " . $row["guld"] . "<br>Dato for indlæg: " . $row["datoForIndlaeg"] . "<br>";
        echo "---------------------------------------------------------------------" . "<br>";
    }
}

?>