$(document).ready(function(){
	$(".section5TextColor1").toggleClass("changeColor");
	$(".section5TextColor2").toggleClass("changeColor");
	$(".section5TextColor3").toggleClass("changeColor");
	$(".section5TextColor4").toggleClass("changeColor");
	$(".section5TextColor5").toggleClass("changeColor");
	$(".section5TextColor6").toggleClass("changeColor");


	//FAQ slide
	$(".question1").click(function(){
		$(".text1").slideToggle();
		$(".section5TextColor1").toggleClass("changeColor");
	});

	$(".question2").click(function(){
		$(".text2").slideToggle();
		$(".section5TextColor2").toggleClass("changeColor");
	});

	$(".question3").click(function(){
		$(".text3").slideToggle();
		$(".section5TextColor3").toggleClass("changeColor");

	});

	$(".question4").click(function(){
		$(".text4").slideToggle();
		$(".section5TextColor4").toggleClass("changeColor");

	});

	$(".question5").click(function(){
		$(".text5").slideToggle();
		$(".section5TextColor5").toggleClass("changeColor");

	});

	$(".question6").click(function(){
		$(".text6").slideToggle();
		$(".section5TextColor6").toggleClass("changeColor");

	});

});