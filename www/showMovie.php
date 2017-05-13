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
					<a class="navbar-brand" href="home.php">CS143 Database Interface | Show Movie Information</a>
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
						<h3><b>Show Movie Information</b></h3><br>

						<form action="" method="GET"  >
							<strong> Search Movie ID </strong> <br>
							<textarea name="mid" cols="80" rows="1" placeholder="Enter a Movie ID"></textarea><br><br>

							<input type="submit" class="button" name="insert" value="Search Database" />
						</form>
					</p>

					<?php
						if(isset($_GET['Back'])) {
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
						$filled = "true";

						$db_connection = mysql_connect($servername, $username, $password);
						mysql_select_db($dbname, $db_connection);

						if (isset($_GET['insert'])) {
							$mid = $_GET['mid'];
							if ($mid == "") {
								echo "Please enter a value into movie ID<br>";
							}
							else if (!preg_match("/^[0-9]*$/", $mid)) {
								echo "Movie ID consists of only number<br>";
							}
							else {
								$query = "select * from Movie where id = $mid;";
								$rs = mysql_query($query, $db_connection);
								$title = mysql_fetch_row($rs)[1];
								echo "<strong>Title: </strong>".$title."<br>";

								$rs = mysql_query($query, $db_connection);
								$producer = mysql_fetch_row($rs)[4];
								echo "<strong>Producer: </strong>".$producer."<br>";

								$rs = mysql_query($query, $db_connection);
								$rating = mysql_fetch_row($rs)[3];
								echo "<strong>MPAA Rating: </strong>".$rating."<br>";

								$query = "select concat_ws(' ', D.first, D.last) from Director as D, MovieDirector as MD where D.id = MD.mid and MD.mid = $mid;";
								$rs = mysql_query($query, $db_connection);
								$director = mysql_fetch_row($rs)[0];
								echo "<strong>Director: </strong>".$director."<br>";

								$query = "select genre from MovieGenre where mid = $mid;";
								$rs = mysql_query($query, $db_connection);
								$genre = mysql_fetch_row($rs)[0];
								echo "<strong>Genre: </strong>".$genre."<br><br><br>";

								$query = "select concat_ws(' ', A.first, A.last) as Name, MA.role as Role from Actor as A, MovieActor as MA where MA.mid = $mid and A.id = MA.aid;";
								$rs = mysql_query($query, $db_connection);

								echo "<table><tr>";
								for($i = 0; $i < mysql_num_fields($rs); $i++) {
								    $field_info = mysql_fetch_field($rs, $i);
								    echo "<th>{$field_info->name}</th>";
								}

								while($row = mysql_fetch_row($rs)) {
									$query3 = "select id from Actor where concat_ws(' ', first, last) = \"$row[0]\";";
									$rs3 = mysql_query($query3, $db_connection);
									$aid = mysql_fetch_row($rs3)[0];
								    echo "<tr>";
								    foreach($row as $_column) {
								        echo "<td><a href=\"showActor.php?aid=$aid&insert=Search+Database\">{$_column}</a></td>";
								    }
								    echo "</tr>";
								}
								echo "</table>";

								$query = "select avg(rating) as \"Average Score\" from Review where mid = $mid;";
								$rs = mysql_query($query, $db_connection);
								$rating = mysql_fetch_row($rs)[0];
								echo "<br><br>Average User Rating: ".$rating."<br><br>";

								$query = "select comment as \"User Comments\" from Review where mid = $mid;";
								$rs = mysql_query($query, $db_connection);
								echo "<table><tr>";
								for($i = 0; $i < mysql_num_fields($rs); $i++) {
								    $field_info = mysql_fetch_field($rs, $i);
								    echo "<th>{$field_info->name}</th>";
								}

								while($row = mysql_fetch_row($rs)) {
								    echo "<tr>";
								    foreach($row as $_column) {
								        echo "<td>{$_column}</td>";
								    }
								    echo "</tr>";
								}

								echo "</table>";
							}
						}
					?>

					<p>
					<?php
						$mid = $_GET['mid'];
						echo " 	<form action=\"addMovieComment.php?mid=".$mid."\" name=\"addCommentForm\" id=\"addCommentForm\"  method=\"POST\"  >";
			 		?>
				 		<input type="submit" name="Add Comment" value="Add Comment" autofocus onclick="return true;"/> <br>
					</form>
					</p>
				</div>
			</div>
		</div>
	</body>
</html>