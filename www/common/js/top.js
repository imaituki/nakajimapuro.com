// slick
document.write('<script type="text/javascript" src="common/js/slick/slick.min.js"></script>');
document.write('<link rel="stylesheet" href="common/js/slick/slick.css" type="text/css">');

// for top
$(function(){
	
	// slick
	$('#main_image').slick({
		autoplay: true,
		dots: false,
		arrows: true,
		autoplaySpeed: 5000,
		speed: 3000,
		centerMode: true,
		variableWidth: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		pauseOnFocus: false,
		pauseOnHover: false,
		infinite: true
	});
});
