<!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>LiveQuestion</title>
      <link rel="stylesheet" type="text/css" href="espacemembre.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="script.js"></script>
      <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
   </head>
   <body>
      <!-- NAVBAR -->
      <?php include("../lqnavbar.php"); ?>
      <section>
         <div class="container">
            <h3>Espace Membre</h3>
            <h1>Bienvenue dans votre espace membre NomUtilisateur !</h1>
            <br>
            <!-- CARD -->
            <div class="card mb-3">
               <h3 class="card-header"><a href="espacemembre.php">Modifier mes informations <i class="fas fa-cog"></i></a></h3>
               <svg for="file" xmlns="http://www.w3.org/2000/svg" class="d-block user-select-none" width="100%" height="200" aria-label="Placeholder: Mon avatar" focusable="false" role="img" preserveAspectRatio="xMidYMid slice" viewBox="0 0 318 180" style="font-size:1.125rem;text-anchor:middle">
                  <rect width="100%" height="100%" fill="#868e96"></rect>
                  <text x="50%" y="50%" fill="#dee2e6" dy=".3em">Mon avatar</text>
               </svg>
               <form class="form" action="<?php echo 'Udespacemembre.php?id='.$id;?>" role="form" method="post" enctype="multipart/form-data">
                  <label for="avatar"></label>
                  <input type="file" id="avatar" name="avatar">
                  <ul class="list-group list-group-flush">
                     <li class="list-group-item">  <label for="utilisateur">Nom d'utilisateur</label>
                        <input type="text" id="utilisateur" name="utilisateur">
                     </li>
                     <li class="list-group-item"><label for="email">Adresse email</label>
                        <input type="email" id="email" name="email">
                     </li>
                     <li class="list-group-item"><label for="password">Mot de passe</label>
                        <input type="password" id="password" name="password">
                     </li>
                  </ul>
                  <button type="submit" class="btn btn-success">Modifier</button>
               </form>
            </div>
         </div>
      </section>
   </body>
</html>