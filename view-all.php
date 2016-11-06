<?php 
session_start();
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
        
                 <?php 
		
		if(!isset($_SESSION['login_user'])) { ?>
        <button type="submit" onClick="window.open('login.php','_self')">Log-in</button>
        <?php }else{ ?>
         <button type="submit" onClick="window.open('logout.php','_self')">Log-out</button>
        
        <?php } ?>
        <button type="submit" onClick="window.open('register.php','_self')">Register</button>
		<button type ="print" value= "Print"> </button> 
        
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
        	<h2 style="margin-bottom:20px">View all:</h2>
            
          <?php
		  
		  //Query Reports
			$reports = 'SELECT * FROM reports ORDER BY project_title';
			$result = mysqli_query($db, $reports);
			
			//Check Query
			if(!$result){
				die("Database query failed.");
			}

		  	//Check username field

	//Fetch rows
	while($row = mysqli_fetch_assoc($result)){
		
		echo '<h3>'.$row['project_title'] . '</h3>';
		echo '<hr><p style="font-weight:bold"> Author: '.$row['name'].'</p>';
		echo '<p>'.$row['project_desc'] . '</p>';
		echo 'URL: <a href="'.$row['paper_url'].'">'.$row['paper_url'].'</a>';
	
			
	}//End while
		  
		  
		  
		  
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
<?php
mysqli_close($db);
?>
