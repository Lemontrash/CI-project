<title>Оформить заказ</title>
<style>
	html,body {
		height:100%;
		width:100%;
	}
	.order_cont {
		margin-top:75px;
		position:fixed
		top:0;
		width:100%;
		height: calc(100% - 40px);
		display:flex;
		flex-direction:row;
		justify-content:center;
		color:white;
	}
	form {
		border:1px solid white;
		border-radius:15px;
		height: 320px;
		text-align:center;
		padding:25px 25px 0 25px;
		background-color:transparent;
	}
	form input[type="text"]{
		width:350px;
		height:30px;
		display:block;
		margin:4px 0;
		background-color:transparent;
		border:1px solid white;
		padding-left:8px;
		color:white;
	}
	form *::placeholder {
		color:white;
	}
	form input[type="submit"]:hover {
		background-color:white;
		color:black;
	}
	form span {
		font-size:20px;
	}
	form input[type="submit"] {
		display:block;
		margin:4px auto;
		border:1px solid white;
		border-radius:15px;
		color:white;
		background-color:transparent;
		font-size:32px;
	}
	form textarea {
		padding-left:8px;
		width:350px;
		height:120px;
		resize:none;
		border:1px solid white;
		background-color:transparent;
		color:white;
	}
</style>
<div class="order_cont">
	

<form action="http://localhost/ci/order/send_order" method="POST">
	<span>Оформить заказ</span>
	<input type="text" name="username" placeholder="Ваше имя">
	<input type="text" name="phone" placeholder="Ваш номер телефона">
	<input type="text" name="adress" placeholder="Адрес доставки">
	<textarea name="comment" placeholder="Комментарий к заказу" id="" cols="30" rows="10"></textarea>
	<input type="submit" name="submit" value="Заказать!" >
</form>

<?php foreach($order as $prod): ?>

<?php endforeach; ?>
</div>