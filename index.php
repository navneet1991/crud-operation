<?php
include('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
</head>
<body>
		
        <div class="container">
			<div class="row">
				<div class="form-group">
					 	<a href="operation.php" class="btn btn-success">Add</a>
				 </div>
			</div>
			
			   
            <?php
				$Sql = "SELECT * FROM crud";
				$result = mysqli_query($conn, $Sql);  
				if (mysqli_num_rows($result) > 0) {
					 echo "<div class='row'><div class='table-responsive'><table id='myTable' class='table table-striped table-bordered'>
							 <thead><tr>
										  <th>First Name</th>
										  <th>Last Name</th>
										  <th>Email</th>
										  <th>Action</th>
										</tr></thead><tbody>";
					 while($row = mysqli_fetch_assoc($result)) {
						 echo "<tr>
								   <td>" . $row['firstname']."</td>
								   <td>" . $row['lastname']."</td>
								   <td>" . $row['email']."</td> 
								   <td><a href='operation.php?id=".$row['id']."&action=EDIT'><button class='btn btn-primary btn-xs'><span class='glyphicon glyphicon-pencil'></span></button></a> <a href='operation.php?id=".$row['id']."&action=DELETE'> <button class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-trash'></span></button></a></td>
								   
								</tr>";        
					 }
					
					
					 echo "</tbody></table></div></div>";
					 
				} else {
					 echo "you have no records";
				}
            ?>
			
			
			 	
        </div>
    
</body>
</html>