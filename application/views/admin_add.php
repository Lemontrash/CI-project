<title>Добавление товара</title>
<style>
	form input[type="text"]{
	width:400px;
	height:30px;
		
	}
	form *{
		display:block;
	}
	form {
		width: 400px;
		margin:0 auto;
	}
	form input[type="submit"]{
		margin:0 auto;
		height:40px;
	}
	form input {
		font-size:16px;
		margin:2px 0;
	}
	textarea {
		width: 400px;
		height:100px;
	}

</style>
<form enctype="multipart/form-data" action="added" method="POST" class="edit_input">
	
		
		<input type="text" name="name" placeholder="Имя товара" >
		<input type="text" name="price" placeholder="Цена">
		<textarea name="description" placeholder="Описание"></textarea>

		
		<input type="file" name="pic">
		<input type="hidden" name="MAX_FILE_SIZE" value="30000000" />


	<input type="submit" class="submit" value="Добавить товар" name="submit">
</form>