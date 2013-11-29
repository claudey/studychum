<?php
	//include 'models/database.php';
	include 'classes/crud.php';

	// Google's user service
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
        <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600|Oxygen'>
		<link rel="stylesheet" href="assets/css/bs.min.css">
		<link rel="stylesheet" href="assets/css/app.css">
		<link rel="stylesheet" href="assets/css/profile.css">
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
			<!-- <img src="header-logo" src="assets/img/header_logo.webp" alt="studychum logo"> -->
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
				<!--li><a href="#">Notifications <span class="badge">0</span></a></li>
				<li><a href="#"><img src="assets/img/profile.webp" alt="" class="profile-pic"></a></li-->

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

				<li><a href="/chums">Find Chums</a></li>
				<li><a href="/mychums">My Chums</a></li>

				<li><a href="/forum">Forum</a></li>
				<!-- <li><a href="#">Settings</a></li> -->
			</ul>

		</div>
		<div class="col-sm-10">
			<div class="row">
				<h3 class="profile-heading">Your profile</h3>
				<?php
					// function to form input sanitise input
					function test_input($data)
					{
					   $data = trim($data);
					   $data = stripslashes($data);
					   $data = htmlspecialchars($data);
					   return $data;
					}

					// getting users profile details from form
					if ($_SERVER["REQUEST_METHOD"] == "POST")
					{

						$gender = test_input($_POST["gender"]);

						$country = test_input($_POST["country"]);

						$fname = test_input($_POST["fname"]);
						$lname = test_input($_POST["lname"]);
						$dob = test_input($_POST["dob"]);
						$education = test_input($_POST["education"]);		

						$image = test_input($_POST["image"]);

						$email = $user->getEmail();

					    // new instance of database
						$db = new Database();
					    $db->connect();

					    //array to hold user details from form input
					    $new_user = array('FirstName' => $fname, 'LastName' => $lname, 'DOB' => $dob, 'EducationLevel' => $education, 'EmailAddress' => $email, 'Image' => $image, 'Country' => $country, 'Gender' => $gender);

					    // inserting data into database
					    $db->insert('Users', $new_user);

					    // selecting last id from the database
					    $db->sql("SELECT * FROM Users ORDER BY User_Id DESC LIMIT 1");
					    $res = $db->getResult();
					    $id = $res[User_Id];

					    // using the tags

					    $tags = $_POST["tags"];
						$interests = explode(",", $tags);

						foreach ($interests as $interest) {
							//making first letter of interest capitl
							$formatted_interest = ucfirst(strtolower($interest));
							$db->insert('Users_Interests', array('User_Id' => $id, 'Interest' => $formatted_interest));
						}

					    $db->disconnect();

						}

										
				    
				    
				    // displaying information about user 
					$db = new Database();
				    $db->connect();
				    $db->sql("SELECT * FROM Users WHERE EmailAddress='" .$user->getEmail()."'");
				    $res = $db->getResult();

				    echo "<p>Name: ". "<em>" . $res["FirstName"] . " " . $res["LastName"] . "</em>". "</p>";
				    echo "<p>Educational Level: ". $res["EducationLevel"] . "</p>";
				    echo "<p>Date of Birth: " . $res["DOB"];
				    echo "<p>Country: " . $res["Country"];
				    echo "<p>Gender: " . $res["Gender"];

				    //header("Content-type: image/jpeg");
				    echo "<img src='".$res['Image']."'/>";

				    $db->sql("SELECT * FROM Users_Interests WHERE User_Id = (SELECT User_Id FROM Users WHERE EmailAddress='".$user->getEmail()."')");
				    //echo "<p>Interests: " . $Engineering . " " . $Programming . " " . $Mathematics . " " . $Biology . "</p>";
				    $res = $db->getResult();

				    echo "<p><b>Interests:</b></p>";
						foreach ($res as $interest) {
							echo "<span>" . $interest['Interest'] . "</span>" . ",";
						}

				?>
				
			</div>
		</div>
	</div>

	<script src="assets/js/jquery-2.0.3.min.js"></script>
	<script src="assets/js/bs.min.js"></script>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-45749635-1', 'studychumapp.appspot.com');
	  ga('send', 'pageview');

	</script>
	<!-- start Dropifi --> <script type='text/javascript' src='https://s3.amazonaws.com/dropifi/js/widget/dropifi_widget.min.js'></script><script type='text/javascript'>document.renderDropifiWidget('cf7264a283e336148e3ba979479b372e-1373448040847');</script> <!-- end Dropifi -->
</body>
</html>