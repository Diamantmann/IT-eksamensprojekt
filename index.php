<html>
    <head>
        <title>BM</title>
        <link rel = "stylesheet" type = "text/css" href = "stylesheet/stylesheet.css"/>
    </head>
    <body>
        <div>
        <form action="login.php" method="get">
                <label>Navn:</label>   <input type="text" name="navn"><br>
                <label>Koderord:<label>   <input type="password" name="password"><br>
                <input type="submit" value="login">
            </form>
            <form action="opretBruger.php" method="get">
                <input type="submit" value="Opret Ny Bruger">
            </form>
        </div>
    </body>
</html>