<?php
		
		class Auto {

			private $id;
			private $marca;
			private $modelo;
			private $consumo;
			private $emisiones;

			//ID
			function setId($myId){

				$this->id = $myId;
			}

			function getId(){

				return $this->id;
			}


			//Marca
			function setMarca($myMarca){

				$this ->marca = $myMarca;
			}

			function getMarca(){

				return $this->marca;
			}


			//Modelo
			function setModelo($myModelo){

				$this->modelo = $myModelo;

			}

			function getModelo(){

				return $this->modelo;
			}

			//Consumo
			function setConsumo($myConsumo){

				$this->consumo = $myConsumo;
			}

			function getConsumo(){

				return $this->consumo;
			}

			//Emisiones
			function setEmisiones($myEmisiones){

				$this->emisiones = $myEmisiones;
			}

			function getEmisiones(){

				return $this->emisiones;
			}
		}


?>