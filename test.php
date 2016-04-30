<?php 

session_start();

require 'includes/config.php';


//Test connection
if(mysqli_connect_errno()){
	die("Database connection failed:" . mysqli_connect_error() . "(" . mysqli_connect_errno() . ")" );
};

//if(isset($_POST['submit'])){
//Set variables
$qryChoice = 'category';
$qrySearch = 'biology';	
	
//Query users choice
$sql = 'SELECT'. mysql_real_escape_string($qryChoice).' FROM reports';
$result = mysqli_query($db, $sql);

//Check Query
if(!$result){
	die("Database query failed.");
}

$row = mysqli_fetch_assoc($result);

var_dump($row);

//}