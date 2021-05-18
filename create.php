<?php

require 'db.php';
$msg='';
if (isset($_POST['name'])&& isset($_POST['email'])) {

	$name=$_POST['name'];
	$email=$_POST['email'];

	$sql='INSERT INTO emp(name, email) VALUES(:name,:email)';

	$state=$conn-> prepare($sql);

	if(
	$state->execute([':name'=> $name, ':email'=>$email])){

	$msg='data inserted succesfully';
}

}
  ?>

<?php if(!empty($msg)): ?>
	<?php echo $msg;  ?>
<?php endif; ?>
<!DOCTYPE html>
<html>
<head>

	<title>Create</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
<div>
  	<button class="btn-info"><a href="index.php">index</a></button>
  </div>
<form method="post">
<div>
	<label for="name" class="form-group">name</label>
	<input type="text" name="name" class="form-control" >
</div>
	
<div class="form-group">
	<label for="email">email</label>
	<input type="email" name="email" class="form-control" >	
</div>
<button type="submit" class="btn-success"> create </button>
</form>


</body>
</html>
