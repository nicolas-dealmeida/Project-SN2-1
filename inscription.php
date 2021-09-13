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
                    <input type="text" id="pseudo" name="log" placeholder="Pseudo" autocomplete="off" autocapitalize="off" required></input>
                    <input type="text" id="name" name="name" placeholder="Nom" autocomplete="off" autocapitalize="off" required></input>
                    <input type="text" id="first_name" name="" placeholder="Prénom" autocomplete="off" autocapitalize="off" required></input>
                    <input type="password" id="mdp" name="pass" placeholder="Mot de passe" autocomplete="off" autocapitalize="off" required></input>
                    <input type="password" id="conf_mdp" name="pass" placeholder="Confirmation mot de passe" autocomplete="off" autocapitalize="off" required></input>
                    <p class="submit">
                        <input type="submit" class="" value="Connexion"></input>
                    </p>
                </form>
            </div>
        </section>
    </body>
</html>