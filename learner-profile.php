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
	<title>StudyChum - Your Profile</title>
	<meta charset="utf-8">
        <meta name="description" content="">
        <meta name="keyowrds" content="online learning, online student program, study chum, studychum, find students, students with same course">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600'>
		<link rel="stylesheet" href="assets/css/bs.min.css">
		<link rel="stylesheet" href="assets/css/theme.css">
		<link rel="stylesheet" href="assets/css/chum.css">
		<link rel="stylesheet" href="assets/css/profile.css">
</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
	  <div class="navbar-header">
	    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
	      <span class="sr-only">Toggle navigation</span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </button>
	    <a class="navbar-brand" href="#">StudyChum</a>
	  </div>

	  <!-- Collect the nav links, forms, and other content for toggling -->
	  <div class="collapse navbar-collapse navbar-ex1-collapse">
	    <ul class="nav navbar-nav">
	      <li class="active"><a href="#">Courses</a></li>
	      <li><a href="#">Tutors</a></li>
	      <li class="dropdown">
	        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Groups<b class="caret"></b></a>
	        <ul class="dropdown-menu">
	          <li><a href="#">School chums</a></li>
	          <li><a href="#">Bffs</a></li>
	          <li><a href="#">Algebra chums</a></li>
	          <li role="presentation" class="divider"></li>
	          <li><a href="#">New Language chums</a></li>
	        </ul>
	      </li>
	    </ul>
	    <!-- <form class="navbar-form navbar-left" role="search">
	      <div class="form-group">
	        <input type="text" class="form-control" placeholder="Search">
	      </div>
	      <button type="submit" class="btn btn-default">Submit</button>
	    </form>  -->
	    <ul class="nav navbar-nav navbar-right">
	      <li ><a href="#"><img src="../assets/img/profile.webp" alt="" class="profile-pic"></a></li>
	      <li class="dropdown">
	        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $user->getNickname(); ?><b class="caret"></b></a>
	        <ul class="dropdown-menu">
	          <li><a href="#">Profile</a></li>
	          <li><a href="#">Settings</a></li>
	          <li role="presentation" class="divider"></li>
	          <li><a href="<?php echo UserService::createLogoutUrl('/'); ?>">Log out</a></li>
	        </ul>
	      </li>
	    </ul>
	  </div><!-- /.navbar-collapse -->
	</nav>
	<div class="main-body">
		<div class="side-nav well-lg col-sm-2">
			<ul class="list-group">
			  <li class="list-group-item"><a href="">Chums</a></li>
			  <li class="list-group-item"><a href="">Tutors</a></li>
			  <li class="list-group-item"><a href="">Calendar</a></li>
			  <li class="list-group-item"><a href="">Settings</a></li>
			</ul>
		</div>
		<div class="body-content container">
			<div class="row">
				<h3>Complete your profile</h3>
				<form class="form-horizontal" action="" method="POST">
					<fieldset>
						<div class="input-group">
							<p>Full Name<p>
							<input type="text" class="form-control" placeholder="Full Name">
						</div>
	
						<div class="input-group">
							<p>Username<p>
							<input type="text" class="form-control" placeholder="Username">
						</div>

						<div class="input-group">
							<p>Date of birth<p>
							<input type="date" class="form-control">
						</div>
	
						<div class="input-group">
							<p>Education level</p>
							<select class="form-control">
								<option>Other</option>
								<option>High School</option>
								<option>High School Graduate</option>
								<option>Some College</option>
								<option>College</option>
								<option>College Graduate</option>
							</select>
						</div>
						<div class="input-group">
							<p>Subject Interests<p>
							<textarea class="form-control" placeholder="Enter learning interestes, separated by spaces"></textarea>
						</div>
						<div class="input-group">
							<p>Current Courses<p>
							<textarea class="form-control" placeholder="Your current courses, separated by spaces"></textarea>
						</div>
						<br>
						<div class="other">
							<p class="form-action"><a class="btn btn-lg btn-success" href="#">Save</a></p>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>

	 <script src="assets/js/jquery-2.0.3.min.js"></script>
	 <script src="assets/js/bs.min.js"></script>
</body>
</html>