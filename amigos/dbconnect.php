<?php
error_reporting(E_ALL & ~E_DEPRECATED);

//attaching secret info thats included in variables
include 'dbconfig.php';
	

//the following code adapted from http://www.tutorialspoint.com/php/mysql_select_php.htm
   
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }

//this line from http://www.w3schools.com/php/php_mysql_connect.asp
//UNCOMMENT LINE BELOW WHEN TESTING!!!!!
//echo "Connected successfully";

   //select all data from DB oscar
   mysql_select_db('professo_oscar');
?>
