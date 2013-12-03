<?php
	//include 'models/database.php';
	include 'classes/crud.php';

	// Including Google's User Service
	require_once 'google/appengine/api/users/UserService.php';
	use google\appengine\api\users\User;
    use google\appengine\api\users\UserService;

    // new instance of user
    $user = UserService::getCurrentUser();
    

    //redirecting user to logout page if user has not already signed up
    if (!$user){
    	
    	header('Location: ' .
        UserService::createLoginURL($_SERVER['REQUEST_URI']));
    }

    
    $db = new Database();
    $db->connect();
    $db->sql("SELECT * FROM Users WHERE EmailAddress='" .$user->getEmail()."'");
    $res = $db->getResult();

    

    if (count($res)>0) {
    	header('Location: /profile');
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
		<link rel="stylesheet" href="assets/css/create.css">
		<link rel="stylesheet" href="assets/css/bootstrap-tagsinput.css">
		<link rel="stylesheet" href="assets/css/jasny-bootstrap.css">
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
    			</li> -->
			</ul>


			<ul class="nav navbar-nav navbar-right">
				<!--li><a href="#">Notifications <span class="badge">42</span></a></li>
				<li><a href="#"><img src="assets/img/profile.webp" alt="" class="profile-pic"></a></li-->
				<!--dropdown not working so I'm putting logout and profile in the nav bar temporarily-->
				<!-- <li><a href="#">Profile</a></li> -->
				<!-- <li><a href="<?php echo UserService::createLogoutUrl('/'); ?>">Log out</a></li> -->

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
			
		
		</div>
		<div class="col-sm-10">
			<div class="row">
				<h3 class="profile-heading">Complete your profile</h3>
				<div class="col-md-3">
					<form class="form-horizontal" action="/profile" method="POST">
					<div class="fileinput fileinput-new" data-provides="fileinput">
					  <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
					  <div>
					    <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="image"></span>
					    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
					  </div>
					</div>
				</div>

				<div class="col-md-5">
					
						<fieldset>
							<div class="row">
								<div class="form-group col-md-6 fname">
									<p>First Name<p>
									<input type="text" name="fname" class="form-control fname" placeholder="First Name" required>
								</div>
								<div class="form-group col-md-6">
									<p>Last Name<p>
									<input type="text" name="lname" class="form-control" placeholder="Last Name" required>
								</div>
							</div>

							<div class="row">
								<div class="form-group col-md-5">
									<p>Date of birth<p>
									<input type="date" name="dob" class="form-control" required>
								</div>

								<div class="form-group col-md-7">
									<p>Location<p>
									<input type="text" name="country" class="form-control countries" required>
								</div>
							</div>

							<div class="form-group" required>
								<p>Education level</p>
								<select class="form-control" name="education">
									<option value="Other">Other</option>
									<option value="High School">High School</option>
									<option value="High School Graduate">High School Graduate</option>
									<option value="Some College">Some College</option>
									<option value="College">College</option>
									<option value="College Graduate">College Graduate</option>
								</select>
							</div>

							<div class="form-group" required>
								<p>Gender</p>
								<select class="form-control" name="gender">
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>


							<div class="form-group" required>
								<p>Country</p>
								<select class="form-control" name="country">
								<?php
								// Creating a new instance of the database
								$db = new Database();
								$db->connect();

								$db->select('Countries'); // Table name
								$res = $db->getResult();

								//displaying interests from the database
								foreach ($res as $country) {
									
										echo '<option value="' . $country["Name"] . '"> ' . $country["Name"] . '</option>';
									}
								
								?>
								</select>
							</div>

							<div class="form-group" required>
								<p>Interests</p>
								<input type="text" name="tags" value="Accounting,Politics,Geography,Economics" data-role="tagsinput" placeholder="Add Interests" required>
							</div>
							

							
							
							<br>
							<div class="form-group">
								<p class="form-action">
									<input type="submit" value="Save" class="press orange">
								</p>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script src="assets/js/jquery-2.0.3.min.js"></script>

	<script src="assets/js/app.min.js"></script>
	<script src="assets/js/bs.min.js"></script>

	<script src="assets/js/bootstrap-tagsinput.js"></script>
	<script src="assets/js/jasny-bootstrap.js"></script>

	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-45749635-1', 'studychumapp.appspot.com');
	  ga('send', 'pageview');

	</script>

    <!-- start Dropifi --> <script type='text/javascript' src='https://s3.amazonaws.com/dropifi/js/widget/dropifi_widget.min.js'></script><script type='text/javascript'>document.renderDropifiWidget('70c2f0e75aaee02b1cfef8e927e010c1-1383283917314');</script> <!-- end Dropifi -->
</body>
</html>