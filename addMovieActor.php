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

			<strong> Add Movie Actor </strong> <br>

			<form action="" method="POST"  >
				<strong> Movie ID </strong> <br>
				<textarea name="mid" cols="80" rows="1" placeholder="Enter Movie ID"></textarea><br><br>

				<strong> Actor ID </strong> <br>
				<textarea name="aid" cols="80" rows="1" placeholder="Enter Actor ID"></textarea><br><br>

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
				$mid = $_POST['mid'];
				if ($mid == "") {
					echo "Please enter a value for movie ID<br>";
					$filled = "false";
				}
				else if (!preg_match("/^[0-9]*$/", $mid)) {
					echo "Movie ID can only contain numbers<br>";
					$filled = false;
				}

				$aid = $_POST['aid'];
				if ($aid == "") {
					echo "Please enter a value for actor ID<br>";
					$filled = "false";
				}
				else if (!preg_match("/^[0-9]*$/", $aid)) {
					echo "Actor ID can only contain numbers<br>";
					$filled = "false";
				}

				$role = $_POST['role'];
				if ($role == "") {
					echo "Please enter a value for role<br>";
					$filled = "false";
				}
				else if (strlen($role) > 50) {
					echo "Please enter a role shorter than 50 characters<br>";
					$filled = "false";
				}

			}
		?>

	</body>
</html>
 <br>