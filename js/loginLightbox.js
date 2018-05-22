$(document).ready(function () {
	$('.btn-like').click(function () {
		$('.backgroundLog').animate({'opacity':'.60'}, 300, 'linear');
		$('.boxLog').animate({'opacity':'1.00'}, 300, 'linear');
		$('.backgroundLog, .boxLog').css('display', 'block');
	});

	$('.closeLog').click(function(){
		$('.backgroundLog, .boxLog').animate({'opacity':'0'}, 300, 'linear', function() {
			$('.backgroundLog, .boxLog').css('display','none');
		});
	});

	$('.backgroundLog').click(function(){
		$('.backgroundLog, .boxLog').animate({'opacity':'0'}, 300, 'linear', function() {
			$('.backgroundLog, .boxLog').css('display','none');
		});
	});
});