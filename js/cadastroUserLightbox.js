$(document).ready(function () {
	$('.lightboxCad').click(function () {
		$('.backgroundCad').animate({'opacity':'.60'}, 300, 'linear');
		$('.boxCad').animate({'opacity':'1.00'}, 300, 'linear');
		$('.backgroundCad, .boxCad').css('display', 'block');
	});

	$('.closeCad').click(function(){
		$('.backgroundCad, .boxCad').animate({'opacity':'0'}, 300, 'linear', function() {
			$('.backgroundCad, .boxCad').css('display','none');
		});
	});

	$('.backgroundCad').click(function(){
		$('.backgroundCad, .boxCad').animate({'opacity':'0'}, 300, 'linear', function() {
			$('.backgroundCad, .boxCad').css('display','none');
		});
	});
});