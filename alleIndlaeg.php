<?php

include 'forbindelse.php';

$sql = "SELECT indlaegsID, titel, indhold, guld, datoForIndlaeg FROM investeringstips.indlaeg ORDER BY guld DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<br>Titel: " . $row["titel"]. "<br>Indlæg: " . $row["indhold"] . "<br>Guld: " . $row["guld"] . "<br>Dato for indlæg: " . $row["datoForIndlaeg"] . "<br>";
        ?>

        <form action="guld.php" method="get">
            <input type="hidden" name="upvote" value="<?php echo $row["indlaegsID"]?>">
            <input type="submit" value="Upvote">
        </form>

        <form action="guld.php" method="get">
        	<input type="hidden" name="downvote" value="<?php echo $row["indlaegsID"]?>">
            <input type="submit" value="Downvote">
        </form>
        <?php
    }
}
?>