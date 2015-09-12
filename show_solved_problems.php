<?php
	include_once('mysql_database.php');
	
	$category = isset($_GET['category']) ? $_GET['category'] : '';
	$mysql = new mysql_database();
	
	
	$mysql->connect_mysql();
	$mysql->show_solved_problems($category);
	$mysql->disconnect_mysql();
?>