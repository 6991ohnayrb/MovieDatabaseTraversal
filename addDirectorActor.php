<html>
	<head>
		<title>
			CS143 Project 1B
		</title>
	</head>
	<body>
		<p>
			<strong> Add New Actor or Director </strong> <br>

			<form name="testForm" id="testForm"  method="POST"  >
				<input type="radio" name="type" value="Actor"> Actor
  				<input type="radio" name="type" value="Director"> Director<br>
			</form>

			<form action="" method="GET">
				<strong> First Name </strong> <br>
				<textarea name="first" cols="80" rows="1"><?php
						echo $_GET["query"];
					?></textarea><br/>

				<strong> Last Name </strong> <br>
				<textarea name="last" cols="80" rows="1"><?php
						echo $_GET["query"];
					?></textarea><br/>
			</form>

			<form name="testForm" id="testForm"  method="POST"  >
				<input type="radio" name="gender" value="Male"> Male
  				<input type="radio" name="gender" value="Female"> Female<br>
			</form>

		</p>

	</body>
</html>
 <br>