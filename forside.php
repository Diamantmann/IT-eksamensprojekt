<html>
    <head>
        <title></title>
    </head>
    <body>
        <h1>Velkommen! <br></h1>
        <a href="opretIndlaeg.php"><button>Opret et indlæg</button></a>
        <a href="indlaesIndlaegForBruger.php"><button>Se alle dine indlæg!</button></a>
    </body>
</html>

<?php

$id = $_SESSION['ID'];
//echo $id;

/*$sql = "SELECT titel, indhold, guld, datoForIndlaeg FROM investeringstips.indlaeg WHERE brugerIDForIndlaegger = " . $id;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<br>" . $row["titel"]. "<br>" . $row["indhold"] . "<br>Guld: " . $row["guld"] . "<br>Dato for indlæg: " . $row["datoForIndlaeg"];
    }
}*/

?>