<?php
    require_once("session.php");
    require_once("class/user.php");
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
        <title>Acceuil</title>
        <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/headers/">
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
        <link href="css/headers.css" rel="stylesheet">
    </head>
    <body>
        <main>
            <div class="container">
                <header
                    class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
                    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                    </a>
                    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>
                        <li><a href="#" class="nav-link px-2 link-dark">About</a></li>
                    </ul>
                    <div class="col-md-3 text-end">
                      <form method = "POST" action="connexion.php">
                        <button type="submit" class="btn btn-primary" name="deconnexion">Déconnexion</button>
                      </form>
                    </div>
                </header>
            </div>
        </main>
        <?php
            if(isset($_POST['deconnexion'])){
                $User->deconnexion();
            }
        ?>
        <script src="css/assets/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>