<?php
session_start();
include 'forbindelse.php';

echo $_SESSION['ID'];
$ID = $_SESSION['ID'];
$IID = $_GET["ID"];
$_SESSION['IID'] = $IID;
echo $_SESSION['IID'];

session_abort();

//Hvis upvote var knappen der blev trykket på, så sætter den et '1' índ i tabellen upvotetransaktioner og går videre til opdaterGuld.php
if (!empty($_GET["upvote"])) {
	$upvoteID = $_GET["upvote"];
	$sql = "INSERT INTO investeringstips.upvotetransaktioner(brugerIDForUpvoter, indlaegsIDForIndlaeg, upvoteEllerDownvote) VALUES ($ID, $IID, 1)";
	$conn->query($sql);
	/*$sql = "SELECT guld FROM investeringstips.indlaeg WHERE indlaegsID = $upvoteID";
	$guld = $conn->query($sql);
	
	if ($guld->num_rows > 0) {
		while($maengdeGuld = $guld->fetch_assoc()) {
			$nyMaengdeGuld = $maengdeGuld["guld"] + 1;
			$sql = "UPDATE investeringstips.indlaeg SET guld = $nyMaengdeGuld WHERE indlaegsID = $upvoteID";
			$conn->query($sql);
			}
	}*/
}

//Hvis downvote var knappen der blev trykket på, så sætter den et '-1' índ i tabellen upvotetransaktioner og går videre til opdaterGuld.php
if (!empty($_GET["downvote"])) {
	$downvoteID = $_GET["downvote"];
	$sql = "INSERT INTO investeringstips.upvotetransaktioner(brugerIDForUpvoter, indlaegsIDForIndlaeg, upvoteEllerDownvote) VALUES ($ID, $IID, -1)";
	$conn->query($sql);
	/*$sql = "SELECT guld FROM investeringstips.indlaeg WHERE indlaegsID = $downvoteID";
	$guld = $conn->query($sql);

	if ($guld->num_rows > 0) {
		while($maengdeGuld = $guld->fetch_assoc()) {
			$nyMaengdeGuld = $maengdeGuld["guld"] - 1;
			$sql = "UPDATE investeringstips.indlaeg SET guld = $nyMaengdeGuld WHERE indlaegsID = $downvoteID";
			$conn->query($sql);
		}
	}*/
}


include 'opdaterGuld.php';
//include 'alleIndlaeg.php';

?>
