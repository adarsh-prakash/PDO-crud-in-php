<?php

require 'db.php';
$id=$_GET['id'];

$sql ='SELECT*FROM emp WHERE id=:id';
	$state=$conn-> prepare($sql);
	$state->execute([':id'=>$id]);
	$emp=$state->fetch(PDO::FETCH_OBJ);


if (isset($_POST['name'])&& isset($_POST['email'])) {

	$name=$_POST['name'];
	$email=$_POST['email'];

	$sql='UPDATE emp set name=:name, email=:email WHERE id=:id';

	$state=$conn-> prepare($sql);

	if(
	$state->execute([':name'=> $name, ':email'=>$email, ':id'=>$id])){

	header("location:index.php");
}

}
  ?>

<?php if(!empty($msg)): ?>
	<?php echo $msg;  ?>
<?php endif; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
	<form method="post">
	
<div>
	<label for="name" class="form-group">name</label>
	<input type="text" name="name" class="form-control"  value="<?php echo $emp->name;?>" >
</div>
	
<div class="form-group">
	<label for="email">email</label>
	<input type="email" name="email" class="form-control"  value="<?php echo $emp->email;?>" >	
</div>


<button class="btn-warning" type="submit"> update </button>

</form>

</body>
</html>


