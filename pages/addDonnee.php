<?php
include("../libs/function.php");
include_once("../class/sql.php");
logged();
?>
<!DOCTYPE html>
<html>

<head>
    <title>EPSI Stock - Ajouter Données</title>
    <?php include_once("../includes/head.php"); ?>
</head>

<body>
<?php
include("../includes/header.php");
include_once("../includes/nav.php");
?>
<div class="main">
    <center>
        Ajouter Emprunteur :
        <form action="../libs/addSQL.php" method="post">
            <input type="text" name="nom" placeholder="Nom">
            <input type="text" name="prenom" placeholder="Prénom">
            <input type="hidden" name="func" value="2">
            <select name="promo">
                <?php
                $sql = new sql("localhost", "root", "", "epsi_stock");
                foreach ($sql->query("SELECT * FROM promotion") as $row) {
                    echo "<option value=" . $row["id"] . ">" . $row["nom"] . "</option>";
                }
                ?>
            </select><br>
            <input type="submit" value="Ajouter">
        </form>
        <br>
        Ajouter Formation :
        <form action="../libs/addSQL.php" method="post">
            <input type="text" name="nom" placeholder="Nom">
            <input type="text" name="anneePromo" placeholder="Année Promotion">
            <input type="hidden" name="func" value="4"><br>
            <input type="submit" value="Ajouter">
        </form>
        <br>
        Ajouter Etat :
        <form action="../libs/addSQL.php" method="post">
            <input type="text" name="libelle" placeholder="Libelle">
            <input type="hidden" name="func" value="5"><br>
            <input type="submit" value="Ajouter">
        </form>
    </center>
</div>
</body>

</html>
