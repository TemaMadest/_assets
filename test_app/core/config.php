<?php 
	$database_type = 'mysql';
	$database_server = 'localhost';
	$database_user = 'Madest';
	$database_password = '123madest';
	$database_connection_charset = 'utf8';
	$dbase = 'test_app';
	$database_dsn = 'mysql:host=localhost;dbname=test_app;charset=utf8';
	$opt = array(
			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
	);
?>