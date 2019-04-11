<?php

include 'forside.php';

$totalGuld;
$guld;
$brugerGuld;

//Vælger summen af alt ens guld for en bruger.
$sql = "SELECT SUM(guld) AS guld FROM investeringstips.indlaeg WHERE brugerIDForIndlaegger = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$brugerGuld = $row['guld'];
	}
}

//Opdateret værdien i brugertabellen.
$sql = "UPDATE investeringstips.bruger SET guld = $brugerGuld WHERE brugerID = $id";
$conn->query($sql);

//Vælger derefter guldet fra brugertabellen og udskriver det.
$sql = "SELECT guld FROM investeringstips.bruger WHERE brugerID = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $guld = $row['guld'];
        echo "<p ID='seGuld'><br>Dit guld: " . $row["guld"] . "</p>";
    }
}

//Derefter tages summen af alt guld i databasen og udregner hvor stor en procent brugeren har.
$sql = "SELECT SUM(guld) AS guld FROM investeringstips.indlaeg";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $totalGuld = $row['guld'];
    }
}
if($totalGuld > 0 ){
    $procentdelAfGuld = $guld/$totalGuld*100;
    echo "<p ID='procentAfGuld'>procentdel af guld: " . $procentdelAfGuld . "%</p>";
    $sql = "UPDATE investeringstips.bruger SET procentdelAfGuld = $procentdelAfGuld WHERE brugerID = $id";
    $conn->query($sql);
} else {
    echo "<p ID='procentAfGuld'>procentdel af guld: 0%</pr>";
    $sql = "UPDATE investeringstips.bruger SET procentdelAfGuld = 0 WHERE brugerID = $id";
    $conn->query($sql);
}
?>