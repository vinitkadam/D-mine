<?php
//server connection script
include 'dbconnect.php';



        $DB_Name="dsds";
        $list = array();
        if($conn->select_db($DB_Name))
        {
            $query = "select * from table dd";
            $result = $conn->query($query);
            $rowCount = $result->num_rows;
            for($i=0; $i<$rowCount; $i++)
            {
                $result->data_seek($i);
                $row = $result->fetch_array(MYSQLI_NUM);
                $list[$i] = $row[0];

            }
            echo json_encode($list);

        }
        else {
            echo "Database is not selected..!";
        }

        /* free result set */
        $result->free();
?>