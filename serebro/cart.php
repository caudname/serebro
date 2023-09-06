<?php
	require("includes/db_connect.php");
	session_start();
	include("includes/header.php");

	echo '<main>';
	echo '<div class="container">';
	

$result = mysqli_query($link,"SELECT * FROM cart,products WHERE cart.ip = '{$_SERVER["REMOTE_ADDR"]}' AND products.id = cart.cart_id");

if (mysqli_num_rows($result) > 0)
{
$row = mysqli_fetch_array($result);
	
	echo '<h1 class="main_title">Корзина товаров</h1>';
	echo '<a id="clear-cart">Очистить корзину</a>';
	echo '<div class="cart-products">';
do
{

$price = $row["price"] * $row["count"];
$allprice = $allprice + $price;

	echo '
	<div class="block-list-cart">

		<div class="img-cart">
			<p align="center">
				<a href="product.php?id='.$row["id"].'"><img src="'.$row["image"].'"/></a>
			</p>
		</div>

		<div class="title-cart">
			<p><a href="product.php?id='.$row["id"].'">'.$row["title"].'</a></p>
		</div>

		<div class="count-cart">
			<button class="cart-buttons plus-button" plusid="'.$row["cart_id"].'"><i class="fa fa-plus" aria-hidden="true"></i></button>
			<span class="product-count">'.$row["count"].'</span>
			<button class="cart-buttons minus-button" minusid="'.$row["cart_id"].'"><i class="fa fa-minus" aria-hidden="true"></i></button>
		</div>

		<div id="product'.$row["cart_id"].'" class="price-product">
			<h5>
				<span class="span-count">'.$row["count"].'</span> x <span class="span-price">'.$row["price"].'</span>
			</h5>
			<p id="price'.$row["cart_id"].'" >'.$price.' руб</p>
		</div>
		
		<div class="delete-cart">
			<a href="cart.php" id="'.$row["cart_id"].'" class="delete">x</a>
		</div>
	</div>
';

}
while ($row = mysqli_fetch_array($result));

 echo '
	<h2 class="allprice" align="right">Итого: <strong>'.$allprice.'</strong> руб</h2>
	<p align="right" class="button-next" ><a href="#">Оформить заказ</a></p>
</div>
';
  
} 
else
{
    echo '
		<h1 align="center">Корзина пуста</h1>
	</div>		
	';
}

	echo '</div>';
	echo '</main>';
	
	include ("includes/footer.php");
?>