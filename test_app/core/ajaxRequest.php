<?php 
		require_once('getResources.php');
		$res = new getResource();
		$result = $res->getInfo('products','*');
		echo json_encode($result);
?>
