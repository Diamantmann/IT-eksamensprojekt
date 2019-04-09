<?php

include 'forside.php';
@session_start();
$ID = $_GET["ID"];
//echo $ID;
?>

<html>
    <body>
        <p>Opdater dit indlaeg:</p>
        <form action="indsendOpdateretIndlaeg.php" method="get" id="indlaegID">
            Titel:       <input type="text" name="titel">
            <input type="hidden" name="indlaegsID" value="<?php echo $ID ?>">
            <!--Indhold:   <input type="text" name="indhold"><br>-->
            <input type="submit" value="Opdater indlaeg">
        </form>
        <textarea rows="4" cols="50" name="indhold" form="indlaegID"></textarea>
    </body>
</html>
