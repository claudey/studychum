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
	<title>StudyChum - Welcome Page</title>
	<meta charset="utf-8">
        <meta name="description" content="">
        <meta name="keyowrds" content="online learning, online student program, study chum, studychum, find students, students with same course">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600|Actor'>
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

            <ul class="nav navbar-nav">
                <!-- <li class="active"><a href="#">Courses</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Groups <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">School chums</a></li>
                        <li><a href="#">Bffs</a></li>
                        <li><a href="#">Algebra chums</a></li>
                    </ul>
                </li>
                <li><a href="#">Resources</a></li> -->
                <li>
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control search-bar" placeholder="People, groups, files">
                        </div>
                        <button type="submit" class="btn btn-default">Search</button>
                    </form>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <!-- <li><a href="#">Notifications <span class="badge">0</span></a></li> -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Notifications <span class="badge">0</span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/share">Maude shared "French for Beginners" with you.</a></li>
                    </ul>
                </li>
                <li><a href="#"><img src="assets/img/amma.webp" alt="" class="profile-pic"></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Amma Baffoe <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/profile">Profile</a></li>
                        <li role="presentation" class="divider"></li>
                        <li><a href="/">Log out</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>

	<div class="main-body">
		<div class="well side-nav well-lg col-sm-2">		
			<ul class="nav nav-pills nav-stacked">
			    <li><a href="/mychums">My Chums</a></li>
			    <li><a href="/chums">Find Chums</a></li>
			    <li><a href="/chat">Chat</a></li>
			    <li><a href="/forum">Forums</a></li>
			    <li><a href="/share">Share</a></li>
			    <li><a href="#">Settings</a></li>
			</ul>
		</div>
		<div class="col-sm-9 content">
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
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-45749635-1', 'studychumapp.appspot.com');
	  ga('send', 'pageview');

	</script>
	<!-- // <script src="assets/js/chardinjs.min.js"></script> -->
	<script>
		// $('body').chardinJs('start');
	</script>
    <!-- start Dropifi --> <script type='text/javascript' src='https://s3.amazonaws.com/dropifi/js/widget/dropifi_widget.min.js'></script><script type='text/javascript'>document.renderDropifiWidget('70c2f0e75aaee02b1cfef8e927e010c1-1383283917314');</script> <!-- end Dropifi -->
</body>
</html>