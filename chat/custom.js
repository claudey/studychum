// alert('wow');

counter = 0;
updatetime = 5; //time in seconds
running = false;
userId = $('#userid').val();
chatID = 2;

function send_new_message(){
	console.log('send_new_message function fired');
	var message = $('#newmessageinput').val();
	
	if(message == '') return false;
	
	$.post('postmessage.php',{userId:userId,message:message}, function(data){
		// alert(data);
		$('#newmessageinput').val('');
		$('#chatsarea').append('<div id="mymessage">' + message + '</div>');
	});
	
}

function load_chat(){
	//to load messages from db initially
	console.log('load_chat function fired');
	running = true;
	$.post('loadchat.php',{userId:userId,chatID:chatID}, function(data){
		// alert(data);
		$('#chatsarea').append( data );
	});
	update_message();
}

function update_message(){
	//to load messages from db periodically to make the chat realtime
	console.log('update_message function fired');
	counter = 0;
	update_chat();
}

function update_chat(){
	console.log('update_chat function fired counter: '+counter);
	if(counter == updatetime){
		update_message();
		counter = 0;
	}
	else counter ++;
	
	// if(running == true)
		// setTimeout(function(){update_chat()},1000);
	
	// alert('update called');
	// counter = 0;
}

$('#newmessageform').submit(function(e) {
	console.log('dot submit function fired');
    e.preventDefault();
    update_message();
    send_new_message();
});

