<?php
session_start();
include 'db.php';

$navn = $_GET['navn'];
$kodeord = $_GET['password'];

echo "<br>Navn = " . $navn . "<br>";
echo "Kodeord = " . $kodeord . "<br>";

if(tjekBrugerEksistere($conn, $navn, $kodeord)){
    echo "6000";
} else if(tjekBrugernavnEksistere($conn, $navn)){
    echo "Brugernavnet er forkert, eller brugeren eksisterer ikke - prøv igen";
} else if(tjekKodeord($conn, $navn, $kodeord)){
    echo "<br>Forkert kodeord";
} else {
    //lavBruger($conn,$navn,$kodeord);
    include 'index.php';
    echo "Brugernavn eller password forkert - prøv igen";
}

$_SESSION['ID'] = udskrivId($conn,$navn,$kodeord);
echo $_SESSION['ID'];

/*function fåID($navn){
    $sql =  "SELECT brugerID FROM investeringstips.bruger WHERE navn='$navn' LIMIT 1";
    $result = $conn->query($sql);

    echo $result;
}*/
?>