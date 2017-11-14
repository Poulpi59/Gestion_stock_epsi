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
    <?php
    include("header.php");
?>
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
    include ("function.php");
    include ("sql.php");

    $mysqli = @mysql_connect("127.0.0.1", "root", "","epsi_stock");
    if ($mysqli->connect_errno)
    {
        $mysqli = @mysql_connect("127.0.0.1", "root", "", "");
        if ($mysqli->connect_errno)
        {
            echo "Echec de la connexion à MySQL";
        }else{
            create_bdd($mysqli);
        }
    }

    if(isset($_POST["submit"])) {
        $login = $_POST["login"];
        $mdp = $_POST["mdp"];

        $mysqli = @mysql_connect("127.0.0.1", "root", "","epsi_stock");

        $res = mysql_query($mysqli ,"   SELECT pseudo, motDePasse
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
?>
</body>

</html>
