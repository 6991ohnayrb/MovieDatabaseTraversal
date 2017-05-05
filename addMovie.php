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

			<strong> Add New Movie </strong> <br>

			<form action="" method="POST"  >
				<strong> Title </strong> <br>
				<textarea name="first" cols="80" rows="1" placeholder="Enter Movie Title"></textarea><br/>

				<strong> Release Year </strong> <br>
				<textarea name="last" cols="80" rows="1" placeholder="Enter Movie Release Year"></textarea><br/>
			
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