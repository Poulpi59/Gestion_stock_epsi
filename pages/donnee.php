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
<div class="panel-body">
    <div class="container">
        <div class=row">
            <div class="col-md-4">
                <h3>Emprunteur :</h3>
                <form action="../libs/addSQL.php" method="post">
                    <input type="text" class="form-control" name="nom" placeholder="Nom" required class="form-control">
                    <input type="text" class="form-control" name="prenom" placeholder="Prénom" required
                           class="form-control">
                    <input type="hidden" name="func" value="2">
                    Promotion :
                    <select name="promo" class="form-control">
                        <?php
                        $sql = new sql("localhost", "root", "", "epsi_stock");
                        foreach ($sql->query("SELECT * FROM promotion") as $row) {
                            echo "<option value=" . $row["id"] . ">" . $row["nom"] . "</option>";
                        }
                        ?>
                    </select>
                    <br>
                    <input type="submit" value="Ajouter" class="btn">
                </form>
            </div>

            <div class="col-md-4">
                <h3>Formation :</h3>
                <form action="../libs/addSQL.php" method="post">
                    <input type="text" class="form-control" name="nom" placeholder="Nom" required>
                    <input type="text" class="form-control" name="anneePromo" placeholder="Année Promotion" required>
                    <input type="hidden" name="func" value="4">
                    <br>
                    <input type="submit" value="Ajouter" class="btn">
                </form>
            </div>

            <div class="col-md-4">
                <h3>Utilisateur :</h3>
                <form action="../libs/addSQL.php" method="post">
                    <input type="text" class="form-control" name="login" placeholder="Login" required>
                    <input type="text" class="form-control" name="mdp" placeholder="Mot de passe" required>
                    <input type="text" class="form-control" name="nom" placeholder="Nom" required>
                    <input type="text" class="form-control" name="prenom" placeholder="Prénom" required>
                    <input type="hidden" name="func" value="6">
                    <br>
                    <input type="submit" value="Ajouter" class="btn">
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <h3>Objet :</h3>
                <form action="../libs/addSQL.php" method="post">
                    Type :
                    <select name="typeObjet" class="form-control">
                        <?php
                        foreach ($sql->query("SELECT * FROM typeobjet") as $row) {
                            echo "<option value=" . $row["id"] . ">" . $row["libelle"] . "</option>";
                        }
                        ?>
                    </select>
                    Marque :
                    <select name="marque" class="form-control"">
                    <?php
                    foreach ($sql->query("SELECT * FROM marque") as $row) {
                        echo "<option value=" . $row["id"] . ">" . $row["libelle"] . "</option>";
                    }
                    ?>
                    </select>
                    Modèle :
                    <select name="modele" class="form-control"">
                    <?php
                    foreach ($sql->query("SELECT * FROM modele") as $row) {
                        echo "<option value=" . $row["id"] . ">" . $row["libelle"] . "</option>";
                    }
                    ?>
                    </select>
                    <input type="hidden" name="func" value="10">
                    <br>
                    <input type="submit" value="Ajouter" class="btn">
                </form>
            </div>

            <div class="col-md-2">
                <h3>Marque :</h3>
                <form action="../libs/addSQL.php" method="post">
                    <input type="text" class="form-control" name="libelle" placeholder="Libelle" required>
                    <input type="hidden" name="func" value="7">
                    <br>
                    <input type="submit" value="Ajouter" class="btn">
                </form>
            </div>

            <div class="col-md-2">
                <h3>Modèle :</h3>
                <form action="../libs/addSQL.php" method="post">
                    <input type="text" class="form-control" name="libelle" placeholder="Libelle" required>
                    <input type="hidden" name="func" value="8">
                    <br>
                    <input type="submit" value="Ajouter" class="btn">
                </form>
            </div>

            <div class="col-md-2">
                <h3>Type Objet :</h3>
                <form action="../libs/addSQL.php" method="post">
                    <input type="text" class="form-control" name="libelle" placeholder="Libelle" required>
                    <input type="hidden" name="func" value="9">
                    <br>
                    <input type="submit" value="Ajouter" class="btn">
                </form>
            </div>

            <div class="col-md-2">
                <h3>Etat :</h3>
                <form action="../libs/addSQL.php" method="post">
                    <input type="text" class="form-control" name="libelle" placeholder="Libelle" required>
                    <input type="hidden" name="func" value="5">
                    <br>
                    <input type="submit" value="Ajouter" class="btn">
                </form>
            </div>
        </div>
    </div>
</div>
</body>

</html>
