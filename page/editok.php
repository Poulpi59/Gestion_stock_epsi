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
        <?php
            $sql = new sql();
            @$sql->connect("localhost", "root", "","epsi_stock");
            $id = $_POST["id"];
            $idEmp = $_POST['idEmp'];
            $idObj = $_POST['idObj'];
            $qte = $_POST['qte'];
            $idEtat = $_POST['idEtat'];
            $dateDeb = $_POST['dateDeb'];
            $dateFinTheo = $_POST['dateFinTheo'];
            $dateRest = $_POST['dateRest'];
            $sql->query("   UPDATE emprunt 
                            SET id_Emprunteur = '$idEmp', id_Objet = '$idObj', quantiteEmprunte = '$qte', id_Etat = '$idEtat', dateDebut = '$dateDeb', dateFinTheorique = '$dateFinTheo', dateRestitution = '$dateRest'
                            WHERE id = '$id'");
            $sql->close();
        ?>
        OK !
    </div>
</body>

</html>
