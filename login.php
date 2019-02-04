<?php
session_start();

include 'db.php';

$navn = $_GET['navn'];
$kodeord = $_GET['password'];

echo "<br>Navn = " . $navn . "<br>";
echo "Kodeord = " . $kodeord . "<br>";

if(tjekBrugerEksistere($conn, $navn, $kodeord)){
    echo "6000";
} else if(tjekKodeord()){
    
} else {
    lavBruger($conn,$navn,$kodeord);
}

/*function fåID($navn){
    $sql =  "SELECT brugerID FROM investeringstips.bruger WHERE navn='$navn' LIMIT 1";
    $result = $conn->query($sql);

    echo $result;
}*/
?>