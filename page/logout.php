<?php
    include ("function.php");
    logged();
?>
<!DOCTYPE html>
<html>

<head>
    <title>EPSI Stock - Déconnexion</title>
    <?php include_once("head.php"); ?>
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