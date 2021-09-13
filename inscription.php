<?php

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
                    <input type="text" id="first_name" name="first_name" placeholder="Prénom" autocomplete="off" autocapitalize="off" required></input>
                    <input type="password" id="mdp" name="pass" placeholder="Mot de passe" autocomplete="off" autocapitalize="off" required></input>
                    <input type="password" id="conf_mdp" name="conf_pass" placeholder="Confirmation mot de passe" autocomplete="off" autocapitalize="off" required></input>
                    <p class="submit">
                        <input type="submit" value="Inscription"></input>
                    </p>
                </form>
            </div>
        </section>
    </body>
</html>