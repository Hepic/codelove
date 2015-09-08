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
					  solution_code TEXT)";
					  
			mysql_query($query) or die(mysql_error());
		}
	}
?>