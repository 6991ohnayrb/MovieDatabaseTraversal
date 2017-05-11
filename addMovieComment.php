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
				<select name="rating">
					<option value="null">-----</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select> <br> <br>

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
				$name = $_POST['name'];
				if ($name == "") {
					echo "Please enter a value for reviewer name<br>";
					$filled = "false";
				}
				else if (strlen($name) > 20) {
					echo "Please enter a reviewer name shorter than 20 characters<br>";
					$filled = "false";
				}

				$date = date("Y:m:d h:m:s");

				$mid = $_POST['mid'];
				if ($mid == "") {
					echo "Please enter a value for movie ID<br>";
					$filled = "false";
				}
				else if (!preg_match("/^[0-9]*$/", $mid)) {
					echo "Movie ID can consist of only numbers<br>";
					$filled = "false";
				}

				$rating = $_POST['rating'];
				if ($rating == "null") {
					echo "Please enter a value for rating<br>";
					$filled = "false";
				}

				$comments = $_POST['comments'];
				if ($comments == "") {
					echo "Please enter a value for comments<br>";
					$filled = "false";
				}
				else if (strlen($comments) > 500) {
					echo "Please enter comments shorter than 500 characters<br>";
					$filled = "false";
				}

				if ($filled == "true") {
					$query = "INSERT INTO Review VALUES ('$name', '$date', $mid, $rating, '$comments');";
					echo $query."<br>";
					mysql_query($query, $db_connection) or die('Error, insert query failed');
				}

			}
		?>

	</body>
</html>
 <br>