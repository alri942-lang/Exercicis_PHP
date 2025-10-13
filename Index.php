
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Índice de Ejercicios</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background: #f7f7f7;
			margin: 0;
			padding: 20px;
		}
		h2 {
			color: #2c3e50;
			margin-top: 30px;
		}
		ul {
			list-style: none;
			padding-left: 0;
		}
		li {
			margin-bottom: 8px;
		}
		a {
			text-decoration: none;
			color: #2980b9;
			transition: color 0.2s;
		}
		a:hover {
			color: #e67e22;
		}
		.folder {
			background: #fff;
			border-radius: 8px;
			box-shadow: 0 2px 8px rgba(0,0,0,0.07);
			padding: 16px 24px;
			margin-bottom: 24px;
		}
	</style>
</head>
<body>
	<h1>Índice de Ejercicios</h1>
	<?php
	$folders = [
		'CRUD_BD',
		'exercicis_php'
	];
	foreach ($folders as $folder) {
		$path = __DIR__ . "/$folder";
		if (is_dir($path)) {
			echo "<div class='folder'>";
			echo "<h2>" . htmlspecialchars($folder) . "</h2>";
			$files = scandir($path);
			$phpFiles = array_filter($files, function($file) use ($path) {
				return is_file("$path/$file") && pathinfo($file, PATHINFO_EXTENSION) === 'php';
			});
			if (count($phpFiles) > 0) {
				echo "<ul>";
				foreach ($phpFiles as $phpFile) {
					echo "<li><a href='$folder/$phpFile'>" . htmlspecialchars($phpFile) . "</a></li>";
				}
				echo "</ul>";
			} else {
				echo "<p>No hay archivos PHP en esta carpeta.</p>";
			}
			echo "</div>";
		}
	}
	?>
</body>
</html>
