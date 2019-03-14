<?php


$IID = $_SESSION['IID'];

$sql = "SELECT SUM(upvoteEllerDownvote) as guldsum FROM investeringstips.upvotetransaktioner i1
inner join
(
SELECT MAX(upvoteID) as maksi, upvoteEllerDownvote as g FROM investeringstips.upvotetransaktioner WHERE indlaegsIDForIndlaeg=$IID GROUP BY brugerIDForUpvoter
    ) i2 on i1.upvoteID = i2.maksi";

$guldSum = $conn->query($sql);

if ($guldSum->num_rows > 0) {
    //echo "DET VIRKER <br>";
    while($maengdeGuld = $guldSum->fetch_assoc()) {
        $guldSummen = $maengdeGuld['guldsum'];
        $sql = "UPDATE investeringstips.indlaeg SET guld=$guldSummen WHERE indlaegsID=$IID";
        $conn->query($sql);
    }
}

include 'forside.php';

?>