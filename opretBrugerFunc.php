<?php
include 'db.php';

$navn = $_GET['brugernavn'];
$kodeord = $_GET['kodeord'];

if(tjekBrugernavnEksistere($conn,$navn)){
    lavBruger($conn,$navn,$kodeord);
    echo "Bruger oprettet - du kan nu logge ind!";
    include 'index.php';
} else{
    echo "Brugernavn eksistere allerede: overvej et andet brugernavn!";
    include 'opretBruger.php';   
}

?>