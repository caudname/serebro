<?php
    require("db_connect.php");

    $clear = mysqli_query($link,"DELETE FROM cart WHERE ip = '{$_SERVER['REMOTE_ADDR']}'");
?>