<html>
    <head>
        <title></title>
    </head>
    <body>
        <form action="db.php" method="get">
            Titel:       <input type="text" name="titel"><br>
            Indhold:   <input type="text" name="indhold"><br>
            <input type="submit" value="Indsend indlaeg">
        </form>
    </body>
</html>

<?php

$sql = "SELECT titel, indhold, guld, datoForIndlaeg FROM investeringstips.indlaeg WHERE brugerIDForIndlaegger = 2";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<br>" . $row["titel"]. "<br>" . $row["indhold"] . "<br>Guld: " . $row["guld"] . "<br>Dato for indlæg: " . $row["datoForIndlaeg"];
    }
}

?>