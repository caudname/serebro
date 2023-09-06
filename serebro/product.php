<?php
	require ("includes/db_connect.php");
	$id = $_GET["id"];
	session_start();
	include ("includes/header.php");

	$query = "SELECT * FROM products WHERE id = '$id'";
	$result = mysqli_query($link, $query);
	echo '<main>';
		echo '<div class="container">';
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_array($result);
			echo '<h1>'.$row["title"].'</h1>

				<div class="product">
					<div class="product_image-block">
						<img src="'.$row["image"].'" class="product_image">
					</div>
					<div class="product_info-block">
						<div class="product_title-block">
							<a href="product.php?id='.$row["id"].'" class="product_title-link">'.$row["title"].'</a>
						</div>
						<div class="product_price-block">
							'.$row["price"].' руб
						</div>
						<div class="buy-block">
							<a href="#" class="buy" id="'.$row["id"].'">Добавить в корзину</a>
						</div>
						<div class="product_description-block">
							'.$row["description"].'
						</div>
					</div>
				</div>
			';
		}
		echo '</div>';
	echo '</main>';


	include ("includes/footer.php");
?>