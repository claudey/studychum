
                <?php
    
                    include 'classes/crud.php';

                    function test_input($data)
                    {
                      $data = trim($data);
                      $data = stripslashes($data);
                      $data = htmlspecialchars($data);
                      return $data;
                    }

                    if ($_SERVER["REQUEST_METHOD"]=="POST") {
                        $email = test_input($_POST["email"]);

                        $db = new Database();
                        $db->connect();
                        $db->insert('BetaSignup', array('EmailAddress' => $email));

                    }  
                ?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="keyowrds" content="online learning, online student program, study chum, studychum, find students, students with same course">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>StudyChum, find people with similar learning interests</title>
        <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600|Oxygen'>
        <link rel="stylesheet" href="assets/css/bs.min.css">
        <link rel="stylesheet" href="assets/css/app.css">
        <link rel="stylesheet" href="assets/css/landing.css">
        <link rel="shortcut icon" href="assets/img/favicon.ico">
    </head>
    <body>
        <div class="main">
        	<div class="headline">StudyChum</div>
        	<div class="tagline">You are our No. 1 fan. We'll let you know when we're ready. :)</div>
        	
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
        <!-- start Dropifi --> <script type='text/javascript' src='https://s3.amazonaws.com/dropifi/js/widget/dropifi_widget.min.js'></script><script type='text/javascript'>document.renderDropifiWidget('70c2f0e75aaee02b1cfef8e927e010c1-1383283917314');</script> <!-- end Dropifi -->
    </body>
</html>