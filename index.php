<?php
include_once("libs/function.php");
include_once("class/sql.php");
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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>

<body>
<?php include_once("includes/header.php"); ?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="index.php"><h4>Accueil</h4></a></li>
                <li><a href="pages/emprunt.php"><h4>Emprunt</h4></a></li>
                <li><a href="pages/donnee.php"><h4>Ajouter Données</h4></a></li>
                <li><a href="pages/logout.php"><h4>Déconnexion</h4></a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="panel-body">
    <center>
        <?php
        $sql = new sql("localhost", "root", "", "epsi_stock");
        $res = $sql->query("  SELECT *
                            FROM utilisateur
                            WHERE id_LoginUtilisateur = $_SESSION[user]");
        $row = $res->fetch();
        echo "<h3>Bonjour " . $row['prenom'] . " " . $row['nom']."</h3>";
        ?>
        <a href="pages/emprunt.php"><h3>Emprunt</h3></a>
        <a href="pages/addDonnee.php"><h3>Ajouter Données</h3></a>
    </center>
</div>
</body>

</html>
