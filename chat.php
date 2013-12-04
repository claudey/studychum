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
    <link rel="stylesheet" href="assets/css/chat.css">
    <link rel="shortcut icon" href="assets/img/favicon.ico">
</head>
<body>

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/user">StudyChum</a>
        </div>

        <div class="collapse navbar-collapse navbar-ex1-collapse">

            <ul class="nav navbar-nav">
        <!-- <li class="active"><a href="#">Courses</a></li>
        <li><a href="#">Tutors</a></li>
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Groups <b class="caret"></b></a>
        <ul class="dropdown-menu">
        <li><a href="#">School chums</a></li>
        <li><a href="#">Bffs</a></li>
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
                    <li><a href="/mychums">My Chums</a></li>
                    <li><a href="/chums">Find Chums</a></li>
                    <li class="active"><a href="#">Chat</a></li>
                    <li><a href="/forum">Forums</a></li>
                    <li><a href="#">Schedule</a></li>
                    <li><a href="#">Settings</a></li>
                </ul>

            </div>
            <div class="col-sm-10">
                <div class="row">
                    <h3 class="profile-heading">All your chums</h3>
        
                    <div class="col-md-3">
                        <div>
                            <p class="chum-chat">Osborn Kwarteng</p>
                            <p class="chum-chat">MEST Alum</p>
                            <p class="chum-chat">MEST 2014</p>
                            <p class="chum-chat">Elisha Senoo</p>
                            <p class="chum-chat">Godwin Adjaho</p>
                            <p class="chum-chat">Thea Sokolwski</p>
                            <p class="chum-chat">MEST 2015</p>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="chat">
                            <div class="row sender">
                                <div class="col-md-3">
                                    <img src="assets/img/profile.webp" alt="Your chum's picture" class="prof-img">
                                </div>
                                <div class="message col-md-9">
                                    <p>This is the sender's message. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore, odio, debitis sequi quam facere libero vel. Exercitationem, ullam totam repellat.
                                    </p>
                                </div>
                            </div>
                            <div class="row receiver">
                                <div class="message col-md-9">
                                    <p>This is the receiver's message</p>
                                </div>
                                <div class="col-md-3">
                                    <img src="assets/img/profile.webp" alt="Your profile picture" class="prof-img">
                                </div>
                            </div>
                        </div>
                        <div class="row chat-area">
                            <div class="col-md-3">
                                <img src="assets/img/profile.webp" class="prof-img" class="pull-right">
                            </div>
                            <div class="col-md-9">
                                <textarea rows="4" cols="20" class="form-control chat-box" required></textarea><br>
                                <a href="#" class="press seagreen chat-reset">Send</a>
                            </div>
                        </div>

                    </div>

        <!-- <div>
        <a href="#" class="press blue">Pressable</a>
        <a href="#" class="press orange">Pressable</a>
        <a href="#" class="press green">Pressable</a>
        </div>

        <div>
        <a href="#" class="press pink">Pressable</a>
        <a href="#" class="press red">Pressable</a>
        <a href="#" class="press violet">Pressable</a>
        </div>

        <div>
        <a href="#" class="press seagreen">Pressable</a>
        <a href="#" class="press yellow">Pressable</a>
        <a href="#" class="press gray">Pressable</a>
        </div> -->

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

        </script>
        <!-- start Dropifi --> <script type='text/javascript' src='https://s3.amazonaws.com/dropifi/js/widget/dropifi_widget.min.js'></script><script type='text/javascript'>document.renderDropifiWidget('cf7264a283e336148e3ba979479b372e-1373448040847');</script> <!-- end Dropifi -->
</body>
</html>