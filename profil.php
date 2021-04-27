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
      <?php include("lqnavbar.php"); ?>
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
               echo "<div class='toast show' role='alert' aria-live='assertive' aria-atomic='true'>",
                  "<div class='toast-header'>",
                  "<strong class='mr-auto'><a href=''>" . getAuteur($result[3]) . "</a> | $responseNumber[0] réponses | " . getCateg($result[2]) . " | <i class='far fa-heart'></i></strong>
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