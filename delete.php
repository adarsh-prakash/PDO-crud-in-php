<?php

	require 'db.php';
	$id=$_GET['id'];
	$sql='DELETE FROM emp WHERE id=:id';

	$state=$conn->prepare($sql);

if(
	$state->execute([':id'=>$id])
){
	header("location:index.php");
}


  ?>