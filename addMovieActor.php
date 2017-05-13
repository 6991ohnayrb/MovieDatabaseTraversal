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
					<a class="navbar-brand" href="index.php">CS143 Database Interface</a>
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
						<li><a href="addMovieActor.php">Add Movie or Actor Relation</a></li>
						<li><a href="addMovieDirector.php">Add Movie or Director Relation</a></li>
					</ul>
					<ul class="nav nav-sidebar">
						<p><strong>&nbsp;&nbsp;Search Keywords</strong></p>
						<li><a href="search.php">Search Actor or Movie</a></li>
					</ul>
				</div>
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<p>
						<form name="testForm" id="testForm"  method="POST"  >
							<input type="submit" name="Back" value="Back" autofocus onclick="return true;"/> <br>
						</form>

						<strong> Add Movie Actor </strong> <br>

						<form action="" method="POST"  >
							<strong> Movie ID </strong> <br>
							<textarea name="mid" cols="80" rows="1" placeholder="Enter Movie ID"></textarea><br><br>

							<strong> Actor ID </strong> <br>
							<textarea name="aid" cols="80" rows="1" placeholder="Enter Actor ID"></textarea><br><br>

							<strong> Actor Role </strong> <br>
							<textarea name="role" cols="80" rows="1" placeholder="Enter Actor Role in Movie"></textarea><br><br>

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

						$mid = "";
						$aid = "";
						$role = "";

						$filled = "true";

						$db_connection = mysql_connect($servername, $username, $password);
						mysql_select_db($dbname, $db_connection);

						if (isset($_POST['insert'])) {
							$mid = $_POST['mid'];
							if ($mid == "") {
								echo "Please enter a value for movie ID<br>";
								$filled = "false";
							}
							else if (!preg_match("/^[0-9]*$/", $mid)) {
								echo "Movie ID can only contain numbers<br>";
								$filled = false;
							}

							$aid = $_POST['aid'];
							if ($aid == "") {
								echo "Please enter a value for actor ID<br>";
								$filled = "false";
							}
							else if (!preg_match("/^[0-9]*$/", $aid)) {
								echo "Actor ID can only contain numbers<br>";
								$filled = "false";
							}

							$role = $_POST['role'];
							if ($role == "") {
								echo "Please enter a value for role<br>";
								$filled = "false";
							}
							else if (strlen($role) > 50) {
								echo "Please enter a role shorter than 50 characters<br>";
								$filled = "false";
							}

							if ($filled == "true") {
								$query = "INSERT INTO MovieActor VALUES ($mid, $aid, '$role');";
								echo $query."<br>";
								mysql_query($query, $db_connection) or die('Error, insert query failed');
							}

						}
					?>
				</div>
			</div>
		</div>
	</body>
</html>