<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    include('db_connect.php');

    $result = mysqli_query($link,"SELECT * FROM cart WHERE ip = '{$_SERVER['REMOTE_ADDR']}'");
    if (mysqli_num_rows($result) > 0)
    {
    $row = mysqli_fetch_array($result);
    
    do
    {
        $int = $int + ($row["price"] * $row["count"]); 

    } while($row = mysqli_fetch_array($result));


        echo $int;

    }
}
?>