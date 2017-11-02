<?php
    include ("function.php");
    logged();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>EPSI Stock - Déconnexion</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php 
        include("header.php");
        session_destroy();
    ?>
    <div class="main">
        <center>
            <h2>Déconnecté !</h2>
            <a href="login.php">Accueil</a>
        </center>
    </div>
</body>

</html>