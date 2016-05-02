<?php
require '../includes/session.php';
require '../includes/config.php';
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>HVMR | Report Deleted</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Hind:400,300,700" rel="stylesheet" type="text/css">
<link href="../stylesheets/screen.css" rel="stylesheet" type="text/css">
<style type="text/css">

input[type="button"] {padding:15px 30px;
	font-weight:700px;
	background-color:$bkgcolor;
	border-radius:15px;
	color:$accentcolor;
	font-size:120%;
	border:1px solid $accentcolor;
	width:200px;
	cursor:pointer;
	}
</style>
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
                    <li><a href="edit.php" class="selected">Edit <strong>&gt;</strong></a>
                    
                    <ul>
                    <li><a href="add-report.php" >Add Report</a></li>
                    <li><a href="update.php">Update Report</a></li>
                    <li><a href="delete.php">Delete Report <strong>&gt;</strong></a></li>
                 </ul>
                    
                    
                    
                    </li>
               
                 </ul>
                 
             </nav>
         </aside>
        <div class="content">
        	<h2>Logged in as: <?php echo $_SESSION['login_user'] ?></h2>
            <h3>Following report has been deleted:</h3>
            <?php
			
					$report = $_SESSION['title'];
				
					//Query report to delete
					$sql = "DELETE FROM reports WHERE project_title = '$report'";
					$result = mysqli_query($db, $sql);	
					
					//Check Query
					if(!$result){
						die("Database query failed.");
					}
				
			?>
            <?php
			
			echo "<h2>".$_SESSION['title']."</h2>";
			
			?>
            
            
        </div>
    </section>
</main>
<footer>
<?php include '../includes/footer.php'; ?>
</footer>
</body>
</html><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
<?php
mysqli_close($db);
?>