$('button').on('click', function(){
    $('.sign-up').html("You are our No. 1 fan. We'll let you know when we're ready. :)");
    $('.sign-up').addClass("success");        
});

$('.search-bar').focus(function() {
	$(this).attr('colspan', '3');
	$(this).attr('value', 'Something here');
	console.log('free');
});