
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Buscador de coches</title>
	<style type="text/css">
	
		table{
	
			background: #F5F5B7;
			border: 1px solid black;
			width: 100%;
			text-align: center;

			font-family: 'palatino linotype', palatino, serif;
			font-size: 15px;
			font-weight: bold;


		}

		th {
	
			background: #F1F15C;
			border: 1px solid black;
		}

		td {
			
			padding-top: 3px;
			border:1px solid black;
		}

		h1 {
		text-align: center;

		}

		.input {

			margin-left: 43%;
		}

		.coincidencia {

			font-family: courier, 'courier new', monospace;
			color: #181FDE;
			font-size: 19px;
			font-weight: bold;

		}

		.error {
			text-align: center;
			font-family: courier, 'courier new', monospace;
			color: red;
			font-size: 19px;
			font-weight: bold;
		}
	
	</style>
</head>
<body>
		<h1> Buscador de marcas de coches </h1>

		<form method="POST">
		<input type="text" name="texto" class="input">
		<input type="submit" name="enviar" value="Enviar">
		</form>
<?php

		require_once("MySQLDataSource.php");
		require_once("Auto.php");


		@$busqueda = $_POST["texto"];

		$instancia = new MySQLDataSource();

		$instancia->conectar();

		if(isset($_POST["enviar"]) && (!empty($_POST["texto"]))){

			$incr = 0;
			
			$consulta ="SELECT * FROM `automoviles` WHERE Modelo like'%".$_POST["texto"]."%'";

			$instancia -> ejecutar_consulta($consulta);

			$cocheNuevo = null;

			$prueba = $instancia->siguiente();

			$contador = 0;

				while($prueba){

					$prueba = $instancia->siguiente();
					$contador+=1;
				}

			echo "<br>";

			$total = $contador;
			echo "<p class='coincidencia'>Numero de coincidencias: <strong>".$total."</strong></p>";

			echo "<br><br>";

			$instancia -> ejecutar_consulta($consulta);

			$fila = $instancia->siguiente();

			echo "<table>";
			echo "<th>ID</th><th>Marca</th><th>Modelo</th><th>Consumo</th><th>Emisiones</th></tr>";

				while($fila){

					$cocheNuevo[$incr] = new Auto();
					$cocheNuevo[$incr] -> setId($fila->Id);
					$cocheNuevo[$incr] -> setMarca($fila->Marca);
					$cocheNuevo[$incr] -> setModelo($fila->Modelo);
					$cocheNuevo[$incr] -> setConsumo($fila->Consumo);
					$cocheNuevo[$incr] -> setEmisiones($fila->Emisiones);

					echo "<tr>
						<td>".$cocheNuevo[$incr] -> getId()."</td>
						<td>".$cocheNuevo[$incr]-> getMarca()."</td>
						<td>".$cocheNuevo[$incr]-> getModelo()."</td>
						<td>".$cocheNuevo[$incr]-> getConsumo()."</td>
						<td>".$cocheNuevo[$incr]-> getEmisiones()."</td>
						</tr>";
					

					$fila = $instancia ->siguiente();

					$incr+=1;
					
				}
			echo  "</table>";

			echo "<br><br><br>";

			$instancia -> desconectar();

		}elseif(isset($_POST["enviar"]) && empty($_POST["texto"])){

			echo "<p class='error'>Introducen una Marca de coche por favor</p>";
			return false;
		}

?>
</body>
</html>
