<?php 
require 'includes/config.php';
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>HVMR-Search Results</title>
<link href="https://fonts.googleapis.com/css?family=Hind:400,300,700" rel="stylesheet" type="text/css">
<link href="stylesheets/screen.css" rel="stylesheet" type="text/css">
</head>

<body>
<header>

    <section class="container">
    <div style="flex:2;min-width:200px">
    <h1>HVMR</h1>
        <p>A Database for a Research Inventory in the Hudson/Mohawk Watershed</p>
        </div>
        <div style="flex:1;min-width:200px">
        <button type="submit" onClick="window.open('login.php','_self')">Log-in</button>
        <button type="submit" onClick="window.open('register.php','_self')">Register</button>
    </div>
    </section>
</header>
<main>
    <section>
    	<aside>
            <nav>
               <?php include 'includes/main-nav.php'; ?>
             </nav>
         </aside>
        <div class="content">
        	<h2>Results:</h2>
<?php            
//Test connection
if(mysqli_connect_errno()){
	die("Database connection failed:" . mysqli_connect_error() . "(" . mysqli_connect_errno() . ")" );
};

if(isset($_POST['submit'])){
//Set variables
$qryCat = mysql_real_escape_string($_POST['criteria']);
$qrySearch = mysql_real_escape_string($_POST['search']);	
	
//Query users choice
$sql = 'SELECT * FROM reports';
$result = mysqli_query($db, $sql);

//Check Query
if(!$result){
	die("Database query failed.");
}

while($row = mysqli_fetch_assoc($result)){

	if($row[$qryCat] == $qrySearch){
	
		echo '<h3>'.$row[$qryCat].'</h3>';
		echo '<h3>'.$row['project_title'].'</h3>';
		echo '<p>'.$row['project_desc'].'</p>';
		echo '<a href="'.$row['paper_url'].'">'.$row['paper_url'].'</a>';
		echo '<hr>';
	}
	


}
	

}
?>
           <button onClick="window.open('index.php','_self')">New Search</button>
        </div>
    </section>
</main>
<footer>
<?php include 'includes/footer.php' ?>
</footer>
</body>
</html>
