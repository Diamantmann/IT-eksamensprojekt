<?php

function tjekBrugerEksistere($conn, $navn, $kodeord){
    $sql = "SELECT brugerID FROM investeringstips.bruger WHERE navn = '".$navn."' AND kodeord = '".$kodeord."' LIMIT 1";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row != null;
}

function lavBruger($conn, $navn, $kodeord){
    $sql =  "INSERT INTO investeringstips.bruger (navn, kodeord, guld) VALUES ('".$navn."','".$kodeord."',0)";
    $brugerSkabt = $conn->query($sql);
    return $brugerSkabt;
}


?>