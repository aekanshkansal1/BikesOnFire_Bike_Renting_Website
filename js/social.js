$(document).ready(function() {
	$(".socialF").mouseenter(function(){
		$("#fb").attr("src", "img/facebookColor.png");
	})
	.mouseleave(function(){
		$("#fb").attr("src", "img/facebookWhite.png");
	});
	$(".socialT").mouseenter(function(){
		$("#tweet").attr("src", "img/twitterColor.png");
	})
	.mouseleave(function(){
		$("#tweet").attr("src", "img/twitterWhite.png");
	});
	$(".socialG").mouseenter(function(){
		$("#gplus").attr("src", "img/gplusColor.png");
	})
	.mouseleave(function(){
		$("#gplus").attr("src", "img/gplusWhite.png");
	});
});
