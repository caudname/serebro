<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Серебряный мир</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="icon" href="images/icon.jpg">
</head>
<body>
<div class="content">
	<header class="header">
		<div class="container">
			
			<div class="header-top">
				<div class="logo-block">
					<a href="index.php">
						<div class="logo_image-block">
							<img src="images/icon.jpg" alt="" class="logo_image">
						</div>
						<div class="logo_title">Серебряный мир</div>
					</a>
				</div>

				<div class="search-block">
					<form method="get" action="search.php" class="search-form">
						<input type="text" name="search-input" class="search-input" placeholder="Поиск..." required>
						<button href="#" class="search-button">
							<i class="fa fa-search" aria-hidden="true"></i>
						</button>
					</form>
				</div>

				<div class="header-icons">
					<div class="regist-block">
					<?php
						if (isset($_SESSION["status"]) == "yes") {
							echo '
								<a href="#" class="logout-link">
									<i class="fa fa-user" aria-hidden="true"></i>
								</a>
							';
						} else {
							echo '
								<a href="#" class="auth-link">
									<i class="fa fa-user" aria-hidden="true"></i>
								</a>
							';
						}
					?>
					</div>

					<div class="cart-block">
						<a href="cart.php" class="cart-link">
							<i class="fa fa-shopping-cart" aria-hidden="true"></i>
						</a>
					</div>
				</div>

				<!-- Окно авторизации -->
				<div class="auth-window-block">
					<div class="auth-window-box">
						<a href="#" class="shadow-link"></a>
						<div class="auth-window">
							<h1 class="main-title">Вход</h1>
							<div class="auth-form">
								<form method="post">
									<div class="auth-item">
										<input type="text" name="auth-login" placeholder="Логин" class="auth-input auth-login" required>
									</div>
									<div class="auth-item">
										<input type="password" name="auth-password" placeholder="Пароль" class="auth-input auth-password" required>
									</div>
									<div class="auth-item">
										<button class="auth-button" name="auth-button">Войти</button>
									</div>
								</form>
							</div>
							<p class="no-account">Не зарегистрированы? <a href="regist.php" class="regist-link">Зарегистрироваться</a></p>
						</div>
					</div>
				</div>

				<!-- Окно выхода -->
				<div class="logout-block">
					<a href="#" id="logout">Выйти</a>
				</div>

			</div>

			<div class="header-bottom">
				<div class="menu">
					<ul class="menu-list">
						<li class="menu-item"><a href="index.php#catalog" class="menu-link">Каталог</a></li>
						<li class="menu-item"><a href="index.php#popular" class="menu-link">Популярные</a></li>
						<li class="menu-item"><a href="about.php" class="menu-link">О нас</a></li>
						<li class="menu-item"><a href="contacts.php" class="menu-link">Контакты</a></li>
					</ul>
				</div>
			</div>

		</div>
	</header>

	<div class="main">
