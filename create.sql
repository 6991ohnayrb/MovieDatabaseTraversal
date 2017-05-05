-- Movie ID must be unique
CREATE TABLE Movie (
	id int, 
	title varchar(100), 
	year int, 
	rating varchar(10), 
	company varchar(50),
	PRIMARY KEY(id)) ENGINE=INNODB;

-- Actor ID must be unique
CREATE TABLE Actor(
	id int, 
	last varchar(20), 
	first varchar(20), 
	sex varchar(6), 
	dob date, 
	dod date,
	PRIMARY KEY(id)) ENGINE=INNODB;

CREATE TABLE Sales(
	mid int, 
	ticketsSold int, 
	totalIncome int) ENGINE=INNODB;

-- Director ID must be unique
CREATE TABLE Director(
	id int, 
	last varchar(20), 
	first varchar(20), 
	dob date, 
	dod date,
	PRIMARY KEY(id)) ENGINE=INNODB;

-- MovieGenre MID must match with Movie ID
CREATE TABLE MovieGenre(
	mid int, 
	genre varchar(20),
	FOREIGN KEY(mid) references Movie(id)) ENGINE=INNODB;

-- MovieDirector MID must match Movie ID
-- MovieDirector DID must match Director ID
CREATE TABLE MovieDirector(
	mid int, 
	did int,
	FOREIGN KEY(mid) references Movie(id),
	FOREIGN KEY(did) references Director(id)) ENGINE=INNODB;

-- MovieActor MID must match Movie ID
-- MovieActor AID must match Actor ID
CREATE TABLE MovieActor(
	mid int, 
	aid int, 
	role int,
	FOREIGN KEY(mid) references Movie(id),
	FOREIGN KEY(aid) references Actor(id)) ENGINE=INNODB;

-- MovieRating MID must match Movie ID
-- MovieRating IMDB must be in the range [0, 100]
-- MovieRating ROT must be in the range [0, 100]
CREATE TABLE MovieRating(
	mid int, 
	imdb int, 
	rot int,
	FOREIGN KEY(mid) references Movie(id),
	CHECK(imdb >= 0 AND imdb <= 100),
	CHECK(rot >= 0 AND rot <= 100)) ENGINE=INNODB;

-- Review MID must match Movie ID
-- Review RATING must be in the range [0, 5]
CREATE TABLE Review(
	name varchar(20), 
	tim timestamp, 
	mid int, 
	rating int, 
	comment varchar(500),
	FOREIGN KEY(mid) references Movie(id),
	CHECK(rating >= 0 AND rating <= 5)) ENGINE=INNODB;

CREATE TABLE MaxPersonID(id int) ENGINE=INNODB;

CREATE TABLE MaxMovieID(id int) ENGINE=INNODB;
