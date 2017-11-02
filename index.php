<?php
    session_start();
        if ($_SESSION["user"] != true) {
            header("location: page/login.php");
        }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>EPSI Stock - Accueil</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
        include("page/header.php");
    ?>
    <nav>
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="page/emprunt.php">Emprunt</a></li>
        <li><a href="page/ajouter_modifier.php">Ajouter/Modifier</a></li>
        <li><a href="page/deconnexion.php">Déconnexion</a></li>
    </ul>
</nav>
    <div class="main">
        test
    </div>
</body>

</html>
