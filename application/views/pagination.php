<title>Каталог</title>
<!-- <div class="dropdown">
  <button onclick="dropDown()" class="dropbtn">Сортировка по:</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="http://localhost/ci/products?o=price">Цене</a>
    <a href="http://localhost/ci/products?o=name">Наименованию</a>
    <a href="http://localhost/ci/products?o=rating">Рейтингу</a>
  </div> -->
</div>
<div class="products">
    <?php foreach ($results as $prod): ?>

    <div class="prod">
        <a class="inspect" href="http://localhost/ci/inspect?act=inspect&id=<?=$prod->id;?>">
            <div class="imgholder"><img src="http://localhost/ci/style/img/<?=$prod->pic;?>" alt=""></div>
            <div class="prod_name"><?=$prod->name;?></div>
       
            <div class="prod_price">
               <span><?=$prod->price;?>$</span> 
                <a class="atc" href="http://localhost/ci/cart?act=addtocart&id=<?=$prod->id;?>"><div>В корзину</div></a>
            </div>
            
        </a>
       
            
            
            

    </div>
    <?php endforeach; ?>
</div>
<?php if (isset($links)) { ?>

<div class="pagination">
<?php echo $links;?>
</div>

<?php } ?>

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
                $('.cart_alert').html('Добавлено в корзину');
            },
            error:function() 
            {
                console.log('error');
            }
        });
        $('.products').append(cartAlert);
        
    });

    $('a[rel="next"]').text('->');
    $('a[rel="prev"]').text('<-');
    
    function dropDown() {
        document.getElementById("myDropdown").classList.toggle("show");
    }
</script>
