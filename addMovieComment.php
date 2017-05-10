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

			<strong> Add Movie Comments </strong> <br>

			<form action="" method="POST"  >
				<strong> Reviewer Name </strong> <br>
				<textarea name="name" cols="80" rows="1" placeholder="Enter Reviewer Name"></textarea><br><br>

				<strong> Movie ID </strong> <br>
				<textarea name="mid" cols="80" rows="1" placeholder="Enter Movie ID"></textarea><br><br>

				<strong> Movie Rating </strong> <br>
				<textarea name="rating" cols="80" rows="1" placeholder="Enter Movie Rating"></textarea><br><br>

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
				$date = date("Y:m:d h:m:s");
				echo $date . "<br>";
			}
		?>

	</body>
</html>
 <br>