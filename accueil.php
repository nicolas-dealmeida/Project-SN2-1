<?php
    require_once("session.php");
    require_once("class/user.php");

    $User = new user($BDD);
    $User->getuser($_SESSION['id']);
    
    if (!isset($_SESSION['id'])){
        header("Location: connexion.php");
    }

    if (isset($_POST['deconnexion'])){
        $User->deconnexion();
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
        <title>Acceuil</title>
        <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/headers/">
        <!-- Bootstrap core CSS -->
        <link href="css/assets/dist/css/bootstrap.min.css" rel="stylesheet">
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
        <link href="css/headers.css" rel="stylesheet">
    </head>
    <body>
        <main>
            <div class="container">
                <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
                    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none"></a>
                    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="accueil.php" class="nav-link px-2 link-secondary">Home</a></li>
                        <li><a href="map.php" class="nav-link px-2 link-dark">Map</a></li>
                        <?php
                            if($User->getadmin() == 1){
                                ?>
                                    <li><a href="admin.php" class="nav-link px-2 link-secondary">Administrateur</a></li>
                                <?php
                            }
                        ?>
                    </ul>
                    <div class="col-md-3 text-end">
                        <form method="POST" action="">
                            <input type="submit" class="btn btn-primary" name="deconnexion" value="Déconnexion">
                        </form>
                    </div>
                </header>
            </div>
        </main>
    </body>
</html>