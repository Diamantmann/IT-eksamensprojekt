<?php
session_start();

include 'db.php';

$navn = $_GET['navn'];
$password = $_GET['password'];

echo "navn = " . $navn . "<br>";
echo "Kodeord = " . $password . "<br>";

function fåID($navn, $password){
    $sql =  "SELECT brugerID FROM investeringstips.bruger WHERE navn='$navn' LIMIT 1";
    $result = $conn->query($sql);

    echo $result;
}

?>