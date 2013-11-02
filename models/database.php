<?php

//starting database connection
$con = mysql_connect(":/cloudsql/studychumapp:studychump", "root", "");


//checking connection
if (!$con){
	echo "Failed to connect.";
} else {
	echo "database connection successful";
}


// create database
$sql = "CREATE DATABASE IF NOT EXISTS studychum_db";
if (mysql_query($sql)) {
	echo "Datbase study_chum created succesfully";
} else {
	echo "Error creating database" . mysql_error($con);
}

$sql = "USE studychum_db";
mysql_query($sql);

// creating Users table 
$sql = "DROP TABLE Users";
if (mysql_query($sql)) {
	echo "users dropped";
} else {"users not dropped";}

$sql="CREATE TABLE IF NOT EXISTS Chums (User_Id INT(3) NOT NULL AUTO_INCREMENT, FirstName CHAR(30), LastName CHAR(30), DOB DATE, EducationLevel CHAR(100), EmailAddress CHAR(50), PRIMARY KEY (User_Id))";

// Execute query

if (mysql_query($sql)){
	echo "Table Users created successfully AGAIN";
} else {
	echo "Users table not created" . mysql_error($con);
}

// create Subject_Interests table

$sql="CREATE TABLE IF NOT EXISTS Subject_Interests (User_Id INT(3), Subject_Id INT NOT NULL AUTO_INCREMENT, Subject CHAR(50), PRIMARY KEY (Subject_Id), FOREIGN KEY (User_Id) REFERENCES Users (User_Id))";

// Execute query

if (mysql_query($sql)){
	echo "Table Subject_Interests created successfully";
} else {
	echo "Subject_Interests table not created" . mysql_error($con);
}

// create Current courses table
$sql="CREATE TABLE IF NOT EXISTS Current_Courses (User_Id INT(3), Courses_Id INT NOT NULL, Subject CHAR(50), PRIMARY KEY (Courses_Id), FOREIGN KEY (User_Id) REFERENCES Users (User_Id))";

// Execute query

if (mysql_query($sql)){
	echo "Table Current_Courses created successfully";
} else {
	echo "Current_Courses table not created" . mysql_error($con);
}

//closing database
mysql_close($con);


?>