<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>CS143 Project 1B</title>

		<!-- Bootstrap -->
		<link href="bootstrap.min.css" rel="stylesheet">
		<link href="project1c.css" rel="stylesheet">

	<body>

		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header navbar-defalt">
					<a class="navbar-brand" href="index.php">CS143 Database Interface</a>
				</div>
			</div>
		</nav>

		<div class="container">
			<div class="row">
				<div class="col-sm-3 col-md-2 sidebar">
					<ul class="nav nav-sidebar">
						<p><strong>&nbsp;&nbsp;Add Content</strong></p>
						<li><a href="addDirectorActor.php">Add Actor or Director</a></li>
						<li><a href="addMovie.php">Add Movie Information</a></li>
						<li><a href="addMovieActor.php">Add Movie or Actor Relation</a></li>
						<li><a href="addMovieDirector.php">Add Movie or Director Relation</a></li>
					</ul>
					<ul class="nav nav-sidebar">
						<p><strong>&nbsp;&nbsp;Search Keywords</strong></p>
						<li><a href="search.php">Search Actor or Movie</a></li>
					</ul>
				</div>
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<h3><b>PLEASE SELECT ONE OF THE BUTTONS ON THE LEFT</b></h3>
				</div>
			</div>
		</div>
	</body>
</html>