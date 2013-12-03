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
		<link rel="stylesheet" href="assets/css/activity.css">
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
			<a class="navbar-brand" href="#">StudyChum</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">

			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Courses</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Groups <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="#">School chums</a></li>
						<li><a href="#">Bffs</a></li>
						<li><a href="#">Algebra chums</a></li>
						<li role="presentation" class="divider"></li>
						<li><a href="#">More...</a></li>
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
    			</li>
			</ul>


			<ul class="nav navbar-nav navbar-right">
				<li><a href="#">Notifications <span class="badge">42</span></a></li>
				<li><a href="#"><img src="assets/img/profile.webp" alt="" class="profile-pic"></a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $email; ?><b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="/profile">Profile</a></li>
						<li role="presentation" class="divider"></li>
						<li><a href="<?php echo UserService::createLogoutUrl('/'); ?>">Log out</a></li>
					</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</nav>

	<div class="main-body">
		<div class="side-nav well-lg col-sm-2">
			<ul class="nav nav-pills nav-stacked">
				<li class="active"><a href="#">My Chums</a></li>
				<li><a href="#">Forums</a></li>
				<li><a href="/chat">Chat</a></li>
				<li><a href="#">Schedule</a></li>
				<li><a href="#">Settings</a></li>
			</ul>
		</div>

		<div class="col-sm-9">
			<div class="row">
				<h3 class="profile-heading">My Chums</h3>
				<div class="col-md-6">
					<div class="media row chum-list">
						<div class="col-md-3">
							<a class="pull-left" href="#">
								<img class="media-object" src="assets/img/profile.webp" alt="...">
							</a>
						</div>
						<div class="col-md-9 media-body">
							<h4 class="media-heading">
								<em>Isaac Newton</em>
							</h4>
							<p><strong>Educational Level: </strong>College Graduate</p>
							<p><strong>Interests: </strong>Analytics, Geometry, Geodetics</p>
							<p class="row">
								<span class="col-md-8"><strong>Country: </strong>United Arab Emirates</span>
								<span class="col-md-4"><strong>Age: </strong>27</span>
							</p>
						</div>	
					</div>
				</div>
			</div>
			

			<div class="row pages">
				<ul class="pagination">
					<li><a href="#">&laquo;</a></li>
					<li><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">&raquo;</a></li>
				</ul>
			</div>
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

	</script>    <!-- start Dropifi --> <script type='text/javascript' src='https://s3.amazonaws.com/dropifi/js/widget/dropifi_widget.min.js'></script><script type='text/javascript'>document.renderDropifiWidget('70c2f0e75aaee02b1cfef8e927e010c1-1383283917314');</script> <!-- end Dropifi -->
</body>
</html>