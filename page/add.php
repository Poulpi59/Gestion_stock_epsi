<?php
    include_once ("function.php");
    include_once ("../class/sql.php");
    logged();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>EPSI Stock - Accueil</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php include_once("header.php"); ?>
    <nav>
    <ul>
        <li><a href="../index.php">Accueil</a></li>
        <li><a href="emprunt.php">Emprunt</a></li>
        <li><a href="ajouter_modifier.php">Ajouter/Modifier</a></li>
        <li><a href="deconnexion.php">Déconnexion</a></li>
    </ul>
</nav>
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
