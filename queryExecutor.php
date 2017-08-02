<?php
//server connection script
include 'dbconnect.php';

//tag which is fetch from sender
$tags=$_POST['tag'];

//main logic
switch ($tags)
{
case "addcol":
//echo "you r trying to add column!!";
$DBName=$_POST['db'];
$tb=$_POST['tb'];
$cn=$_POST['cn'];
$dt=$_POST['dt'];
$size=$_POST['size'];
if($cn!='' && $dt!='' && $size!='')
{
  $sql="ALTER TABLE $tb ADD $cn $dt($size);";
  if($conn->select_db($DBName)){
  if($conn->query($sql) === TRUE)
  {
    echo "column added successfully,refresh to see result...";
  }
  else
    echo "Error: " . $conn->error;
}
}
else
echo "Enter value...";
break;

case "createDatabase":

    $DBName=$_POST['dbName'];
    $sql = "CREATE DATABASE $DBName";
    if ($conn->query($sql) === TRUE) {
      echo "Database created successfully";
    } else {
      echo "Error creating database: " . $conn->error;
    }
    $conn->close();
    break;

case "selectDB":
    $DBName=$_POST['dbName'];
    if($conn->select_db($DBName))
    {
      echo "Database selected successfully..!";
    }
    else {
      echo "Database is not selected..!";
    }
    break;

case "createTable":
    $DB_Name=$_POST['db_Name'];
    $query_Stat=$_POST['Query'];
    if($conn->select_db($DB_Name))
    {
      $sql = $query_Stat;
      if ($conn->query($sql) === TRUE) {
          echo "Table created successfully";
      } else {
          echo "Error creating table: " . $conn->error;
      }
    }
    else {
      echo "Database is not selected..!";
    }
    break;

case "DropTable":
	$DB_Name=$_POST['dbName'];
	$query_Stat=$_POST['Query'];
	if($conn->select_db($DB_Name))
    {
      $sql = $query_Stat;
      if ($conn->query($sql) === TRUE) {
          echo "Table dropped successfully";
      } else {
          echo "Error dropping table: " . $conn->error;
      }
    }
    else {
      echo "Database is not selected..!";
    }
    break;
	
	
case "DropDatabase":
	$DB_Name=$_POST['dbName'];
	$query_Stat=$_POST['Query'];
	if($conn->select_db($DB_Name))
    {
      $sql = $query_Stat;
      if ($conn->query($sql) === TRUE) {
          echo "Database dropped successfully";
      } else {
          echo "Error dropping Database: " . $conn->error;
      }
    }
    else {
      echo "Database does not exist..!";
    }
    break;

case "TruncateTable":
	$DB_Name=$_POST['dbName'];
	$query_Stat=$_POST['Query'];
	if($conn->select_db($DB_Name))
	{
		if($conn->query($query_Stat)=== TRUE){
			echo "Table truncated succesfully";
		}
		else{
			echo "error truncating database"; 
		}
	}
	else {
		echo "Database does not exist";
	}
	break;

default:
    echo "Nothing to show";
}

?>
