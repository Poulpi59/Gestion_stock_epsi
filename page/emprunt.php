<?php
    include ("function.php");
    include ("sql.php");
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
        include("header.php");
        include("nav.php");
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
          <th>Modifier/Supprimer</th>
        </tr>
        <?php
          $mysqli = @mysql_connect("localhost", "root", "","epsi_stock");
          $res = mysql_query($mysqli ,"  SELECT * FROM emprunt");
          $i = 0;
          while ($row = mysqli_fetch_array($res)) {
        ?>
          <tr>
            <td>
              <?php
                $res1 = mysql_query($mysqli ,"  SELECT * FROM emprunteur WHERE id = $row[id_Emprunteur]");
                $row1 = mysqli_fetch_array($res1);
                $res2 = mysql_query($mysqli ,"  SELECT * FROM promotion WHERE id = $row1[id_Promotion]");
                $row2 = mysqli_fetch_array($res2);
                echo $row1["nom"];
                echo " ";
                echo $row1["prenom"];
                echo " ";
                echo $row2["nom"];
              ?>
            </td>
            <td>
              <?php
                $res1 = mysql_query($mysqli ,"  SELECT * FROM objet WHERE id = $row[id_Objet]");
                $row1 = mysqli_fetch_array($res1);
                $res2 = mysql_query($mysqli ,"  SELECT * FROM typeobjet WHERE id = $row1[id_TypeObjet]");
                $row2 = mysqli_fetch_array($res2);
                $res3 = mysql_query($mysqli ,"  SELECT * FROM marque WHERE id = $row1[id_Marque]");
                $row3 = mysqli_fetch_array($res3);
                $res4 = mysql_query($mysqli ,"  SELECT * FROM modele WHERE id = $row1[id_Modele]");
                $row4 = mysqli_fetch_array($res4);
                echo $row2["libelle"];
                echo " ";
                echo $row3["libelle"];
                echo " ";
                echo $row4["libelle"];
              ?>
            </td>
            <td>
              <?php echo $row['dateDebut'] ?>
            </td>
            <td>
              <?php echo $row['dateRestitution'] ?>
            </td>
            <td>
              Editer
            </td>
          </tr>
          <?php }
            $mysqli->close();
          ?>
          </table>
  </div>
</body>

</html>
