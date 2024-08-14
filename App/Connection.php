<?php

namespace App;

class Connection {

	public static $conn;
	
	public static function getDb() {
		try {

			$conn = new \PDO(
				"mysql:host=mysql.kappelgkd.com.br;dbname=gerenciamento_pessoal",
				"root",
				"qWrm91826384@02" 
			);
			
			return $conn;

		} catch (\PDOException $e) {
			throw new \PDOException($e);
		}
	}

	}

?>