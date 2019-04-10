<?php

include 'forside.php';
@session_start();
$ID = $_GET["ID"];

$sql = "DELETE FROM investeringstips.upvotetransaktioner WHERE indlaegsIDForIndlaeg = '".$_GET["ID"]."' ";

if($conn->query($sql)===true){
    //echo "slettet indlæg i upvotetransaktioner";
} else {
    /*echo $conn->error;
    echo "Indlæg i transaktioner kunne ikke slettes";*/
}

$sql = "DELETE FROM investeringstips.indlaeg WHERE indlaegsID = '".$_GET["ID"]."' ";

if($conn->query($sql)===true){
    echo "slettet indlæg";
} else {
    /*echo $conn->error;
    echo "Indlæg kunne ikke slettes";*/
}

?>