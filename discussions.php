<?php
	//include 'models/database.php';
	include 'classes/crud.php';

	// Google's user service
	require_once 'google/appengine/api/users/UserService.php';
	use google\appengine\api\users\User;
    use google\appengine\api\users\UserService;

    $user = UserService::getCurrentUser();
    $email = $user->getEmail();

    // adding users' contribution to a post to the database
    if (isset($_POST["submit"])) {
    	$post_content = $_POST['contribution'];
    	$post_date = date('Y-m-d H:i:s');
    	$post_topic = $_GET['topic_id'];

   		$db = new Database();
   		$db->connect();
   		$db->sql("SELECT User_Id FROM Users WHERE EmailAddress='".$email."'");
   		$res = $db->getResult();
   		$post_by = $res['User_Id'];

   		$post = array('post_content' => $post_content, 'post_date' => $post_date, 'post_topic' => $post_topic, 'post_by' => $post_by);

   		$db->insert('posts', $post);
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
		<link rel="stylesheet" href="assets/css/profile.css">
		<link rel="stylesheet" href="assets/css/wysihtml5.css">
		<link rel="stylesheet" href="assets/css/prettify.css">
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
				<li class="active"><a href="/forum">Forums</a></li>
			</ul>

		</div>
		<div class="col-sm-10">
			<div class="row">
				<?php
					if (isset($_GET['topic_cat'])) {
						$topic_cat = $_GET['topic_cat'];
						$db = new Database();
						$db->connect();
						$db->sql("SELECT * FROM categories WHERE cat_id='".$topic_cat."'");
						$res = $db->getResult();
						$category = $res["cat_name"];

						$db->sql("SELECT * FROM topics WHERE topic_cat='".$topic_cat."'");
						$res = $db->getResult();
					}

					echo "<h3 class='profile-heading'>".$category."</h3>";
					echo "<p>".$res['topic_subject']."<p>" . "posted on " . "<small>".$res['topic_date']."<small>";

					$topic_id = $res['topic_id'];
					$user_id = $res['topic_by'];
					$db->sql("SELECT FirstName, LastName FROM Users WHERE User_Id='".$user_id."'");
					$res = $db->getResult();
					echo "<p>".$res['FirstName']." ".$res["LastName"]."<p>";
					echo "<hr>";

					$topic_cat = $_GET['topic_cat'];
					$topic_id = $_GET['topic_id'];

					// displaying other users comments
					$db->sql("SELECT * FROM posts WHERE post_topic='".$topic_id."'");
					$res = $db->getResult();
					// checking if there are no contributions
					if (count($res)==0) {
						echo "<p>Be the first to contribute.</p>";
					}
					elseif (array_key_exists('post_id', $res)) {
						echo "<div class=\"well well-sm comment\"><p>".$res['post_content']."</p>";
						echo "<p>".$res['post_date']."</p>";
						$user_id = $res['post_by'];
						$db->sql("SELECT FirstName, LastName FROM Users WHERE User_Id='".$user_id."'");
						$res = $db->getResult();
						echo "<p>Contribution by: ".$res['FirstName']." ".$res["LastName"]."<p></div>";
					} else {
						foreach ($res as $contribution) {
							echo "<div class=\"well well-sm comment\"><p>".$contribution['post_content']."</p>";
							echo "<p>".$contribution['post_date']."</p>";
							$user_id = $contribution['post_by'];
							$db->sql("SELECT FirstName, LastName FROM Users WHERE User_Id='".$user_id."'");
							$res = $db->getResult();
							echo "<p>Contribution by: ".$res['FirstName']." ".$res["LastName"]."<p></div>";
						}
					}

					echo '
					<form class="form-horizontal" action="/discussions?topic_cat='.$topic_cat.'&topic_id='.$topic_id.'" method="POST">
						<fieldset>
							<div class="row">
								<div class="form-group col-md-7">
									<p>Contribute to Discussion<p>
									<textarea rows="4" cols="50" name="contribution" class="form-control rich-text" required></textarea>
								</div>
							</div>
							<div class="form-group">
								<p class="form-action">
									<input type="submit" value="Submit" name="submit">
								</p>
							</div>
						</fieldset>
					</form>';

				?>
				
			</div>
		</div>
	</div>

	<script src="assets/js/jquery-2.0.3.min.js"></script>
	<script src="assets/js/bs.min.js"></script>
	<script src="assets/js/wysihtml5-0.3.0.min.js"></script>
	<script src="assets/js/wysihtml5.js"></script>
	<script src="assets/js/prettify.js"></script>

	<script type="text/javascript">
		$('.rich-text').wysihtml5();
	</script>

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