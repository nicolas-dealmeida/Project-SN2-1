<?php
    require_once("session.php");
    require_once("class/GPS.php");
    require_once("class/user.php");

    $bateau = new GPS($BDD);
    $admin = new user($BDD);
    $admin->getuser($_SESSION['id']);
    $bateau->getbateau($_GET['modfBateau']);
    
    if (!isset($_SESSION['id'])){
        header("Location: connexion.php");
    }
    if ($admin->getadmin() == 0){
        header("Location: accueil.php");
    }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.88.1">
        <link rel="icon" href="image/logo_providence.png" />
        <title>Modification</title>
        <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <style>
            .bd-placeholder-img{
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px){
                .bd-placeholder-img-lg{
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
                <h1 class="h3 mb-3 fw-normal">modif Bateau
                <?= $bateau->getNomBateau() ?>
                </h1>
                <div class="form-floating">
                    <input name="name" type="text" class="form-control" id="floatingInput" placeholder="bateau" value="<?= $bateau->getNomBateau() ?>" required>
                    <label for="floatingInput">Nom</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" name="envoi" type="submit">Modifier</button>
            </form>
            <?php
                if (isset($_POST['envoi'])){
                    $name = strip_tags($_POST['name']);
                    $erreur = $bateau->updateBateau($name);
                    header("Location:admin.php");
                    echo "<p style=color:#FF0000><b>" . $erreur . "</b></p>";
                } else{
                    echo "<p>&nbsp;</p>";
                }
            ?>
            <input type="button" value="Annuler" class="w-100 btn btn-lg btn-primary" onClick="window.location.href='admin.php'" />
        </main>
    </body>
</html>