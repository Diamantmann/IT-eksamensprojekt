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
        <a href="seGuldForBruger.php"><button>Se guld</button></a>
        </div>

        <form action="index.php">
            <input ID="logud" type="submit" value="Log Ud">
        </form>

    </body>
</html>

<?php
include 'forbindelse.php';
@session_start();


$id = $_SESSION['ID'];
//echo $_SESSION['ID'];
?>
