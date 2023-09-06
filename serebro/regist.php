<?php
	require ("includes/db_connect.php");

if (isset($_POST["regist"])) {
	$name = $_POST["name"];
	$surname = $_POST["surname"];
	$patronymic = $_POST["patronymic"];
	$login = $_POST["login"];
	$password = $_POST["password"];
	$phone = $_POST["phone"];

	$query = "SELECT * FROM users WHERE login='$login'";
	$result = mysqli_query($link, $query);

	if (mysqli_num_rows($result) == 0) {
		$sql = "INSERT INTO users(name, surname, patronymic, login, password, phone) VALUES ('$name', '$surname', '$patronymic', '$login', '$password', '$phone')";
		$add = mysqli_query($link, $sql);
		session_start();
		$_SESSION["status"] = "yes";
		$_SESSION["name"] = $row["name"];
		$_SESSION["surname"] = $row["surname"];
		$_SESSION["patronymic"] = $row["patronymic"];
		$_SESSION["login"] = $row["login"];
		$_SESSION["password"] = $row["password"];
		$_SESSION["phone"] = $row["phone"];
		header("Location: index.php");
	} else {
		$message = 'Такой пользователь уже есть!';
	}
}
	include ("includes/header.php");
?>
	
	<main>
		
		<div class="container">
			<h1 class="main_title">Регистрация</h1>
			<div class="regist_form-block">
				<form method="post" class="regist_form">
					<input type="text" name="name" placeholder="Имя" required autofocus><br>
					<input type="text" name="surname" placeholder="Фамилия" required><br>
					<input type="text" name="patronymic" placeholder="Отчество" required><br>
					<input type="text" name="login" placeholder="Логин" required><br>
					<input type="text" name="password" placeholder="Пароль" required><br>
					<input type="text" name="phone" placeholder="Номер телефона" required><br>
					<button name="regist">Зарегистрироваться</button>
				</form>
			</div>
			<h1 class="main-title"><?php echo $message; ?></h1>
		</div>
	</main>

<?php
	include ("includes/footer.php");
?>