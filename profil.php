<!DOCTYPE html>
<html lang="fr">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>LiveQuestion</title>
      <link rel="stylesheet" type="text/css" href="styles/profil.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="script.js"></script>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
   </head>
   <body>
      <!-- NAVBAR -->
      <?php
      session_start();
      if (!isset($_SESSION["pseudo"])) {
         header("Location: connection.php");
         exit();
      }

      if (isset($_GET["pseudo_id"])) {
         $id = $_GET["pseudo_id"];
      } else {
         $id = $_SESSION["pseudo_id"];
      }


      if ($id == $_SESSION["pseudo_id"]) {
         $modifiable = true;
      } else {
         $modifiable = false;
      }

      include("lqnavbar.php");

      require("DB/connexion.php");

      function getCateg($id) {
         $co = connexionBdd();
         $query = $co->prepare("SELECT nom FROM categories WHERE id=:id");
         $query->bindParam(":id", $id);
         $query->execute();
         $result = $query->fetch();
         return $result["nom"];
      }

      function getAuteur($id) {
         $co = connexionBdd();
         $query = $co->prepare("SELECT pseudo FROM utilisateurs WHERE id=:id");
         $query->bindParam(":id", $id);
         $query->execute();
         $result = $query->fetch();
         return $result["pseudo"];
      }


      function changeLikeIcon($like_question_id) {
         $co = connexionBdd();
         $query = $co->prepare("SELECT * FROM likes WHERE utilisateur_id=:pseudo_id AND question_id=:question_id");
         $query->bindParam(":question_id", $like_question_id);
         $query->bindParam(":pseudo_id", $_SESSION["pseudo_id"]);
         $query->execute();
         $row = $query->rowCount();
         if ($row == 1) {
            return "fas fa-heart";
         } else {
            return "far fa-heart";
         }
      }

      $co = connexionBdd();

      $query = $co->prepare("SELECT * FROM utilisateurs WHERE id=:id");
      $query->bindParam(":id", $id);
      $query->execute();
      $result = $query->fetch();
      ?>
      <section>
         <div class="container">
            <h3>Profil de <?php echo $result['pseudo']; ?></h3>
            <p>Genre: <?php if ($result['genre'] == "H") { echo "Homme"; } else { echo "Femme"; }; ?></p>
            <p>Date d'inscription: <?php echo $result['date_inscription']; ?></p>
            <br>
            <?php

            if ($modifiable) {
               ?>
               <h2>Supprimer mon compte:</h2>
               <form action="" method="POST">
                  <input type="submit" name="submitDelete" value="Supprimer">
               </form>
               <?php
            }

            if (isset($_POST["submitDelete"])) {
               $query = $co->prepare("DELETE FROM repondre WHERE utilisateurs_id=:pseudo_id");
               $query->bindParam(":pseudo_id", $id);
               $query->execute();
       
               $query = $co->prepare("DELETE FROM questions WHERE auteur_id=:pseudo_id");
               $query->bindParam(":pseudo_id", $id);
               $query->execute();
               
               $query = $co->prepare("DELETE FROM utilisateurs WHERE id=:pseudo_id");
               $query->bindParam(":pseudo_id", $id);
               $query->execute();
               if ($query) {
                   $_SESSION = array();
                   sleep(2);
                   header("Location: index.php");
               }
            }
            

            ?>
            <br>
            <h3>Questions Posées:</h3>
            <br>
            <?php

            $co = connexionBdd();
            $query = $co->prepare("SELECT * FROM questions WHERE auteur_id=:id");
            $query->bindParam(":id", $id);
            $query->execute();
            $results = $query->fetchAll();
            foreach (array_reverse($results) as $result) {
               $query = $co->prepare("SELECT count(*) from repondre WHERE questions_id=:question_id");
               $query->bindParam(":question_id", $result[0]);
               $query->execute();
               $responseNumber = $query->fetch();
               $query = $co->prepare("SELECT * from likes WHERE question_id=:question_id");
               $query->bindParam(":question_id", $result[0]);
               $query->execute();
               $likesNumber = $query->rowCount();
               $likeIcon = changeLikeIcon($result[0]);
               echo "<div class='toast show' role='alert' aria-live='assertive' aria-atomic='true'>",
                  "<div class='toast-header'>",
                  "<strong class='mr-auto'><a href=''>" . getAuteur($result[3]) . "</a> | $responseNumber[0] réponses | " . getCateg($result[2]) . " | <a href='like.php?question_id=$result[0]'><i class='$likeIcon'></i></a> $likesNumber</strong>
                  <small>$result[4]</small>",
                  "</div>",
                  "<div class='toast-body'>",
                  "<a href='question.php?question_id=$result[0]'>$result[1]</a>",
                  "</div>",
                  "</div>";
            }

            ?>
         </div>
      </section>
   </body>
</html>