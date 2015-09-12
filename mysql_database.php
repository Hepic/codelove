<?php
	class mysql_database
	{
		private $db;
		
		
		public function connect_mysql()
		{
			$this->db = mysql_connect("localhost", "hepic", "pass") or die(mysql_error());
			mysql_select_db("hepic") or die(mysql_error());
		}
		
		
		public function disconnect_mysql()
		{
			mysql_close($this->db);
		}
		
		
		public function create_tables_mysql()
		{
			$query = "CREATE TABLE solved_problems(
					  id INT NOT NULL AUTO_INCREMENT,
					  PRIMARY KEY(id),
					  title VARCHAR(100),
					  author VARCHAR(100),
					  statement TEXT,
					  explanation TEXT,
					  solution_code TEXT,
					  category VARCHAR(100))";
					  
			mysql_query($query) or die(mysql_error());
		}
		
		
		public function insert_table_solved_problems_mysql($title, $author, $statement, $explanation, $solution_code, $category)
		{		
			$query = "INSERT INTO solved_problems(title, author, statement, explanation, solution_code, category)
					  VALUES('$title', '$author', '$statement', '$explanation', '$solution_code', '$category')";
					  
			mysql_query($query) or die(mysql_error());
		}
		
		
		public function show_solved_problems($category)
		{
			$query = "SELECT * FROM solved_problems WHERE category='$category'";
			$res = mysql_query($query) or die(mysql_error());
			
			echo "<ul id='problem_list'>";	
			while($row = mysql_fetch_assoc($res))
				echo "<li> <a href='solved_problems.php?title=" . $row['title'] . "&category=" . $category . "'>" . $row['title'] . "</a></li>";	
			echo "</ul>";
		}
		
		
		public function show_solution_problem($category, $title)
		{
			$query = "SELECT * FROM solved_problems WHERE category='$category' AND title='$title' LIMIT 1";
			$res = mysql_query($query) or die(mysql_error());
			$num_rows = mysql_num_rows($res);
			
			if($num_rows == 1)
			{
				$row = mysql_fetch_assoc($res);
				
				echo "<div id='solution'>";
					echo "<h1>'" . $row['title'] . "' written by '" . $row['author'] . "'</h1>";
					echo "<div id='statement'>" . $row['statement'] . "</div>";
					echo "<div id='explanation>" . $row['explanation'] . "</div>";
					echo "<div id='solution_code'>" . $row['solution_code'] . "</div>";
				echo "</div>";
			}
		}
	}
	
	
	/*$o = new mysql_database();
	$o->connect_mysql();
	$o->create_tables_mysql();
	$o->disconnect_mysql();*/
	
?>