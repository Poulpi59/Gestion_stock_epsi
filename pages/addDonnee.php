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
<div class="double">
    <u><h3>Ajouter :</h3></u>
    <u>Emprunteur :</u>
    <form action="../libs/addSQL.php" method="post">
        <input type="text" name="nom" placeholder="Nom">
        <input type="text" name="prenom" placeholder="Prénom">
        <input type="hidden" name="func" value="2">
        Promotion :
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
    <u>Formation :</u>
    <form action="../libs/addSQL.php" method="post">
        <input type="text" name="nom" placeholder="Nom">
        <input type="text" name="anneePromo" placeholder="Année Promotion">
        <input type="hidden" name="func" value="4"><br>
        <input type="submit" value="Ajouter">
    </form>
    <br>
    <u>Utilisateur :</u>
    <form action="../libs/addSQL.php" method="post">
        <input type="text" name="login" placeholder="Login">
        <input type="text" name="mdp" placeholder="Mot de passe">
        <input type="text" name="nom" placeholder="Nom">
        <input type="text" name="prenom" placeholder="Prénom">
        <input type="hidden" name="func" value="6"><br>
        <input type="submit" value="Ajouter">
    </form>
    <br>
    <u>Objet :</u>
    <form action="../libs/addSQL.php" method="post">
        Type :
        <select name="typeObjet">
            <?php
            foreach ($sql->query("SELECT * FROM typeobjet") as $row) {
                echo "<option value=" . $row["id"] . ">" . $row["libelle"] . "</option>";
            }
            ?>
        </select>
        Marque :
        <select name="marque">
            <?php
            foreach ($sql->query("SELECT * FROM marque") as $row) {
                echo "<option value=" . $row["id"] . ">" . $row["libelle"] . "</option>";
            }
            ?>
        </select>
        Modèle :
        <select name="modele">
            <?php
            foreach ($sql->query("SELECT * FROM modele") as $row) {
                echo "<option value=" . $row["id"] . ">" . $row["libelle"] . "</option>";
            }
            ?>
        </select>
        <input type="hidden" name="func" value="10"><br>
        <input type="submit" value="Ajouter">
    </form>
    <u>Etat :</u>
    <form action="../libs/addSQL.php" method="post">
        <input type="text" name="libelle" placeholder="Libelle">
        <input type="hidden" name="func" value="5"><br>
        <input type="submit" value="Ajouter">
    </form>
    <u>Marque :</u>
    <form action="../libs/addSQL.php" method="post">
        <input type="text" name="libelle" placeholder="Libelle">
        <input type="hidden" name="func" value="7"><br>
        <input type="submit" value="Ajouter">
    </form>
    <u>Modèle :</u>
    <form action="../libs/addSQL.php" method="post">
        <input type="text" name="libelle" placeholder="Libelle">
        <input type="hidden" name="func" value="8"><br>
        <input type="submit" value="Ajouter">
    </form>
    <u>Type Objet :</u>
    <form action="../libs/addSQL.php" method="post">
        <input type="text" name="libelle" placeholder="Libelle">
        <input type="hidden" name="func" value="9"><br>
        <input type="submit" value="Ajouter">
    </form>
</div>
<u><h3>Supprimer :</h3></u>
</body>

</html>
