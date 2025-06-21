$(document).ready(function(){


  $(".header .an").click(function(){


    $(this).toggleClass("n");

$("html").toggleClass("on");
    $(".nav").toggleClass("on");
	
	$(".sub-menu").slideUp();
  });

  $(".nav .menu i").click(function(){
    $(this).siblings(".sub-menu").slideToggle();
	$(this).parents().siblings().find(".sub-menu").slideUp();
  $(this).toggleClass("rotated");
  });
$(".ss").click(function(){
    $(".search").slideToggle();
  });
$(".an_sj").click(function(){
    $(".search").slideUp();
		  });
	
	 $(".cd .y_j").click(function(){
    $(".z_fdsj").slideDown();
	$(".r_fdsj").slideUp();
  });
	 $(".z_fdsj").click(function(){
    $(this).slideUp();
  });

	 $(".zxsj .y_j").click(function(){
    $(".r_fdsj").slideDown();
    $(".z_fdsj").slideUp();
  });
   $(".zxsj .ewm").click(function(){
    $(".r_fdsj").slideDown();
    $(".z_fdsj").slideUp();
    $("html, body").animate({ scrollTop: $(document).height() }, "slow");
  });
	 $(".r_fdsj").click(function(){
    $(this).slideUp();
  });

  $(".sh_tc .s_bj").click(function(){


    $(".sh_tc").slideUp();


	$("html").removeClass("on");


  });


  $(".f_h").click(function(){


    $("html,body").animate({scrollTop:0},500);


  });


});


$(window).scroll(function(){


  var top = $(window).scrollTop();


  var head = $(".header").height();


  if(top>head){


    $(".header").addClass("on");


    $(".f_h").fadeIn(300);


  }else{


	$(".header").removeClass("on");


    $(".f_h").fadeOut(300);


  }


});