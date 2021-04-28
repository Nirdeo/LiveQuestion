<!DOCTYPE html>
<html lang="fr">
   <head>
      <title>LiveQuestion</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
      <link rel="stylesheet" type="text/css" href="styles/admin.css">
      <script src="script.js"></script>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
      <link rel="icon" href="img/favicon.png" type="image/png">
   </head>
   <body>
      <!-- NAVBAR -->
    <?php
    session_start();
    if (!isset($_SESSION["pseudo"]) || $_SESSION["pseudo_role"] != "admin") {
       header("Location: connexion.php");
       exit();
    }
    ?>
    <?php include("lqnavbar.php"); ?>
      <section>
         <div class="container">
         <?php

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
         $query = $co->query("SELECT * FROM questions");
         $results = $query->fetchAll();
         foreach (array_reverse($results) as $result) {
            $query = $co->prepare("SELECT count(*) from repondre WHERE questions_id=:question_id");
            $query->bindParam(":question_id", $result[0]);
            $query->execute();
            $responseNumber = $query->fetch();
            echo "<div class='toast show' role='alert' aria-live='assertive' aria-atomic='true'>",
                 "<div class='toast-header'>",
                 "<strong class='mr-auto'><a href='profil.php?pseudo_id=$result[3]'>" . getAuteur($result[3]) . "</a> | $responseNumber[0] réponses | " . getCateg($result[2]) . " | <i class='far fa-heart'></i></strong>
                 <small>$result[4]</small>",
                 "<a href='delete.php?question_id=$result[0]'><button type='button'>Supprimer</button></a>",
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