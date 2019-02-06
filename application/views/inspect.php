<style>
	.inspect {
		width:100%;
		height:250px;
		padding:0 5px;
		display: flex;
		color:white;
		margin-bottom:24px;
	}
	.inspect .prod_name {
		margin:0 auto;
		font-size:32px;
	}
	.inspect img {
		max-width:225px;
		height:225px;
		margin:0 auto;
	}
	.inspect .imgholder {
		border-radius:15px;
		border:1px solid transparent;
		
		width:250px;
		height:225px;
		background-color:white;
		display:flex;
		justify-content:center;
		margin-right:8px;
	}
	.inspect .prod_info div {
		margin-left:8px;
		max-height:225px;
		display:inline-block;
		overflow:hidden;
	}
	.inspect .prod_info {
		display:inline-block;
		width:calc(100% - 260px);
	}
	.addtocart {
		padding:10px;
		border:2px solid #e5493a;
		border-radius:5px;
		color:#e5493a;
		text-decoration:none;
		float:right;
		font-weight:600;
	}
	.addtocart:hover {
		border-color:black;
		color:black;
	}
	.addtocart:active {
		transform:scale(1.1,1.1);
	}
	.comments {
		width: 500px;
		text-align:center;
		color:white;
	}
	.add_review {
		margin:0 auto;
		border:1px solid white;
		border-radius:15px;
		width:300px;
		text-align:center;
		color:white;
		padding:10px;
	}
	form {
		display:flex;
		flex-flow: column nowrap;
	}
	form div {
		display:flex;
		flex-flow:row nowrap;
		justify-content:space-around;
	}
	form input[type="text"] {
		display:block;
		width:300px;
		height:30px;
		margin-bottom:4px;
	}
	form textarea[name="review"] {
		height:90px;
		width:300px;
		resize:none;
	}
	.rating {
		color:white;
	}
	.comment {
		display:flex;
		flex-flow:column nowrap;
		border:1px solid lightgrey;
		margin-bottom:4px;
	}
	.com_com {
		text-align:left;
	}
	.comment_head {
		display:flex;
		flex-flow:row nowrap;
		justify-content:space-between;
	}
	.comment_head {
		color:black;
		background-color:#efefef;
	}
	.comment_head .com_name {
		font-weight:500;
	}
	.ins_content {
		width:calc(100% - 100px);
		padding:50px 50px 0;

	}
</style>
<div class="ins_content">
	<div class="inspect">
	<?php foreach ($product as $prod): ?>
		<title><?=$prod['name'];?></title>
		<div class="imgholder"><img src="style/img/<?=$prod['pic'];?>" alt=""></div>
			<div class="prod_info">
				<div class="prod_name"><?=$prod['name'];?></div>
				<div class="description"><?=$prod['description'];?></div>
				<div class="price">Стоимость: <?=$prod['price'];?>$</div>
			</div>
	</div>
	<a class="addtocart" href="cart?act=addtocart&id=<?=$prod['id'];?>">Добавить в корзину</a>
	<div class="comments">
		<div class="com_title">Отзывы о товаре:</div>
		<?php $summary = array();
		foreach ($reviews as $rev): ?>
			<?php 
				$rating = $rev["rating"];
				array_push($summary,$rating);?>
			<div class="comment">
				<div class="comment_head">
					<div class="com_name"><?=$rev["name"];?></div>
					<div class="com_time"><?=$rev["time"];?></div>
				</div>
				<div class="com_com"><div><?=$rev["comment"];?></div><div>★<?=$rev["rating"];?></div></div>
			</div>
		<?php endforeach; ?>
		<div class="add_review">
			<form action="http://localhost/ci/inspect/add_review" method="POST">
				<span>Оставьте ваш отзыв о товаре:</span>
				<input type="text" name="username" placeholder="Ваше имя">
				<textarea name="review" placeholder="Ваш отзыв"></textarea> 
				<input type="hidden" name="prod_id" value="<?=$prod['id'];?>">
				<div>
					<div><input type="radio" name="rating" id="rating1" value="1"><label for="rating1">1</label></div>
					<div><input type="radio" name="rating" id="rating2" value="2"><label for="rating2">2</label></div>
					<div><input type="radio" name="rating" id="rating3" value="3"><label for="rating3">3</label></div>
					<div><input type="radio" name="rating" id="rating4" value="4"><label for="rating4">4</label></div>
					<div><input type="radio" name="rating" id="rating5" value="5"><label for="rating5">5</label></div>
				</div>
				<input type="submit" value="Оставить отзыв" name="submit">
			</form>
		</div>
		<?php endforeach; ?>
		<?php if($summary){$summary = round(array_sum($summary)/count($summary));}?>
		<div class="rating">Рейтинг: <?php if($summary){echo $summary;}else{echo 'Не определён';}?></div>
	</div>
</div>
<script>
	$('.rating').insertAfter($('.price'));
	var cartAlert = document.createElement('div');
	cartAlert.className = 'cart_alert';

	$('.addtocart').on('click',function(event){

		event.preventDefault();
		var link = this.href;
		$.ajax(
		{
			type:"post",
			url:link,
			success:function(response) 
			{
				$('.cart_alert').css('background-color','limegreen');
				$('.cart_alert').html('Добавлено в корзину');
			},
			error:function() 
			{
				console.log('error');
			}
		});
		$('.inspect').append(cartAlert);
		
	});
</script>



