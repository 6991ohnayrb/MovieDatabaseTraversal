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
				<textarea name="first" cols="80" rows="1" placeholder="John"><?php
						echo $_GET["query"];
					?></textarea><br/>

				<strong> Last Name </strong> <br>
				<textarea name="last" cols="80" rows="1" placeholder="Doe"><?php
						echo $_GET["query"];
					?></textarea><br/>
			</form>

			<form name="testForm" id="testForm"  method="POST"  >
				<input type="radio" name="gender" value="Male"> Male
  				<input type="radio" name="gender" value="Female"> Female<br>
			</form>

			<form action="" method="GET">
				<strong> Date of Birth </strong> <br>
				<textarea name="birth" cols="80" rows="1" placeholder="1970-01-01"><?php
						echo $_GET["query"];
					?></textarea><br/>

				<strong> Date of Death </strong> (leave blank if still alive) <br>
				<textarea name="death" cols="80" rows="1" placeholder="2070-01-01"><?php
						echo $_GET["query"];
					?></textarea><br/>
			</form>

		</p>

	</body>
</html>
 <br>