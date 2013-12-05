<html>
<head>
	<title>StudyChum - Files and Resources</title>
	<meta charset="utf-8">
        <meta name="description" content="">
        <meta name="keyowrds" content="online learning, online student program, study chum, studychum, find students, students with same course">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600|Oxygen'>
		<link rel="stylesheet" href="assets/css/bs.min.css">
		<link rel="stylesheet" href="assets/css/app.css">
		<link rel="stylesheet" href="assets/css/share.css">
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
				<li><a href="#">Notifications <span class="badge">0</span></a></li>
				<li><a href="#"><img src="assets/img/profile.webp" alt="" class="profile-pic"></a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $user->getEmail(); ?> <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="/profile">Profile</a></li>
						<li role="presentation" class="divider"></li>
						<li><a href="index.html">Log out</a></li>
					</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</nav>

	<div class="main-body">
		<div class="well side-nav well-lg col-sm-2">
			<ul class="nav nav-pills nav-stacked">
				<li><a href="#">My Chums</a></li>
				<li><a href="/forum">Forums</a></li>
				<li><a href="/chat">Chat</a></li>
				<li class="active"><a href="#">Share</a></li>
				<li><a href="#">Settings</a></li>
			</ul>
		</div>

		<div class="col-sm-9 content">
			<div class="row">
				<h3 class="profile-heading">My Files</h3>
				<div class="col-md-8 items">
					<div class="media row item-list" id="item-1">
						<div class="col-md-2">
							<a class="pull-left" href="#">
								<img class="media-object" src="assets/img/pdf.webp" alt="...">
							</a>
						</div>
						<div class="col-md-9 media-body">
							<h4 class="row media-heading item-title">
								<em>French for Beginners</em>
							</h4>
							<div class="row">
								<div class="col-md-8">
									<div>tags</div>
									<strong>Last accessed: </strong>28th November, 2013
								</div>
								<div class="col-md-4">
									<span>
										<a href="#" class="press orange" data-toggle="modal" data-target="#shareModal">Share</a>
										<a href="#" class="press red" data-toggle="modal" data-target="#myModal">Delete</a>
									</span>
								</div>
							</div>
						</div>
					</div>

					<div class="media row item-list" id="item-1">
						<div class="col-md-2">
							<a class="pull-left" href="#">
								<img class="media-object" src="assets/img/pdf.webp" alt="...">
							</a>
						</div>
						<div class="col-md-9 media-body">
							<h4 class="row media-heading item-title">
								<em>Learn French in a Month</em>
							</h4>
							<div class="row">
								<div class="col-md-8">
									<div>tags</div>
									<strong>Last accessed: </strong>28th November, 2013
								</div>
								<div class="col-md-4">
									<span>
										<a href="#" class="press orange" data-toggle="modal" data-target="#shareModal">Share</a>
										<a href="#" class="press red" data-toggle="modal" data-target="#myModal">Delete</a>
									</span>
								</div>
							</div>
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

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Delete File</h4>
				</div>
				<div class="modal-body">
					Are you sure you want to delete "Introduction to System Analysis"?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-danger delete-file" data-dismiss="modal">Yes, delete</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->


	<div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Share file</h4>
				</div>
				<div class="modal-body">
					<span class="input-group">
						<span class="input-group-btn">
							<button type="button" class="btn btn-default dropdown-toggle shared-with" data-toggle="dropdown">Chums <span class="caret"></span></button>
							<ul class="dropdown-menu">
								<li><a href="#" class="groups">Groups </a></li>
							</ul>
						</span><!-- /btn-group -->
						<input type="text" class="form-control">
					</span><!-- /input-group -->
					<!-- <span class="glyphicon glyphicon-plus"></span> -->
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Share</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

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