<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lista Telefonica - Adição</title>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="./../src/style.css" media="screen">
</head>

<body>
<?php
require_once("dbConnection.php");

if (isset($_POST['submit'])) {
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
		
		echo "<a href='javascript:self.history.back();' class='float_button'>
			<svg stroke='currentColor' fill='currentColor' stroke-width='0' viewBox='0 0 512 512' height='1em' width='1em' xmlns='http://www.w3.org/2000/svg'><path d='M212.333 224.333H12c-6.627 0-12-5.373-12-12V12C0 5.373 5.373 0 12 0h48c6.627 0 12 5.373 12 12v78.112C117.773 39.279 184.26 7.47 258.175 8.007c136.906.994 246.448 111.623 246.157 248.532C504.041 393.258 393.12 504 256.333 504c-64.089 0-122.496-24.313-166.51-64.215-5.099-4.622-5.334-12.554-.467-17.42l33.967-33.967c4.474-4.474 11.662-4.717 16.401-.525C170.76 415.336 211.58 432 256.333 432c97.268 0 176-78.716 176-176 0-97.267-78.716-176-176-176-58.496 0-110.28 28.476-142.274 72.333h98.274c6.627 0 12 5.373 12 12v48c0 6.627-5.373 12-12 12z'></path></svg>    
		</a>";
	} else { 
		$result = mysqli_query($mysqli, "INSERT INTO users (`name`, `telephone`, `email`) VALUES ('$name', '$telephone', '$email')");
		
		header("Location: ./../index.php"); 
	}
}
?>
</body>
</html>
