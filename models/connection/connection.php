<?PHP 

	$con = mysql_connect('localhost', 'root', 'james417');
	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error());
	  }
	  
	mysql_select_db("studychum", $con);
?>
