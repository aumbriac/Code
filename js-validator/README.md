# JS-Form-Validator
Client &amp; Server Realtime Form Validation 

1) Place the 'src' folder on your localhost and run it. 
IMPORTANT: To utilize the registration feature that creates a new user in a MySQL database, be sure to update the database connection credentials in 'register.php'.

You can use the following SQL code to automatically create the database/table: 

CREATE DATABASE codingchallenge;

CREATE TABLE codingchallenge.users(
        id int AUTO_INCREMENT PRIMARY KEY,
        username varchar(15),
        email varchar(50),
        password varchar(255)
    )
