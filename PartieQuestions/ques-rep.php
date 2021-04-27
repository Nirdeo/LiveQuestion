<!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>LiveQuestion</title>
      <link rel="stylesheet" type="text/css" href="ques-rep.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="script.js"></script>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
   </head>
   <body>
      <!-- NAVBAR -->
      <?php include("../lqnavbar.php"); ?>
      <section>
         <div class="container">
            <h3><a href="ques-rep.php">Titre de la question</a></h3>
            <!-- TOAST -->
            <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
               <div class="toast-header">
                  <strong class="mr-auto"><a href="../VueMembre/vuemembre.php"><i class="fas fa-user-circle"></i> NomUtilisateur</a> | nbr avis récoltés | Catégories | <i class="far fa-heart"></i></strong>
                  <small>Date de la question</small>
               </div>
               <div class="toast-body">
                  Question ?
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <h3><span class="roselq">Nbr</span> Réponses</h3>
                  <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                     <div class="toast-header">
                        <strong class="mr-auto"><a href="../VueMembre/vuemembre.php"><i class="fas fa-user-circle"></i> NomUtilisateur</a> | <i class="far fa-heart"></i></strong>
                        <small>Date de la réponse</small>
                     </div>
                     <div class="toast-body">
                        Réponse !
                     </div>
                  </div>
                  <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                     <div class="toast-header">
                        <strong class="mr-auto"><a href="../VueMembre/vuemembre.php"><i class="fas fa-user-circle"></i> NomUtilisateur</a> | <i class="far fa-heart"></i></strong>
                        <small>Date de la réponse</small>
                     </div>
                     <div class="toast-body">
                        Réponse !
                     </div>
                  </div>
               </div>
               <!-- FORMULAIRE -->
               <div class="col-md-6">
                  <h3>Répondre à la question</h3>
                  <div class="row">
                     <div class="col-md-6">
                        <form action="ques-rep.php" method="post">
                           <label for="pseudo">Votre pseudo</label><br>
                           <input type="text" id="pseudo" name="pseudo"><br>
                           <label for="avatar">Lien web vers votre avatar</label><br>
                           <input type="text" id="avatar" name="avatar"><br>
                           <label for="reponse">Votre réponse</label><br>
                           <textarea id="reponse" name="reponse"></textarea>
                           <br>
                           <input type="submit" class="rosebutton">
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </body>
</html>