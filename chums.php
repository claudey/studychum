<?php

	// adding Google's user service
	require_once 'google/appengine/api/users/UserService.php';

	// adding google's mail service
	require_once 'google/appengine/api/mail/Message.php';

	use google\appengine\api\mail\Message;
	use google\appengine\api\users\User;
    use google\appengine\api\users\UserService;

    //require_once 'google/appengine/api/mail/MailService.php';
    //use google\appengine\api\mail\MailService;

    // creating a new instance of user
    $user = UserService::getCurrentUser();

     if (!$user){
    	
    	header('Location: ' .
        UserService::createLoginURL($_SERVER['REQUEST_URI']));
    }

    $email = $user->getEmail();

    // adding file that conatains database class
	include 'classes/crud.php';

    // instantiating database object
	$db = new Database();
    $db->connect();


    // getting email address data of current user from the database
    // this info will be used in the message to the user
    $db->sql("SELECT * FROM Users WHERE EmailAddress='".$email."'");
    $res = $db->getResult();
    
    
    // processing studychum request form
    if (!empty($_POST['email'])) {

    	$subject = "You have received a chum request.";

    	$message_body = $res["FirstName"] . " " . $res["LastName"] . " has sent you a chum request.\n";
    	$message_body .= "Click the link below to accept request.\n";
    	$message_body .= "studychumapp.appspot.com/chums?sender=".$email."";

		$mail_options = [
			"sender" => 'studychumgh@gmail.com',
			"to" => $_POST['email'],
			"subject" => "You have received a chum request.",
			"textBody" => $message_body
	];

		try {
		    $message = new Message($mail_options);
		    $message->send();
		} catch (InvalidArgumentException $e) {
		    echo $e;
		}
		
    }
?>

<html>
<head>
	<title>StudyChum - Your Activity</title>
	<meta charset="utf-8">
        <meta name="description" content="">
        <meta name="keyowrds" content="online learning, online student program, study chum, studychum, find students, students with same course">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600|Oxygen'>
		<link rel="stylesheet" href="assets/css/bs.min.css">
		<link rel="stylesheet" href="assets/css/app.css">
		<link rel="stylesheet" href="assets/css/chums.css">
		<link rel="shortcut icon" href="assets/img/favicon.ico">
