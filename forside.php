<html>
    <head>
        <title></title>
    </head>
    <body>
        <h1>Velkommen! <br></h1>
        <a href="opretIndlaeg.php"><button>Opret et indlæg</button></a>
        <a href="indlaesIndlaegForBruger.php"><button>Se egne indlæg!</button></a>
        <a href="alleIndlaeg.php"><button>Se alle indlæg!</button></a>
    </body>
</html>

<?php
include 'forbindelse.php';
/*session_start();
$id = $_SESSION['ID'];
echo $id;*/

/*$sql = "SELECT titel, indhold, guld, datoForIndlaeg FROM investeringstips.indlaeg WHERE brugerIDForIndlaegger = " . $id;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<br>Titel: " . $row["titel"]. "<br>Indlæg: " . $row["indhold"] . "<br>Guld: " . $row["guld"] . "<br>Dato for indlæg: " . $row["datoForIndlaeg"] . "<br>";
    }
}*/


$sql = "SELECT guld FROM investeringstips.bruger WHERE brugerID = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<br>Dit guld: " . $row["guld"];
    }
}
?>