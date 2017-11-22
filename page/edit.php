<?php
    include_once ("function.php");
    include_once ("../class/sql.php");
    logged();
?>

<!DOCTYPE html>
<html>

<head>
    <title>EPSI Stock - Editer</title>
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
            $id = $_POST["id"];
            $res1 = $sql->query("SELECT * FROM emprunt WHERE id = $id");
            $row1 = $res1->fetch();
        ?>
        <form action="editok.php" method="post">
            Emprunteur : <input type="text" name="idEmp" value=<?php echo $row1["id_Emprunteur"]; ?>><br>
            Objet : <input type="text" name="idObj" value=<?php echo $row1["id_Objet"]; ?>><br>
            Quantité : <input type="text" name="qte" value=<?php echo $row1["quantiteEmprunte"]; ?>><br>
            Etat : <input type="text" name="idEtat" value=<?php echo $row1["id_Etat"]; ?>><br>
            Date Début : <input type="text" name="dateDeb" value=<?php echo $row1["dateDebut"]; ?>><br>
            Date Fin Théorique : <input type="text" name="dateFinTheo" value=<?php echo $row1["dateFinTheorique"]; ?>><br>
            Date Retour : <input type="text" name="dateRest" value=<?php echo $row1["dateRestitution"]; ?>><br>
            <input type="hidden" name="id" value="<?php echo $id; ?>"/>
            <input type="submit" value="Editer">
        </form>
    </div>
</body>

</html>
