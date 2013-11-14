<?php
	require_once 'google/appengine/api/users/UserService.php';

	use google\appengine\api\users\User;
    use google\appengine\api\users\UserService;

    $user = UserService::getCurrentUser();

    if (!$user){
    	
    	header('Location: ' .
        UserService::createLoginURL($_SERVER['REQUEST_URI']));
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
				<!-- <li><a href="#">Notifications <span class="badge">42</span></a></li> -->
				<!-- <li><a href="#"><img src="assets/img/profile.webp" alt="" class="profile-pic"></a></li> -->
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $user->getEmail(); ?><b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="/profile">Profile</a></li>
						<!-- <li role="presentation" class="divider"></li> -->
						<li><a href="<?php echo UserService::createLogoutUrl('/'); ?>">Log out</a></li>
					</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</nav>

	<div class="main-body">
		<div class="side-nav well-lg col-sm-2">
			
			<ul class="nav nav-pills nav-stacked">
				<li><a href="/chums">Find Chums</a></li>
				<li class="active"><a href="#">My Chums</a></li>
				<!-- <li><a href="#">Tutors</a></li> -->
				<!-- <li><a href="#">Calendar</a></li> -->
				<!-- <li><a href="#">Settings</a></li> -->
			</ul>

		</div>
		<div class="col-sm-9 col-sm-offset-1">
			<div class="row">
				<h3 class="profile-heading">Your Chums</h3>
				
						<?php
							include 'classes/crud.php';

							$db = new Database();
							$db->connect();
							$db->sql("SELECT Chum_Id FROM Chums WHERE User_Id=(SELECT User_Id FROM Users WHERE EmailAddress = '".$user->getEmail()."')");
							$res = $db->getResult();

							//print_r($res);

							if (count($res)==0) {
						    	echo "<p>You have no chums currently.</p>";;
						    }
							else {
								foreach ($res as $chum) {
							
									$db->sql("SELECT * FROM Users WHERE User_Id=".$chum['Chum_Id']."");
									$chums = $db->getResult();
										echo '<div class="col-md-6">
										<div class="media row chum-list">
											<div class="col-md-2">
												<a class="pull-left" href="#">
													<img class="media-object" src="assets/img/profile.webp" alt="...">
												</a>
											</div>
											<div class="col-md-10 media-body">';

											echo '<h4 class="media-heading"><em>' . $chums['FirstName'] . ' ' . $chums['LastName'] .'</em></h4>
															<p> <b>Educational Level:</b> '.$chums['EducationLevel'].'</p>';

											echo "<p><b>Interests:</b></p>";
											/*
											echo "<p><b>Interests:</b></p>";
											foreach ($interests as $interest) {
												echo "<p>" . $interest['Interest'] . "</p>";
											}
											*/

											echo '
														</div>	
													</div>
												</div>';
										
												}

								}
					
							
						?>
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