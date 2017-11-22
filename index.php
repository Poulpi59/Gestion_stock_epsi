<?php
    session_start();
        if ($_SESSION["user"] != true) {
            header("location: pages/login.php");
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
    <?php include_once("includes/header.php"); ?>
    <nav>
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="pages/emprunt.php">Emprunt</a></li>
        <li><a href="pages/addDonnee.php">Ajouter Données</a></li>
        <li><a href="pages/logout.php">Déconnexion</a></li>
    </ul>
    
</nav>
    <div class="main">
        <center>
            <a href="pages/emprunt.php"><h3>Emprunt</h3></a>
            <a href="pages/addDonnées.php"><h3>Ajouter Données</h3></a>
        </center>
    </div>
</body>

</html>
