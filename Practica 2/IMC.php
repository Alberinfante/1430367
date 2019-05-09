<!DOCTYPE html>
<html>
<head>
	<title>Calculadora IMC</title>
</head>
<body>	
	<h1 class="center">Calcula tu IMC</h1>
	<form action="IMC.php" method="POST"> 
		<p>
			<label>Nombre:</label>
			<input type="text" name="nombre">
		</p>
		<p>
			<label>Edad:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
			<input type="text" name="edad">
		</p>
		<p>
			<label>Peso:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
			<input type="text" name="peso"> KG.
		</p>

		<p>
			<label>Altura:&nbsp;&nbsp;</label>
			<input type="text" name="altura"> MTS.
		</p>	

		<p>
			<input type="submit" value="enviar">
		</p>
	</form>
	<?php
	include("conexion.php");
if (isset($_POST["nombre"])) {
	if (isset($_POST["edad"])) {
		if (isset($_POST["peso"])) {
			if (isset($_POST["altura"])) {
				$nombre = $_POST["nombre"];
				$edad = $_POST["edad"];
				$peso = $_POST["peso"];
				$altura = $_POST["altura"];
				$imc =  $peso/($altura*$altura);
				if ($imc<18.5) {
					echo "<h2>Hola! $nombre tu categoria de IMC es: Por debajo del peso </h2>";
					echo "IMC: ". $imc; 
					echo "<br>";
					echo "Edad: ". $edad;
					echo "<br>";
					echo "Peso: ". $peso;
					echo "<br>";
					echo "Altura: ". $altura;
				}elseif ($imc>=18.5 && $imc<=24.9) {
					echo "<h2>Hola! $nombre tu categoria de IMC es: Saludable</h2>";
					echo "IMC: ". $imc; 
					echo "<br>";
					echo "Edad: ". $edad;
					echo "<br>";
					echo "Peso: ". $peso;
					echo "<br>";
					echo "Altura: ". $altura;
				}elseif ($imc>=25 && $imc<=29.9) {
					echo "<h2>Hola! $nombre tu categoria de IMC es: Con sobrepeso</h2>";
					echo "IMC: ". $imc; 
					echo "<br>";
					echo "Edad: ". $edad;
					echo "<br>";
					echo "Peso: ". $peso;
					echo "<br>";
					echo "Altura: ". $altura;
				}elseif ($imc>=30 && $imc<=39.9) {
					echo "<h2>Hola! $nombre tu categoria de IMC es: Obesidad</h2>";
					echo "IMC: ". $imc; 
					echo "<br>";
					echo "Edad: ". $edad;
					echo "<br>";
					echo "Peso: ". $peso;
					echo "<br>";
					echo "Altura: ". $altura;
				} elseif ($imc>40) {
					echo "<h2>Hola! $nombre tu categoria de IMC es: Obesidad extrema o de alto riesgo</h2>";
					echo "IMC: ". $imc; 
					echo "<br>";
					echo "Edad: ". $edad;
					echo "<br>";
					echo "Peso: ". $peso;
					echo "<br>";
					echo "Altura: ". $altura;
				}
	 	}
	 }
	} 
}
 ?>
</body>
</html>