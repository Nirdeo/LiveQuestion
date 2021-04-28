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
    if (!isset($_SESSION["pseudo"]) || !isset($_SESSION["pseudo_id"])) {
       header("Location: connexion.php");
       exit();
    }

    include("lqnavbar.php");
    require("DB/connexion.php");

    $messageP = "";
    $messageE = "";
    $messageA = "";

    $co = connexionBdd();

    function pseudoUnique($pseudoStr) {
        $co = connexionBdd();
        $query = $co->prepare("SELECT * FROM utilisateurs WHERE pseudo=:pseudo");
        $query->bindParam(":pseudo", $pseudoStr);
        $query->execute();
        $row = $query->rowCount();
        
        if ($row == 1) {
            return false;
        } else {
            return true;
        }
    }

    function emailUnique($emailStr) {
        $co = connexionBdd();
        $query = $co->prepare("SELECT * FROM utilisateurs WHERE email=:email");
        $query->bindParam(":email", $emailStr);
        $query->execute();
        $row = $query->rowCount();

        if ($row == 1) {
            return false;
        } else {
            return true;
        }
    }


    if (isset($_POST["submitPseudo"])) {
        if (pseudoUnique($_POST["pseudo"])) {
            $query = $co->prepare("UPDATE utilisateurs SET pseudo=:pseudo WHERE id=:pseudo_id");
            $query->bindParam(":pseudo", $_POST["pseudo"]);
            $query->bindParam(":pseudo_id", $_SESSION["pseudo_id"]);
            $query->execute();
            if ($query) {
                $messageP = "Modification effectue";
                $_SESSION["pseudo"] = $_POST["pseudo"];
            }
        } else {
            $messageP = "This pseudo already exist";
        }
    }

    if (isset($_POST["submitEmail"])) {
        if (emailUnique($_POST["email"])) {
            $query = $co->prepare("UPDATE utilisateurs SET email=:email WHERE id=:pseudo_id");
            $query->bindParam(":email", $_POST["email"]);
            $query->bindParam(":pseudo_id", $_SESSION["pseudo_id"]);
            $query->execute();
            if ($query) {
                $messageE = "Modification effectue";
                $_SESSION["pseudo_email"] = $_POST["email"];
            }
        } else {
            $messageE = "This email already exist";
        }
    }

    if (isset($_POST["submitAvatar"])) {
        $query = $co->prepare("UPDATE utilisateurs SET avatar=:avatar WHERE id=:pseudo_id");
        $query->bindParam(":avatar", $_POST["avatar"]);
        $query->bindParam(":pseudo_id", $_SESSION["pseudo_id"]);
        $query->execute();
        if ($query) {
            $messageA = "Modification effectue";
            $_SESSION["pseudo_avatar"] = $_POST["avatar"];
        }
    }


    ?>
    

    <h3>Modifier Pseudo:</h3>
    <form action="" method="POST">
        <input type="text" name="pseudo" value="<?php echo $_SESSION['pseudo'] ?>">
        <input type="submit" name="submitPseudo" value="Modifier">
        <p><?php echo $messageP; ?></p>
    </form>

    <h3>Modifier Email:</h3>
    <form action="" method="POST">
        <input type="email" name="email" value="<?php echo $_SESSION['pseudo_email'] ?>">
        <input type="submit" name="submitEmail" value="Modifier">
        <p><?php echo $messageE; ?></p>
    </form>

    <h3>Modifier Avatar (lien web uniquement):</h3>
    <form action="" method="POST">
        <input type="text" name="avatar" value="<?php echo $_SESSION['pseudo_avatar'] ?>">
        <input type="submit" name="submitAvatar" value="Modifier">
        <p><?php echo $messageA; ?></p>
    </form>


   </body>
</html>