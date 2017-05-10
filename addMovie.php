<html>
	<head>
		<title>
			CS143 Project 1B
		</title>
	</head>
	<body>
		<p>
			<form name="testForm" id="testForm"  method="POST"  >
				<input type="submit" name="Back" value="Back" autofocus onclick="return true;"/> <br>
			</form>

			<strong> Add New Movie </strong> <br>

			<form action="" method="POST"  >
				<strong> Title </strong> <br>
				<textarea name="title" cols="80" rows="1" placeholder="Enter Movie Title"></textarea><br><br>

				<strong> Release Year </strong> <br>
				<textarea name="year" cols="80" rows="1" placeholder="Enter Movie Release Year"></textarea><br><br>

				<strong> MPAA Rating </strong> <br>
				<select name="rating">
					<option value="G">G</option>
					<option value="NC-17">NC-17</option>
					<option value="PG">PG</option>
					<option value="PG-13">PG-13</option>
					<option value="R">R</option>
				</select> <br> <br>

				<strong> Production Company </strong> <br>
				<textarea name="company" cols="80" rows="1" placeholder="Enter Production Company"></textarea><br><br>
			
				<input type="submit" class="button" name="insert" value="Add to Database" />
			</form>
		</p>

		<?php
			if(isset($_POST['Back'])) {
				echo " 	<script type=\"text/javascript\">
							var e = document.getElementById('testForm'); e.action='./home.php'; e.submit();
						</script>
					 ";
			}
 		?>

 		<?php

			$servername = "localhost";
			$username = "cs143";
			$password = "";
			$dbname = "CS143";

			$maxID = "";
			$title = "";
			$year = "";
			$rating = "";
			$company = "";

			$filled = "true";

			$db_connection = mysql_connect($servername, $username, $password);
			mysql_select_db($dbname, $db_connection);

			if (isset($_POST['insert'])) {
				$query = "select id from MaxMovieID;";
				$rs = mysql_query($query, $db_connection);
				$maxID = mysql_fetch_row($rs)[0];
				$maxID = $maxID + 1;

				$title = $_POST['title'];
				$year = $_POST['year'];
				$rating = $_POST['rating'];
				$company = $_POST['company'];

			}
		?>

	</body>
</html>
 <br>