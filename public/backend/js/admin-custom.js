var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
})

$(function(){
    var url = window.location.pathname;
    var filename = url.substring(url.lastIndexOf('/')+1);
    
    $('.ad-menu ul li a').each(function(){
       if($(this).attr("href").toLowerCase()==filename){
        $(this).addClass('s-act');
        $(this).parent().parent().parent().siblings("a").addClass('mact');
         }
    });

});


$(document).ready(function () {
    "use strict";
    
    
//IMAGE FILE UPLOAD GET FILE NAME
$(".fil-img-uplo input").on("change", function(){
    var _upldfname = $(this).val().replace(/C:\\fakepath\\/i, '');
    $(this).siblings(".dumfil").html(_upldfname);
});

	// var pgurl = window.location.pathname;
	// var filename = pgurl.substring(pgurl.lastIndexOf('/')+1);
	// $(".ad-menu ul li a").each(function(){
	// 	var href = $(this).attr("href");
	// 	if(href == filename ){
	// 		$(this).addClass('s-act');
    //         $(this).parent().parent().parent().siblings("a").addClass('mact');
	// 	}
	// });

    $('.ad-menu ul li a.mact').siblings().slideDown();
    $('.ad-menu ul li a').on('click', function () {
        if($(this).hasClass("mact")){
            $(".ad-menu ul li div").slideUp();
            $('.ad-menu ul li a').removeClass('mact');
        }
        else{
            $(".ad-menu ul li div").slideUp();
            $('.ad-menu ul li a').removeClass('mact');
            $(this).addClass('mact');
            $(this).siblings().slideDown();
        }
    });

     //IMAGE FILE UPLOAD GET FILE NAME
     $(".fil-img-uplo input").on("change", function(){
        var _upldfname = $(this).val().replace(/C:\\fakepath\\/i, '');
        $(this).siblings(".dumfil").html(_upldfname);
    });
}); 