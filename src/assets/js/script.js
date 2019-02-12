jQuery(document).ready(function($){

	//замена телефонов ссылками
	$('.tel').each(function() {
		var phone = $(this).text().replace(/[^+0-9]/g, '');
		$(this).wrapInner('<a href="tel:' + phone + '"></a>');
	});

	//добавление класса по клику на гамбургер в хедере
	$(document).on('click','header .hamburger > div', function(){
		if ($(this).hasClass('opened')) {
			$(this).removeClass('opened');
			$('header .dropdown-menu').slideUp('slow');
		}
		else {
			$(this).addClass('opened');
			$('header .dropdown-menu').slideDown('slow');
			$('header .dropdown-menu').css('display','flex');
		}
	});

	//инициализация табов
	$('.tabs ul li a').tabs();
	$('.tabs-2 ul.tabs-2-list li a').tabs();

	//инициализация слайдера до и после
	var swiper = new Swiper('.swiper-container', {
		loop: true,
		effect: 'fade',
		pagination: {
			el: '.swiper-pagination',
			type: 'fraction',
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
	});

	//инициализация fancybox. видео в попапе
	$('.video-popup').fancybox({
		openEffect  : 'none',
		closeEffect : 'none',
		helpers : {
			media : {}
		}
	});

	//инициализация слайдера фотографии клиники
	var swiper2 = new Swiper('.photos-of-clinic', {
		loop: true,
		pagination: {
			el: '.swiper-pagination',
			type: 'fraction',
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
	});

	//работа faq в aside
	$(document).on('click','aside .faq .item .question', function(){
		if ($(this).hasClass('opened')) {
			$(this).siblings('ul').slideUp('slow');
			$(this).removeClass('opened');
		}
		else {
			$(this).addClass('opened');
			$(this).siblings('ul').slideDown('slow');
		}
	})

	//инициализация слайдера расписание мастер-классов по данной теме
	var swiper3 = new Swiper('.time-for-master-class', {
		loop: true,
		slidesPerView: 2,
		speed: 500,
		breakpoints: {
			600: {
				slidesPerView: 1
			}
		},
		pagination: {
			el: '.swiper-pagination',
			type: 'fraction',
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
	});

	//добавление класса по ховеру в блок с новостями
	$('.list-of-news-2 > div .item .text').hover(function () {
		$(this).siblings('.img').addClass('hovered');
	}, function() {
		$(this).siblings('.img').removeClass('hovered');
	});
	$('.page-of-news-2 .inner > div .right .item .text').hover(function () {
		$(this).siblings('.img').addClass('hovered');
	}, function() {
		$(this).siblings('.img').removeClass('hovered');
	});

	//работа faq на странице faq-page
	$(document).on('click','.faq-page .list-of-faq .item', function(){
		if ($(this).hasClass('opened')) {
			$(this).children('.answer').slideUp('slow');
			$(this).removeClass('opened');
		}
		else {
			$(this).addClass('opened');
			$(this).children('.answer').slideDown('slow');
		}
	});

	//инициализация слайдера новости и события на главной
	var swiper4 = new Swiper('.news-slider', {
		loop: true,
		slidesPerView: 2,
		spaceBetween: 10,
		speed: 500,
		breakpoints: {
			700: {
				slidesPerView: 1
			}
		},
		pagination: {
			el: '.swiper-pagination',
			type: 'fraction',
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
	});

	//инициализация слайдера результаты работы на главной
	var swiper5 = new Swiper('.work-results', {
		loop: true,
		effect: 'fade',
		pagination: {
			el: '.swiper-pagination',
			type: 'fraction',
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
	});

	//добавление класса по ховеру на странице команды
	$('.team-2 .item .text .name').hover(function () {
		$(this).parent('.text').siblings('.img').addClass('hovered');
	}, function() {
		$(this).parent('.text').siblings('.img').removeClass('hovered');
	});

	//работа гамбургер меню на мобилке
	$(document).on('click','header .dropdown-menu .left ul li.title', function(){
		if ($(window).width() < 830) {
			if ($(this).parent('ul').hasClass('opened')) {
				$(this).parent('ul').removeClass('opened');
				$(this).siblings('ul').slideUp('slow');
			}
			else {
				$(this).parent('ul').addClass('opened');
				$(this).siblings('ul').slideDown('slow');
			}
		}
	});

	//работа асайда на мобилке
	$(document).on('click','aside > .title-mobile', function(){
		if ($(window).width() < 770) {
			if ($(this).hasClass('opened-aside-mobile')) {
				$(this).removeClass('opened-aside-mobile');
				$('aside > div:not(.title-mobile)').slideUp('slow');
			}
			else {
				$('aside > div:not(.title-mobile)').slideDown('slow');
				$(this).addClass('opened-aside-mobile');
			}
		}
	});



	//плагин проверки видимости
	$('.tile').on('scrollSpy:enter', function() {
		if ($(window).width() > 900) {
			$(this).addClass('view');
		}
	});
	//если не виден элемент
	$('.tile').on('scrollSpy:exit', function() {
		if ($(window).width() > 900) {
			$(this).removeClass('view');
		}
	});
	if ($(window).width() > 900) {
		$('.tile').scrollSpy();
	}

	$('.tile-2').on('scrollSpy:enter', function() {
		if ($(window).width() > 900) {
			$(this).addClass('view');
		}
	});
	//если не виден элемент
	$('.tile-2').on('scrollSpy:exit', function() {
		if ($(window).width() > 900) {
			$(this).removeClass('view');
		}
	});
	if ($(window).width() > 900) {
		$('.tile-2').scrollSpy();
	}

	//отображение картинок на странице биография относительно классов
	$(document).scroll(function() {

		if ($(window).width() > 900) {
		//добавление доп класса на блоки родителем которых является .biography-2
		if ($('.biography-2 .right-block .text-1 .tile').hasClass('view')) {
			$('.biography-2 .right-block .text-1 .tile').addClass('view-2');
			$('.biography-2 .right-block .text-2 .tile-2').removeClass('view-2');
			$('.biography-2 .right-block .text-2 .tile').removeClass('view-2');
			$('.biography-2 .right-block .text-3 .tile').removeClass('view-2');
			$('.biography-2 .right-block .text-4 .tile').removeClass('view-2');
			$('.biography-2 .right-block .text-5 .tile').removeClass('view-2');
			$('.biography-2 .right-block .text-6 .tile').removeClass('view-2');
		}
		if ($('.biography-2 .right-block .text-2 .tile-2').hasClass('view')) {
			$('.biography-2 .right-block .text-1 .tile').removeClass('view-2');
			$('.biography-2 .right-block .text-2 .tile-2').addClass('view-2');
			$('.biography-2 .right-block .text-2 .tile').removeClass('view-2');
			$('.biography-2 .right-block .text-3 .tile').removeClass('view-2');
			$('.biography-2 .right-block .text-4 .tile').removeClass('view-2');
			$('.biography-2 .right-block .text-5 .tile').removeClass('view-2');
			$('.biography-2 .right-block .text-6 .tile').removeClass('view-2');
		}
		if ($('.biography-2 .right-block .text-2 .tile').hasClass('view')) {
			$('.biography-2 .right-block .text-1 .tile').removeClass('view-2');
			$('.biography-2 .right-block .text-2 .tile-2').removeClass('view-2');
			$('.biography-2 .right-block .text-2 .tile').addClass('view-2');
			$('.biography-2 .right-block .text-3 .tile').removeClass('view-2');
			$('.biography-2 .right-block .text-4 .tile').removeClass('view-2');
			$('.biography-2 .right-block .text-5 .tile').removeClass('view-2');
			$('.biography-2 .right-block .text-6 .tile').removeClass('view-2');
		}
		if ($('.biography-2 .right-block .text-3 .tile').hasClass('view')) {
			$('.biography-2 .right-block .text-1 .tile').removeClass('view-2');
			$('.biography-2 .right-block .text-2 .tile-2').removeClass('view-2');
			$('.biography-2 .right-block .text-2 .tile').removeClass('view-2');
			$('.biography-2 .right-block .text-3 .tile').addClass('view-2');
			$('.biography-2 .right-block .text-4 .tile').removeClass('view-2');
			$('.biography-2 .right-block .text-5 .tile').removeClass('view-2');
			$('.biography-2 .right-block .text-6 .tile').removeClass('view-2');
		}
		if ($('.biography-2 .right-block .text-4 .tile').hasClass('view')) {
			$('.biography-2 .right-block .text-1 .tile').removeClass('view-2');
			$('.biography-2 .right-block .text-2 .tile-2').removeClass('view-2');
			$('.biography-2 .right-block .text-2 .tile').removeClass('view-2');
			$('.biography-2 .right-block .text-3 .tile').removeClass('view-2');
			$('.biography-2 .right-block .text-4 .tile').addClass('view-2');
			$('.biography-2 .right-block .text-5 .tile').removeClass('view-2');
			$('.biography-2 .right-block .text-6 .tile').removeClass('view-2');
		}
		if ($('.biography-2 .right-block .text-5 .tile').hasClass('view')) {
			$('.biography-2 .right-block .text-1 .tile').removeClass('view-2');
			$('.biography-2 .right-block .text-2 .tile-2').removeClass('view-2');
			$('.biography-2 .right-block .text-2 .tile').removeClass('view-2');
			$('.biography-2 .right-block .text-3 .tile').removeClass('view-2');
			$('.biography-2 .right-block .text-4 .tile').removeClass('view-2');
			$('.biography-2 .right-block .text-5 .tile').addClass('view-2');
			$('.biography-2 .right-block .text-6 .tile').removeClass('view-2');
		}
		if ($('.biography-2 .right-block .text-6 .tile').hasClass('view')) {
			$('.biography-2 .right-block .text-1 .tile').removeClass('view-2');
			$('.biography-2 .right-block .text-2 .tile-2').removeClass('view-2');
			$('.biography-2 .right-block .text-2 .tile').removeClass('view-2');
			$('.biography-2 .right-block .text-3 .tile').removeClass('view-2');
			$('.biography-2 .right-block .text-4 .tile').removeClass('view-2');
			$('.biography-2 .right-block .text-5 .tile').removeClass('view-2');
			$('.biography-2 .right-block .text-6 .tile').addClass('view-2');
		}

		//плавные переходы по доп классу
		if ($('.biography-2 .right-block .text-1 .tile').hasClass('view-2')) {
			$('.biography-2 .left-block .img-1').fadeIn('slow');
			$('.biography-2 .left-block .img-2').fadeOut(0);
			$('.biography-2 .left-block .img-3').fadeOut(0);
			$('.biography-2 .left-block .img-4').fadeOut(0);
			$('.biography-2 .left-block .img-5').fadeOut(0);
			$('.biography-2 .left-block .img-6').fadeOut(0);
			$('.biography-2 .left-block .img-7').fadeOut(0);
			$('.biography-2').addClass('bg');
		}
		if ($('.biography-2 .right-block .text-2 .tile-2').hasClass('view-2')) {
			$('.biography-2 .left-block .img-1').fadeOut(0);
			$('.biography-2 .left-block .img-2').fadeOut(0);
			$('.biography-2 .left-block .img-3').fadeOut(0);
			$('.biography-2 .left-block .img-4').fadeOut(0);
			$('.biography-2 .left-block .img-5').fadeOut(0);
			$('.biography-2 .left-block .img-6').fadeOut(0);
			$('.biography-2 .left-block .img-7').fadeIn('slow');
			$('.biography-2').removeClass('bg');
		}
		if ($('.biography-2 .right-block .text-2 .tile').hasClass('view-2')) {
			$('.biography-2 .left-block .img-1').fadeOut(0);
			$('.biography-2 .left-block .img-2').fadeIn('slow');
			$('.biography-2 .left-block .img-3').fadeOut(0);
			$('.biography-2 .left-block .img-4').fadeOut(0);
			$('.biography-2 .left-block .img-5').fadeOut(0);
			$('.biography-2 .left-block .img-6').fadeOut(0);
			$('.biography-2 .left-block .img-7').fadeOut(0);
			$('.biography-2').removeClass('bg');
		}
		if ($('.biography-2 .right-block .text-3 .tile').hasClass('view-2')) {
			$('.biography-2 .left-block .img-1').fadeOut(0);
			$('.biography-2 .left-block .img-2').fadeOut(0);
			$('.biography-2 .left-block .img-3').fadeIn('slow');
			$('.biography-2 .left-block .img-4').fadeOut(0);
			$('.biography-2 .left-block .img-5').fadeOut(0);
			$('.biography-2 .left-block .img-6').fadeOut(0);
			$('.biography-2 .left-block .img-7').fadeOut(0);
			$('.biography-2').addClass('bg');
		}
		if ($('.biography-2 .right-block .text-4 .tile').hasClass('view-2')) {
			$('.biography-2 .left-block .img-1').fadeOut(0);
			$('.biography-2 .left-block .img-2').fadeOut(0);
			$('.biography-2 .left-block .img-3').fadeOut(0);
			$('.biography-2 .left-block .img-4').fadeIn('slow');
			$('.biography-2 .left-block .img-5').fadeOut(0);
			$('.biography-2 .left-block .img-6').fadeOut(0);
			$('.biography-2 .left-block .img-7').fadeOut(0);
			$('.biography-2').removeClass('bg');
		}
		if ($('.biography-2 .right-block .text-5 .tile').hasClass('view-2')) {
			$('.biography-2 .left-block .img-1').fadeOut(0);
			$('.biography-2 .left-block .img-2').fadeOut(0);
			$('.biography-2 .left-block .img-3').fadeOut(0);
			$('.biography-2 .left-block .img-4').fadeOut(0);
			$('.biography-2 .left-block .img-5').fadeIn('slow');
			$('.biography-2 .left-block .img-6').fadeOut(0);
			$('.biography-2 .left-block .img-7').fadeOut(0);
			$('.biography-2').addClass('bg');
		}
		if ($('.biography-2 .right-block .text-6 .tile').hasClass('view-2')) {
			$('.biography-2 .left-block .img-1').fadeOut(0);
			$('.biography-2 .left-block .img-2').fadeOut(0);
			$('.biography-2 .left-block .img-3').fadeOut(0);
			$('.biography-2 .left-block .img-4').fadeOut(0);
			$('.biography-2 .left-block .img-5').fadeOut(0);
			$('.biography-2 .left-block .img-6').fadeIn('slow');
			$('.biography-2 .left-block .img-7').fadeOut(0);
			$('.biography-2').removeClass('bg');
		}

		//появление блока с врачами в biography-5
		if ($('.biography-5 .left-block .item.animation-element').hasClass('view-opacity')) {
			$('.biography-5 .left-block').addClass('view-opacity-2');
		}
	}

});

	//проверка видимости элементов 
	var windowHeight = $(window).height();
	$(document).on('scroll', function() {
		$('.animation-element').each(function() {
			var self = $(this),
			height;
			if (self.height() >= windowHeight) {
				height = self.offset().top + windowHeight - 400;
			} else {
				height = self.offset().top + self.height();
			}
			if ($(document).scrollTop() + windowHeight >= height) {
				self.addClass('view-opacity')
			}
		});
	});

	//инициализация слайдера отзывы на биографии
	var swiper6 = new Swiper('.reviews-slider', {
		loop: true,
		slidesPerView: 2,
		spaceBetween: 10,
		speed: 500,
		breakpoints: {
			550: {
				slidesPerView: 1
			}
		},
		pagination: {
			el: '.swiper-pagination',
			type: 'fraction',
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
	});

	//инициализация слайдера с сертификатами
	var swiper7 = new Swiper('.certificate-slider', {
		loop: true,
		slidesPerView: 4,
		spaceBetween: 10,
		speed: 500,
		breakpoints: {
			1500: {
				slidesPerView: 3
			},
			800: {
				slidesPerView: 2
			},
			550: {
				slidesPerView: 1
			}
		},
		pagination: {
			el: '.swiper-pagination',
			type: 'fraction',
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		pagination: {
			el: '.swiper-pagination',
			type: 'fraction',
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
	});

	//скролл по блокам на странице биография
	if ($(window).width() > 1160) {
		var controller = new ScrollMagic.Controller({
			globalSceneOptions: {
				triggerHook: 'onLeave'
			}
		});
		var slides = document.querySelectorAll(".panel");
		for (var i=0; i<slides.length; i++) {
			new ScrollMagic.Scene({
				triggerElement: slides[i]
			})
			.setPin(slides[i])
			.addTo(controller);
		};
	}


});


















