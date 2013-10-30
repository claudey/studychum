<?php
    include 'models/database.php';
    include 'classes/crud.php';
/*
    $db = new Database();
    $db->connect();
    $db->select('Users');
    $res = $db->getResult();
    print_r($res);
    */
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="keyowrds" content="online learning, online student program, study chum, studychum, find students, students with same course">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>StudyChum, find people with similar learning interests</title>
        <link rel="stylesheet" href="assets/css/chum.css">
        <link rel="stylesheet" href="assets/css/landing.css">
        <link rel="shortcut icon" href="assets/img/favicon.png">
    </head>
    <body>
        <div class="main">
        	<div class="headline">StudyChum</div>
        	<div class="tagline">Enhance your learning experience. Find students of like interests and study together. <!-- <br> --><!-- or  a tutor for one-on-one tutoring. --></div>
        	<div class="sign-up">
        		<input type="email" placeholder="Drop your email address." autofocus><br>
				<button>I'm in!</button>
        	</div>
            <!-- <div class="textLine">
            	<div class="headline"><strong>StudyChum</strong></div>
            	<div class="tagline">Find students and tutors with similar interests</div>
            	<div class="sign-up">
            		<input type="text" col="12" row="2"placeholder="Your email address, we'll notify you."><br>
    				<button>Sign me up!</button>
            	</div>
            </div> -->
        </div>

        <script src="assets/js/jquery-2.0.3.min.js"></script>
        <script src="assets/js/chum.js"></script>
    </body>
</html>