<!DOCTYPE html>
<html lang="fr">
   <head>
      <title>LiveQuestion</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
      <link rel="stylesheet" type="text/css" href="styles/modifier.css">
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
    $messagePA = "";
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

    function has_special_chars($string) {
        return preg_match('/[^a-zA-Z\d]/', $string);
     }

     function passwordVerification($pass) {
        if (strlen($pass) >= 8 && has_special_chars($pass) > 0) {
           return true;
        } else {
           return false;
        }
     }

     function oldPasswordVerification($pass) {
        $pass = hash('sha256', $pass); 
        $co = connexionBdd();
        $query = $co->prepare("SELECT * FROM utilisateurs WHERE id=:id AND mot_de_passe=:pass");
        $query->bindParam(":id", $_SESSION["pseudo_id"]);
        $query->bindParam(":pass", $pass);
        $query->execute();
        $row = $query->rowCount();
        if ($row == 1) {
            return true;
        } else {
            return false;
        }
     }


    if (isset($_POST["submitPseudo"])) {
        if (!empty($_POST["pseudo"])) {
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
        } else {
            $messageP = "Les champs ne peuvent pas etre vides";
        }
    }

    if (isset($_POST["submitEmail"])) {
        if (!empty($_POST["email"])) {
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
        } else {
            $messageE = "Les champs ne peuvent pas etre vides";
        }
    }

    if (isset($_POST["submitPass"])) {
        if (!empty($_POST["passOld"]) && !empty($_POST["passNew"])) {
            if ($_POST["passOld"] != $_POST["passNew"]) {
                if (passwordVerification($_POST["passNew"])) {
                    if (oldPasswordVerification($_POST["passOld"])) {
                        $passNew = hash('sha256', $_POST["passNew"]);
                        $query = $co->prepare("UPDATE utilisateurs SET mot_de_passe=:pass WHERE id=:id");
                        $query->bindParam(":id", $_SESSION["pseudo_id"]);
                        $query->bindParam(":pass", $passNew);
                        $query->execute();
                        if ($query) {
                            $messagePA = "Modification effectue";
                        }
                    } else {
                        $messagePA = "Votre ancien mot de passe est incorrect";
                    }
                } else {
                    $messagePA = "Votre nouveau mot de passe doit contenir 8 caracteres et au moins un charactere special";
                }
            } else {
                $messagePA = "Votre nouveau mot de passe ne peut pas etre le meme que l'ancien";
            }
        } else {
            $messagePA = "Les champs ne peuvent pas etre vides";
        }
    }

    if (isset($_POST["submitAvatar"])) {
        if (!empty($_POST["avatar"])) {
            $query = $co->prepare("UPDATE utilisateurs SET avatar=:avatar WHERE id=:pseudo_id");
            $query->bindParam(":avatar", $_POST["avatar"]);
            $query->bindParam(":pseudo_id", $_SESSION["pseudo_id"]);
            $query->execute();
            if ($query) {
                $messageA = "Modification effectue";
                $_SESSION["pseudo_avatar"] = $_POST["avatar"];
            }
        } else {
            $messageA = "Les champs ne peuvent pas etre vides";
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

    <h3>Modifier Mot De passe:</h3>
    <form action="" method="POST">
        <label for="passOld">Votre ancien mot de passe</label>
        <input type="password" name="passOld">
        <label for="passNew">Votre nouveau mot de passe</label>
        <input type="password" name="passNew">
        <input type="submit" name="submitPass" value="Modifier">
        <p><?php echo $messagePA; ?></p>
    </form>

    <h3>Modifier Avatar (lien web uniquement):</h3>
    <form action="" method="POST">
        <input type="url" name="avatar" value="<?php echo $_SESSION['pseudo_avatar'] ?>">
        <input type="submit" name="submitAvatar" value="Modifier">
        <p><?php echo $messageA; ?></p>
    </form>


   </body>
</html>