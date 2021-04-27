<link rel="stylesheet" type="text/css" href="styles/lqnavbarStyle.css">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
   <a class="navbar-brand" href="index.php">Livequestion</a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03"
      aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse" id="navbarColor03">
      <ul class="navbar-nav mr-auto">
         <li class="nav-item">
            <a class="nav-link" href="accueil.php">Les questions</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="nouvellequestion.php">Poser une question</a>
         </li>
         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
               aria-expanses="false">Mon profil</a>
            <div class="dropdown-menu">
               <a class="dropdown-item" href="profil.php">Accéder à mon profil</a>
               <a class="dropdown-item" href="logout.php">Déconnexion</a>
               <?php
               if ($_SESSION["pseudo_role"] == "admin") {
                  echo "<a class='dropdown-item' href='admin.php'>Page Admin</a>";
               }
               ?>
            </div>
         </li>
      </ul>
   </div>
</nav>
