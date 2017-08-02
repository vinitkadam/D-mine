<?php
	$tag='addcol';
	$str="<pre>COLUMN NAME 		DATA TYPE 			SIZE<br>";
	//$str.='<input type="hidden" id="tag" name="tag" value="addcol"></input> ';
	$str.='<input type="text" id="cn" name="cn"></input> ';
	$str.="<select name='dt' id='dt'>";
	$str.="<option value='dtnull'>select data-type</option>";
    $str.="<option value='int'>Integer</option>";
	$str.="<option value='float'>Float</option>";
	$str.="<option value='varchar'>varchar</option></select>";
	$str.='<input type="number" id="size" name="size"></input> ';
	$str.='<input type="button" id="go" name="go" value="GO" onclick="addCol()"></input></pre>';
	echo $str;	
?>