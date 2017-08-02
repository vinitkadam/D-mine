<?php
    $cn=$_REQUEST['cn'];
	$db=$_REQUEST['db'];
	$tb=$_REQUEST['tb'];
	$con=@mysqli_connect('localhost','root','',$db);
	$sql="ALTER TABLE $tb DROP COLUMN $cn";
	//$result=@mysqli_query($con,$sql) or die(mysqli_error($con));
	if(@mysqli_query($con,$sql))
		echo "column $cn deleted successfully<br>Refresh to see result.....";
	else
		die(mysqli_error($con));
?>
	