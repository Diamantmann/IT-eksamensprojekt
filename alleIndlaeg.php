<?php

include 'forbindelse.php';

$sql = "SELECT titel, indhold, guld, datoForIndlaeg FROM investeringstips.indlaeg ORDER BY guld DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    	$i = $i + 1;
        echo "<br>Titel: " . $row["titel"]. "<br>Indlæg: " . $row["indhold"] . "<br>Guld: " . $row["guld"] . "<br>Dato for indlæg: " . $row["datoForIndlaeg"] . "<br>

        <form action='guld.php' method='get'>
            <input type='submit' value='Upvote'>
        </form>

        <form action='guld.php?downvote=TRUE&indlaegsID=1' method='get'>
            <input type='submit' value='Downvote'>
        </form>";
    }
}

?>