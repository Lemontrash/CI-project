<title>Корзина</title>
<style>
	.addMore,
	.removeOne,
	.delete {
		font-size:24px;
		border:2px solid #e5493a;
		float:right;
		margin:5px 2px;
		width: 21px;
		height: 21px;
		font-weight:400;
		border-radius:50%;
		line-height:21px;
		text-align:center;
		color:#e5493a;
	}
	.delete {
		color:#e5493a;
	}
	.delete:hover,
	.addMore:hover,
	.removeOne:hover {
		color:white;
	}
	.delete:active,
	.addMore:active,
	.removeOne:active {
		transform:scale(1.1,1.1);
	}
	.cart_prod {
		height:35px;
		background-color:rgba(0,0,0,0.2);
		margin:6px 0;
		line-height:35px;
		border-radius:25px;
		border:1px solid #efefef;
		color:#e7e7e7;
		padding:0 5px;
	}
	.cart_container {
		width:calc(100% - 8px);
		padding:8px 4px; 
	}
	.cart_container * {
		text-decoration:none;
	}
	.cart_list{
		width:500px;
		margin:0 auto;
	}
	.cart_name {
		font-weight:500;
	}
	.order {
		float:right;
		font-size:28px;
		text-decoration:none;
		color:white;
		background-color:green;
		border:2px solid white;
		border-radius:10px;
		padding:5px 10px;
		font-weight:500;
	}
	.order:hover {
		transform:scale(1.1,1.1);
	}
	.summary {
		color:#e7e7e7;
	}

</style>

<div class="cart_container">
	
	<div class="cart_list">
	<?php 
		$summary =array();
		foreach($cart as $item){ ?>
			<?php 
			$price = $item["price"]*$item["quantity"];
			array_push($summary,$price);?>
			<div class="cart_prod">
				
				<span class="cart_name"><?=$item["name"];?></span>
				
				<input type="hidden" name="cart_pic" value="<?=$item["pic"];?>">
				<span class="quantity"><?=$item["quantity"];?>шт</span>
				<span class="cart_price"><?=$price;?>$</span>
				<a class="delete" href="cart?act=delete&id=<?=$item["id"];?>"><div>X</div></a>
				<a class="addMore" href="http://localhost/ci/cart?act=addtocart&id=<?=$item["id"];?>">+</a>
				<a class="removeOne" href="http://localhost/ci/cart?act=remove_one&id=<?=$item["id"];?>">-</a>
			
			</div>
	
	<?}$summary= array_sum($summary);?>
	<span class="summary">Сумма заказа:<?=$summary;?>$</span>
	<a class="order" href="order">Заказать!</a>
	</div>
	
	
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
	var cartAlert = document.createElement('div');
	cartAlert.className = 'cart_alert';

	$('.delete').on('click',function(event){

		event.preventDefault();
		var link = this.href;
		$.ajax(
		{
			type:"post",
			url:link,
			success:function(response) 
			{
				$('.cart_alert').css('background-color','red');
				$('.cart_alert').html('Товар удалён');
				location.reload();
			},
			error:function() 
			{
				console.log('error');
			}
		});
		$('.cart_container').append(cartAlert);

	});
	$('.addMore').on('click',function(event){

		event.preventDefault();
		var link = this.href;
		$.ajax(
		{
			type:"get",
			url:link,
			success:function(response) 
			{
				
				location.reload();
				$('.cart_alert').css('background-color','red');
				$('.cart_alert').html('Корзина обновлена');
			},
			error:function() 
			{
				console.log('error');
			}
		});
		$('.cart_container').append(cartAlert);

	});
	$('.removeOne').on('click',function(event){

		event.preventDefault();
		var link = this.href;
		$.ajax(
		{
			type:"get",
			url:link,
			success:function(response) 
			{
				
				location.reload();
				$('.cart_alert').css('background-color','red');
				$('.cart_alert').html('Корзина обновлена');
			},
			error:function() 
			{
				console.log('error');
			}
		});
		$('.cart_container').append(cartAlert);
		
	});
	$('.cart_alert').remove();
	

</script>
