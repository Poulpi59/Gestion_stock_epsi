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
    if ($dateRest == '') {
        $sql->query("UPDATE emprunt 
                            SET id_Emprunteur = '$idEmp', id_Objet = '$idObj', quantiteEmprunte = '$qte', id_Etat = '$idEtat', dateDebut =                                '$dateDeb', dateFinTheorique = '$dateFinTheo'
                            WHERE id = '$id'");
    } else {
        $sql->query("  UPDATE emprunt 
                          SET id_Emprunteur = '$idEmp', id_Objet = '$idObj', quantiteEmprunte = '$qte', id_Etat = '$idEtat', dateDebut =                                '$dateDeb', dateFinTheorique = '$dateFinTheo', dateRestitution = '$dateRest'
                          WHERE id = '$id'");
    }
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
    $sql->query("INSERT INTO emprunt (id, dateDebut, dateFinTheorique, quantiteEmprunte, id_Emprunteur, id_Etat, id_Objet)
                        VALUES (NULL, '$dateDeb', '$dateFinTheo', '$qte', '$idEmp', '$idEtat', '$idObj')");
    $sql->close();
    header("location: ../pages/emprunt.php");
} elseif ($func == 4) {
    $nom = $_POST['nom'];
    $anneePromo = $_POST['anneePromo'];
    $sql->query("INSERT INTO promotion (nom, anneePromotion) 
                        VALUE ('$nom', '$anneePromo')");
    $sql->close();
    header("location: ../pages/addDonnee.php");
} elseif ($func == 5) {
    $libelle = $_POST['libelle'];
    $sql->query("INSERT INTO etat (libelle) VALUES ('$libelle')");
    $sql->close();
    header("location: ../pages/addDonnee.php");
} elseif ($func == 6) {
    $login = $_POST['login'];
    $mdp = $_POST['mdp'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $sql->query("INSERT INTO loginutilisateur (pseudo, motDePasse) VALUES ('$login', '$mdp')");
    $res = $sql->query("  SELECT id FROM loginutilisateur
                                WHERE pseudo = '$login' AND  motDePasse = '$mdp'");
    $row = $res->fetch();
    $sql->query("INSERT INTO utilisateur (nom, prenom, id_LoginUtilisateur) VALUES ('$nom', '$prenom', '$row[id]')");
    $sql->close();
    header("location: ../pages/addDonnee.php");
} elseif ($func == 7) {
    $libelle = $_POST['libelle'];
    $sql->query("INSERT INTO marque (libelle) VALUES ('$libelle')");
    $sql->close();
    header("location: ../pages/addDonnee.php");
} elseif ($func == 8) {
    $libelle = $_POST['libelle'];
    $sql->query("INSERT INTO modele (libelle) VALUES ('$libelle')");
    $sql->close();
    header("location: ../pages/addDonnee.php");
} elseif ($func == 9) {
    $libelle = $_POST['libelle'];
    $sql->query("INSERT INTO typeobjet (libelle) VALUES ('$libelle')");
    $sql->close();
    header("location: ../pages/addDonnee.php");
} elseif ($func == 10) {
    $typeObjet = $_POST['typeObjet'];
    $marque = $_POST['marque'];
    $modele = $_POST['modele'];
    $sql->query("INSERT INTO objet (id_TypeObjet, id_Marque, id_Modele) VALUES ('$typeObjet', '$marque', '$modele')");
    $sql->close();
    header("location: ../pages/addDonnee.php");
}