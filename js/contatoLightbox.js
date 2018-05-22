$(document).ready(function () {
	$('.lightbox').click(function () {
		$('.background').animate({'opacity':'.60'}, 300, 'linear');
		$('.box').animate({'opacity':'1.00'}, 300, 'linear');
		$('.background, .box').css('display', 'block');
	});

	$('.close').click(function(){
		$('.background, .box').animate({'opacity':'0'}, 300, 'linear', function() {
			$('.background, .box').css('display','none');
		});
	});

	$('.background').click(function(){
		$('.background, .box').animate({'opacity':'0'}, 300, 'linear', function() {
			$('.background, .box').css('display','none');
		});
	});
});