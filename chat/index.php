<!DOCTYPE html>
<html>
	<head>
		<title>Chat test ~ StudyChum</title>
	</head>
	<style type="text/css" media="screen">
			#chatwindow {
				border: 1px solid blue;
				/*height: 300px;*/
				width: 240px;
			}
			
			#title {
				/*border: 1px solid blue;*/
				height: 30px;
				width: *;
				color: white;
				background-color: blue;
			}
			
			#chatsarea {
				margin: 5px auto;
				border: 1px solid blue;
				height: 300px;
				width: *;
			}
	</style>
	<body>
		<div id="chatwindow">
			<div id="title">
				conversation on test
			</div>
			<div id="chatsarea">
				
			</div>
			<div id="newmessage">
				<form method="post" id="newmessageform">
					<input type="text" id="newmessageinput" placeholder="message" />
					<input type="submit" id="sendmessagebutton" value="send message" />
				</form>
			</div>
			<input type="text" id="userid" placeholder="user ID" />
		</div>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="../assets/js/jquery-2.0.3.min.js"></script>
		<script src="custom.js"></script>
		<script type="text/javascript">
			load_chat();
			for( var i = 0; i < 10; i++){
				i = 1;
				;
				setTimeout(function(){update_chat()},1000);
			}
		</script>
	</body>
</html>


<?php
/*
 * @package AJAX_Chat
 * @author Sebastian Tschan
 * @copyright (c) Sebastian Tschan
 * @license Modified MIT License
 * @link https://blueimp.net/ajax/
 */
?>