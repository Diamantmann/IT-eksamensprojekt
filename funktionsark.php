<?php

function tjekBrugerEksistere($conn, $navn, $kodeord){
    $sql = "SELECT brugerID FROM investeringstips.bruger WHERE navn = '".$navn."' AND kodeord = '".$kodeord."' LIMIT 1";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row != null;
}

function tjekBrugernavnEksistere($conn, $navn){
    $sql = "SELECT brugerID FROM investeringstips.bruger WHERE navn = '".$navn."' LIMIT 1";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo $row['brugerID'];
    if($row['brugerID'] == null){
        return true;
    }
}

function tjekKodeord($conn, $navn, $kodeord){
    $sql = "SELECT kodeord FROM investeringstips.bruger WHERE navn = '".$navn."' LIMIT 1";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo $row['kodeord'];
    if($row['kodeord'] != $kodeord){
        return true;
    }
}

function udskrivId($conn, $navn, $kodeord){
    $sql = "SELECT brugerID FROM investeringstips.bruger WHERE navn = '".$navn."' AND kodeord = '".$kodeord."' LIMIT 1";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row['brugerID'];
}

function lavBruger($conn, $navn, $kodeord){
    $sql =  "INSERT INTO investeringstips.bruger (navn, kodeord, guld) VALUES ('".$navn."','".$kodeord."',0)";
    $brugerSkabt = $conn->query($sql);
    return $brugerSkabt;
}

function opretBruger($conn, $brugernavn, $kodeord){
    $sql = "INSERT INTO investeringstips.bruger";
}

?>