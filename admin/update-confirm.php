<?php
require '../includes/session.php';
require '../includes/config.php';

				
				//SET VARIABLES
				$id = intval($_POST['id']);
				$inst = $_POST['institution'];
				$name = $_POST['name'];
				$email = $_POST['email'];
				$dept = $_POST['department'];
				$title = $_POST['project_title'];
				$desc = $_POST['project_desc'];
				$loc = $_POST['project_loc'];
				$cat = $_POST['category'];
				$pub = $_POST['published'];
				$purl = $_POST['paper_url'];
				$cite = $_POST['citation'];
				$poster = $_POST['poster'];
				$posturl = $_POST['poster_url'];
				$paper = $_POST['internal_paper'];
				$papercon = $_POST['paper_contact'];
				$paperemail = $_POST['paper_email'];
				$com = $_POST['comments'];
				
				
				//ESCAPE STRINGS
				$id = mysqli_real_escape_string($db, $id);
				$inst = mysqli_real_escape_string($db, $inst);
				$name = mysqli_real_escape_string($db, $name);
				$email = mysqli_real_escape_string($db, $email);
				$dept = mysqli_real_escape_string($db, $dept);
				$title = mysqli_real_escape_string($db, $title);
				$desc = mysqli_real_escape_string($db, $desc);
				$loc = mysqli_real_escape_string($db, $loc);
				$cat = mysqli_real_escape_string($db, $cat);
				$pub = mysqli_real_escape_string($db, $pub);
				$purl = mysqli_real_escape_string($db, $purl);
				$cite = mysqli_real_escape_string($db, $cite);
				$poster = mysqli_real_escape_string($db, $poster);
				$posturl = mysqli_real_escape_string($db, $posturl);
				$paper = mysqli_real_escape_string($db, $paper);
				$papercon = mysqli_real_escape_string($db, $papercon);
				$paperemail = mysqli_real_escape_string($db, $paperemail);
				$com = mysqli_real_escape_string($db, $com);
				
				
		$update = "UPDATE reports 
					SET institution = '{$inst}',
						 name = '{$name}',
						 email = '{$email}',
						 department = '{$dept}',
						 project_title = '{$title}',
						 project_desc = '{$desc}',
						 project_loc = '{$loc}',
						 category = '{$cat}',
						 published = '{$pub}',
						 paper_url = '{$purl}',
						 citation = '{$cite}',
						 poster = '{$poster}',
						 poster_url = '{$posturl}',
						 internal_paper = '{$paper}',
						 paper_contact = '{$papercon}',
						 paper_email = '{$paperemail}',
						 comments = '{$com}'
					WHERE `id` = $id ";
			

if (mysqli_query($db, $update)) {
    $err = $title." Record updated successfully ".date("m/d/Y");
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
	
		
			
			



?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>HVMR | Update Confirmation</title>
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
        
   			<h3><?php echo $err ?></h3>
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