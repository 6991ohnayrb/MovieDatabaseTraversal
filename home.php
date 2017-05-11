<html>
	<head>
		<title>
			CS143 Project 1B
		</title>
	</head>
	<body>
		<p>
			<strong> Input Pages: </strong>
			<form name="inputPagesForm" id="inputPagesForm"  method="POST"  >
				A page that lets users to add actor and/or director information. Here are some name examples: Chu-Cheng Hsieh, J'son Lee, etc. <br>
			    <input type="submit" name="PageI1" value="Page I1" autofocus onclick="return true;"/> <br> <br>

				A page that lets users to add movie information. <br>
			    <input type="submit" name="PageI2" value="Page I2" autofocus onclick="return true;"/> <br> <br>

			    A page that lets users to add comments to movies. <br>
			    <input type="submit" name="PageI3" value="Page I3" autofocus onclick="return true;"/> <br> <br>

			    A page that lets users to add "actor to movie" relation(s). <br>
			    <input type="submit" name="PageI4" value="Page I4" autofocus onclick="return true;"/> <br> <br>

			    A page that lets users to add "director to movie" relation(s). <br>
			    <input type="submit" name="PageI5" value="Page I5" autofocus onclick="return true;"/> <br> <br>
			</form>

			<strong> Browsing Pages: </strong>
			<form name="browsingPagesForm" id="browsingPagesForm"  method="POST"  >
			    A page that shows actor information. <br>
			    <input type="submit" name="PageB1" value="Page B1" autofocus onclick="return true;"/> <br> <br>

			    A page that shows movie information. <br>
			    <input type="submit" name="PageB2" value="Page B2" autofocus onclick="return true;"/> <br> <br>
			</form>
		</p>

		<?php
			if(isset($_POST['PageI1'])) {
				echo " 	<script type=\"text/javascript\">
							var e = document.getElementById('inputPagesForm'); e.action='./addDirectorActor.php'; e.submit();
						</script>
					 ";
			}
			if(isset($_POST['PageI2'])) {
				echo " 	<script type=\"text/javascript\">
							var e = document.getElementById('inputPagesForm'); e.action='./addMovie.php'; e.submit();
						</script>
					 ";
			}

			if(isset($_POST['PageI3'])) {
				echo " 	<script type=\"text/javascript\">
							var e = document.getElementById('inputPagesForm'); e.action='./addMovieComment.php'; e.submit();
						</script>
					 ";
			}

			if(isset($_POST['PageI4'])) {
				echo " 	<script type=\"text/javascript\">
							var e = document.getElementById('inputPagesForm'); e.action='./addMovieActor.php'; e.submit();
						</script>
					 ";
			}

			if(isset($_POST['PageI5'])) {
				echo " 	<script type=\"text/javascript\">
							var e = document.getElementById('inputPagesForm'); e.action='./addMovieDirector.php'; e.submit();
						</script>
					 ";
			}

			if(isset($_POST['PageB1'])) {
				echo " 	<script type=\"text/javascript\">
							var e = document.getElementById('browsingPagesForm'); e.action='./showActorInfo.php'; e.submit();
						</script>
					 ";
			}
 		?>

	</body>
</html>
 <br>