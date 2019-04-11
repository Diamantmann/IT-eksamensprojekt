<?php
session_start();
include 'forbindelse.php';
include 'funktionsark.php';

$navn = $_GET['navn'];
$kodeord = $_GET['password'];

//echo "<br>Navn = " . $navn . "<br>";
//echo "Kodeord = " . $kodeord . "<br>";

//Denne lange if-statement tjekker hvorvidt ens kodeord og brugernavn er tilsluttet den konto man prøver at logge ind på. Hvis ikke, så siger hvad fejlen er, og hvis der er en konto, logger den ind.
if(tjekBrugerEksistere($conn, $navn, $kodeord)){
    echo "Du er nu logget ind!" . "<br>";
    $_SESSION['ID'] = udskrivId($conn,$navn,$kodeord);
    //echo $_SESSION['ID'] . "<br>";
    include 'forside.php';  
} else if(tjekBrugernavnEksistere($conn, $navn)){
    include 'index.php';
    echo "Brugernavnet er forkert, eller brugeren eksisterer ikke - prøv igen";
} else if(tjekKodeord($conn, $navn, $kodeord)){
    echo "<br>Forkert kodeord";
    include'index.php';
} else {
    //lavBruger($conn,$navn,$kodeord);
    include 'index.php';
    echo "Brugernavn eller password forkert - prøv igen";
}



/*function fåID($navn){
    $sql =  "SELECT brugerID FROM investeringstips.bruger WHERE navn='$navn' LIMIT 1";
    $result = $conn->query($sql);

    echo $result;
}*/
?>