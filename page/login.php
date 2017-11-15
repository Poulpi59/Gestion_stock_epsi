<?php
    session_start();
    $_SESSION["user"]= false;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>EPSI Stock - Connexion</title>
    <link rel="stylesheet" href="../css/style.css">
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

    $mysqli = @$sql->connect("127.0.0.1", "root", "","epsi_stock");
    if ($mysqli->connect_errno)
    {
        $mysqli = @$sql->connect("127.0.0.1", "root", "", "");
        if ($mysqli->connect_errno)
        {
            echo "Echec de la connexion à MySQL";
        }else{
            $sql->create_bdd($mysqli);
        }
    }

    if(isset($_POST["submit"])) {
        $login = $_POST["login"];
        $mdp = $_POST["mdp"];

        $mysqli = @$sql->connect("127.0.0.1", "root", "","epsi_stock");

        $res = $sql->query($mysqli ,"   SELECT pseudo, motDePasse
                                        FROM LoginUtilisateur
                                        WHERE pseudo ='".$login."'
                                        AND  motDePasse ='".$mdp."'");

        if(mysqli_num_rows($res) > 0)
        {
            $_SESSION["user"] = true;
            header("location: ../index.php");
        }
        else
        {
            echo "<center>Utilisateur ou Mot de passe incorrect</center>";
        }
    }
    $mysqli->close();
?>
</body>

</html>
