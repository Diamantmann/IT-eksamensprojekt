<html>
    <head>
        <title></title>
    </head>
    <body>
        <form action="indsendindlaeg.php" method="get">
            Titel:       <input type="text" name="titel"><br>
            Indhold:   <input type="text" name="indhold"><br>
            <input type="submit" value="Indsend indlaeg">
        </form>
    </body>
</html>

<?php
include 'forbindelse.php';
/*session_start();
$id = $_SESSION['ID'];
echo $id;*/

$sql = "SELECT titel, indhold, guld, datoForIndlaeg FROM investeringstips.indlaeg WHERE brugerIDForIndlaegger = 2";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<br>Titel: " . $row["titel"]. "<br>Indlæg: " . $row["indhold"] . "<br>Guld: " . $row["guld"] . "<br>Dato for indlæg: " . $row["datoForIndlaeg"] . "<br>";
    }
}


$sql = "SELECT guld FROM investeringstips.bruger WHERE brugerID = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<br>Dit guld: " . $row["guld"];
    }
}
?>