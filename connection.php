<?php
$host='localhost';
$username='root';
$password=Null;
$dbname='to_do';

$dbh = new mysqli ($host, $username,$password, $dbname);
if ($dbh->connect_error){
	die("Connection failed: " . $dbh->connect_error);
}
