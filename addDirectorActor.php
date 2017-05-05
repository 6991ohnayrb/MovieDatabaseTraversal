<html>
	<head>
		<title>
			CS143 Project 1B
		</title>
	</head>
	<body>
		<p>
			<strong> Add New Actor or Director </strong> <br>

			<form action="" method="POST"  >
				<input type="radio" name="type" value="Actor"> Actor
  				<input type="radio" name="type" value="Director"> Director<br>
			
				<strong> First Name </strong> <br>
				<textarea name="first" cols="80" rows="1" placeholder="John"></textarea><br/>

				<strong> Last Name </strong> <br>
				<textarea name="last" cols="80" rows="1" placeholder="Doe"></textarea><br/>
			
				<input type="radio" name="gender" value="Male"> Male
  				<input type="radio" name="gender" value="Female"> Female<br>
			
				<strong> Date of Birth </strong> <br>
				<textarea name="birth" cols="80" rows="1" placeholder="1970-01-01"></textarea><br/>

				<strong> Date of Death </strong> (leave blank if still alive) <br>
				<textarea name="death" cols="80" rows="1" placeholder="2070-01-01"></textarea><br/>
			
				<input type="submit" class="button" name="insert" value="Add to Database" />
			</form>
		</p>

		<?php

			$servername = "localhost";
			$username = "cs143";
			$password = "";
			$dbname = "CS143";

			$type = "";
			$fName = "";
			$lName = "";
			$gender = "";
			$dob = "";
			$dod = "";

			$maxID = "";

			$filled = "true";

			$db_connection = mysql_connect($servername, $username, $password);
			mysql_select_db($dbname, $db_connection);

			if (isset($_POST['insert'])) {
				$query = "select id from MaxPersonID;";
				$rs = mysql_query($query, $db_connection);
				$maxID = mysql_fetch_row($rs)[0];
				$maxID = $maxID + 1;

				if (isset($_POST['type'])) {
					$type = $_POST['type'];
				}
				else {
					echo "Please select a value for Actor or Director<br>";
					$filled = "false";
				}

				$fName = $_POST['first'];
				if ($fName == "") {
					echo "Please enter a value for first name<br>";
					$filled = "false";
				}

				$lName = $_POST['last'];
				if ($lName == "") {
					echo "Please enter a value for last name<br>";
					$filled = "false";
				}

				if (isset($_POST['gender'])) {
					$gender = $_POST['gender'];
				}
				else {
					echo "Please select a value for Male of Female<br>";
					$filled = "false";
				}

				$dob = $_POST['birth'];
				if ($dob == "") {
					echo "Please enter a value for date of birth<br>";
					$filled = "false";
				}
				else if (!(preg_match("/[0-9]{4}-[0-9]{2}-[0-9]{2}/", $dob) and strlen($dob) == 10)) {
					echo "Please enter a valid Date of Birth in the following format: YYYY-MM-DD<br>";
					$filled = "false";
				}

				$dod = $_POST['death'];
				if ($dod != "" and !(preg_match("/[0-9]{4}-[0-9]{2}-[0-9]{2}/", $dod) and strlen($dod) == 10)) {
					echo "Please enter a valid Date of Death in the following format: YYYY-MM-DD or leave blank if still alive.<br>";
					$filled = "false";
				}

				if ($filled == "true") {
					$query = "INSERT INTO $type VALUES ($maxID, '$lName', '$fName', '$gender', '$dob', '$dod');";
					echo $query."<br>";
					mysql_query($query, $db_connection) or die('Error, insert query failed');

					$query = "UPDATE MaxPersonID SET id = $maxID;";
					echo $query."<br>";
					mysql_query($query, $db_connection);
				}
			}

		?>

	</body>
</html>
 <br>