<style>
	.comments {
		margin-bottom:100px;
	}
	form {
		height:400px;

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
</style>

<div class="comments">

<?php foreach ($reviews as $rev): ?>
	<div class="comment">
		<div class="com_name"><?=$rev["name"];?></div>
		<div class="com_com"><?=$rev["comment"];?></div>
	</div>
<?php endforeach; ?>
</div>
<div class="add_review">
	Оставьте ваш отзыв о товаре:
	<form action="http://localhost/ci/inspect/add_review" method="POST">
		<input type="text" name="username" placeholder="Ваше имя">
		<textarea name="review" placeholder="Ваш отзыв"></textarea> 
		<div>
			<input type="radio" name="rating" id="rating1" value="1"><label for="rating1">1</label>
			
			<input type="radio" name="rating" id="rating2" value="2"><label for="rating2">2</label>
			
			<input type="radio" name="rating" id="rating3" value="3"><label for="rating3">3</label>
		
			<input type="radio" name="rating" id="rating4" value="4"><label for="rating4">4</label>
			
			<input type="radio" name="rating" id="rating5" value="5"><label for="rating5">5</label>
			
		</div>
		<input type="submit" value="Оставить отзыв" name="submit">
	</form>
</div>