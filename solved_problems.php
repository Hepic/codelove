<!DOCTYPE html>

<html>
	<head>
		<title>CodeLove</title>
		
		<link rel='stylesheet' type='text/css' href='background.css' />
		<link rel='stylesheet' type='text/css' href='nav_bar.css' />
		<link rel='stylesheet' type='text/css' href='solved_problems.css' />
	</head>
	
	<body>
		<?php include_once('nav_bar.html'); ?>	
		
		<?php 
			$category = isset($_GET['category']) ? $_GET['category'] : '';
			$title = isset($_GET['title']) ? $_GET['title'] : '';
			
			if($category == ''  &&  $title == '')
				include_once('show_categories_solved_problems.html');
			
			else if($category != ''  &&  $title != '')
				include_once('show_solution_problem.php');
				
			else if($category != '')
				include_once("show_solved_problems.php");
		?>	
	</body>
	
</html>