<?php
    session_start();
    $_SESSION["user"]= false;
?>

<!DOCTYPE html>
<html>

<head>
    <title>EPSI Stock - Connexion</title>
    <?php include_once("head.php"); ?>
</head>

<body>
    <?php include_once("header.php"); ?>
    <div class="login">
        <h2>Login</h2>
        <h5>Utilisateur :</h5>
        <form method="post">
            <input type="text" name="login">
            <h5>Mot de passe :</h5>
            <input type="password" name="mdp">
            <br>
            <input type="submit" name="submit" value="Connexion" class="connect">
        </form>
    </div>

  <?php
    include_once ("function.php");
    include_once ("../class/sql.php");
    $sql = new sql();

    try{
      @$sql->connect("127.0.0.1", "root", "","epsi_stock");
    }
    catch (Exception $e){
      try {
        @$sql->connect("127.0.0.1", "root", "", "");
        $sql->create_bdd();
      } catch (Exception $e) {
        echo "Echec de la connexion à MySQL";
      }
    }

    if(isset($_POST["submit"])) {
        $login = $_POST["login"];
        $mdp = $_POST["mdp"];

        @$sql->connect("127.0.0.1", "root", "","epsi_stock");

        $res = $sql->query("  SELECT pseudo, motDePasse
                              FROM LoginUtilisateur
                              WHERE pseudo ='".$login."'
                              AND  motDePasse ='".$mdp."'");

        if(($res->rowCount()) > 0)
        {
            $_SESSION["user"] = true;
            header("location: ../index.php");
        }
        else
        {
            echo "<center>Utilisateur ou Mot de passe incorrect</center>";
        }
    }
    $sql->close();
?>
</body>

</html>
