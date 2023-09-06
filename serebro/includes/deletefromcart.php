<?php

    require("db_connect.php");
    // Получаем действие над товаром
    $id = $_POST["id"];
        
    $delete = mysqli_query($link,"DELETE FROM cart WHERE cart_id = '$id' 
        AND ip = '{$_SERVER['REMOTE_ADDR']}'");

?>