$('.carousel').carousel({
  interval: 5000
})

// Activates Tooltips for Social Links
$('.tooltip-social').tooltip({
  selector: "a[data-toggle=tooltip]"
})

$(".chat-reset").click(function(e) {
	// console.log("This works");
    e.preventDefault();
    var textAreaInput = $(".chat-box").val();
    console.log(textAreaInput);
    $(".chat-box").val('');
    if (textAreaInput !== ""){
    	$(".chat").append("<div class=\"row receiver\"><div class=\"message col-md-9\"><p>" + textAreaInput + "</p></div><div class=\"col-md-3\"><img src=\"assets/img/profile.webp\" alt=\"Your profile picture\" class=\"prof-img\"></div></div>").show(3000);
    }
    else {
    	$("chat-box").val("Please enter some text.");
    }
    console.log(document);
});