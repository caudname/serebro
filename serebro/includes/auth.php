<?php
	require ("db_connect.php");

	$login = $_POST["login"];
	$password = $_POST["password"];

	$query = "SELECT * FROM users WHERE login='$login' AND password='$password'";
	$result = mysqli_query($link, $query);

	if (mysqli_num_rows($result) != 0) {
		$row = mysqli_fetch_array($result);
		session_start();
		$_SESSION["status"] = "yes";
		$_SESSION["name"] = $row["name"];
		$_SESSION["surname"] = $row["surname"];
		$_SESSION["patronymic"] = $row["patronymic"];
		$_SESSION["login"] = $row["login"];
		$_SESSION["password"] = $row["password"];
		$_SESSION["phone"] = $row["phone"];
		echo 'yes';
    }
    else {
        echo 'no';
    }
	

?>