<?php
require_once("connection.php");

if(isset($_POST['button'])){
	$state = $_POST['button'];
			$update="UPDATE tasks SET finished=".(int)!$state ." WHERE id=". $_POST['id'];
				
			if ($dbh->query($update) === TRUE) {
				echo "Record updated successfully";

			} 
			else {
				echo "Error updating record: " . $dbh->error;
			}

		header("Location:index.php");
}