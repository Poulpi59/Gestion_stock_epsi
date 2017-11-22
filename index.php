<?php
    session_start();
        if ($_SESSION["user"] != true) {
            header("location: page/login.php");
        }
?>
<!DOCTYPE html>
<html>

<head>
    <title>EPSI Stock - Accueil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>

<body>
    <?php include_once("page/header.php"); ?>
    <nav>
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="page/emprunt.php">Emprunt</a></li>
        <li><a href="page/adddonnee.php">Ajouter Données</a></li>
        <li><a href="page/logout.php">Déconnexion</a></li>
    </ul>
    
</nav>
    <div class="main">
        <center>
            <a href="page/emprunt.php"><h3>Emprunt</h3></a>
        </center>
    </div>
</body>

</html>
