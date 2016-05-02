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
$sql = "UPDATE reports SET project_title='Test' WHERE id=5";

if (mysqli_query($db, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}



//}