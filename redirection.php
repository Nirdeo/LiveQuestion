<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LiveQuestion</title>
</head>

<body>
	<?php
	session_start();

	if (!isset($_SESSION["username"])) {
		header("Location: connexion.php");
	}else {
		header("Location: hConnexion/hConnexion.php");
	}
	?>
</body>

</html>