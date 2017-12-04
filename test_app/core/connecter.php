<?php 
	require_once('config.php');
	$pdo = new PDO($database_dsn, $database_user, $database_password, $opt);
?>