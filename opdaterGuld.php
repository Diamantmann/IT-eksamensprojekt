<?php


$IID = $_SESSION['IID'];

$sql = "SELECT upvoteEllerDownvote as guldsum, indlaegsIDForIndlaeg FROM investeringstips.upvotetransaktioner i1
inner join
(
SELECT MAX(upvoteID) as maksi, upvoteEllerDownvote as g FROM investeringstips.upvotetransaktioner WHERE indlaegsIDForIndlaeg=1 GROUP BY brugerIDForUpvoter
    ) i2 on i1.upvoteID = i2.maksi)";

$guldSum = $conn->query($sql);
if ($guldSum->num_rows > 0) {
    while($maengdeGuld = $guldSum->fetch_assoc()) {
        $guldSummen = $maengdeGuld['guldsum'];
        $sql = "UPDATE investeringstip.indlaeg SET guld=$guldSummen WHERE indlaegsID=$IID";
    }
}
?>