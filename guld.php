<?php
session_start();
include 'forbindelse.php';
include 'alleIndlaeg.php';

//echo $_SESSION['ID'];

if (!empty($_GET["upvote"])) {
	$upvoteID = $_GET["upvote"];
	$sql = "SELECT guld FROM investeringstips.indlaeg WHERE indlaegsID = $upvoteID";
	$guld = $conn->query($sql);
	
	if ($guld->num_rows > 0) {
		while($maengdeGuld = $guld->fetch_assoc()) {
			$nyMaengdeGuld = $maengdeGuld["guld"] + 1;
			$sql = "UPDATE investeringstips.indlaeg SET guld = $nyMaengdeGuld WHERE indlaegsID = $upvoteID";
			$conn->query($sql);
		}
	}
}

if (!empty($_GET["downvote"])) {
	$downvoteID = $_GET["downvote"];
	$sql = "SELECT guld FROM investeringstips.indlaeg WHERE indlaegsID = $downvoteID";
	$guld = $conn->query($sql);
	
	if ($guld->num_rows > 0) {
		while($maengdeGuld = $guld->fetch_assoc()) {
			$nyMaengdeGuld = $maengdeGuld["guld"] - 1;
			$sql = "UPDATE investeringstips.indlaeg SET guld = $nyMaengdeGuld WHERE indlaegsID = $downvoteID";
			$conn->query($sql);
		}
	}
}
?>