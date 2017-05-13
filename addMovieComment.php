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
					<a class="navbar-brand" href="home.php">CS143 Database Interface | Add Movie Comments</a>
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

						<strong> Add Movie Comments </strong> <br>

						<form action="" method="POST"  >
							<strong> Reviewer Name </strong> <br>
							<textarea name="name" cols="80" rows="1" placeholder="Enter Reviewer Name"></textarea><br><br>

							<strong> Movie ID </strong> <br>
							<textarea name="mid" cols="80" rows="1" placeholder="Enter Movie ID"><?php
									echo $_GET['mid'];
								?></textarea><br><br>

							<strong> Movie Rating </strong> <br>
							<select name="rating">
								<option value="null">-----</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select> <br> <br>

							<strong> Comments </strong> <br>
							<textarea name="comments" cols="80" rows="1" placeholder="Enter Comments"></textarea><br><br>

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

						$name = "";
						$date = "";
						$mid = "";
						$rating = "";
						$comments = "";

						$filled = "true";

						$db_connection = mysql_connect($servername, $username, $password);
						mysql_select_db($dbname, $db_connection);

						if (isset($_POST['insert'])) {
							$name = $_POST['name'];
							if ($name == "") {
								echo "Please enter a value for reviewer name<br>";
								$filled = "false";
							}
							else if (strlen($name) > 20) {
								echo "Please enter a reviewer name shorter than 20 characters<br>";
								$filled = "false";
							}

							$date = date("Y:m:d h:m:s");

							$mid = $_POST['mid'];
							if ($mid == "") {
								echo "Please enter a value for movie ID<br>";
								$filled = "false";
							}
							else if (!preg_match("/^[0-9]*$/", $mid)) {
								echo "Movie ID can consist of only numbers<br>";
								$filled = "false";
							}

							$rating = $_POST['rating'];
							if ($rating == "null") {
								echo "Please enter a value for rating<br>";
								$filled = "false";
							}

							$comments = $_POST['comments'];
							if ($comments == "") {
								echo "Please enter a value for comments<br>";
								$filled = "false";
							}
							else if (strlen($comments) > 500) {
								echo "Please enter comments shorter than 500 characters<br>";
								$filled = "false";
							}

							if ($filled == "true") {
								$query = "INSERT INTO Review VALUES ('$name', '$date', $mid, $rating, '$comments');";
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