<?php
include_once("../libs/function.php");
include_once("../class/sql.php");
logged();
?>

<!DOCTYPE html>
<html>

<head>
    <title>EPSI Stock - Emprunt</title>
    <?php include_once("../includes/head.php"); ?>
</head>

<body>
<?php
include_once("../includes/header.php");
include_once("../includes/nav.php");
?>
<div class="main">
    <div style="width: 100%;">
        <form action="addEmprunt.php">
            <input type="submit" value="Nouveau Prêt"/>
        </form>
        <br>
    </div>
    <table>
        <tr>
            <th colspan="3">Emprunteur</th>
            <th colspan="5">Matériel</th>
            <th colspan="3">Date</th>
            <th colspan="2" rowspan="2">Editer/Supprimer</th>
        </tr>
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Promotion</th>
            <th>Type</th>
            <th>Marque</th>
            <th>Modèle</th>
            <th>Quantité</th>
            <th>Etat</th>
            <th>Sortie</th>
            <th>Retour Prévu</th>
            <th>Retour</th>
        </tr>
        <?php
        $sql = new sql("localhost", "root", "", "epsi_stock");
        $res = $sql->query("SELECT * FROM emprunt");
        while ($row = $res->fetch()) {
            ?>
            <tr>
                <td>
                    <?php
                    $res1 = $sql->query("SELECT * FROM emprunteur WHERE id = $row[id_Emprunteur]");
                    $row1 = $res1->fetch();
                    $res2 = $sql->query("SELECT * FROM promotion WHERE id = $row1[id_Promotion]");
                    $row2 = $res2->fetch();
                    echo $row1["nom"];
                    ?>
                </td>
                <td><?php echo $row1["prenom"]; ?></td>
                <td><?php echo $row2["nom"]; ?></td>
                <td>
                    <?php
                    $res1 = $sql->query("SELECT * FROM objet WHERE id = $row[id_Objet]");
                    $row1 = $res1->fetch();
                    $res2 = $sql->query("SELECT * FROM typeobjet WHERE id = $row1[id_TypeObjet]");
                    $row2 = $res2->fetch();
                    $res3 = $sql->query("SELECT * FROM marque WHERE id = $row1[id_Marque]");
                    $row3 = $res3->fetch();
                    $res4 = $sql->query("SELECT * FROM modele WHERE id = $row1[id_Modele]");
                    $row4 = $res4->fetch();
                    echo $row2["libelle"];
                    ?>
                </td>
                <td><?php echo $row3["libelle"]; ?></td>
                <td><?php echo $row4["libelle"]; ?></td>
                <td>
                    <?php echo $row["quantiteEmprunte"]; ?>
                </td>
                <td>
                    <?php
                    $res5 = $sql->query("SELECT * FROM etat WHERE id = $row[id_Etat]");
                    $row2 = $res5->fetch();
                    echo $row2["libelle"];
                    ?>
                </td>
                <td>
                    <?php echo $row["dateDebut"]; ?>
                </td>
                <td>
                    <?php echo $row["dateFinTheorique"]; ?>
                </td>
                <td>
                    <?php echo $row["dateRestitution"]; ?>
                </td>
                <td>
                    <form action="editEmprunt.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $row["id"]; ?>"/>
                        <input type="submit" value="Editer"/>
                    </form>
                </td>
                <td>
                    <form action="emprunt.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $row["id"]; ?>"/>
                        <input type="submit" value="X" name="<?php echo $row["id"]; ?>">
                    </form>
                    <?php
                    if (isset($_POST[$row["id"]])) {
                        $sql->query("DELETE FROM emprunt WHERE id = $row[id]");
                        echo "<meta http-equiv='refresh' content='0';>";
                    }
                    ?>
                </td>
            </tr>
            <?php
        }
        $sql->close();
        ?>
    </table>
</div>
</body>

</html>