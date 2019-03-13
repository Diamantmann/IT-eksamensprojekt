<html>
    <head>
        <title></title>
    </head>
    <body>
        <h1>Velkommen! <br></h1>
        <a href="opretIndlaeg.php"><button>Opret et indlæg</button></a>
        <a href="indlaesIndlaegForBruger.php"><button>Se egne indlæg!</button></a>
        <a href="alleIndlaeg.php"><button>Se alle indlæg!</button></a>
        <a href="opretDatabase.php"><button>Opret database og tabeller!</button></a>
    </body>
</html>

<?php
include 'forbindelse.php';
session_start();
$id = $_SESSION['ID'];

$totalGuld;
$guld;

$sql = "SELECT guld FROM investeringstips.bruger WHERE brugerID = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $guld = $row['guld'];
        echo "<br>Dit guld: " . $row["guld"];
    }
}

$sql = "SELECT SUM(guld) AS guld FROM investeringstips.indlaeg";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $totalGuld = $row['guld'];
    }
}

$procentdelAfGuld = $guld/$totalGuld*100;
echo "<br>procentdel af guld: " . $procentdelAfGuld;
$sql = "UPDATE investeringstips.bruger SET procentdelAfGuld = $procentdelAfGuld WHERE brugerID = $id";
$conn->query($sql);

if ($procentdelAfGuld->num_rows > 0) {
    while($row = $procentdelAfGuld->fetch_assoc()) {
        echo "<br>Procentdel af alt guld: " . $row["procentdelAfGuld"];
    }
}
?>