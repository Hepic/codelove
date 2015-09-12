<?php
	include_once('mysql_database.php');
	
	$category = isset($_GET['category']) ? $_GET['category'] : '';
	$title = isset($_GET['title']) ? $_GET['title'] : '';
	$mysql = new mysql_database();
	
	
	$mysql->connect_mysql();
	$mysql->show_solution_problem($category, $title);
	$mysql->disconnect_mysql();
?>