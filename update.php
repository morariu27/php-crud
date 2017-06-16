<?php

require('Classes/Database.php');

use Classes\Database\Database as Database;

// fetch a record where email is test@gmail.com and update fname and lname
$email = 'test@gmail.com';
$firstname = 'John';
$lastname = 'Rogan';

// Connect to db
$dbc = Database::connect();

// Update contact_first_name, contact_surname ... are the table rows
$sth = $dbc->prepare("UPDATE testdb.users
                      SET `firstname` = :firstname,
                          `lastname` = :lastname
                      WHERE `email` = :email");
$sth->bindParam(":firstname", $firstname, PDO::PARAM_STR);
$sth->bindParam(":lastname", $lastname, PDO::PARAM_STR);
$sth->bindParam(":email", $email, PDO::PARAM_STR);
$sth->execute();
