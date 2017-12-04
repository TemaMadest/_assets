<?php
	//require_once('connecter.php');
	
	require_once('config.php');
	$pdo = new PDO($database_dsn, $database_user, $database_password, $opt);
	
	class getResource{
		
		public function getInfo($table_name, $row_name){
			global $pdo;
			$query = "SELECT ".$row_name." FROM ".$table_name;
			$stmt = $pdo->query($query);
			
			$res = array();
			while ($row = $stmt->fetch()){
				array_push($res, $row);
			}
			return $res;
		}
		
	}
?>