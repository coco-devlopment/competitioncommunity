//FOR WRIGHT SIDE MENU WIDGET JS
$(document).ready(function() {
	$(".tabs-left .nav-tabs li").click(function () {
	     $("li").removeClass("active");
	     $(this).addClass("active");    
	});

});

// Add class on heading h2
$("#page-content #region-main h2:first").addClass("divider line-01");


//------ Test Series Package Add to Cart ------//
$(document).on('click', '.testseries-add-to-cart', function(){
	var packageid = $(this).data('packageid');
    var userid = $(this).data('userid');
    var testid = $(this).data('testid');
    var testname = $(this).data('testname');
    var packagename = $(this).data('packagename');
    var amount = $(this).data('amount');
    $.ajax({
        type: "POST",
        url: mainurl+"/theme/lambda/layout/ajax/add_to_cart.php",
        data: {packageid: packageid, userid : userid, testid : testid, amount : amount},
        dataType: 'json',
        cache: false,
        success: function(response){
            if(response['status'] == "success"){
            	$('.cart-value').html(response['data']);
    	    	$('button[data-packageid="'+packageid+'"]').prop('disabled', true);
            } 
        }
    });
});
//------ Test Series Package Add to Cart ------//

//------ Course Package Add to Cart ------//
$(document).on('click', '.course-add-to-cart', function(){
	var packageid = $(this).data('packageid');
    var userid = $(this).data('userid');
    var testid = $(this).data('testid');
    $.ajax({
        type: "POST",
        url: mainurl+"/theme/lambda/layout/ajax/add_to_cart.php",
        data: {packageid: packageid, userid : userid, testid : testid},
        dataType: 'json',
        cache: false,
        success: function(response){
            if(response['status'] == "success"){
            	$('.cart-value').html(response['data']);
    	    	$('button[data-packageid="'+packageid+'"]').prop('disabled', true);
            } 
        }
    });
});
//------ Course Package Add to Cart ------//
$(document).ready(function(){
    $('#frontpage-available-course-list h2').addClass ('divider line-01');
})

