<html>
    <head>
        <title></title>
    </head>
    <body>
        <h1>Velkommen! <br></h1>
        <a href="opretIndlaeg.php"><button>Opret et indlæg</button></a>
        <a href="indlaesIndlaegForBruger.php"><button>Se egne indlæg!</button></a>
        <a href="alleIndlaeg.php"><button>Se alle indlæg!</button></a>
        <a href="opretDatabase.php"><button>Opret database og tabeller!</button></a>
        <a href="seGuldForBruger.php"><button>Se guld</button></a>
        
        <form action="index.php">
            <input type="submit" value="Log Ud">
        </form>

    </body>
</html>

<?php
include 'forbindelse.php';
@session_start();


$id = $_SESSION['ID'];
//echo $_SESSION['ID'];
?>
