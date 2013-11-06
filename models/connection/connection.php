<?PHP 

	$con = mysql_connect('localhost', 'elikem', 'james417');
	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error());
	  }
	  
	mysql_select_db("studychum", $con);
?>
