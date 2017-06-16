<?php

require('Classes/Database.php');

use Classes\Database\Database as Database;

// Connect to db
$dbc = Database::connect();

// Get post params
$first_name   = filter_var($_POST['fname'],FILTER_SANITIZE_STRING);
$last_name    = filter_var($_POST['lname'],FILTER_SANITIZE_STRING);
$username     = filter_var($_POST['uname'],FILTER_SANITIZE_STRING);
$pswd         = filter_var($_POST['pswd'],FILTER_SANITIZE_STRING);
$email        = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);

// Insert data
$sth = $dbc->prepare("INSERT INTO testdb.users(`username`, `firstname`, `lastname`, `password`,`email`)
                      VALUES (:username, :firstname, :lastname, :password, :email)");
$sth->bindParam(':username', $username, PDO::PARAM_STR);
$sth->bindParam(':firstname', $first_name, PDO::PARAM_STR);
$sth->bindParam(':lastname', $last_name, PDO::PARAM_STR);
$sth->bindParam(':password', $pswd, PDO::PARAM_STR);
$sth->bindParam(':email', $email, PDO::PARAM_STR);
$sth->execute();


$data = array('a' => $email, 'b' => $first_name, 'c' => $last_name, 'd' => $pswd);
header('Content-Type: application/json');
echo json_encode($data);


