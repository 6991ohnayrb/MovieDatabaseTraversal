<html>
	<head>
		<title>
			CS143 Project 1A
		</title>
	</head>
	<body>
		<p> Please enter a mySQL query into the textfield below: <br />
		Example: <tt> SELECT * FROM Actor WHERE id=10; </tt> <br />
		
		<p>
			<form action="" method="GET">
				<textarea name="query" cols="80" rows="10"><?php
						echo $_GET["query"];
					?></textarea><br/>

				<input type="submit" value="Submit" />
			</form>

			<input type="submit" class="button" name="insert" value="insert" />
		</p>

		<?php

			$servername = "localhost";
			$username = "cs143";
			$password = "";
			$dbname = "CS143";

			$db_connection = mysql_connect($servername, $username, $password);
			mysql_select_db($dbname, $db_connection);
			$query = $_GET["query"];
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

		?>
	</body>
</html>
