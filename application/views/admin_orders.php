<title>Менеджмент заказов</title>
<style>
	li {
		color:white;
	}
	.line {
		width:100%;
		height:1px;
		background-color:white;
	}
</style>
<ul>
	<?php foreach ($orders as $order):var_dump($order[0]);
	?>
		<?php foreach($order as $or): 
		?>
		
			<li><span class="name"><?=$or["username"];?></span>(<?=$or["adress"];?>):<?=$or["name"];?>
				(id'
					<?php 
					for($i=0;$i<count($or["products_id"]);$i++){
						echo $or["products_id"];
					}?>
				')
				:Количество:<?=$or["quantity"];?>шт</li>
			<li class="line"></li>
		<?php endforeach; ?>
		
	<?php endforeach; ?>
</ul>