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

			<strong> Search Actor or Movie </strong> <br>

			<form action="" method="POST"  >
				<strong> Actor Name </strong> <br>
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
				$keyword = str_replace(" ", "|", $keyword);
				if (strpos($keyword, "|") === false) {
					$query = "select * from Actor where first like '$keyword' or last like '$keyword';";
				}
				else {
					$query = "select * from Actor where first REGEXP '$keyword' and last REGEXP '$keyword';";
				}
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