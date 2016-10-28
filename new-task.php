<?php
require_once("connection.php");

if(!empty($_POST['task'])){

	$sanitized_task = filter_var($_POST['task'], FILTER_SANITIZE_STRING); //sanitize inputs
	$sql="INSERT INTO tasks(name, finished) 
	VALUES('". $sanitized_task."','0')";

	if($dbh->query($sql) === FALSE){
		die("Error: " . $sql . "<br>" . $dbh->error);
	}

}
header("Location:index.php");