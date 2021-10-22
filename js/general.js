$(document).ready(function(){

	var vp = $('.media-size').width();

	// Back to top
	$('a.top').hide();
	$(document).scroll(function() {
	  var y = $(this).scrollTop();
	  if (y > 250) {
	    $('a.top').fadeIn();
	  } else {
	    $('a.top').fadeOut();
	  }
	});
	$('a.top').click(function() {
		$("html, body").animate({ scrollTop: 0 });
  		return false;
	});	

	// Open search
	$('.toggle-search').click(function() {
		$(this).toggleClass('open');

		if ( $(this).hasClass('open') ) {
			$(this).attr('aria-expanded','true');
			$('span.icon-search',this).removeClass('icon-search').addClass('icon-close');
		} else {
			$(this).attr('aria-expanded','false');
			$('span.icon-close',this).removeClass('icon-close').addClass('icon-search');
		}

		$('header .search-form').slideToggle();
	});
	
	var mobile = function() {

		// Open main menu
		$('.toggle-menu').click(function() {
			$(this).toggleClass('open');

			if ( $(this).hasClass('open') ) {
				$(this).attr('aria-expanded','true');
				$('span.icon-menu',this).removeClass('icon-menu').addClass('icon-close');
			} else {
				$(this).attr('aria-expanded','false');
				$('span.icon-close',this).removeClass('icon-close').addClass('icon-menu');
			}

			$('header nav').slideToggle();
		});

		// Open page menu
		$('.show-page-nav').click(function() {
			$(this).toggleClass('open');

			if ( $(this).hasClass('open') ) {
				$(this).attr('aria-expanded','true')
				$(this).text('Hide page menu');
			} else {
				$(this).attr('aria-expanded','false');
				$(this).text('Show page menu');
			}

			$(this).next().slideToggle();
		});

		// Open page menu
		$('.show-page-filter').click(function() {
			$(this).toggleClass('open');

			if ( $(this).hasClass('open') ) {
				$(this).attr('aria-expanded','true')
				$(this).text('Hide filter');
			} else {
				$(this).attr('aria-expanded','false');
				$(this).text('Show filter');
			}

			$(this).next().slideToggle();
		});

	} 

	var desktop = function() {

		$('#primary-menu > .menu-item-has-children').hover(
			function() {
				$('.sub-menu', this).stop(true).delay(500).slideDown();
				$('a', this).addClass('open');
			}, function() {
				$('.sub-menu', this).stop(true).delay(500).slideUp();
				$('a', this).removeClass('open');
			}
		);

	}

	if (vp == 100) {
		mobile();
	} 

	if (vp == 200) {
		desktop();
	} 

	function check_difference(a, b) { return Math.abs(a - b); } 

	function check_window_size() {
		var new_vp = $('.media-size').width();
		var x = check_difference(new_vp, vp);     
		if (x === 100) {
			if (new_vp === 200) {
			location.reload();
			desktop();
		}
		if (new_vp === 100) {
			location.reload();
			mobile();
		}
		vp = new_vp;
		}
	}

	var resizeTimer;
		$(window).resize(function() {
		clearTimeout(resizeTimer);
		resizeTimer = setTimeout(check_window_size, 100);
	});


	$('.carousel').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		dots: true,
	});

	$('.grid-carousel').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		arrows: true,
		dots: false,
		infinite: true,
		responsive: [
		    {
		      breakpoint: 1024,
		      settings: {
		        slidesToShow: 1
		      }
		    }
		]
	});

	$('.grid-carousel-auto').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		arrows: false,
		dots: true,
		autoplay: true,
  		autoplaySpeed: 3000,
		infinite: true,
		responsive: [
		    {
		      breakpoint: 1024,
		      settings: {
		        slidesToShow: 1
		      }
		    }
		]
	});

	$('.gallery-size-full').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		dots: true,
		adaptiveHeight: true,
	});

});