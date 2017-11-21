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
            <form action="addok.php" method="post">
                Emprunteur : <input type="text" name="idEmp"><br>
                Objet : <input type="text" name="idObj"><br>
                Quantité : <input type="text" name="qte"><br>
                Etat : <input type="text" name="idEtat"><br>
                Date Début : <input type="text" name="dateDeb"><br>
                Date Fin Théorique : <input type="text" name="dateFinTheo"><br>
                Date Retour : <input type="text" name="dateRest"><br>
                <input type="submit" value="Ajouter"/>
                </form>
    </div>
</body>

</html>
