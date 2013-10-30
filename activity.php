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
		<link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600'>
		<link rel="stylesheet" href="assets/css/bs.min.css">
		<link rel="stylesheet" href="assets/css/chum.css">
		<link rel="stylesheet" href="assets/css/activity.css">
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
			<a class="navbar-brand" href="#">StudyChum</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">

			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Courses</a></li>
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
    			</li>
			</ul>


			<ul class="nav navbar-nav navbar-right">
				<li><a href="#">Notifications <span class="badge">42</span></a></li>
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
				<li class="list-group-item active"><a href="#">Activity</a></li>
				<li class="list-group-item"><a href="#">Chums</a></li>
				<li class="list-group-item"><a href="#">Tutors</a></li>
				<li class="list-group-item"><a href="#">Calendar</a></li>
				<li class="list-group-item"><a href="#">Settings</a></li>
			</ul>
		</div>
		<div class="col-sm-9 col-sm-offset-1">
			<div class="row">
				<h3 class="profile-heading">Activity Stream</h3>
				<div class="col-md-7">
					<div class="media row">
						<div class="col-md-2">
							<a class="pull-left" href="#">
								<img class="media-object" src="assets/img/favicon.png" alt="...">
							</a>
						</div>
						<div class="col-md-10 media-body">
							<h4 class="media-heading">This is the title of the activity you performed</h4>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates, nihil, assumenda, quo incidunt ab minus accusamus animi tempore cum iste magnam odit eligendi? Facilis labore perferendis asperiores nam fuga amet.
						</div>
					</div>
					<div class="media row">
						<div class="col-md-2">
							<a class="pull-left" href="#">
								<img class="media-object" src="assets/img/favicon.png" alt="...">
							</a>
						</div>
						<div class="col-md-10 media-body">
							<h4 class="media-heading">This is the title of the activity you performed</h4>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo non fugiat quidem tempore laboriosam nisi totam voluptatibus laudantium consequuntur fuga. Saepe, pariatur, non voluptatum quia quaerat ipsa et consequatur quasi.
						</div>
					</div>
					<div class="media row">
						<div class="col-md-2">
							<a class="pull-left" href="#">
								<img class="media-object" src="assets/img/favicon.png" alt="...">
							</a>
						</div>
						<div class="col-md-10 media-body">
							<h4 class="media-heading">This is the title of the activity you performed</h4>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, fugit, veniam impedit repellat quis quisquam tempora quae commodi eaque ratione dolorum ipsa consectetur assumenda nulla alias! Enim minus laudantium voluptas.
						</div>
					</div>
					<div class="media row">
						<div class="col-md-2">
							<a class="pull-left" href="#">
								<img class="media-object" src="assets/img/favicon.png" alt="...">
							</a>
						</div>
						<div class="col-md-10 media-body">
							<h4 class="media-heading">This is the title of the activity you performed</h4>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, esse, officiis, quasi, vero minima dignissimos pariatur placeat mollitia omnis ipsam minus beatae impedit possimus aperiam tempore nam non quisquam illo!
						</div>
					</div>
					<div class="media row">
						<div class="col-md-2">
							<a class="pull-left" href="#">
								<img class="media-object" src="assets/img/favicon.png" alt="...">
							</a>
						</div>
						<div class="col-md-10 media-body">
							<h4 class="media-heading">This is the title of the activity you performed</h4>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, laborum velit magnam ex ad architecto expedita omnis aut incidunt illo repellat ipsam ullam explicabo ut impedit aperiam consequatur culpa commodi.
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	 <script src="assets/js/jquery-2.0.3.min.js"></script>
	 <script src="assets/js/bs.min.js"></script>
</body>
</html>