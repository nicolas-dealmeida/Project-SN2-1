<?php
  session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="syle.css">
    </head>
    <body>
        <section class="container">
            <div class="login">
                <form action="login.php" method="POST">
                    <input type="text" id="login" name="log" placeholder="Login" autocomplete="off" autocapitalize="off" required></input>
                    <input type="password" id="mdp" name="pass" placeholder="Mot de passe" autocomplete="off" autocapitalize="off" required></input>
                    <p class="submit">
                        <input type="submit" class="" value="Connexion"></input>
                    </p>
                </form>
                <a href="inscription.php"><button>Inscription</button></a>
            </div>
        </section>
    </body>
</html>