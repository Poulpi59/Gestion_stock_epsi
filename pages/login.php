<?php
session_start();
$_SESSION["user"] = false;
?>

<!DOCTYPE html>
<html>

<head>
    <title>EPSI Stock - Connexion</title>
    <?php include_once("../includes/head.php"); ?>
</head>

<body>
<?php include_once("../includes/header.php"); ?>
<div class="login">
    <h2>Connexion</h2>
    <form method="post">
        <input type="text" name="login" placeholder="Utilisateur">
        <br><br>
        <input type="password" name="mdp" placeholder="Mot de Passe">
        <br>
        <input type="submit" name="submit" value="Connexion" class="connect">
    </form>
</div>

<?php
include_once("../libs/function.php");
include_once("../class/sql.php");

try {
    @$sql = new sql("127.0.0.1", "root", "", "epsi_stock");
} catch (Exception $e) {
    try {
        @$sql = new sql("127.0.0.1", "root", "", "");
        $sql->create_bdd();
    } catch (Exception $e) {
        echo "Echec de la connexion à MySQL";
    }
}

if (isset($_POST["submit"])) {
    $login = $_POST["login"];
    $mdp = $_POST["mdp"];

    @$sql = new sql("127.0.0.1", "root", "", "epsi_stock");

    $res = $sql->query("  SELECT *
                                FROM LoginUtilisateur
                                WHERE pseudo = '$login' AND  motDePasse = '$mdp'");
    $row = $res->fetch();
    if (($res->rowCount()) > 0) {
        $_SESSION["user"] = $row["id"];;
        header("location: ../index.php");
    } else {
        echo "<center>Utilisateur ou Mot de passe incorrect</center>";
    }
}
$sql->close();
?>
</body>

</html>
