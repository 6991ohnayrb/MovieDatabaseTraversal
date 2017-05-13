<html>
	<head>
		<title>
			CS143 Project 1B
		</title>
	</head>
	<body>
		<p>
			<form name="testForm" id="testForm"  method="GET"  >
				<input type="submit" name="Back" value="Back" autofocus onclick="return true;"/> <br>
			</form>

			<strong> Show Movie Information </strong> <br>

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

				$query = "select * from Movie where id = $mid;";
				$rs = mysql_query($query, $db_connection);
				$title = mysql_fetch_row($rs)[1];
				echo "Title: ".$title."<br>";

				$rs = mysql_query($query, $db_connection);
				$producer = mysql_fetch_row($rs)[4];
				echo "Producer: ".$producer."<br>";

				$rs = mysql_query($query, $db_connection);
				$title = mysql_fetch_row($rs)[3];
				echo "MPAA Rating: ".$title."<br>";

				$query = "(select concat_ws(' ', first, last) from Director where id = (select did from MovieDirector where mid = $mid);)";
				$rs = mysql_query($query, $db_connection);
				$director = mysql_fetch_row($rs)[0];
				echo "Director: ".$director."<br>";

				$query = "select genre from MovieGenre where mid = $mid;";
				$rs = mysql_query($query, $db_connection);
				$genre = mysql_fetch_row($rs)[0];
				echo "Genre: ".$genre."<br><br><br>";

				$query = "select concat_ws(' ', A.first, A.last) as Name, MA.role as Role from Actor as A, MovieActor as MA where MA.mid = $mid and A.id = MA.aid;";
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
		?>

	</body>
</html>
 <br>