<?php
	//include 'models/database.php';
	include 'classes/crud.php';
	require_once 'google/appengine/api/users/UserService.php';

	use google\appengine\api\users\User;
    use google\appengine\api\users\UserService;

    $user = UserService::getCurrentUser();

   

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
		<link rel="stylesheet" href="assets/css/chum.css">
		<link rel="stylesheet" href="assets/css/profile.css">
		<link rel="shortcut icon" href="assets/img/favicon.png">
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
				<li><a href="#">Notifications <span class="badge">0</span></a></li>
				<li><a href="#"><img src="assets/img/profile.webp" alt="" class="profile-pic"></a></li>
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
				<li class="list-group-item"><a href="#">Activity</a></li>
				<li class="list-group-item"><a href="/chums">Chums</a></li>
				<!-- <li class="list-group-item"><a href="#">Tutors</a></li>
				<li class="list-group-item"><a href="#">Calendar</a></li>
				<li class="list-group-item"><a href="#">Settings</a></li> -->
			</ul>
		</div>
		<div class="col-sm-10">
			<div class="row">
				<h3 class="profile-heading">Your profile</h3>
				<?php

					//include 'classes/crud.php';

					function test_input($data)
					{
					   $data = trim($data);
					   $data = stripslashes($data);
					   $data = htmlspecialchars($data);
					   return $data;
					}

					// getting users profile details from form
					$fname = test_input($_POST["fname"]);
					$lname = test_input($_POST["lname"]);
					$dob = test_input($_POST["dob"]);
					$education = test_input($_POST["education"]);

					
					$Engineering = test_input($_POST["Engineering"]);
				
					$Programming = test_input($_POST["Programming"]);

					$Physics = test_input($_POST["Physics"]);

					$Mathematics = test_input($_POST["Mathematics"]);			

					$Biology = test_input($_POST["Biology"]);

					$image = test_input($_POST["image"]);
					
				    $email = $user->getEmail();


					$db = new Database();
				    $db->connect();

				    $new_user = array('FirstName' => $fname, 'LastName' => $lname, 'DOB' => $dob, 'EducationLevel' => $education, 'EmailAddress' => $email, 'Image' => $image);

				    $db->insert('Users', $new_user);

				    $db->sql("SELECT * FROM Users ORDER BY User_Id DESC LIMIT 1");
				    $res = $db->getResult();

				    $id = $res[User_Id];

				    $interests = array('User_Id' => $id, 'Interest' => $Engineering);
				    
				    $db->insert('Users_Interests', $interests);

				    $interests = array('User_Id' => $id, 'Interest' => $Programming);
				    $db->insert('Users_Interests', $interests);

				    $interests = array('User_Id' => $id, 'Interest' => $Physics);
				    $db->insert('Users_Interests', $interests);

				    $interests = array('User_Id' => $id, 'Interest' => $Mathematics);
				    $db->insert('Users_Interests', $interests);

				    $interests = array('User_Id' => $id, 'Interest' => $Biology);
				    $db->insert('Users_Interests', $interests);
				    

				    echo "<p>Name: ". $fname . " " . $lname . "</p>";
				    echo "<p>Educational Level: ". $education . "</p>";
				    echo "<p>Interests: " . $Engineering . " " . $Programming . " " . $Mathematics . " " . $Biology . "</p>";
				    
				?>
				
			</div>
		</div>
	</div>

	<script src="assets/js/jquery-2.0.3.min.js"></script>
	<script src="assets/js/bs.min.js"></script>
	<!-- start Dropifi --> <script type='text/javascript' src='https://s3.amazonaws.com/dropifi/js/widget/dropifi_widget.min.js'></script><script type='text/javascript'>document.renderDropifiWidget('70c2f0e75aaee02b1cfef8e927e010c1-1383283917314');</script> <!-- end Dropifi -->
</body>
</html>