checkBadgeNumber();

function addOtherChat(){
    $(".chat").append("<div class=\"row receiver\"><div class=\"col-md-3\"><img src=\"assets/img/profile.webp\" alt=\"Your profile picture\" class=\"prof-img\"></div><div class=\"message col-md-9\"><p>No worries, I can share some files with you.</p></div></div>");
}

window.setTimeout(addOtherChat, 2000);


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

        // $(".chat").append("<div class=\"row sender\"><div class=\"message col-md-9\"><p>" + textAreaInput + "</p></div><div class=\"col-md-3\"><img src=\"assets/img/profile.webp\" alt=\"Your profile picture\" class=\"prof-img\"></div></div>");
        
        $(".chat").append("<div class=\"row sender\"><div class=\"message col-md-9\"><p>" + textAreaInput + "</p></div><div class=\"col-md-3\"><img src=\"assets/img/profile.webp\" alt=\"Your chum's picture\" class=\"prof-img\"></div></div>");

        $(".chat-box").val("");
        window.setTimeout(increaseNotification, 3000);
    }
    else {
        $(".chat-box").attr("placeholder", "Please enter some text.");
    }
});

function increaseNotification(){
    $(".badge").text("1");
    checkBadgeNumber();
}

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