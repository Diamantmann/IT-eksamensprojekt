<?php

include 'forside.php';

$totalGuld;
$guld;
$brugerGuld;

$sql = "SELECT SUM(guld) AS guld FROM investeringstips.indlaeg WHERE brugerIDForIndlaegger = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$brugerGuld = $row['guld'];
	}
}

$sql = "UPDATE investeringstips.bruger SET guld = $brugerGuld WHERE brugerID = $id";
$conn->query($sql);


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
if($totalGuld > 0 ){
    $procentdelAfGuld = $guld/$totalGuld*100;
    echo "<br>procentdel af guld: " . $procentdelAfGuld . "%";
    $sql = "UPDATE investeringstips.bruger SET procentdelAfGuld = $procentdelAfGuld WHERE brugerID = $id";
    $conn->query($sql);
} else {
    echo "<br>procentdel af guld: 0%";
    $sql = "UPDATE investeringstips.bruger SET procentdelAfGuld = 0 WHERE brugerID = $id";
    $conn->query($sql);
}
?>