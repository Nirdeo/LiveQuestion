<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>LiveQuestion</title>
      <link rel="stylesheet" type="text/css" href="styles/inscriptionStyle.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="script.js"></script>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
   </head>
   <body>
      <div class="wrapper">
         <div class="loginBox">
            <h1>S'inscrire</h1>
            <form action="" method="post" name="register">
               <input type="text" name="username" placeholder="Enter votre nom d'utilisateur">
               <input type="email" name="email" placeholder="Enter votre Adresse mail">
               <p>Genre :</p>
               <div class="radioInput">
                  <label for="homme">Homme</label>
                  <input type="radio" name="genre" value="H">
                  <label for="femme">Femme</label>
                  <input type="radio" name="genre" value="F">
               </div>
               <input type="password" name="password" placeholder="Enter votre mot de passe">
               <input type="password" name="passwordC" placeholder="Confirmer votre mot de passe">
               <input type="submit" name="submit" value="valider">
               <p>Vous avez deja un compte ? <a href="connexion.php"> Se connecter !</a></p>
            </form>
         </div>
      </div>
</html>