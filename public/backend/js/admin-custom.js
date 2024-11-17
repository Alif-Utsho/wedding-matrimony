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


// User edit or create

function calculateAge(birthDate) {
    var today = new Date();
    var birthDate = new Date(birthDate);
    var age = today.getFullYear() - birthDate.getFullYear();
    var monthDiff = today.getMonth() - birthDate.getMonth();

    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    return age;
}

$('#birth_date').on('change', function() {
    var birthDate = $(this).val();
    var age = calculateAge(birthDate);
    $('#age').val(age);
});

function validateHeight(height) {
    return /^\d+(\.\d{1,2})?$/.test(height); // Accepts numbers with up to 2 decimal places
}

function validateWeight(weight) {
    return /^\d+(\.\d{1,2})?$/.test(weight); // Accepts numbers with up to 2 decimal places
}

// On form submission
$('#profile-edit-form').on('submit', function(event) {
    var isValid = true;
    var firstErrorElement = null;

    var height = $('#height').val();
    var weight = $('#weight').val();

    // Height validation
    if (!validateHeight(height)) {
        $('#heightError').show();
        if (!firstErrorElement) {
            firstErrorElement = $('#heightError'); // Capture first error element
        }
        isValid = false;
    } else {
        $('#heightError').hide();
    }

    // Weight validation
    if (!validateWeight(weight)) {
        $('#weightError').show();
        if (!firstErrorElement) {
            firstErrorElement = $('#weightError'); // Capture first error element if no previous errors
        }
        isValid = false;
    } else {
        $('#weightError').hide();
    }

    // If any validation fails, scroll to the first error and prevent the form submission
    if (!isValid) {
        event.preventDefault();
        if (firstErrorElement) {
            $('html, body').animate({
                scrollTop: firstErrorElement.offset().top - 200 // Scroll to the error with a small offset
            }, 800); // Animation duration (800ms)
        }
    }
});