<?php
require("class/user.php");
require("session.php");
$User = new user($BDD);
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
            <form method="POST">
                <input type="text" id="pseudo" name="log" placeholder="Pseudo" autocomplete="off" autocapitalize="off" required></input>
                <input type="text" id="name" name="name" placeholder="Nom" autocomplete="off" autocapitalize="off" required></input>
                <input type="text" id="prenom" name="prenom" placeholder="prenom" autocomplete="off" autocapitalize="off" required></input>
                <input type="password" id="mdp" name="pass" placeholder="Mot de passe" autocomplete="off" autocapitalize="off" required></input>
                <input type="password" id="conf_mdp" name="conf_pass" placeholder="Confirmation mot de passe" autocomplete="off" autocapitalize="off" required></input>
                <p class="submit">
                    <input type="submit" value="Inscription" name="envoi">
                </p>
            </form>
            <?php
            if (isset($_POST['envoi'])) {
                $User->inscription($_POST['log'], $_POST['pass'], $_POST['name'], $_POST['prenom'], $_POST['conf_pass']);
            }
            ?>
        </div>
    </section>
</body>

</html>