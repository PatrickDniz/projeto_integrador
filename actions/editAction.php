<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lista Telefonica - Edição</title>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="./../src/style.css" media="screen">
	
</head>

<body>
<?php
require_once("dbConnection.php");

if (isset($_POST['update'])) {
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$telephone = mysqli_real_escape_string($mysqli, $_POST['telephone']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);	
	
	if (empty($name) || empty($telephone) || empty($email)) {
		if (empty($name)) {
			echo "<div class='alert'>Campo de Nome vazio.</div>";
		}
		
		if (empty($telephone)) {
			echo "<div class='alert'>Campo de Telefone vazio.</div>";
		}
		
		if (empty($email)) {
			echo "<div class='alert'>Campo de Email vazio.</div>";
		}
	} else {
		$result = mysqli_query($mysqli, "UPDATE users SET `name` = '$name', `telephone` = '$telephone', `email` = '$email' WHERE `id` = $id");
		
		header("Location: ./../index.php"); 
	}
}
?>
</body>
</html>
