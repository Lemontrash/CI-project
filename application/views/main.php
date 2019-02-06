
<title>Restaurant</title>

<div class="main">
	<div class="pic-slider">
		<div class="overflow-slider">
			<ul class="slides">
				<?php foreach ($events as $event): ?>
					<li>
						<div class="slide">
							<img src="style/img/events/<?=$event["img"];?>" class="slide-img">
							
							<div class="event-desc">
								<div class="event-name"><?=$event["event"];?></div>
								<?=$event["description"];?>
								<div class="event-date"><?=$event["date"];?></div>
							</div>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
			<ul class="slider-dots"></ul>
			<div>
				<div class="slider-left-button">
					<
				</div>
				<div class="slider-right-button">
					>
				</div>
			</div>
		</div>
	</div>
	

	<!-- <div class="wine_main">
		<div>Попробуй наши вина с доставкой на дом!</div>
		<a href="http://localhost/ci/products">
			<div>Каталог</div>

		</a>
		<a href="http://localhost/ci/about">
			<div>Условия доставки</div>
		</a>
	</div> -->

	<div class="rest_card">
		<div class="payments">
		<div class="about_delivery_title">
			Пластиковая карта RESTAURANT
		</div>
		<div class="about_delivery">
			Зарегестрируйстесь в клубе Restarant и получите
			персональную  карту, а с ней 8% скидки на всю кухню.
			Членство в клубе также позволит Вам совершать
			бронирование без залога в режиме онлайн.
		</div>
		<div class="about_links">
			<a  href="http://localhost/ci/products"><div class="about_order">Регистрация</div></a>
			<a href=""><div class="zone">Подробнее</div></a>
		</div>
	</div>
		<img src="http://localhost/ci/style/img/rest_card.png" alt="">
	</div>
</div>
<script>
	var sliderTimeOut = 5000;
		var currentSlide = 1;
		var lastSlide = $('.slide').length;


		// for(var i=0;i<lastSlide;i++){
		// 	$('.slider-dots').append('<li></li>');
		// }
		// $('.slider-dots').children().click(function(event){
		// 	dotId = $(this).index();
		// 	if (dotId + 1 != currentSlide){
		// 		tWidth = -$('.overflow-slider').width()*(dotId);
		// 		$('.slides').css('transform','translate('+tWidth+'px,0)');
		// 		currentSlide = dotId + 1;
		// 	}
		// });

		// $('.slider-dots').children('li').click(function(){
		// 	$('.slider-dots').children('li').css('background-color','#f2f2f2');
		// 	$(this).css('background-color','#e5493a');
		// });
		// $('.slider-dots').children([1]).click();

		$('.slider-left-button').click(prevSlide);
		$('.slider-right-button').click(nextSlide);

		function sliderStarter(){
			var sliderInterval = setInterval(nextSlide,sliderTimeOut);
			$('.overflow-slider').hover(function(event){
				clearInterval(sliderInterval);
			},function(event) {
				sliderInterval = setInterval(nextSlide,sliderTimeOut);
			});
		};

		function nextSlide() {
			if(currentSlide == lastSlide || currentSlide<=0 || currentSlide > lastSlide){
				$('.slides').css('transform','translate(0,0)');
				currentSlide=1;
			}else{
				tWidth = -$('.overflow-slider').width()*(currentSlide);
				$('.slides').css('transform','translate('+tWidth+'px,0)');
				currentSlide++;
			}
		};

		function prevSlide(){
			if(currentSlide == 1 || currentSlide <= 0 || currentSlide > lastSlide){
				tWidth = -$('.overflow-slider').width()*(lastSlide - 1);
				$('.slides').css('transform','translate('+tWidth+'px,0)');
				currentSlide = lastSlide;
			}else{
				tWidth = -$('.overflow-slider').width()*(currentSlide - 2);
				$('.slides').css('transform','translate('+tWidth+'px,0)');
				currentSlide--;
			}
		};
		$(document).ready(sliderStarter);
</script>