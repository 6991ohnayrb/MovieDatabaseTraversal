<html>
	<head>
		<title>
			CS143 Project 1B
		</title>
	</head>
	<body>
		<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>CS143 Project 1B</title>

		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/project1c.css" rel="stylesheet">

	<body>

		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header navbar-defalt">
					<a class="navbar-brand" href="home.php">CS143 Database Interface | Add Movie or Director</a>
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
						<h3><b>Add Movie Director</b></h3><br>

						<form action="" method="POST"  >
							<strong> Movie ID </strong> <br>
							<textarea name="mid" cols="80" rows="1" placeholder="Enter Movie ID"></textarea><br><br>

							<strong> Director ID </strong> <br>
							<textarea name="did" cols="80" rows="1" placeholder="Enter Director ID"></textarea><br><br>

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
						$did = "";

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
								echo "Movie ID can consist of only numbers<br>";
								$filled = "false";
							}

							$did = $_POST['did'];
							if ($did == "") {
								echo "Please enter a value for director ID<br>";
								$filled = "false";
							}
							else if (!preg_match("/^[0-9]*$/", $did)) {
								echo "Director ID can consist of only numbers<br>";
								$filled = "false";
							}

							if ($filled == "true") {
								$query = "INSERT INTO MovieDirector VALUES ($mid, $did);";
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

	</body>
</html>
 <br>