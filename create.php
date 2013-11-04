<?php
	//include 'models/database.php';
	include 'classes/crud.php';
	require_once 'google/appengine/api/users/UserService.php';

	use google\appengine\api\users\User;
    use google\appengine\api\users\UserService;

    $user = UserService::getCurrentUser();

    if (!$user){
    	
    	header('Location: ' .
        UserService::createLoginURL($_SERVER['REQUEST_URI']));
    }

    // Get users email address
    // run a database query
    // if user is already in database
    // redirect to profile
    // else redirect to profile creation
    

   

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
		<link rel="stylesheet" href="assets/css/app.css">
		<link rel="stylesheet" href="assets/css/profile.css">
		<link rel="shortcut icon" href="assets/img/favicon.png">

		<!-- start Dropifi --> <script type='text/javascript' src='https://s3.amazonaws.com/dropifi/js/widget/dropifi_widget.min.js'></script><script type='text/javascript'>document.renderDropifiWidget('cf7264a283e336148e3ba979479b372e-1373448040847');</script> <!-- end Dropifi -->
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
						<button type="submit" class="btn btn-default">Search</button>
					</form>
    			</li> -->
			</ul>


			<ul class="nav navbar-nav navbar-right">
				<li><a href="#">Notifications <span class="badge">42</span></a></li>
				<li><a href="#"><img src="assets/img/profile.webp" alt="" class="profile-pic"></a></li>
				<!--dropdown not working so I'm putting logout and profile in the nav bar temporarily-->

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $user->getEmail(); ?><b class="caret"></b></a>
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
				<li class="list-group-item"><a href="#">Activity</a></li>
				<li class="list-group-item"><a href="/chums">Chums</a></li>
				<!-- <li class="list-group-item"><a href="#">Tutors</a></li>
				<li class="list-group-item"><a href="#">Calendar</a></li>
				<li class="list-group-item"><a href="#">Settings</a></li> -->
			</ul>
		</div>
		<div class="col-sm-10">
			<div class="row">
				<h3 class="profile-heading">Complete your profile</h3>
				<div class="col-md-3">
					<form class="form-horizontal" action="/profile" method="POST">
					<img src="assets/img/profile.webp" alt="User profile image" class="profile">
					<input name="image" type="file">
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
									<input type="text" name="lname" class="form-control" placeholder="First Name" required>
								</div>
							</div>

							<!--div class="form-group">
								<p>Username<p>
								<input type="text" class="form-control" placeholder="Username" required>
							</div-->

							<!--div class="form-group">
								<p>Email Address<p>
								<input type="email" name="email" class="form-control" placeholder="Email address" required>
							</div-->
								
							<div class="form-group">
								<p>Date of birth<p>
								<input type="date" name="dob" class="form-control" required>
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
								<p>Interests</p>
								<?php
								$db = new Database();
								$db->connect();
								$db->select('Subject_Interests'); // Table name
								$res = $db->getResult();
								foreach ($res as $interest) {
									
										echo '<input type="checkbox" name="'. $interest["Interest"] .'" value="' . $interest["Interest"] . '"> ' . $interest["Interest"] . '<br>';
									}
								
								?>
							</div>
							
							<br>
							<div class="form-group">
								<p class="form-action"><input type="submit" class="btn btn-lg btn-success" value="Save"></p>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>

	 <script src="assets/js/jquery-2.0.3.min.js"></script>
	 <script src="assets/js/bs.min.js"></script>
	 <script src="assets/js/bs.min.js"></script>
</body>
</html>