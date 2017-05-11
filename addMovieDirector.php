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

			<strong> Add Movie Director </strong> <br>

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

			}
		?>

	</body>
</html>
 <br>