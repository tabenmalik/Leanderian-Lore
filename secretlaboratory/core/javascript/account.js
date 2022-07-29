$(document).ready(function(){
	$(".tab").mouseover(function(){
		$(this).css('cursor','pointer');
	});
	
	$(".tab").click(function(){
		$(".highlight").removeClass("highlight");
		$(this).addClass("highlight");
	});
	
	$("#messagetab").click(function(){
		$("#messageboard").removeClass("hide");
		$("#profileboard").addClass("hide");
		$("#statisticsboard").addClass("hide");
	});
	
	$("#profiletab").click(function(){
		$("#messageboard").addClass("hide");
		$("#profileboard").removeClass("hide");
		$("#statisticsboard").addClass("hide");
	});
	
	$("#statisticstab").click(function(){
		$("#messageboard").addClass("hide");
		$("#profileboard").addClass("hide");
		$("#statisticsboard").removeClass("hide");
	});
	
});