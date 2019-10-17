$(document).ready(function(){
	AOS.init({
		duration:200,
	});
	
	setTimeout(function(){
		$('.loader-wrapper').fadeToggle();
	
	}, 650);

	$('#delete').mouseover(function(){
		alert("Teste");
	});
		

})





