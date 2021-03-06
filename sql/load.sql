LOAD DATA LOCAL INFILE '~/data/movie.del' INTO TABLE Movie
  FIELDS TERMINATED BY ','
  ENCLOSED BY '"'
  LINES TERMINATED BY '\n'
  (id, title, year, rating, company);

LOAD DATA LOCAL INFILE '~/data/actor1.del' INTO TABLE Actor
  FIELDS TERMINATED BY ','
  ENCLOSED BY '"'
  LINES TERMINATED BY '\n'
  (id, last, first, sex, dob, dod);

LOAD DATA LOCAL INFILE '~/data/actor2.del' INTO TABLE Actor
  FIELDS TERMINATED BY ','
  ENCLOSED BY '"'
  LINES TERMINATED BY '\n'
  (id, last, first, sex, dob, dod);

LOAD DATA LOCAL INFILE '~/data/actor3.del' INTO TABLE Actor
  FIELDS TERMINATED BY ','
  ENCLOSED BY '"'
  LINES TERMINATED BY '\n'
  (id, last, first, sex, dob, dod);

LOAD DATA LOCAL INFILE '~/data/sales.del' INTO TABLE Sales
  FIELDS TERMINATED BY ','
  ENCLOSED BY '"'
  LINES TERMINATED BY '\n'
  (mid, ticketsSold, totalIncome);

LOAD DATA LOCAL INFILE '~/data/director.del' INTO TABLE Director
  FIELDS TERMINATED BY ','
  ENCLOSED BY '"'
  LINES TERMINATED BY '\n'
  (id, last, first, dob, dod);

LOAD DATA LOCAL INFILE '~/data/moviegenre.del' INTO TABLE MovieGenre
  FIELDS TERMINATED BY ','
  ENCLOSED BY '"'
  LINES TERMINATED BY '\n'
  (mid, genre);

LOAD DATA LOCAL INFILE '~/data/moviedirector.del' INTO TABLE MovieDirector
  FIELDS TERMINATED BY ','
  ENCLOSED BY '"'
  LINES TERMINATED BY '\n'
  (mid, did);

LOAD DATA LOCAL INFILE '~/data/movieactor1.del' INTO TABLE MovieActor
  FIELDS TERMINATED BY ','
  ENCLOSED BY '"'
  LINES TERMINATED BY '\n'
  (mid, aid, role);

LOAD DATA LOCAL INFILE '~/data/movieactor2.del' INTO TABLE MovieActor
  FIELDS TERMINATED BY ','
  ENCLOSED BY '"'
  LINES TERMINATED BY '\n'
  (mid, aid, role);

LOAD DATA LOCAL INFILE '~/data/movierating.del' INTO TABLE MovieRating
  FIELDS TERMINATED BY ','
  ENCLOSED BY '"'
  LINES TERMINATED BY '\n'
  (mid, imdb, rot);

INSERT INTO MaxPersonID
VALUES (69000);

INSERT INTO MaxMovieID
VALUES (4750);