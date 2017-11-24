<?php
include("../libs/function.php");
logged();
?>
<!DOCTYPE html>
<html>

<head>
    <title>EPSI Stock - Déconnexion</title>
    <?php include_once("../includes/head.php"); ?>
</head>

<body>
<?php
include("../includes/header.php");
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