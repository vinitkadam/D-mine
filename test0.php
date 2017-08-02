<?php
	$conn=mysqli_connect('localhost','root','');
	$result=mysqli_query($conn,"SHOW DATABASES") or die(mysqli_error($conn));
	$rowcount=mysqli_num_rows($result);
	if($rowcount>0){
		$rows=mysqli_fetch_array($result);
		$str="<select name='database'>";
		$str.="<option value='dbnull'>select db</option>";
		for($i=0;$i<$rowcount-1;$i++){
			mysqli_data_seek($result,$i);
			$rows=mysqli_fetch_array($result);
			$str.="<option value='db[".$i."']>".$rows[0]."</option>";
			//$rows[0];
		}
		$str.='</select>';
		echo $str;
	}
?>