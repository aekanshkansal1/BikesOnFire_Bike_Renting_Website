/*$(document).ready(function(){
	$("#signIn").click(function(event){
		event.preventDefault();
		$(".formWrapper").fadeToggle("fast");
	});
});*/

//test js
$(document).ready(function() {
    /*$("#loginLink").click(function( event ){
           event.preventDefault();
           $(".overlay").fadeToggle("fast");
     });*/
    
    $(".overlayLink").click(function(event){
        //event.preventDefault();
        /*var action = $(this).attr('data-action');
        
        $("#loginTarget").load("ajax/" + action);*/
        
        $(".overlay").fadeToggle("fast");
    });
    
	$(".overlayLink1").click(function(event){
        event.preventDefault();
        
        $(".overlay").fadeToggle("fast");
    });
	
    $(".close").click(function(){
        $(".overlay").fadeToggle("fast");
    });
    
    $(document).keyup(function(e) {
        if(e.keyCode == 27 && $(".overlay").css("display") != "none" ) { 
            event.preventDefault();
            $(".overlay").fadeToggle("fast");
        }
    });
	 
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
$(document).ready(function(){
	$("#toggle").click(function(){
		$(".dropdown").toggleClass('open', 1000);
	});
	$("#city").css('cursor', 'pointer');
	$("#listofcity").css('cursor', 'pointer');
});