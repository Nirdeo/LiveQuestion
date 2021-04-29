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
   <link rel="icon" href="img/favicon.png" type="image/png">
   <script src="script/profilScript.js"></script>
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

      function getAvatar($id) {
         $co = connexionBdd();
         $query = $co->prepare("SELECT avatar FROM utilisateurs WHERE id=:id");
         $query->bindParam(":id", $id);
         $query->execute();
         $result = $query->fetch();
         return $result["avatar"];
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
         <div class="main-body">
            <div class="row gutters-sm">
               <div class="col-md-12 mb-3">
                  <div class="card">
                     <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                           <img class=" rounded-circle avatar2" src="<?php echo getAvatar($id); ?>" width="150">
                           <div class="mt-3">
                              <h4>Profil de <br>
                                 <?php echo $result['pseudo']; ?>
                              </h4>
                              <p class="text-secondary mb-1">Genre:
                                 <?php if ($result['genre'] == "H") { echo "Homme ♂️"; } else { echo "Femme ♀"; }; ?>
                              </p>
                              <p class="text-muted font-size-sm">Date d'inscription:
                                 <?php echo $result['date_inscription']; ?>
                              </p>

            <?php
            if ($modifiable) {
               ?>
                              <div class="modifyDiv">
                                 <button type="button" class="btn btn-primary modifyButton"
                                    onclick="location.href='modifier.php';">Modifier mes informations <i
                                       class="fas fa-user-cog"></i></button>
                                 <button type="button" class="btn btn-outline-primary modifyButton" onclick="submitDelete()">Me désinscrire <i class="fas fa-user-times"></i></button>
                                 <form action="" method="POST" name="deleteForm">
                                    <input type="text" name="submitDelete" style="display: none;">
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <?php
            }

            if (isset($_POST["submitDelete"])) {

               $query = $co->prepare("DELETE FROM likes WHERE utilisateur_id=:pseudo_id");
               $query->bindParam(":pseudo_id", $id);
               $query->execute();

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
                   header("Location: index.php");
               }
            }


            ?>
         <br>
         <h3>Mes questions posées:</h3>
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
                  "<strong class='mr-auto'><img class='avatar' src='" . getAvatar($result[3]) . "'> <a href='profil.php?pseudo_id=$result[3]'>" . getAuteur($result[3]) . "</a> | $responseNumber[0] réponses | " . getCateg($result[2]) . " | <a href='like.php?question_id=$result[0]'><i class='$likeIcon'></i></a> $likesNumber</strong>
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