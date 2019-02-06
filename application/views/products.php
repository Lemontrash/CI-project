<style>Каталог</style>
<div class="products">
<?php foreach ($products as $prod): ?>

<a class="prod">
	<span class="prod_name"><?=$prod['name'];?></span>
	<img src="style/img/<?=$prod['pic'];?>" alt="">
	<span><?=$prod['price'];?>$</span>
	<div class="links">
		<a class="atc" href="cart?act=addtocart&id=<?=$prod['id'];?>">ADD TO CART</a>
		<a class="inspect" href="inspect?act=inspect&id=<?=$prod['id'];?>">Details...</a>
	</div>

</a>

<?php endforeach; ?>
</div>

<script>
	var cartAlert = document.createElement('div');
	cartAlert.className = 'cart_alert';

	$('.atc').on('click',function(event){

		event.preventDefault();
		var link = this.href;
		$.ajax(
		{
			type:"post",
			url:link,
			success:function(response) 
			{
				$('.cart_alert').css('background-color','limegreen');
				$('.cart_alert').html('Added to cart');
			},
			error:function() 
			{
				console.log('error');
			}
		});
		$('.products').append(cartAlert);
		
	});

</script>
