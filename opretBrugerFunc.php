<?php
include 'opretDatabase.php';
include 'funktionsark.php';

$navn = $_GET['brugernavn'];
$kodeord = $_GET['kodeord'];

//Denne funktion sætter brugeren i systemet, hvis hverken brugernavnet eller kodeordet er tomt.
if(empty($navn) || empty($kodeord)){
    echo "Brugernavnet eller kodeordet kan IKKE være tomt";
    include 'opretBruger.php';
} else if(tjekBrugernavnEksistere($conn,$navn)){
    lavBruger($conn,$navn,$kodeord);
    echo "Bruger oprettet - du kan nu logge ind!";
    include 'index.php';
} else{
    echo "Brugernavn eksistere allerede: overvej et andet brugernavn!";
    include 'opretBruger.php';   
}

?>