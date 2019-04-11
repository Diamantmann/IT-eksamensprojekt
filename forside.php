<html>
    <head>
        <title>BM</title>
        <link rel = "stylesheet" type = "text/css" href = "stylesheet/stylesheet.css"/>
    </head>
    <body>
        <div ID="div1">
        <h1>Velkommen! <br></h1>
        <a href="opretIndlaeg.php"><button>Opret et indlæg</button></a>
        <a href="indlaesIndlaegForBruger.php"><button>Se egne indlæg!</button></a>
        <a href="alleIndlaeg.php"><button>Se alle indlæg!</button></a>
        <a href="seGuldForBruger.php"><button>Se din guldprocent</button></a>
        </div>

        <form action="index.php">
            <input ID="logud" type="submit" value="Log Ud">
        </form>

    </body>
</html>

<?php
//Inkludere forbindelse. Sessions_ID bliver sat. Herfra kan man komme til andre sider.
include 'forbindelse.php';
@session_start();


$id = $_SESSION['ID'];
//echo $_SESSION['ID'];
?>
