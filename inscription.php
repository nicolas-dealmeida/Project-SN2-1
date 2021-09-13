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
    <title>inscription</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">



    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

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
    <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin">
        <form method="POST">
            <img class="mb-4" src="logo providence.png" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">inscription</h1>

            <div class="form-floating">
                <input name="log" type="text" class="form-control" id="floatingInput" placeholder="login" required>
                <label for="floatingInput">login</label>
            </div>
            <div class="form-floating">
                <input name="name" type="text" class="form-control" id="floatingInput" placeholder="name" required>
                <label for="floatingInput">name</label>
            </div>
            <div class="form-floating">
                <input name="prenom" type="text" class="form-control" id="floatingInput" placeholder="prenom" required>
                <label for="floatingInput">prenom</label>
            </div>
            <div class="form-floating">
                <input name="pass" type="password" class="form-control" id="floatingPassword" placeholder="mots de passe" required>
                <label for="floatingPassword">mots de passe</label>
            </div>
            <div class="form-floating">
                <input name="conf_pass" type="password" class="form-control" id="floatingPassword" placeholder="Confirmation mot de passe" required>
                <label for="floatingPassword">confirmer votre mots de passe</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" name="envoi" type="submit">Inscription</button>
            <p>&nbsp;</p>
        </form>
        <input type="button" value="connexion" class="w-100 btn btn-lg btn-primary" onClick="window.location.href='connexion.php'" />
    </main>
    <?php
    if (isset($_POST['envoi'])) {
        $User->inscription($_POST['log'], $_POST['pass'], $_POST['name'], $_POST['prenom'], $_POST['conf_pass']);
    }
    ?>



</body>


</html>