<!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>LiveQuestion</title>
      <link rel="stylesheet" type="text/css" href="styles/nouvellequestion.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="script.js"></script>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
      <link rel="icon" href="img/favicon.png" type="image/png">
   </head>
   <body>
      <?php
         session_start();
         if (!isset($_SESSION["pseudo"])) {
             header("Location: connection.php");
             exit();
         }

         require("DB/connexion.php");
         $message = "";

         $co = connexionBdd();

         if (isset($_POST["submit"])) {
             if (isset($_POST["title"], $_POST["categorie"])) {
                 $pseudo_id = $_SESSION["pseudo_id"];
                 $title = $_POST["title"];
                 $categorie = $_POST["categorie"];
                 date_default_timezone_set('Europe/Paris');
                 $date = date('Y-m-d H:i:s');

                 $query = $co->prepare("INSERT into questions (titre, categorie_id, auteur_id, date_creation) VALUES (:title, :categorie, :pseudo_id, :date)");
                 $query->bindParam(":title", $title);
                 $query->bindParam(":categorie", $categorie);
                 $query->bindParam(":pseudo_id", $pseudo_id);
                 $query->bindParam(":date", $date);
                 $query->execute();
                 if ($query) {
                     $message = "Votre question a bien été envoyée !";
                 }
             }
         }
         ?>
      <?php include("lqnavbar.php"); ?>
      <h3>Ajouter une nouvelle question :</h3>
      <form action="" method="POST">
         <div class="form-outline mb-4">
            <label class="col-form-label" for="title">Contenu de la question</label>
            <input type="text" name="title" id="title" class="form-control">
         </div>
         <div class="form-outline mb-4">
            <label class="form-label" for="categorie">Catégorie de la question</label>
            <select class="custom-select" name="categorie" id="categorie">
            <?php
               $query = $co->prepare("SELECT * FROM categories");
               $query->execute();
               $results = $query->fetchAll();
               foreach ($results as $result) {
                   echo "<option value='$result[0]'>$result[1]</option>";
               }
               ?>
            </select>
         </div>
         <input type="submit" name="submit" class="btn btn-primary btn-block mb-4" value="Envoyer">
      </form>
      <p><?php echo $message; ?></p>
   </body>
</html>