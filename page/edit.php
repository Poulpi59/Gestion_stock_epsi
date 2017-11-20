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
            $res1 = $sql->query("SELECT * FROM emprunt WHERE id = $id");
            $row1 = $res1->fetch();
        ?>
        <form action="editok.php" method="post">
            <input type="text" name="idEmp" value=<?php echo $row1["id_Emprunteur"]; ?>>
            <input type="text" name="idObj" value=<?php echo $row1["id_Objet"]; ?>> 
            <input type="text" name="date1" value=<?php echo $row1["dateDebut"]; ?>> 
            <input type="text" name="date2" value=<?php echo $row1["dateRestitution"]; ?>>
            <input type="hidden" name="id" value="<?php echo $id; ?>"/>
            <input type="submit" value="Editer" name="edit">
        </form>
    </div>
</body>

</html>
