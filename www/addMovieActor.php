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
					<a class="navbar-brand" href="home.php">CS143 Database Interface | Add Movie or Actor</a>
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
						<h3><b>Add Movie Actor Relation</b></h3><br>

						<form action="" method="POST"  >
							<strong> Select a Movie from Below </strong> <br>
							<?php
								$servername = "localhost";
								$username = "cs143";
								$password = "";
								$dbname = "CS143";

								$db_connection = mysql_connect($servername, $username, $password);
								mysql_select_db($dbname, $db_connection);

								$query = "select title from Movie;";
								$rs = mysql_query($query, $db_connection);

								echo '<select name="selectMovie">';
								while($row = mysql_fetch_row($rs)) {
								    foreach($row as $column) {
								    	echo '<option value="'.$column.'">'.$column.'</option>';
								    }
								}
								echo '</select><br><br>';
							?>

							<strong> Select an Actor from Below </strong> <br>
							<?php
								$servername = "localhost";
								$username = "cs143";
								$password = "";
								$dbname = "CS143";

								$db_connection = mysql_connect($servername, $username, $password);
								mysql_select_db($dbname, $db_connection);

								$query = "select concat_ws(' ', first, last) from Actor;";
								$rs = mysql_query($query, $db_connection);

								echo '<select name="selectActor">';
								while($row = mysql_fetch_row($rs)) {
								    foreach($row as $column) {
								    	echo '<option value="'.$column.'">'.$column.'</option>';
								    }
								}
								echo '</select><br><br>';
							?>

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
							$movie = $_POST['selectMovie'];

							$actor = $_POST['selectActor'];

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
								$query = "select id from Movie where title = \"$movie\";";
								$rs = mysql_query($query, $db_connection);
								$mid = mysql_fetch_row($rs)[0];

								$query = "select id from Actor where concat_ws(' ', first, last) = \"$actor\";";
								$rs = mysql_query($query, $db_connection);
								$aid = mysql_fetch_row($rs)[0];

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