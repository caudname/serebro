<?php
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        require("db_connect.php");

        $minusid = $_POST["minusid"];

        $result = mysqli_query($link,"SELECT * FROM cart WHERE cart_id = '$minusid' AND ip = '{$_SERVER['REMOTE_ADDR']}'");
        if (mysqli_num_rows($result) > 0)
        {
            $row = mysqli_fetch_array($result);    
            $new_count = $row["count"] - 1;

            if ($new_count > 0)
            {
                $update = mysqli_query ($link,"UPDATE cart SET count='$new_count' WHERE cart_id='$minusid' AND ip = '{$_SERVER['REMOTE_ADDR']}'");
                echo $new_count;
            }
            else
            {
                echo $row["count"];
            }
        }
    }
?>