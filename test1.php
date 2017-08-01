<?php
	$db=$_REQUEST['db'];
	$tb=$_REQUEST['tb'];
	$con=mysqli_connect('localhost','root','',$db);
	$sql="SHOW COLUMNS FROM $tb;";
	$query=@mysqli_query($con,$sql) or die(mysqli_error($con));
	echo "<table border='1px'  style=' border-collapse: collapse;'>";
	echo "<tr>";
	echo "<th>COLUMN</th><th>DATA TYPE</th><th>OPERATION</th>";
	echo "</tr>";
	$str="<select name='dtype' id='dtype'>";
	$str.="<option value='dtnull'>select data-type</option>";
    $str.="<option value='int'>Integer</option>";
	$str.="<option value='float'>Float</option>";
	$str.="<option value='String'>String</option></select>";
	//$img="<img src='#' value='mg' onclick='dropcol(this.value)'/>";
	//$img1="<img src='#' />";
	while($row=mysqli_fetch_array($query))
	{
		echo "<tr>";
		echo "<td>".$row[0]."</td>";
		echo "<td>".$str."</td>";
		echo "<td>";
		echo "&nbsp&nbsp&nbsp<input type='image' src='drop.ico' width=16px height=16px value='".$row[0]."' onclick='dropcol(this.value)'/>&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp";				
		echo "<input type='image' src='pencil.png' width=16px height=16px value='".$row[0]."'/>";
		echo "</td>";
		echo "</tr>";
	}
	echo "</table><br>";
	include 'add.html';
	

?>