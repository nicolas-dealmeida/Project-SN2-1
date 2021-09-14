<?php
require("session.php");
require("class/user.php");
$User = new user($BDD);
?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.88.1">
        <title>Connexion</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">
        <!-- Bootstrap core CSS -->
        <link href="css/assets/dist/css/bootstrap.min.css" rel="stylesheet">

        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
        </style>

        <!-- Custom styles for this template -->
        <link href="css/signin.css" rel="stylesheet">

    </head>
    <body class="text-center">
        <main class="form-signin">
            <form method="POST">
                <img class="mb-4" src="image/logo providence.png" alt="" width="72" height="57">
                <h1 class="h3 mb-3 fw-normal">Connexion</h1>
                <div class="form-floating">
                    <input name="log" type="text" class="form-control" id="floatingInput" placeholder="login" required>
                    <label for="floatingInput">Login</label>
                </div>
                <div class="form-floating">
                    <input name="pass" type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                    <label for="floatingPassword">Mots de passe</label>
                </div>
                <button name="connexion" class="w-100 btn btn-lg btn-primary" type="submit" >Connexion</button>
                <p>&nbsp;</p>
            </form>
            <input type="button" value="Inscription" class="w-100 btn btn-lg btn-primary" onClick="window.location.href='inscription.php'" />
        </main>
        <?php
            if(isset($_POST['connexion'])){
                $User->connexion($_POST['log'], $_POST['pass']);
            }
        ?>
    </body>
</html>