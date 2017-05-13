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
					<a class="navbar-brand" href="home.php">CS143 Database Interface | Search Actor or Movie</a>
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
						<h3><b>Search Actor or Movie</b></h3><br>

						<form action="" method="POST"  >
							<strong> Search Keyword </strong> <br>
							<textarea name="keyword" cols="80" rows="1" placeholder="Enter a Keyword"></textarea><br><br>

							<input type="submit" class="button" name="insert" value="Search Database" />
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

						$keyword = "";

						$filled = "true";

						$db_connection = mysql_connect($servername, $username, $password);
						mysql_select_db($dbname, $db_connection);

						if (isset($_POST['insert'])) {
							$keyword = $_POST['keyword'];
							$arr = explode(" ", $keyword);
							$str = "";
							foreach($arr as $val) {
								$str .= " concat_ws(' ', first, last) like '%$val%' AND";
							}
							$str = substr($str, 0, -4);

							$query = "select concat_ws(' ', first, last) as Name, dob as \"Date of Birth\" from Actor where$str;";

							$rs = mysql_query($query, $db_connection);

							echo "<strong> Matching Actors </strong> <br>";
							echo "<table><tr>";
							for($i = 0; $i < mysql_num_fields($rs); $i++) {
							    $field_info = mysql_fetch_field($rs, $i);
							    echo "<th>{$field_info->name}</th>";
							}

							while($row = mysql_fetch_row($rs)) {
								$query2 = "select id from Actor where concat_ws(' ', first, last) = \"$row[0]\";";
								$rs2 = mysql_query($query2, $db_connection);
								$aid = mysql_fetch_row($rs2)[0];
							    
							    echo "<tr>";
							    foreach($row as $_column) {
							        echo "<td><a href=\"showActor.php?aid=$aid&insert=Search+Database\">{$_column}</a></td>";
							    }
							    echo "</tr>";
							}
							echo "</table><br><br>";

							$str = "";
							foreach($arr as $val) {
								$str .= " title like '%$val%' AND";
							}
							$str = substr($str, 0, -4);

							$query = "select title as Title, year as Year from Movie where$str;";
							$rs = mysql_query($query, $db_connection);

							echo "<strong> Matching Movies </strong> <br>";
							echo "<table><tr>";
							for($i = 0; $i < mysql_num_fields($rs); $i++) {
							    $field_info = mysql_fetch_field($rs, $i);
							    echo "<th>{$field_info->name}</th>";
							}

							while($row = mysql_fetch_row($rs)) {
								$query3 = "select id from Movie where title = \"$row[0]\";";
								$rs3 = mysql_query($query3, $db_connection);
								$mid = mysql_fetch_row($rs3)[0];
							    echo "<tr>";
							    foreach($row as $_column) {
							        echo "<td><a href=\"showMovie.php?mid=$mid&insert=Search+Database\">{$_column}</a></td>";
							    }
							    echo "</tr>";
							}
							echo "</table>";

						}
					?>
				</div>
			</div>
		</div>
	</body>
</html>