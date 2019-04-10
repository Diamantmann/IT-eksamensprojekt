<html>
    <head>
    <title>BM2</title>
</head>
<?php

include 'forside.php';

$sql = "SELECT indlaegsID, titel, indhold, guld, datoForIndlaeg FROM investeringstips.indlaeg ORDER BY guld DESC";
$result = $conn->query($sql);

?>
<table>
    <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                ?>
                <tr>
                <td>
                <?php
                    echo "<br> <p ID='titel'>" . $row["titel"]. " </p><p ID='indlaeg'>" . $row["indhold"] . "</p><p ID='guld'>Guld: " . $row["guld"] . "</p><p ID='dato'>Dato for indlæg: " . $row["datoForIndlaeg"] . "</p><br>";
                ?>
                <form action="guld.php" method="get">
                    <input type="hidden" name="upvote" value="<?php echo $row["indlaegsID"]?>">
                    <input type="hidden" name="ID" value="<?php echo $row["indlaegsID"]?>">
                    <input type="submit" value="Upvote">
                </form>

                <form action="guld.php" method="get">
        	        <input type="hidden" name="downvote" value="<?php echo $row["indlaegsID"]?>">
                    <input type="hidden" name="ID" value="<?php echo $row["indlaegsID"]?>">
                    <input type="submit" value="Downvote">
                </form>
                </td>
            </tr>
                <?php
            }
        }
    ?>
</table>
</html>