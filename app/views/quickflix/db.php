<?php

$host = 'itp460.usc.edu';
$dbname = 'movies';
$user = 'tcparker';
$pass = 'password';

$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

?>