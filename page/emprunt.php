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
    <title>EPSI Stock - Emprunt</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php
        include_once("header.php");
        include_once("nav.php");
    ?>
    <div class="main">
      <div style="width: 100%;">
        <button>Nouveau Prêt</button>
        <button class="right">Go</button>
        <input type="text" placeholder="Rechercher" class="right">
      </div>
      <table>
        <tr>
          <th>Emprunteur</th>
          <th>Matériel</th>
          <th>Sortie</th>
          <th>Retour</th>
          <th colspan="2">Editer/Supprimer</th>
        </tr>
        <?php
          $sql = new sql();
          @$sql->connect("localhost", "root", "","epsi_stock");
          $res = $sql->query("SELECT * FROM emprunt");
          $i = 0;
          while($row = $res->fetch()) {
        ?>
        <tr>
          <td>
            <?php
              $res1 = $sql->query("SELECT * FROM emprunteur WHERE id = $row[id_Emprunteur]");
              $row1 = $res1->fetch();
              $res2 = $sql->query("SELECT * FROM promotion WHERE id = $row1[id_Promotion]");
              $row2 = $res2->fetch();
              echo $row1["nom"];
              echo " ";
              echo $row1["prenom"];
              echo " ";
              echo $row2["nom"];
            ?>
          </td>
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
              echo " ";
              echo $row3["libelle"];
              echo " ";
              echo $row4["libelle"];
            ?>
          </td>
          <td>
            <?php echo $row["dateDebut"]; ?>
          </td>
          <td>
            <?php echo $row["dateRestitution"]; ?>
          </td>
          <td>
            <form action="edit.php" method="post">
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
              if(isset($_POST[$row["id"]])) {
                $sql->query("DELETE FROM emprunt WHERE id = $row[id]");
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