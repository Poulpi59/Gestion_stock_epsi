<?php
    include_once ("function.php");
    include_once ("../class/sql.php");
    logged();

    $sql = new sql("localhost", "root", "","epsi_stock");
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
    header("location: emprunt.php");
?>