<?php

session_start();

$IID = $_SESSION['IID'];

$sql = "SELECT upvoteID, upvoteEllerDownvote as f FROM investeringstips.upvotetransaktioner i1
inner join
(
SELECT MAX(upvoteID) as maksi, upvoteEllerDownvote as g FROM investeringstips.upvotetransaktioner GROUP BY brugerIDForUpvoter
    ) i2 on i1.upvoteID = i2.maksi)";

?>