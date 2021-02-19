<head>
    <link rel="stylesheet" type="text/css" href="../style/lqnavbarStyle.css">
</head>

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
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanses="false">Mon profil</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="../EspaceMembre/espacemembre.php">Accéder à mon profil</a>
                    <a class="dropdown-item" href="../LiveQuestion/index.php">Déconnexion</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
 <!-- MODAL -->
            <div class="modal fade" id="questionModal" tabindex="-1" aria-labelledby="questionModalLabel" aria-hidden="true">
               <div class="modal-dialog" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="questionModalLabel">Posez une question <i class="fas fa-pen"></i></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     <div class="modal-body"><form action="hConnexion.php" method="post">
                         <label for="categorie">Choisissez une catégorie :</label>
                         <select name="categorie" id="categorie">
                         <option value="musique">Musique</option>
                         <option value="sport">Sport</option>
                         <option value="cinema">Cinéma</option>
                         </select><br>
                        <label for="question">Contenu de la question :</label>
                        <textarea id="question" name="question" rows="5" cols="62" maxlength="255"></textarea>
                         <input type="submit" value="Ajouter une question" class="btn btn-primary">
                         </form>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Annuler</button>
                     </div>
                  </div>
               </div>
            </div>
