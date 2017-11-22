<?php
    include_once ("function.php");
    include_once ("../class/sql.php");
    logged();

    $sql = new sql("localhost", "root", "","epsi_stock");
    $idEmp = $_POST['idEmp'];
    $idObj = $_POST['idObj'];
    $qte = $_POST['qte'];
    $idEtat = $_POST['idEtat'];
    $dateDeb = $_POST['dateDeb'];
    $dateFinTheo = $_POST['dateFinTheo'];
    $dateRest = $_POST['dateRest'];
    $sql->query("   INSERT INTO emprunt (id, dateDebut, dateFinTheorique, dateRestitution, quantiteEmprunte, id_Emprunteur, id_Etat, id_Objet)
                    VALUES (NULL, '$dateDeb', '$dateFinTheo', '$dateRest', '$qte', '$idEmp', '$idEtat', '$idObj')");
    $sql->close();
    header("location: ../pages/emprunt.php");
?>