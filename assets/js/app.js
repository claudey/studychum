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
    if (textAreaInput != ""){
        $(".chat").append("<div class=\"row receiver\"><div class=\"message col-md-9\"><p>" + textAreaInput + "</p></div><div class=\"col-md-3\"><img src=\"assets/img/profile.webp\" alt=\"Your profile picture\" class=\"prof-img\"></div></div>").slideUp(1000).fadeIn(3000);
        $(".badge").delay(1000).text("1");
        $(".chat-box").val("");
        checkBadgeNumber();
    }
    else {
        $(".chat-box").attr("placeholder", "Please enter some text.");
    }
});

$(".delete-file").on("click", function(){
	$("#item-1").css("display", "none");
});

$(".groups").click(function(){
    var sharedWith = $(".shared-with").html();
    var mainText = "";
    if (sharedWith == "Chums <span class=\"caret\"></span>"){
        mainText = "Groups";
        $(this).text("Chums ");
    } else {
        mainText = "Chums";
        $(this).text("Groups ");
    }
    $(".shared-with").html(mainText + " <span class=\"caret\"></span>");
});

function checkBadgeNumber(){
    var badgeNumber = $(".badge").text();
    if (badgeNumber != "0"){
        $(".badge").css("background", "rgb(33, 148, 47)");    
    }
}