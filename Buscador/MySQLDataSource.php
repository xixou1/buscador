<?php

	Class MySQLDataSource {

		private $conexion;
		private $querys;
		private $dev;




			function conectar(){

			$host = getenv("OPENSHIFT_MYSQL_DB_HOST");
			$user = getenv("OPENSHIFT_MYSQL_DB_USERNAME");
			$password = getenv("OPENSHIFT_MYSQL_DB_PASSWORD");
			$nombreBD = getenv("OPENSHIFT_APP_NAME");

			if(!$this -> conexion){

				$this -> conexion = mysqli_connect($host,$user,$password) or die(mysqli_error());
				mysqli_set_charset($this->conexion,"utf8");


				$bd = mysqli_select_db($this->conexion,$nombreBD);

				echo "Hola que tal carlos";

				

					if(!$bd){

						echo "No se ha encontrado la base de datos ";

					}else{

						

					}
				}
			
			}



			function desconectar(){


				mysqli_close($this->conexion);

				echo "Conexion cerrada";
			}

			function ejecutar_consulta($consulta){

			$this->querys = mysqli_query($this->conexion,$consulta);

			}


			function siguiente(){

			$this->dev = mysqli_fetch_object($this->querys);

			return $this->dev;

			}

			function mensajeError(){


			}

		private function RegError(){

			$fallo = mysql_error();

			$fp = fopen("Log_Errores.txt","a");
			fwrite($fp,"|",date("d/m/Y H:i:s"),"]");

		}
	}


/*

	while ($row = mysqli_fetch_array($resultado,MYSQLI_ASSOC)){

				printf("Nombre: %s",$row["Marca"]);

				}
				
				mysqli_free_result($resultado);

*/
?>
