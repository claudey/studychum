<?php

$con = mysql_connect(":/cloudsql/studychumapp:studychump", "root", "");

//checking connection
if (!$con){
	echo "Failed to connect.<br>";
} else {
	echo "database connection successful.<br>";
}

// create database
$sql = "CREATE DATABASE IF NOT EXISTS studychum";
if (mysql_query($sql)) {
	echo "Datbase study_chum created succesfully<br>";
} else {
	echo "Error creating database<br>" . mysql_error($con);
}

$sql = "USE studychum";
mysql_query($sql);

$sql="CREATE TABLE IF NOT EXISTS Users (User_Id INT(3) NOT NULL AUTO_INCREMENT, FirstName CHAR(30), LastName CHAR(30), DOB DATE, EducationLevel CHAR(100), EmailAddress CHAR(50) UNIQUE, Image LONGBLOB, PRIMARY KEY (User_Id))";

// Execute query

if (mysql_query($sql)){
	echo "Table Users created successfully<br>";
} else {
	echo "Users table not created<br>" . mysql_error($con);
}

// create Subject_Interests table



$sql="CREATE TABLE IF NOT EXISTS Subject_Interests (Interest_Id INT(3) NOT NULL AUTO_INCREMENT, Interest CHAR(100), PRIMARY KEY (Interest_Id))";

// Execute query

if (mysql_query($sql)){
	echo "Table Interests created successfully<br>";
} else {
	echo "Interests table not created<br>" . mysql_error($con);
}

$sql="CREATE TABLE IF NOT EXISTS Users_Interests (User_Id INT NOT NULL, Interest CHAR(100), FOREIGN KEY (User_Id) REFERENCES Users(User_Id))";

// Execute query

if (mysql_query($sql)){
	echo "Table User_Interests created successfully<br>";
} else {
	echo "User_Interests table not created<br>" . mysql_error($con);
}


$sql = "INSERT INTO Subject_Interests (Interest) VALUES('Engineering')";
mysql_query($sql);
$sql = "INSERT INTO Subject_Interests (Interest) VALUES('Programming')";
mysql_query($sql);
$sql = "INSERT INTO Subject_Interests (Interest) VALUES('Physics')";
mysql_query($sql);
$sql = "INSERT INTO Subject_Interests (Interest) VALUES('Mathematics')";
mysql_query($sql);
$sql = "INSERT INTO Subject_Interests (Interest) VALUES('Biology')";
mysql_query($sql);

*/

$sql = "DELETE FROM Users";
if (mysql_query($sql)){
	echo "Table User elements deleted<br>";
} else {
	echo "elements not deleted<br>" . mysql_error($con);
}

mysqli_close($con);

include('classes/crud.php');
$db = new Database();
$db->connect();
$db->select('Subject_Interests'); // Table name
$res = $db->getResult();
print_r($res);

?>