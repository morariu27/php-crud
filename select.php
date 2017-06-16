<?php

require('Classes/Database.php');

use Classes\Database\Database as Database;

// fetch a record where email is test@gmail.com
$email = 'test@gmail.com';

// Connect to db
$dbc = Database::connect();

$sth = $dbc->prepare("SELECT `username`, `firstname`, `lastname`, `password`
                      FROM testdb.users WHERE `email` = :email");
$sth->bindParam(':email', $email, PDO::PARAM_STR);
$sth->execute();

while ($row = $sth->fetchObject()) {
  echo
    "<li>{$row->username}</li>".
    "<li>{$row->firstname}</li>".
    "<li>{$row->lastname}</li>".
    "<li>{$row->password}</li>";
}

