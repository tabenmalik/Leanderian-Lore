$(document).ready(function(){
	$("nav td").mouseover(function(){
		$(this).addClass("offset");
	});
	
	$("nav td").mouseout(function(){
		$(this).removeClass("offset");
	});
	
	$("#logo").mouseover(function(){
		$(this).css('cursor', 'pointer');
	});
	
	$("#logo").click(function(){
		window.location.href = 'http://www.leanderianlore.com';
	});
});