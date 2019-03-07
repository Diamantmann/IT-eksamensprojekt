<?php
session_start();
include 'forbindelse.php';

echo $_SESSION['ID'];
$ID = $_SESSION['ID'];
$IID = $_GET["ID"];

$sql = "SELECT upvoteEllerDownvote FROM investeringstips.upvotetransaktioner WHERE brugerIDForUpvoter=$ID AND indlaegsIDForIndlaeg=$IID";
$query = $conn->query($sql);
if($query->num_rows > 0){
	while($svar = $query->fetch_assoc()){
		if($svar["upvoteEllerDownvote"] == 1 && !empty($_GET["upvote"])){
			echo "Du har allerede upvoted denne post!";
		} else if($svar["upvoteEllerDownvote"] == 0 && !empty($_GET["downvote"])){
			echo "Du har allerede downvoted denne post!";
		}
	}
} else {
	if (!empty($_GET["upvote"])) {
		$upvoteID = $_GET["upvote"];
		$sql = "INSERT INTO investeringstips.upvotetransaktioner(brugerIDForUpvoter, indlaegsIDForIndlaeg, upvoteEllerDownvote) VALUES ($ID, $IID, 1)";
		$conn->query($sql);
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
		$sql = "INSERT INTO investeringstips.upvotetransaktioner(brugerIDForUpvoter, indlaegsIDForIndlaeg, upvoteEllerDownvote) VALUES ($ID, $IID, 0)";
		$conn->query($sql);
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

}


include 'alleIndlaeg.php';

?>

POST:
ID(Primary Key)
TITEL
BEKSRIVELSE
GULD!

POINT:
pointID(Primary Key)
POSTID(Forering Key)
BRUGERID(Foreign Key)
LIKE(BOOLEAN)

USER:
ID(Primary Key)

TJEKKER SIDSTE ID FRA BRUGEREN TIL EN POST; DETTE ER POINTET DER TILEGNES POSTEN.