<?php
include_once("function.php");
include_once("../class/sql.php");
logged();

$sql = new sql("localhost", "root", "", "epsi_stock");
$func = $_POST['func'];

if ($func == 1) {
    $id = $_POST["id"];
    $idEmp = $_POST['idEmp'];
    $idObj = $_POST['idObj'];
    $qte = $_POST['qte'];
    $idEtat = $_POST['idEtat'];
    $dateDeb = $_POST['dateDeb'];
    $dateFinTheo = $_POST['dateFinTheo'];
    $dateRest = $_POST['dateRest'];
    $sql->query("  UPDATE emprunt 
                          SET id_Emprunteur = '$idEmp', id_Objet = '$idObj', quantiteEmprunte = '$qte', id_Etat = '$idEtat', dateDebut = '$dateDeb', dateFinTheorique = '$dateFinTheo', dateRestitution = '$dateRest'
                          WHERE id = '$id'");
    $sql->close();
    header("location: ../pages/emprunt.php");
} elseif ($func == 2) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $promo = $_POST['promo'];
    $func = $_POST['func'];
    $sql->query("  INSERT INTO emprunteur (id, nom, prenom, id_Promotion)
                          VALUES (NULL, '$nom', '$prenom', '$promo')");
    $sql->close();
    header("location: ../pages/addDonnee");
} elseif ($func == 3) {
    $idEmp = $_POST['idEmp'];
    $idObj = $_POST['idObj'];
    $qte = $_POST['qte'];
    $idEtat = $_POST['idEtat'];
    $dateDeb = $_POST['dateDeb'];
    $dateFinTheo = $_POST['dateFinTheo'];
    $dateRest = $_POST['dateRest'];
    $sql->query("   INSERT INTO emprunt (id, dateDebut, dateFinTheorique, quantiteEmprunte, id_Emprunteur, id_Etat, id_Objet)
                    VALUES (NULL, '$dateDeb', '$dateFinTheo', '$qte', '$idEmp', '$idEtat', '$idObj')");
    $sql->close();
    header("location: ../pages/emprunt.php");
}