1) Install XAMPP
2) Copy jobbrs folder and paste in xampp/htdocs folder
3) Open database folder
   You will find jobbrs.sql file
4) Open jobbrs.sql in any editor
Replace 
   http://localhost/jobbrs
To
What ever your local link

4) Open http://localhost/phpmyadmin/
And create database named jobbrs

5) Import jobbrs.sql

6) Open jobbrs folder and open wp-config.php

define( 'DB_NAME', 'jobbrs' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

You can check if your local system have anything different database name,username,password.

Now go to
http://localhost/jobbrs
