<?php
require '../includes/session.php';
require '../includes/config.php';
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>HVMR | Update a Report</title>
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
                    <li><a href="edit.php" class="selected">Edit <strong>&gt;</strong></a>
                    
                    <ul>
                    <li><a href="add-report.php" >Add Report </a></li>
                    <li><a href="#">Update Report <strong>&gt;</strong></a></li>
                    <li><a href="delete.php">Delete Report</a></li>
                 </ul>
                    
                    
                    
                    </li>
               
                 </ul>
                 
             </nav>
         </aside>
        <div class="content">
        	<h2>Logged in as: <?php echo $_SESSION['login_user'] ?></h2>
            <h3><?php echo $_POST['projects'] ?></h3>
        
            <form action="update-confirm.php" method="post" name="update">
            <?php
				//Test connection
			if(mysqli_connect_errno()){
				die("Database connection failed:" . mysqli_connect_error() . "(" . mysqli_connect_errno() . ")" );
			};
			
			$report = $_POST['projects'];
			
			//Query to populate select
			$sql = "SELECT * FROM `reports` WHERE `project_title` = '$report'";
			$result = mysqli_query($db, $sql);
			
			//Check Query
			if(!$result){
				die("Database query failed.");
			}//END IF
			
			$row = mysqli_fetch_assoc($result);
			
			echo	'<input type="hidden" name="id" value="'.$row['id'].'" >';	
			echo	'<input type="text" name="institution" value="'.$row['institution'].'" >';
			echo	'<input type="text" name="name" value="'.$row['name'].'" >';
			echo	'<input type="text" name="email" value="'.$row['email'].'" >';
			echo	'<input type="text" name="department" value="'.$row['department'].'" >';
			echo	'<input type="text" name="project_title" value="'.$row['project_title'].'" >';
			echo	'<input type="text" name="project_desc" value="'.$row['project_desc'].'" >';
			echo	'<input type="text" name="project_loc" value="'.$row['project_loc'].'" >';
			echo	'<input type="text" name="category" value="'.$row['category'].'" >';
			echo	'<input type="text" name="published" value="'.$row['published'].'" >';
			echo	'<input type="text" name="paper_url" value="'.$row['paper_url'].'" >';
			echo	'<input type="text" name="citation" value="'.$row['citation'].'" >';
			echo	'<input type="text" name="poster" value="'.$row['poster'].'" >';
			echo	'<input type="text" name="poster_url" value="'.$row['poster_url'].'" >';
			echo	'<input type="text" name="internal_paper" value="'.$row['internal_paper'].'" >';
			echo	'<input type="text" name="paper_contact" value="'.$row['paper_contact'].'" >';
			echo	'<input type="text" name="paper_email" value="'.$row['paper_email'].'" >';
			echo	'<textarea type="text" name="comments" value="'.$row['comments'].'"></textarea>';
			
	
			
			?>
			
            
            <input type="submit" name="submit">
            
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