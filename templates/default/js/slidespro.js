

$(function(){
	var Current;
	$(".picture a").eq(0).show();
	$(".preview a").click(function(){
		Current = $(".preview a").index($(this));
		$(".picture a").hide().eq(Current).fadeIn(300);
	});
})