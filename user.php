<?php
	//include 'models/database.php';
	include 'classes/crud.php';

	// Including Google's User Service
	require_once 'google/appengine/api/users/UserService.php';
	use google\appengine\api\users\User;
    use google\appengine\api\users\UserService;

    // creating a new instance of Google's user service
    $user = UserService::getCurrentUser();

    // redirecting user to login page if user has not already logged in
    if (!$user){
    	
    	header('Location: ' .
        UserService::createLoginURL($_SERVER['REQUEST_URI']));
    }
    
?>

<html>
<head>
	<title>StudyChum - Your Profile</title>
	<meta charset="utf-8">
        <meta name="description" content="">
        <meta name="keyowrds" content="online learning, online student program, study chum, studychum, find students, students with same course">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600|Oxygen'>
		<link rel="stylesheet" href="assets/css/bs.min.css">
		<link rel="stylesheet" href="assets/css/app.css">
		<!-- <link rel="stylesheet" href="assets/css/chardinjs.css"> -->
		<link rel="stylesheet" href="assets/css/user.css">
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

			<!-- <ul class="nav navbar-nav" data-intro="Find resources, materials and tutors right from here" data-position="right">
				<li><a href="#">Courses</a></li>
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
						<button type="submit" class="btn btn-default">Search</button>
					</form>
    			</li>
			</ul> -->


			<ul class="nav navbar-nav navbar-right" data-intro="Your personal settings and profile can be managed from here." data-position="bottom">
				<!--li><a href="#">Notifications <span class="badge">42</span></a></li-->
				<!--li><a href="#"><img src="assets/img/profile.webp" alt="" class="profile-pic"></a></li-->
				<!--dropdown not working so I'm putting logout and profile in the nav bar temporarily-->

				<!--li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $user->getEmail(); ?><b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="#">Profile</a></li>
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
<<<<<<< HEAD
		<div class="side-nav well-lg col-sm-2">		
			<ul class="nav nav-pills nav-stacked" data-intro="Quickly access your settings and personal interactions from this bar" data-position="right">
				<li><a href="/activity">Activity</a></li>
				<li><a href="/chums">Chums</a></li>
				<!-- <li><a href="#">Tutors</a></li> -->
				<!-- <li><a href="#">Calendar</a></li> -->
				<!-- <li><a href="#">Settings</a></li> -->
=======
		<div class="side-nav well-lg col-sm-2">
			<ul class="list-group" data-intro="Quickly access your settings and personal interactions from this bar" data-position="right">
				<li class="list-group-item"><a href="#">Activity</a></li>
				<li class="list-group-item"><a href="/chums">Find a Chum</a></li>
				<!-- <li class="list-group-item"><a href="#">Tutors</a></li>
				<li class="list-group-item"><a href="#">Calendar</a></li>
				<li class="list-group-item"><a href="#">Settings</a></li> -->

>>>>>>> 625891e305b9ba381b16b8a9dd46a39edcc487e6
			</ul>

		</div>
		<div class="col-sm-10">
			<div class="row welcome" data-intro="This is where the rest of the magic happens" data-position="top">
				<h3 class="welcome-heading">Welcome to StudyChum.</h3>
				<p>StudyChum is the best online collaborative tool you can find.</p>
				<p>Add your comments to the widget on your right</p>
				<p>We appreciate your response.</p>
				<br>
				<p><b>The StudyChum team</b></p>
		</div>
	</div>

	<script src="assets/js/jquery-2.0.3.min.js"></script>
	<script src="assets/js/bs.min.js"></script>
	<script src="assets/js/app.js"></script>
	<!-- // <script src="assets/js/chardinjs.min.js"></script> -->
	<script>
		// $('body').chardinJs('start');
	</script>
    <!-- start Dropifi --> <script type='text/javascript' src='https://s3.amazonaws.com/dropifi/js/widget/dropifi_widget.min.js'></script><script type='text/javascript'>document.renderDropifiWidget('70c2f0e75aaee02b1cfef8e927e010c1-1383283917314');</script> <!-- end Dropifi -->
</body>
</html>