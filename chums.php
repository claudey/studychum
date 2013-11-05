<?php

	// adding Google's user service
	require_once 'google/appengine/api/users/UserService.php';

	// adding google's mail service
	require_once 'google/appengine/api/mail/Message.php';

	// adding file that conatains database class
	include 'classes/crud.php';

	use google\appengine\api\mail\Message;
	use google\appengine\api\users\User;
    use google\appengine\api\users\UserService;

    // creating a new instance of user
    $user = UserService::getCurrentUser();
    $email = $user->getEmail();

    // instantiating database object
	$db = new Database();
    $db->connect();

    // getting email address data of current user from the database
    // this info will be used in the message to the user
    $db->select("SELECT * FROM USERS WHERE EmailAddress='".$email."'");
    $res = $db->getResult();

    
    
    // processing studychum request form
    if (!empty($_POST['email'])) {

    	$message_body = "Hi, I used Studychum to send you a chum request.
    					 They are still testing before they build on their final product.
    					 Please do give them feedback.";

		$mail_options = [
			"sender" => $email,
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
		<link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600'>
		<link rel="stylesheet" href="assets/css/bs.min.css">
		<link rel="stylesheet" href="assets/css/app.css">
		<link rel="stylesheet" href="assets/css/friends.css">
		<link rel="shortcut icon" href="assets/img/favicon.png">
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
			<ul class="list-group">
				<li class="list-group-item active"><a href="#">Activity</a></li>
				<li class="list-group-item"><a href="#">Chums</a></li>
				<!-- <li class="list-group-item"><a href="#">Tutors</a></li>
				<li class="list-group-item"><a href="#">Calendar</a></li>
				<li class="list-group-item"><a href="#">Settings</a></li> -->
			</ul>
		</div>
		<div class="col-sm-9">
			<div class="row">
				<h3 class="profile-heading">Your chums</h3>
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
						
						echo '<div class="col-md-7">
								<div class="media row chum-list">
									<div class="col-md-2">
										<a class="pull-left" href="#">
											<img class="media-object" src="assets/img/profile.webp" alt="...">
										</a>
									</div>
									<div class="col-md-10 media-body">';

						echo '<h4 class="media-heading"><em>' . $chum['FirstName'] . ' ' . $chum['LastName'] .'</em></h4>
										<p> <b>Educational Level:</b> '.$chum['EducationLevel'].'</p>';

						echo "<p><b>Interests:</b></p>";
						foreach ($interests as $interest) {
							echo "<p>" . $interest['Interest'] . "</p>";
						}

						echo '
										<form action="/chums" method="POST">
											<input type="hidden" name="email" value="' . $chum['EmailAddress'] . '">
											<input type="submit" class="btn btn-primary" value="Send a Chum Request" id="chum_request">
										</form>
									</div>	
								</div>
							</div>';

						
					}

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
		    $(this).val("Requested submited");
		  });
		});
	</script>
    <!-- start Dropifi --> <script type='text/javascript' src='https://s3.amazonaws.com/dropifi/js/widget/dropifi_widget.min.js'></script><script type='text/javascript'>document.renderDropifiWidget('70c2f0e75aaee02b1cfef8e927e010c1-1383283917314');</script> <!-- end Dropifi -->
</body>
</html>