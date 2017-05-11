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

			<strong> Show Actor Information </strong> <br>

			<form action="" method="POST"  >
				<strong> Actor Name </strong> <br>
				<textarea name="title" cols="80" rows="1" placeholder="Enter a Keyword"></textarea><br><br>

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

	</body>
</html>
 <br>