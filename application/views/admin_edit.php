<title>Редактирование товара</title>
<style>
	form {
		display:flex;
		flex-direction:column;
		justify-content:center;
		align-items:center;
	}
	form input[type="text"]{
		width:400px;
		height:30px;
		
	}
	form *{
		display:block;
	}
	form input[type*="submit"]{
		width:100px;
		height:40px;
	}
	form input {
		font-size:16px;
		margin:2px 20px;
	}
	.reload {
		z-index:0;
		position:fixed;
		top:100px;
		left:100px;
		display:flex;
		flex-direction:column;
	}
	.reload img {
		max-width:200px;
	}
	form {
		color:white;
	}
	.reload input {
		display:inline-block;
	}
	form a {
		color:red;
		text-decoration:none;
		float:right;
		border:1px solid red;
		border-radius:5px;
		padding:5px;
		position:relative;
		top:100px;
		left:500px;
	}
	form textarea {
		width: 400px;
		height: 100px;

	}
</style>


	<?php foreach ($products as $prod): ?>
		
<form enctype="multipart/form-data" action="edited" method="POST" class="edit_input">
	<a href="http://localhost/ci/admin/delete?id=<?=$prod['id'];?>"><div>Удалить товар</div></a>
		<input type="hidden" name="id" value="<?=$prod['id'];?>">
		<input type="text" name="name"  value="<?=$prod['name'];?>">
		<input type="text" name="price" value="<?=$prod['price'];?>">
		<textarea name="description" value=""><?=$prod['description'];?></textarea> 

		
		<div class="reload">
			<img src="http://localhost/ci/style/img/<?=$prod['pic'];?>" alt="<?=$prod['pic'];?>">
			<input type="file" name="pic" value="<?=$prod['pic'];?>">
			<div><input type="checkbox" name="reload">Заменить картинку!</div>
		</div>
		
		<input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
		<input type="submit" class="submit" name="submit">
		
	<?php endforeach; ?>
	
</form>
