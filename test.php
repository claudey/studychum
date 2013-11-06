<?PHP 

	$con = mysql_connect('localhost', 'elikem', 'james417');
	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error());
	  }
	  
	mysql_select_db("studychum", $con);
	$sql_chums = "SELECT * FROM  chum";
	$result_chums = mysql_query($sql_chums) or die('Query failure: ' . mysql_error());
	
    echo '<div><table><tbody>';                                   
	$row_count = 0;
	while($row_chums = mysql_fetch_array($result_chums)){
			$row_count++; 
			echo '<tr>
			        <td>'.$row_count.'</td>
			        <td>'.$row_chums['first_name'].'</td>
			        <td>'.$row_chums['email'].'</td>
		    	</tr>';
	 }

	echo '</tbody></table></div>';
	if($row_count == 0) echo 'Zero Chum in db.';
?>
