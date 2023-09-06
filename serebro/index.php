<?php
	require ("includes/db_connect.php");
	session_start();
	include ("includes/header.php");
?>
	<main>
		
		<div class="container">
			<h1 class="main_title" id="catalog">Каталог</h1>
			<div class="catalog">

<?php
		$query = "SELECT * FROM categories";
		$result = mysqli_query($link, $query);
		$row = mysqli_fetch_array($result);
		do {
			echo '
			<a href="catalog.php?type='.$row["title"].'">
				<div class="catalog_item">
					<div class="catalog_image-block">
						<img src="'.$row["image"].'" alt="" class="catalog_image">
					</div>
					<div class="catalog_title-block">
						'.$row["title"].'
					</div>
				</div>
			</a>
			';
		} while ( $row = mysqli_fetch_array($result) );
?>
			</div>

			<h1 class="main_title" id="popular">Популярные</h1>
			<div class="products">

				<div class="products_item">
					<div class="products_image-block">
						<a href="product.php?id=16" class="products_image-link">
							<img src="images/kinzhaly8.jpg" class="products_image">
						</a>
					</div>
					<div class="products_title-block">
						<a href="product.php?id=16" class="products_title-link">Набор из кинжала и 2 рогов</a>
					</div>
					<div class="products_price-block">
						14100 руб
					</div>
					<div class="buy-block">
						<a href="#" class="buy" id="16">Добавить в корзину</a>
					</div>
				</div>

				<div class="products_item">
					<div class="products_image-block">
						<a href="product.php?id=50" class="products_image-link">
							<img src="images/shkatulki2.jpg" class="products_image">
						</a>
					</div>
					<div class="products_title-block">
						<a href="product.php?id=50" class="products_title-link">Шкатулка из серебра</a>
					</div>
					<div class="products_price-block">
						63000 руб
					</div>
					<div class="buy-block">
						<a href="#" class="buy" id="50">Добавить в корзину</a>
					</div>
				</div>

				<div class="products_item">
					<div class="products_image-block">
						<a href="product.php?id=20" class="products_image-link">
							<img src="images/nozhi4.jpg" class="products_image">
						</a>
					</div>
					<div class="products_title-block">
						<a href="product.php?id=20" class="products_title-link">Нож из дамасской стали</a>
					</div>
					<div class="products_price-block">
						35300 руб
					</div>
					<div class="buy-block">
						<a href="#" class="buy" id="20">Добавить в корзину</a>
					</div>
				</div>

				<div class="products_item">
					<div class="products_image-block">
						<a href="product.php?id=43" class="products_image-link">
							<img src="images/ruchki3.jpg" class="products_image">
						</a>
					</div>
					<div class="products_title-block">
						<a href="product.php?id=43" class="products_title-link">Ручка ручной работы из серебра</a>
					</div>
					<div class="products_price-block">
						12500 руб
					</div>
					<div class="buy-block">
						<a href="#" class="buy" id="43">Добавить в корзину</a>
					</div>
				</div>

			</div>
		</div>

	</main>
	
<?php
	include ("includes/footer.php");
?>