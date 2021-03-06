<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>LiveQuestion</title>
      <link rel="stylesheet" type="text/css" href="styles/connexionStyle.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="script.js"></script>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
      <link rel="icon" href="img/favicon.png" type="image/png">
   </head>
   <body>
      <?php
      require("DB/connexion.php");
      session_start();
      $co = connexionBdd();
      $message = "";

      //Connexion de l'utilisateur si le pseudo et le mot de passe est bon
      if (isset($_POST["submit"])) {
         $pseudo = $_POST["pseudo"];
         $password = hash('sha256', $_POST["password"]);

         $query = $co->prepare("SELECT * FROM utilisateurs WHERE pseudo=:pseudo and mot_de_passe=:password");
         $query->bindParam(":pseudo", $pseudo);
         $query->bindParam(":password", $password);
         $query->execute();
         $result = $query->fetchAll();
         $rows = $query->rowCount();
         if ($rows == 1) {
               $_SESSION["pseudo"] = $pseudo;
               $_SESSION["pseudo_id"] = $result[0]["id"];
               $_SESSION["pseudo_role"] = $result[0]["role"];
               $_SESSION["pseudo_email"] = $result[0]["email"];
               $_SESSION["pseudo_avatar"] = $result[0]["avatar"];
               header("Location: accueil.php");
         } else {
               $message = "Le nom d'utilisateur ou le mot de passe est incorrect";
         }
      }



      ?>
      <div class="wrapper">
         <div class="loginBox">
            <h1>Se connecter</h1>
            <h3><?php echo $message; ?></h3>
            <form action="" method="post">
               <p>Nom d'utilisateur</p>
               <input type="text" name="pseudo" placeholder="Entrez votre nom d'utilisateur">
               <p>mot de passe</p>
               <input type="password" name="password" placeholder="Entrez votre mot de passe">
               <input type="submit" name="submit" value="valider">
               <p><span class="lienExterne">Vous n'avez pas de compte ? <a href="inscription.php"> S'inscrire
                  maintenant !</span></a>
               </p>
            </form>
            <a href="index.php"><button type="button" class="btn btn-secondary">Retourner à l'accueil</button></a>
         </div>
      </div>
   </body>
</html>