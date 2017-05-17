<?php
include('functions.php');

echo "<!DOCTYPE HTML>
		<html lang='es'>
			<head>";
echo 			"<title>Accesar</title>
				<meta charset='UTF-8'/>";
echo		"</head>
			<body>
			<h1>Acceder</h1>";
			$nom=(isset($_POST['rnom']))?$_POST['rnom']:"";
			$con=(isset($_POST['rcon']))?$_POST['rcon']:"";
			for($a=1;$a<20;$a++)
			{
				$r="";
				$cnom="nom".$a;
				$ccon="con".$a;
				$pnom=(isset($_COOKIE[$cnom]))?$_COOKIE[$cnom]:"";
				$pcon=(isset($_COOKIE[$ccon]))?$_COOKIE[$ccon]:"";
				if($pnom==""&&$pcon=="")
				{
					$r=$a;
					$a=20;
				}	
			}
			if($nom!=""&&$con!="")
			{
				$check1=(preg_match('/^[A-z]{2,15}$/',$nom)==0)?false:true;
				$check2=(preg_match('/^[A-z]{2,15}$/',$con)==0)?false:true;
				$onom=$nom;
				if($check1)
				{
					$cnom="nom".$r;
					$nom=strtolower($nom);
					$nom=playfair($nom,4);
					$nom=cambiar($nom);
					$nom=hashis($nom);
					echo "nombre con hash.-".$nom."<br/>";
					
				}
				else
					echo "<h1>Usuario incorrecto con números</h1>";
				if($check2)
				{
					$ccon="con".$r;
					$con=strtolower($con);
					$con=playfair($con,4);
					$con=cambiar($con);
					$con=minoxi($con);
					echo "contraseña con hash.-".$con."<br/>";
					
				}
				else
					echo "<h1>Contraseña incorrecta con números</h1>";
				if($check1&&$check2)
				{
					echo "<p>Registro exitoso de:".$onom."</p>";
					setcookie($cnom,$nom,time()+7200,'/');
					setcookie($ccon,$con,time()+7200,'/');
				}
			}
			else
			{
				$check1=true;
				$check2=true;
			}
			if($nom==""&&$con!=""||$nom!=""&&$con=="")
			{
				echo "<p>***Registro fallido. No se completaron ambos campos***</p>";
			}
			if($check1&&$check2)
			{
			echo "<form method='POST' action='formulario.php'>
					<p>Nombre de usuario</p>
					<input type='text' placeholder='Escribe tu nombre de usuario' maxlength='25' name='nom' size='50'autofocus/>
					<p>Contraseña</p>
					<input type='password' placeholder='Escribe tu contraseña. Máximo 10 caracteres' name='con' size='50' maxlength='10'/>
					<input type='submit' value='Acceder'/>
				</form>";
			}
		echo "<a href='registrar.php'><h1>Registrarse</h1></a>";
echo 		"</body>
		</html>";
?>