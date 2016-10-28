<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	</head>
	<body>
		<h1 class="text-center bg-info text-primary">To Do List</h1>
		<form class="form-horizontal" action="new-task.php" method="post">
			<div class="form-group" style="margin:0 auto; width:80%; padding:10px">
				<input class="input-lg col-lg-10" type="text" name="task">
				<input class="btn btn-default btn-success btn-lg" type="submit" value="Send">
			</div>
		</form>
	
		<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
<?php
require_once("connection.php");

$get_tasks_sql = "SELECT id,name,finished FROM tasks";
$result=$dbh->query($get_tasks_sql);


?>	

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th class='text-center'>Id</th>
			<th class='text-center'>Name</th>
			<th class='text-center'>Finished</th>
			<th class='text-center'>Delete</th>
		</tr>
	</thead>
	<tbody >

	<?php
if ($result->num_rows > 0) {		 
    // output data of each row
    while($row = $result->fetch_assoc()) {

        echo
        "<tr>
        <td class='text-center'>".$row["id"]."</td>
        <td class='text-center'>".$row["name"]."</td>
        <td>
        		<form action='update.php' method='post' class='text-center'>". 
        		(($row['finished']) ? "<input class='btn btn-default btn-info' type='submit' id='subject' value='Redo'>" :"<input class='btn btn-default btn-danger' type='submit'id='topic' value='Done'>") .
        		"
        		<input type='hidden' name='button'  value=". $row['finished']."> 

				<input type='hidden' name='id' value=" . $row['id'].">


        		</form>

        </td>
        <td class='text-center'>
        	<form action='delete.php' method='post'>
        			<input class='btn btn-default btn-warning' type='submit' value='Delete'>
        			<input type='hidden' name='delete' value='1'>
        			<input type='hidden' name='id' value=" .$row['id'].">
        	</form>	 
        </td>"
        ;
       
    }
    }
    else{
    	echo "0 results";
    }

    ?>
     </tbody>
	</table>
</body>
</html>
