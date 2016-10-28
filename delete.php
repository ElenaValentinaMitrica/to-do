<?php
require_once("connection.php");

if(isset($_POST['delete'])){
			$delete="DELETE FROM tasks WHERE id=" . $_POST['id'];
				
			if ($dbh->query($delete) === TRUE) {
				echo "Record updated successfully";

			} 
			else {
				echo "Error updating record: " . $dbh->error;
			}
		header("Location:index.php");
		
}
