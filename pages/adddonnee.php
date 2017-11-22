<?php
    include ("../libs/function.php");
    include_once ("../class/sql.php");
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
            <form action="../libs/addEmprunteurSQL.php" method="post">
                <input type="text" name="nom">
                <input type="text" name="prenom">
                <select name="promo">
                    <?php
                        $sql = new sql("localhost", "root", "","epsi_stock");
                        foreach($sql->query("SELECT * FROM promotion") as $row) {
                            echo "<option value=".$row["id"].">".$row["nom"]."</option>";
                        }
                    ?>
                </select><br>
                <input type="submit" value="Ajouter">
            </form>
        </center>
    </div>
</body>

</html>