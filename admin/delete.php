<?php
require '../includes/session.php';
require '../includes/config.php';
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>HVMR | Delete a Report</title>
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
                    <li><a href="add-report.php" >Add Report</a></li>
                    <li><a href="update.php">Update Report</a></li>
                    <li><a href="delet.php">Delete Report <strong>&gt;</strong></a></li>
                 </ul>
                    
                    
                    
                    </li>
               
                 </ul>
                 
             </nav>
         </aside>
        <div class="content">
        	<h2>Logged in as: <?php echo $_SESSION['login_user'] ?></h2>
            <h3>Select report title to delete:</h3>
           
           	<p style="color:red;font-weight:bold">The deletion of a report is permanent and can not be undone. The next screen will ask you to confirm the deletion</p>
           	
            <form action="delete-confirm.php" method="post">
            <select name="projects" id="">
            <option value=""></option>
            <?php
            
            //Test connection
			if(mysqli_connect_errno()){
				die("Database connection failed:" . mysqli_connect_error() . "(" . mysqli_connect_errno() . ")" );
			};
			
			//Query to populate select
			$sql = "SELECT `project_title` FROM `reports`";
			$result = mysqli_query($db, $sql);
			
			//Check Query
			if(!$result){
				die("Database query failed.");
			}//END IF
			
			
			while($row = mysqli_fetch_assoc($result)){
				
				echo "<option value='".$row['project_title']."'>".$row['project_title']."</option>";
				
			}//END WHILE
          ?>
            </select>
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