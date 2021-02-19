<!DOCTYPE html>
<html lang="fr">

<head>
    <title>LiveQuestion</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="espacemembre.css">
    <script src="script.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
</head>

<body>
    <!-- NAVBAR -->
    <?php
    include ("../lqnavbar.php");
    ?>
    <section>
        <div class="container">
            <h3>Espace Membre</h3>
            <h1>Bienvenue dans votre espace membre NomUtilisateur !</h1><br>
            <!-- CARD -->
            <div class="card mb-3">
                <h3 class="card-header">Modifier mes informations <i class="fas fa-cog"></i></h3>
                <svg for="file" xmlns="http://www.w3.org/2000/svg" class="d-block user-select-none" width="100%" height="200" aria-label="Placeholder: Mon avatar" focusable="false" role="img" preserveAspectRatio="xMidYMid slice" viewBox="0 0 318 180" style="font-size:1.125rem;text-anchor:middle">
                    <rect width="100%" height="100%" fill="#868e96"></rect>
                    <text x="50%" y="50%" fill="#dee2e6" dy=".3em">Mon avatar</text>
                </svg>
                <input type="file" id="file">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Nom d'utilisateur <i class="fas fa-pen"></i></li>
                    <li class="list-group-item">Adresse email <i class="fas fa-pen"></i></li>
                    <li class="list-group-item">Mot de passe <i class="fas fa-pen"></i></li>
                </ul>
            </div>
        </div>
    </section>
</body>

</html>
