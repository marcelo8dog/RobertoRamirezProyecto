<?php
include('functions.php');
echo "<!DOCTYPE HTML>
		<html lang='es'>
			<head>";
echo 			"<title>Registro</title>
				<meta charset='UTF-8'/>";
echo		"</head>
			<body>
			<h1>Registrar</h1>
			<form method='POST' action='accesar.php'>
				<p>Nombre de usuario</p>
				<input type='text' placeholder='Escribe el nombre de usuario que quieras tener sin números' maxlength='15' name='rnom' size='70'autofocus/>
				<p>Contraseña</p>
				<input type='password' placeholder='Escribe la contraseña que quieras tener sin números. Máximo 10 caracteres' name='rcon' size='70' maxlength='10'/>
				<input type='submit' value='Crear cuenta'/>
			</form>";
echo 		"</body>
		</html>";
?>