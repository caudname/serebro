<?php
	require ("includes/db_connect.php");
	$type = $_GET["type"];

	session_start();
	include ("includes/header.php");
	echo '<main>';
	echo '<div class="container">';
	echo '<h1 class="main_title">'.$type.'</h1>';
?>
		<div class="products">

<?php
	$query = "SELECT * FROM products WHERE type = '$type'";
	$result = mysqli_query($link, $query);

	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_array($result);
		do {
			echo '
			<div class="products_item">
				<div class="products_image-block">
					<a href="product.php?id='.$row["id"].'" class="products_image-link">
						<img src="'.$row["image"].'" class="products_image">
					</a>
				</div>
				<div class="products_title-block">
					<a href="product.php?id='.$row["id"].'" class="products_title-link">'.$row["title"].'</a>
				</div>
				<div class="products_price-block">
					'.$row["price"].' руб
				</div>
				<div class="buy-block">
					<a href="#" class="buy" id="'.$row["id"].'">Добавить в корзину</a>
				</div>
			</div>
			';
		} while ($row = mysqli_fetch_array($result));
	} else {
		echo '<h1>Товаров данной категории нет</h1>';
	}
?>
			</div>
		</div>
	</main>
<?php
	include ("includes/footer.php");
?>