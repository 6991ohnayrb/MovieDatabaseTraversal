<html>
	<head>
		<title>
			CS143 Project 1B
		</title>
	</head>
	<body>
		<p>
			<strong> Add New Actor or Director </strong> <br>

			<form action="" method="POST"  >
				<input type="radio" name="type" value="Actor"> Actor
  				<input type="radio" name="type" value="Director"> Director<br>
			
				<strong> First Name </strong> <br>
				<textarea name="first" cols="80" rows="1" placeholder="John"><?php
						echo $_GET["query"];
					?></textarea><br/>

				<strong> Last Name </strong> <br>
				<textarea name="last" cols="80" rows="1" placeholder="Doe"><?php
						echo $_GET["query"];
					?></textarea><br/>
			

				<input type="radio" name="gender" value="Male"> Male
  				<input type="radio" name="gender" value="Female"> Female<br>
			

				<strong> Date of Birth </strong> <br>
				<textarea name="birth" cols="80" rows="1" placeholder="1970-01-01"><?php
						echo $_GET["query"];
					?></textarea><br/>

				<strong> Date of Death </strong> (leave blank if still alive) <br>
				<textarea name="death" cols="80" rows="1" placeholder="2070-01-01"><?php
						echo $_GET["query"];
					?></textarea><br/>
			
				<input type="submit" class="button" name="insert" value="Add to Database" />
			</form>
		</p>

		<?php

			$servername = "localhost";
			$username = "cs143";
			$password = "";
			$dbname = "CS143";

			$db_connection = mysql_connect($servername, $username, $password);
			mysql_select_db($dbname, $db_connection);
			$query = $_GET["query"];
			$rs = mysql_query($query, $db_connection);

			if (isset($_POST['insert'])) {
				if (isset($_POST['type']))
				echo $_POST['type'];
			}

		?>

	</body>
</html>
 <br>