</head>
<body>

	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<img class="header-logo" src="assets/img/header_logo.webp" alt="studychum logo">
			<a class="navbar-brand" href="/user">StudyChum</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">

			<ul class="nav navbar-nav">
				<!-- <li class="active"><a href="#">Courses</a></li>
				<li><a href="#">Tutors</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Groups <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="#">School chums</a></li>
						<li><a href="#">Bffs</a></li>
						<li><a href="#">Algebra chums</a></li>
						<li role="presentation" class="divider"></li>
						<li><a href="#">New Language chums</a></li>
					</ul>
				</li>
				<li><a href="#">Resources</a></li>
				<li>
					<form class="navbar-form navbar-left" role="search">
						<div class="form-group">
							<input type="text" class="form-control search-bar" placeholder="Search">
						</div>
						<button type="submit" class="btn btn-default">Submit</button>
					</form>
    			</li> -->
			</ul>


			<ul class="nav navbar-nav navbar-right">
				<!--li><a href="#">Notifications <span class="badge">42</span></a></li>
				<li><a href="#"><img src="assets/img/profile.webp" alt="" class="profile-pic"></a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $user->getEmail(); ?><b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="/profile">Profile</a></li>
						<li><a href="#">Settings</a></li>
						<li role="presentation" class="divider"></li>
						<li><a href="<?php echo UserService::createLogoutUrl('/'); ?>">Log out</a></li>
					</ul>
				</li-->
				<li class="dropdown">
			        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $user->getEmail(); ?> <b class="caret"></b></a>
			        <ul class="dropdown-menu">
			          <li><a href="/profile">Profile</a></li>
			          <li><a href="<?php echo UserService::createLogoutUrl('/'); ?>">Log out</a></li>
			        </ul>
			      </li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</nav>

	<div class="main-body">
		<div class="side-nav well-lg col-sm-2">

			<ul class="nav nav-pills nav-stacked">
				<li class="active"><a href="/chums">Find Chums</a></li>
				<li><a href="/mychums">My Chums</a></li>
				<!-- <li><a href="#">Calendar</a></li> -->
				<!-- <li><a href="#">Settings</a></li> -->
			</ul>

		</div>
		<div class="col-sm-9">
			<div class="row">

				<h3></h3>
				<?php
					// users are directed here when they accept the invitation
					if (!empty($_GET['sender'])) {
						

						// creating a database instance
						$db = new Database();
						$db->connect();
						$db->sql("SELECT * FROM Users WHERE EmailAddress='".$_GET['sender']."'");
    					$res = $db->getResult();

    					echo "You are now connected to " . $res['FirstName'] . " " . $res['LastName'] . ".<br>";
    					echo "Find and connect with people of like interests below.<br>";

    					$Chum_Id = $res['User_Id'];
    					$db->sql("SELECT * FROM Users WHERE EmailAddress='".$email."'");
    					$res = $db->getResult();
    					$User_Id = $res['User_Id'];

    					//inserting chum partnership into database
    					$db->insert('Chums', array('User_Id' => $User_Id, 'chum_Id' => $Chum_Id));
    					$db->insert('Chums', array('User_Id' => $Chum_Id, 'chum_Id' => $User_Id));

    					//getting current users details from the database
    					$db->sql("SELECT * FROM Users WHERE EmailAddress='".$email."'");
    					$res = $db->getResult();

				    	$message_body = $res["FirstName"] . " " . $res["LastName"] . " has accepted your chum request.\n";
				    	$message_body .= "Click the link below to see your chums.\n";
				    	$message_body .= "studychumapp.appspot.com/mychums";

						$mail_options = [
							"sender" => 'studychumgh@gmail.com',
							"to" => $_GET['sender'],
							"subject" => "Your chum request has been accepted",
							"textBody" => $message_body
					];

						try {
						    $message = new Message($mail_options);
						    $message->send();
						} catch (InvalidArgumentException $e) {
						    echo $e;
						}
    					
    					
					}
				?>

				<h3 class="profile-heading">Recommended chums</h3>
				<?php

					// instantiating database
					$db = new Database();
					$db->connect();

					//selecting all users
					$db->sql('SELECT * FROM Users WHERE EmailAddress!="osborn.kwarteng.adu@meltwater.org" AND EmailAddress!="' . $email .'"');
					$res = $db->getResult();


					if (!empty($_POST['email'])) {
    					$db->sql('SELECT * FROM Users WHERE EmailAddress!="' . $_POST['email'] .'" AND EmailAddress!="osborn.kwarteng.adu@meltwater.org"');
						$res = $db->getResult();
					    	
					    }

					foreach ($res as $chum) {
						
						$id = $chum["User_Id"];

						$db->sql('SELECT * FROM Users_Interests WHERE User_Id=' .$id.'');
						$interests = $db->getResult();
						
						echo '<div class="col-md-6 col-lg-6 col-sm-6">
								<div class="media row chum-list">
									<div class="col-md-3 col-lg-3 col-sm-3">
										<a class="pull-left" href="#">
											<img class="media-object" src="assets/img/profile.webp" alt="...">
										</a>
									</div>
									<div class="col-md-9 col-lg-9 media-body">';

						echo '<h4 class="media-heading"><em>' . $chum['FirstName'] . ' ' . $chum['LastName'] .'</em></h4>
										<p> <b>Educational Level:</b> '.$chum['EducationLevel'].'</p>';

						echo "<p><b>Interests:</b></p>";
						foreach ($interests as $interest) {
							echo "<span>" . $interest['Interest'] . "</span>";
						}

						echo '
										<form action="/chums" method="POST">
											<input type="hidden" name="email" value="' . $chum['EmailAddress'] . '">
											<a type="submit" class="press orange" value="Send a Chum Request" id="chum_request" href="/create">Send a chum request</a>
											<!-- <a class="press orange" href="/create">Send a chum Request</a> -->
										</form>
									</div>	
								</div>
							</div>';
						
					}

					$db->disconnect();

				?>

				
			</div>
		</div>
	</div>

	<script src="assets/js/jquery-2.0.3.min.js"></script>
	<script src="assets/js/bs.min.js"></script>
	<script src="assets/js/app.js"></script>
	<script>
	 	$(document).ready(function(){
		  $("#chum_request").click(function(){
		    $(this).html("Requested submited");
		  });
		});


	</script>
    <!-- start Dropifi --> <script type='text/javascript' src='https://s3.amazonaws.com/dropifi/js/widget/dropifi_widget.min.js'></script><script type='text/javascript'>document.renderDropifiWidget('70c2f0e75aaee02b1cfef8e927e010c1-1383283917314');</script> <!-- end Dropifi -->
</body>
</html>