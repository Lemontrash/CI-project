<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Админка</title>
	<style>
		.adm_cont {
			text-decoration:none;
			display:flex;
			flex-direction:row;
			flex-wrap:wrap;
			padding:2px;
			padding-right:80px;

		}
		.adm_cont a {
			color:white;
		}
		.adm_prod {
			text-decoration:none;
			display:flex;
			flex-flow:column nowrap;
			justify-content:center;
			align-items:center;
			font-size:12px;
			border:1px solid lightgrey;
			width:200px;
			height:200px;
			margin:2px;

		}
		.adm_prod img {
			max-width:100%;
			height: 150px;
		}
		.adm_prod_name {
			font-size:14px;
		}
		.adm_nav {
			position:absolute;
			right:2px;
			
			border:1px solid transparent;
			text-align:center;
		}
		.adm_nav a {
			margin-bottom:2px;
			display:block;
			background-color:green;
			color:white;
			text-decoration:none;
		}
	</style>
</head>
<body>
	
</body>
</html>
<div class="adm_cont">
	<div class="adm_nav">
		<a class="add_new" href="http://localhost/ci/admin/add_prod">ADD NEW</a>
		<a href="http://localhost/ci/admin/orders">Manage orders</a>
	</div>
	
<?php foreach ($products as $prod): ?>

<a href="http://localhost/ci/admin/edit?id=<?=$prod['id'];?>"" class="adm_prod">
<span class="adm_prod_name"><?=$prod['name'];?></span>
<img src="style/img/<?=$prod['pic'];?>" alt="">
<span><?=$prod['price'];?>$</span>
</a>

<?php endforeach; ?>

</div>
