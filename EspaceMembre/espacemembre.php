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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="../index.php">Livequestion</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor03">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="hConnexion.php">Les questions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#questionModal">Poser une question</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../EspaceMembre/espacemembre.php">Mon profil</a>
                </li>
            </ul>
        </div>
    </nav>
    <section>
        <div class="container">
            <h3>Espace Membre</h3>
            <h1>Bienvenue dans votre espace membre NomUtilisateur !</h1><br>
<<<<<<< Updated upstream
=======
            <!-- CARD -->
>>>>>>> Stashed changes
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
