<?php

//funktion der returnere hvorvidt om brugeren eksistere eller ikke gør.
function tjekBrugerEksistere($conn, $navn, $kodeord){
    $sql = "SELECT brugerID FROM investeringstips.bruger WHERE navn = '".$navn."' AND kodeord = '".$kodeord."' LIMIT 1";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row != null;
}

//Funktion der returnere hvorvidt brugernavnet er i databasen.
function tjekBrugernavnEksistere($conn, $navn){
    $sql = "SELECT brugerID FROM investeringstips.bruger WHERE navn = '".$navn."' LIMIT 1";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    //echo $row['brugerID'];
    if($row['brugerID'] == null){
        return true;
    }
}

//Funktion hvorvidt kodeordet er rigtigt til det givne brugernavn
function tjekKodeord($conn, $navn, $kodeord){
    $sql = "SELECT kodeord FROM investeringstips.bruger WHERE navn = '".$navn."' LIMIT 1";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    //echo $row['kodeord'];
    if($row['kodeord'] != $kodeord){
        return true;
    }
}

//Funktion der udskriver ID'et for brugeren
function udskrivId($conn, $navn, $kodeord){
    $sql = "SELECT brugerID FROM investeringstips.bruger WHERE navn = '".$navn."' AND kodeord = '".$kodeord."' LIMIT 1";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row['brugerID'];
}

//Funktion til at sætte brugeren i systemet
function lavBruger($conn, $navn, $kodeord){
    $sql =  "INSERT INTO investeringstips.bruger (navn, kodeord, guld) VALUES ('".$navn."','".$kodeord."',0)";
    $brugerSkabt = $conn->query($sql);
    return $brugerSkabt;
}

?>