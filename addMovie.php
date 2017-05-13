<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>CS143 Project 1B</title>

		<!-- Bootstrap -->
		<link href="bootstrap.min.css" rel="stylesheet">
		<link href="project1c.css" rel="stylesheet">

	<body>

		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header navbar-defalt">
					<a class="navbar-brand" href="home.php">CS143 Database Interface | Add Movie Information</a>
				</div>
			</div>
		</nav>

		<div class="container">
			<div class="row">
				<div class="col-sm-3 col-md-2 sidebar">
					<ul class="nav nav-sidebar">
						<p><strong>&nbsp;&nbsp;Add Content</strong></p>
						<li><a href="addDirectorActor.php">Add Actor or Director</a></li>
						<li><a href="addMovie.php">Add Movie Information</a></li>
						<li><a href="addMovieComment.php">Add Movie Comments</a></li>
						<li><a href="addMovieActor.php">Add Movie Actor Relation</a></li>
						<li><a href="addMovieDirector.php">Add Movie Director Relation</a></li>
					</ul>
					<ul class="nav nav-sidebar">
						<p><strong>&nbsp;&nbsp;Search Keywords</strong></p>
						<li><a href="search.php">Search Actor or Movie</a></li>
					</ul>
				</div>
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<p>
						<h3><b>Add Movie Information</b></h3><br>

						<form action="" method="POST"  >
							<strong> Title </strong> <br>
							<textarea name="title" cols="80" rows="1" placeholder="Enter Movie Title"></textarea><br><br>

							<strong> Release Year </strong> <br>
							<textarea name="year" cols="80" rows="1" placeholder="Enter Movie Release Year"></textarea><br><br>

							<strong> MPAA Rating </strong> <br>
							<select name="rating">
								<option value="null">-----</option>
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
							if ($title == "") {
								echo "Please enter a value for title<br>";
								$filled = "false";
							}
							else if (strlen($title) > 100) {
								echo "Please enter a title shorter than 100 characters<br>";
								$filled = "false";
							}

							$year = $_POST['year'];
							if ($year == "") {
								echo "Please enter a value for year<br>";
								$filled = "false";
							}
							else if (!preg_match("/[0-9]{4}/", $year)) {
								echo "Please enter a year in the format YYYY<br>";
								$filled = "false";
							}

							$rating = $_POST['rating'];
							if ($rating == "null") {
								echo "Please enter a value for rating<br>";
								$filled = "false";
							}

							$company = $_POST['company'];
							if ($company == "") {
								echo "Please enter a value for production company<br>";
								$filled = "false";
							}
							else if (strlen($company) > 50) {
								echo "Please enter a production company shorter than 50 characters<br>";
								$filled = "false";
							}

							if ($filled == "true") {
								$query = "INSERT INTO Movie VALUES ($maxID, '$title', $year, '$rating', '$company');";
								echo $query."<br>";
								mysql_query($query, $db_connection) or die('Error, insert query failed');

								$query = "UPDATE MaxMovieID SET id = $maxID;";
								echo $query."<br>";
								mysql_query($query, $db_connection);
							}

						}
					?>

				</div>
			</div>
		</div>
	</body>
</html>