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

			<strong> Show Actor Information </strong> <br>

			<form action="" method="GET"  >
				<strong> Search Actor ID </strong> <br>
				<textarea name="aid" cols="80" rows="1" placeholder="Enter an Actor ID"></textarea><br><br>

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

			$aid = "";
			$filled = "true";

			$db_connection = mysql_connect($servername, $username, $password);
			mysql_select_db($dbname, $db_connection);

			if (isset($_GET['insert'])) {
				$aid = $_GET['aid'];

				$query = "select concat_ws(' ', first, last) as Name, sex as Sex, dob as \"Date of Birth\", dod as \"Date of Death\" from Actor where id = $aid;";
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

				echo "</table><br>";

				$query = "select M.title as Title, MA.role as Role from Movie as M, MovieActor as MA where MA.mid = M.id and MA.aid = $aid;";
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