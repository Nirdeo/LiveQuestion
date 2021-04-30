<!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>LiveQuestion</title>
      <link rel="stylesheet" type="text/css" href="styles/question.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="script.js"></script>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
      <link rel="icon" href="img/favicon.png" type="image/png">
   </head>
   <body>
      <!-- NAVBAR -->
      <?php
      session_start();
      include("lqnavbar.php");
      ?>
      <section>
         <div class="container">
         <?php
         if (!isset($_SESSION["pseudo"], $_GET["question_id"])) {
            header("Location: connexion.php");
            exit();
         }

         require("DB/connexion.php");
         $message = "";


         function getAuteur($id) {
            $co = connexionBdd();
            $query = $co->prepare("SELECT pseudo FROM utilisateurs WHERE id=:id");
            $query->bindParam(":id", $id);
            $query->execute();
            $result = $query->fetch();
            return $result["pseudo"];
         }

         function getCateg($id) {
            $co = connexionBdd();
            $query = $co->prepare("SELECT nom FROM categories WHERE id=:id");
            $query->bindParam(":id", $id);
            $query->execute();
            $result = $query->fetch();
            return $result["nom"];
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

         $query = $co->prepare("SELECT * FROM questions WHERE id=:id");
         $query->bindParam(":id", $_GET["question_id"]);
         $query->execute();
         $result = $query->fetch();
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
                    "$result[1]",
                    "</div>",
                    "</div>";
         ?>
            <div class="row">
               <div class="col-md-6">
                  <h3>Réponses :</h3>
                  <?php
                  $query = $co->prepare("SELECT * FROM repondre WHERE questions_id=:id");
                  $query->bindParam(":id", $_GET["question_id"]);
                  $query->execute();
                  $results = $query->fetchAll();
                  foreach (array_reverse($results) as $result) {
                      echo "<div class='toast show' role='alert' aria-live='assertive' aria-atomic='true'>",
                           "<div class='toast-header'>",
                           "<strong class='mr-auto'><img class='avatar' src='" . getAvatar($result[0]) . "'> <a href='profil.php?pseudo_id=$result[0]'>" . getAuteur($result[0]) . "</a></strong>",
                           "<small>$result[2]</small>",
                           "</div>",
                           "<div class='toast-body'>",
                           "$result[3]",
                           "</div>",
                           "</div>";
                  }
                  ?>
               </div>
               <?php
               if (isset($_POST["submit"])) {
                  $reponse = $_POST["reponse"];
                  date_default_timezone_set('UTC');
                  $date = date('Y-m-d H:i:s');

                  $query = $co->prepare("INSERT INTO repondre (utilisateurs_id, questions_id, date, reponse) VALUES (:pseudo_id, :question_id, :date, :reponse)");
                  $query->bindParam(":reponse", $reponse);
                  $query->bindParam(":date", $date);
                  $query->bindParam(":pseudo_id", $_SESSION["pseudo_id"]);
                  $query->bindParam(":question_id", $_GET["question_id"]);
                  try {
                     $query->execute();
                     if ($query) {
                        $message = "Votre réponse a été soumise";
                    }
                  } catch (Exception $e) {
                     $message = "Vous avez déjà répondu a cette question";
                  }
               }
               ?>


               <!-- FORMULAIRE -->
               <div class="col-md-6">
                  <h3>Répondre à la question</h3>
                  <div class="row">
                     <div class="col-md-6">
                        <form action="" method="post">
                           <label for="reponse">Votre réponse :</label><br>
                           <textarea id="reponse" name="reponse"></textarea>
                           <br>
                           <input type="submit" name="submit" class="rosebutton">
                        </form>
                        <p><?php echo $message; ?></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </body>
</html>