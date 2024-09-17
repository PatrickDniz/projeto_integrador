<?php
	require_once("actions/dbConnection.php");

	$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");
?>

<html>
<head>	
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lista Telefonica</title>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="src/style.css" media="screen">
</head>

<body>
	<h1 class="topbar">Lista Telefonica</h1>
	<a href="add.php" class="float_button">
      <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"></path></svg>
	</a>

	<table class="list" border=0>
		<thead>
			<tr>
				<td><strong>Nome</strong></td>
				<td><strong>Telefone</strong></td>
				<td><strong>Email</strong></td>
				<td><strong>Ações</strong></td>
			</tr>
		</thead>
		<tbody>
			<?php
				while ($res = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$res['name']."</td>";
					echo "<td>".$res['telephone']."</td>";
					echo "<td>".$res['email']."</td>";	
					echo "<td class=\"icons\">
						<a class=\"icon\" href=\"edit.php?id={$res['id']}\">
								<svg stroke=\"currentColor\" fill=\"currentColor\" stroke-width=\"0\" viewBox=\"0 0 576 512\" height=\"1em\" width=\"1em\" xmlns=\"http://www.w3.org/2000/svg\">
										<path d=\"M402.3 344.9l32-32c5-5 13.7-1.5 13.7 5.7V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h273.5c7.1 0 10.7 8.6 5.7 13.7l-32 32c-1.5 1.5-3.5 2.3-5.7 2.3H48v352h352V350.5c0-2.1.8-4.1 2.3-5.6zm156.6-201.8L296.3 405.7l-90.4 10c-26.2 2.9-48.5-19.2-45.6-45.6l10-90.4L432.9 17.1c22.9-22.9 59.9-22.9 82.7 0l43.2 43.2c22.9 22.9 22.9 60 .1 82.8zM460.1 174L402 115.9 216.2 301.8l-7.3 65.3 65.3-7.3L460.1 174zm64.8-79.7l-43.2-43.2c-4.1-4.1-10.8-4.1-14.8 0L436 82l58.1 58.1 30.9-30.9c4-4.2 4-10.8-.1-14.9z\"></path>
								</svg>
						</a> 
						<a class=\"icon\" href=\"delete.php?id={$res['id']}\" onClick=\"return confirm('tem certeza que quer deletar este contato ?')\">
								<svg stroke=\"currentColor\" fill=\"currentColor\" stroke-width=\"0\" viewBox=\"0 0 448 512\" height=\"1em\" width=\"1em\" xmlns=\"http://www.w3.org/2000/svg\">
										<path d=\"M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z\"></path>
								</svg>
						</a>
					</td>";
				}

				if (mysqli_num_rows($result) == 0) {
					echo "<tr><td colspan=\"4\">Nenhum contato encontrado</td></tr>";
				}
			?>
		</tbody>
	</table>
</body>
</html>
