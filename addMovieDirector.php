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

	</body>
</html>
 <br>