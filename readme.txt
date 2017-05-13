README FOR CS143 PROJECT 1B
BRYAN HO | 204-840-587

I worked alone on this project. I first had to fix a previous issue from Project 1A which had a varchar as an int. 

Implementation of my pages used a combination of text fields, radio buttons, and drop down menus. Most of the time was taken creating the first page. Most everything from there was just copy and paste with some changes. The next largest portion was implementing the search page. 

The search page had to use unique mySQL queries to return the desired results. I dynamically changed the query length based on the input keywords with spaces in between, then used the LIKE keyword to specify fields that included the keywords. After displaying these out, I had to use some hyperlink tags to link to the show movie and actor information pages.

With the show movie and actor information pages, I had the corresponding MID or AID already in the parameters. Then I was able to use a simple mySQL query to get the information. If I was showing an actor, I can get the information such as name, dob, and all other movie the actor has been in. If I am showing a movie, I can get all actors in the movie and basic movie information. 