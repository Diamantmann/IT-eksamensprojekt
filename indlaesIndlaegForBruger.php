<?php
//session_start();
include 'forside.php';

$sql = "SELECT titel, indhold, guld, datoForIndlaeg, indlaegsID FROM investeringstips.indlaeg WHERE brugerIDForIndlaegger = " . $_SESSION['ID'];
$result = $conn->query($sql);
?>
<table>
<?php
//Sætter ens egne indlæg op i en tabel, hvor man kan gå videre til 'opdaterIndlaeg.php' eller 'sletIndlaeg.php'. Knapper har indlaegsID som en skjult værdi.
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        ?>
        <tr>
        <td>
            <?php
        echo "<br>" . $row["titel"]. "<br>" . $row["indhold"] . "<br>Guld: " . $row["guld"] . "<br>Dato for indlæg: " . $row["datoForIndlaeg"] . "<br>";
        ?>
            <form action="opdaterIndlaeg.php" method="get">
                <input type="hidden" name="ID" value="<?php echo $row["indlaegsID"]?>">
                <input type="submit" value="Opdater indlæg">
            </form>
            <form action="sletIndlaeg.php" method="get">
                <input type="hidden" name="ID" value="<?php echo $row["indlaegsID"]?>">
                <input type="submit" value="Slet indlæg">
            </form>
        </td>
    </tr>
    <?php
    }
}
?>
</table>