<?php
require '../includes/session.php';
require '../includes/config.php';
?>
<!doctype html>
<html lang='en'>
<head>
<meta charset="utf-8">
<title>HVMR | Add Report Success</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Hind:400,300,700" rel="stylesheet" type="text/css">
<link href="../stylesheets/screen.css" rel="stylesheet" type="text/css">
</head>

<body>
<header>
<div class="container">
        <h1>HVMR</h1>
        <p>A Database for a Research Inventory in the Hudson/Mohawk Watershed</p>
 
        <button type="submit" onClick="window.open('../logout.php','_self')">Log-out</button>

    </div>
</header>
<main>
    <section>
    	<aside>
            <nav>
                <ul>
                    <li><a href="../index.php">Search</a></li>
                    <li><a href="../view-all.php">View All</a></li>
                    <li><a href="edit.php" class="selected">Edit</a>
                    
                    <ul>
                    <li><a href="add-report.php" >Add Report</a></li>
                    <li><a href="update.php">Update Report</a></li>
                    <li><a href="delete.php">Delete Report</a></li>
                 </ul>
                    
                    
                    
                    </li>
                   
                 </ul>
                 
             </nav>
         </aside>
                 <div class="content">
        	<h2>Logged in as: <?php echo $_SESSION['login_user'] ?></h2>
            
            <h3>Report added</h3>
            
           <?php 
		   //DISPLAY REPORT ADDED
		   
		   //Test connection
			if(mysqli_connect_errno()){
				die("Database connection failed:" . mysqli_connect_error() . "(" . mysqli_connect_errno() . ")" );
			};
					   
		   
			   
			$report = $_SESSION["report"];
		  
		   //Query users choice
			$sql = "SELECT * FROM `reports` WHERE `project_title` = '$report' ";
			$result = mysqli_query($db, $sql);
			
			//Check Query
			if(!$result){
				die("Database query failed.");
			}
		   
		   	$row = mysqli_fetch_assoc($result);
			
		
			echo '<p><strong>Catgory:</strong> '.$row['category'].'</p>';
			echo '<p><strong>Project Location:</strong> '.$row['project_loc'].'</p>';
			echo '<p><strong>Project Title:</strong> '.$row['project_title'].'</p>';
			echo '<p><strong>Institution:</strong> '.$row['insitution'].'</p>';
			echo '<p><strong>Department:</strong> '.$row['department'].'</p>';
			echo '<p><strong>Project Description:</strong><br> '.$row['project_desc'].'</p>';
			echo '<p><strong>Paper Url:</strong> '.$row['paper_url'].'</p>';
			echo '<p><strong>Published:</strong> '.$row['published'].'</p>';
			echo '<p><strong>Citation:</strong> '.$row['citation'].'</p>';
			echo '<p><strong>Poster:</strong> '.$row['poster'].'</p>';
			echo '<p><strong>Poster Url:</strong> '.$row['poster_url'].'</p>';
			echo '<p><strong>Internal Paper:</strong> '.$row['internal_paper'].'</p>';
			echo '<p><strong>Paper Contact:</strong> '.$row['paper_contact'].'</p>';
			echo '<p><strong>Paper Email:</strong> '.$row['paper_email'].'</p>';
			echo '<p><strong>Comments:</strong><br>'.$row['comments'].'</p>';
			
		
		   ?>
            
            </form>
        </div>
    </section>
</main>
<footer>
<?php include '../includes/footer.php'; ?>
</footer>
</body>
</html>
<?php
mysqli_close($db);
?>