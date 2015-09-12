<?php
	include_once('mysql_database.php');
	
	$title = isset($_POST['title']) ? $_POST['title'] : '';
	$author = isset($_POST['author']) ? $_POST['author'] : '';
	$statement = isset($_POST['statement']) ? $_POST['statement'] : '';
	$explanation = isset($_POST['explanation']) ? $_POST['explanation'] : '';
	$solution_code = isset($_POST['solution_code']) ? $_POST['solution_code'] : '';
	$category = isset($_POST['category']) ? $_POST['category'] : '';
	
	$title = htmlspecialchars($title);
	$author = htmlspecialchars($author);
	$statement = htmlspecialchars($statement);
	$explanation = htmlspecialchars($explanation);
	$solution_code = htmlspecialchars($solution_code);
	$category = htmlspecialchars($category);
	
	$mysql = new mysql_database();
	
	
	$mysql->connect_mysql();
	$mysql->insert_table_solved_problems_mysql($title, $author, $statement, $explanation, $solution_code, $category);
	$mysql->disconnect_mysql();
?>