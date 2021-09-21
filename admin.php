<?php
    require_once("session.php");
    require_once("class/user.php");
    require_once("class/GPS.php");

    $User = new user($BDD);
    $User->getuser($_SESSION['id']);
    $bateau = new GPS($BDD);
    
    if (!isset($_SESSION['id'])){
        header("Location: connexion.php");
    }
    if ($User->getadmin() == 0){
        header("Location: accueil.php");
    }
    if (isset($_POST['deconnexion'])){
        $User->deconnexion();
    }
    if (isset($_GET['supr'])){
        $User->removeUser($_GET['supr']);
        header("Location: admin.php");
    }
    if (isset($_GET['suprBateau'])){
        $bateau->removeGPS($_GET['suprBateau']);
        header("Location: admin.php");
    }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Administrateur</title>
        <link rel="icon" href="image/logo_providence.png" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/headers/">
        <!-- Bootstrap core CSS -->
        <link href="css/assets/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/headers.css" rel="stylesheet">
        <link href="css/admin.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
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
        <div class="container-xl">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-5">
                                <h2>User <b>Panel</b></h2>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Pseudo</th>
                                <th>Mots de passe</th>
                                <th>Type Utilisateur</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $User->giveuser();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="container-xl">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-5">
                                <h2>Coordonnées <b>Panel</b></h2>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>id_bateau</th>
                                <th>Nom</th>
                                <th>latitude</th>
                                <th>longitude</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $bateau->givecoordonerplsunom(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>