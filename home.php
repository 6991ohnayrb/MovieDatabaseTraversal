<html>
	<head>
		<title>
			CS143 Project 1B
		</title>
	</head>
	<body>
		<p>
			<strong> Please select from one of the following buttons below: </strong> <br> <br>

			<form name="testForm" id="testForm"  method="POST"  >
				A page that lets users to add actor and/or director information. Here are some name examples: Chu-Cheng Hsieh, J'son Lee, etc. <br>
			    <input type="submit" name="PageI1" value="Page I1" autofocus onclick="return true;"/> <br> <br>

				A page that lets users to add movie information. <br>
			    <input type="submit" name="PageI2" value="Page I2" autofocus onclick="return true;"/> <br> <br>

			    A page that lets users to add comments to movies. <br>
			    <input type="submit" name="PageI3" value="Page I3" autofocus onclick="return true;"/> <br> <br>

			    A page that lets users to add "actor to movie" relation(s). <br>
			    <input type="submit" name="PageI4" value="Page I4" autofocus onclick="return true;"/> <br> <br>

			    A page that lets users to add "director to movie" relation(s). <br>
			    <input type="submit" name="PageI5" value="Page I5" autofocus onclick="return true;"/>
			</form>
		</p>

		<?php
			if(isset($_POST['PageI1'])) {
				echo " 	<script type=\"text/javascript\">
							var e = document.getElementById('testForm'); e.action='./addDirectorActor.php'; e.submit();
						</script>
					 ";
			}
 		?>

	</body>
</html>
 <br>