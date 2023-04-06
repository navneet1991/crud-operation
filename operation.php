<?php
include('config.php');

if(isset($_POST['submit']) && $_POST['submit']=='Update'){
	$update=mysqli_query($conn,"update  crud set firstname='".$_POST['firstname']."',lastname='".$_POST['lastname']."',email='".$_POST['email']."' where id='".$_GET['id']."'");
	if($update){
		header('location:index.php');
		exit;
	}
}

if(isset($_POST['submit']) && $_POST['submit']=='Save'){
	$add=mysqli_query($conn,"insert into crud(firstname,lastname,email) values('".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['email']."')");
		
	if($add){
		header('location:index.php');
		exit;
	}
}
		
$firstname	=	'';
$lastname	=	'';
$email		=	'';
$btn_val	=	'Save';
if(isset($_GET['action']) && !empty($_GET['id'])){
	
	if($_GET['action']=='EDIT'){
		$sql = "SELECT * FROM crud WHERE id='".$_GET['id']."'";
		$result 	=	mysqli_query($conn, $sql);
		$row		=	mysqli_fetch_array($result);
		$firstname	=	$row['firstname'];
		$lastname	=	$row['lastname'];
		$email		=	$row['email'];
		$btn_val	=	'Update';
	}
	
	if($_GET['action']=='DELETE'){
		$delete=mysqli_query($conn, "DELETE FROM crud WHERE id='".$_GET['id']."'");
		
		if($delete){
			header('location:index.php');
			exit;
		}
            
	}
}

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
            <div>
				<form class="form-horizontal" method="post"  enctype="multipart/form-data">
					  <div class="form-group">
							<div class="col-md-12">
								<label for="register-form-name">First Name : </label>
								<input type="text" name="firstname" value="<?php  echo $firstname; ?>" class="form-control" / required>
							</div>
					   </div>
					   
					   <div class="form-group">
							<div class="col-md-12">
								<label for="register-form-name">last Name : </label>
								<input type="text" name="lastname" value="<?php  echo $lastname; ?>" class="form-control" / required>
							</div>
					   </div>
					   
					   <div class="form-group">
							<div class="col-md-12">
								<label for="register-form-name">Email : </label>
								<input type="text" name="email" value="<?php  echo $email; ?>" class="form-control" / required>
							</div>
					   </div>
					   
					   <div class="form-group">
							<div class="col-md-4">
								<input type="submit" name="submit" class="btn btn-success" value="<?php echo $btn_val; ?>"/>
							</div>
					   </div>
				</form>
			</div>
        </div>
    
</body>
</html>