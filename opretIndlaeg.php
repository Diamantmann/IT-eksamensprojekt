<?php
session_start();
include 'forbindelse.php';


?>
<html>
    <body>
        <p>Opret et indlæg:</p>
        <form action="indsendindlaeg.php" method="get" id="indlaegID">
            Titel:       <input type="text" name="titel">
            <!--Indhold:   <input type="text" name="indhold"><br>-->
            <input type="submit" value="Indsend indlaeg">
        </form>
        <textarea rows="4" cols="50" name="indhold" form="indlaegID"></textarea>
    </body>
</html>

