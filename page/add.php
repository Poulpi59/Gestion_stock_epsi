<?php
    include_once ("function.php");
    include_once ("../class/sql.php");
    logged();
?>

<!DOCTYPE html>
<html>

<head>
    <title>EPSI Stock - Accueil</title>
    <?php include_once("head.php"); ?>
</head>

<body>
    <?php
        include_once("header.php");
        include_once("nav.php");
    ?>
    <div class="main">
        <?php
            $sql = new sql("localhost", "root", "","epsi_stock");
            $res1 = $sql->query("SELECT * FROM emprunt");
            $row1 = $res1->fetch();
        ?>
        <form action="addok.php" method="post">
            Emprunteur :
            <select name="idEmp">
                <?php
                    foreach($sql->query("SELECT * FROM emprunteur") as $row) {
                        echo "<option value=".$row["id"].">".$row["nom"]." ".$row["prenom"]."</option>";
                    }
                ?>
            </select><br>
            Objet :
            <select name="idObj">
                <?php
                    $res = $sql->query("SELECT * FROM objet");
                    while($row = $res->fetch()) {
                        $res2 = $sql->query("SELECT * FROM typeobjet WHERE id = $row[id_TypeObjet]");
                        $row2 = $res2->fetch();
                        $res3 = $sql->query("SELECT * FROM marque WHERE id = $row[id_Marque]");
                        $row3 = $res3->fetch();
                        $res4 = $sql->query("SELECT * FROM modele WHERE id = $row[id_Modele]");
                        $row4 = $res4->fetch();
                        echo "<option value=".$row["id"].">".$row2["libelle"]." ".$row3["libelle"]." ".$row4["libelle"]."</option>";
                    }
                ?>
            </select><br>
            Quantité :
            <select name="qte">
                <?php
                    for ($i=1; $i < 100; $i++) {
                        echo "<option value=".$i.">".$i."</option>";
                    }
                ?>
            </select><br>
            Etat :
            <select name="idEtat">
                <?php
                    foreach($sql->query("SELECT * FROM etat") as $row) {
                        echo "<option value=".$row["id"].">".$row["libelle"]."</option>";
                    }
                ?>
            </select><br>
            Date sortie : <input type="date" name="dateDeb" required><br>
            Date retour prévu : <input type="date" name="dateFinTheo" required><br>
            Date retour : <input type="date" name="dateRest" required><br>
            <input type="hidden" name="id"/>
            <input type="submit" value="Ajouter">
        </form>
    </div>
</body>

</html>
