<?php
    include_once ("function.php");
    include_once ("../class/sql.php");
    logged();

    $sql = new sql("localhost", "root", "","epsi_stock");
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $promo = $_POST['promo'];
    $sql->query("   INSERT INTO emprunteur (id, nom, prenom, id_Promotion)
                    VALUES (NULL, '$nom', '$prenom', '$promo')");
    $sql->close();
    header("location: ../pages/addDonnee");
?>