<?php

/*
*	Incluir el archivo config.cfg con los parametros de la conexión.
*/

include "config.cfg";

Class Conexion {

	public $link;

	private function conectar(){
		try {
		    $this->link = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		    // set the PDO error mode to exception
		    $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		    
		}
		catch(PDOException $e){
		    echo "Falló la conexión: " . $e->getMessage();
		}
	}

	public function __construct() {
		$this->conectar();
	}
}

?>
