<?php
include('functions.php');

echo "<!DOCTYPE HTML>
		<html lang='es'>
			<head>";
echo 			"<title>Accesar</title>
				<meta charset='UTF-8'/>";
echo		"</head>
			<body>
			<h1>Formulario</h1>";
			$comple=true;
			$nom=(isset($_POST['nom']))?$_POST['nom']:"";
			$onom=$nom;
			$con=(isset($_POST['con']))?$_POST['con']:"";
			$ocon=$con;
			if($nom!="")
			{
				$nom=playfair($nom,4);
				$nom=cambiar($nom);
				$nom=hashis($nom);
			}
			else
				$comple=false;
			if($con!="")
			{
				$con=playfair($con,4);
				$con=cambiar($con);
				$con=minoxi($con);
			}
			else
				$comple=false;
			if($comple)
			{
				$enc=false;
				$bnom=false;
				$bcon=false;
				for($a=1;$a<20;$a++)
				{
					// $r="";
					$cnom="nom".$a;
					$ccon="con".$a;
					$pnom=(isset($_COOKIE[$cnom]))?$_COOKIE[$cnom]:"";
					$pcon=(isset($_COOKIE[$ccon]))?$_COOKIE[$ccon]:"";
					$bnom=($nom==$pnom)?true:false;
					$bcon=($con==$pcon)?true:false;
					if($bnom&&$bcon)
					{
						
						$enc=true;
					}
				}
				if($enc)
				{
					echo "<h1>Usuario con acceso</h1>
						<div>
							<p>Practica 1</p>
							<form method='POST' action='formulario.php'>
							<input type='tel' size='12' maxlength='9' name='n1'/>
							<input type='tel' size='12' maxlength='9' name='n2'/>
							<input type='hidden' name='nom' value='".$onom."'/>
							<input type='hidden' name='con' value='".$ocon."'/>
							<input type='submit'/>
							</form>";
							$n1=(isset($_POST['n1']))?$_POST['n1']:"";
							$n2=(isset($_POST['n2']))?$_POST['n2']:"";
							if($n1!=""&&$n2!="")
							{
								$a=modulo($n1,$n2);
								echo $a;
							}
				echo "</div>
					<div>
					<p>Practica 2</p>
					<form method='POST' action='formulario.php'>
						<input type='text' size='28' maxlength='20' name='num'/>
						<input type='hidden' name='nom' value='".$onom."'/>
						<input type='hidden' name='con' value='".$ocon."'/>
						<input type='submit'/>
					</form>";
					
					$num=(isset($_POST['num']))?$_POST['num']:"";
					if($num!="")
					{

						$cod="";
						$cod=strtolower($cod);
						$cod=str_replace($abec,$sigs,$num);
						echo $cod."<br/>";
					}
				echo "</div>
				<div>
				<p>Practica 3</p>
				<form method='POST' action='formulario.php'>
				<input type='text' size='28' maxlength='20' name='pla'/>
				<input type='hidden' name='nom' value='".$onom."'/>
				<input type='hidden' name='con' value='".$ocon."'/>
				<input type='submit'/>
				</form>";
				$cadp=(isset($_POST['pla']))?$_POST['pla']:"";
				$opc=(isset($_POST["cual"]))?$_POST["cual"]:"";
				if($cadp!="")
					echo playfair($cadp,4)."   -->playfair<br/>";
				echo "</div>
				<div>
				<p>Practica 4</p>
				<form method='POST' action='formulario.php'>
				<input type='tel' size='12' maxlength='9' name='ncta'/>
				<input type='hidden' name='nom' value='".$onom."'/>
				<input type='hidden' name='con' value='".$ocon."'/>
				<input type='submit'/>
				</form>";
				$cu=(isset($_POST['ncta']))?$_POST['ncta']:"";
				$cif=cifsim($cu);
				echo "<br/>".$cif."<br/>";
				echo "</div>
				<div>
				<p>Practica 5</p>
				<form method='POST' action='formulario.php'>
				<input type='tel' size='12' maxlength='60' name='num3'/>
				<input type='hidden' name='nom' value='".$onom."'/>
				<input type='hidden' name='con' value='".$ocon."'/>
				<input type='submit'/>
				</form>";
				$c='';
				$cadp=(isset($_POST['num3']))?$_POST['num3']:"";
				if($cadp!="")
				{
					$cadp=cambiar($cadp);
				
				echo "String convertido a binario.- ".$cadp."<br/>";
				$cadp=minoxi($cadp);
				echo "Aplicado un XOR.- ".$cadp."<br/>";
				}
				echo "</div>
				<div>
				<p>Practica 6</p>
				<form method='POST' action='formulario.php'>
						<input type='text' size='28' maxlength='20' name='num4'/>
						<input type='hidden' name='nom' value='".$onom."'/>
						<input type='hidden' name='con' value='".$ocon."'/>
						<input type='submit'/>
					</form>";
					$num=(isset($_POST['num4']))?$_POST['num4']:"";
					if($num!="")
					{
						$cod=playfair($num,4);
						$cod=strtolower($cod);
						$cod=str_replace($abec,$sigs,$cod);
						echo $cod."<br/>";
					}
				echo "</div>
				<div>
				<p>Practica 7</p>
				<form method='POST' action='formulario.php'>
					<input type='text' size='28' maxlength='20' name='num5'/>
					<input type='hidden' name='nom' value='".$onom."'/>
					<input type='hidden' name='con' value='".$ocon."'/>
					<input type='submit'/>
				</form>";
				$cadp=(isset($_POST['num5']))?$_POST['num5']:"";
				if($cadp!="")
				{
					$cadp=cambiar($cadp);
					echo "String convertido a binario.- ".$cadp."<br/>";
					$c=$cadp;
					$c=hashis($c);
					echo "Firma digital.- ".$c."<br/>";
				}
				echo "</div>";


				}
				if(!$enc)
					echo "<h1>usuario sin registrar</h1><a href='registrar.php'>Registrate por favor</a>";
			}
			else
				echo "<h1>No has ingresado ambos campos o no vienes de la pagina oficial</h1><a href='accesar.php'>Volver a accesar</a>";
		echo "</body>
	</html>";