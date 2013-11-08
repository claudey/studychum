/*$('button').on('click', function(){
    $('.sign-up').html("You are our No. 1 fan. We'll let you know when we're ready. :)");
    $('.sign-up').addClass("success");        
});
*/

$('.search-bar').focus(function() {
	$(this).attr('colspan', '3');
	$(this).attr('value', 'Something here');
	console.log('free');
});

// Activates the Carousel
$('.carousel').carousel({
  interval: 5000
})

// Activates Tooltips for Social Links
$('.tooltip-social').tooltip({
  selector: "a[data-toggle=tooltip]"
})