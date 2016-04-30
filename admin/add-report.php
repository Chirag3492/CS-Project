<?php
require '../includes/session.php';
require '../includes/config.php';

//Test connection
if(mysqli_connect_errno()){
	die("Database connection failed:" . mysqli_connect_error() . "(" . mysqli_connect_errno() . ")" );
};

if(isset($_POST['submit'])){
//Set variables
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
	
				
				//Escape string characters before inserting
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
				
				//Insert new user
				$report = "INSERT INTO reports (institution,name,email,department,project_title,project_desc,project_loc,category,published,paper_url,citation,poster,poster_url,internal_paper,paper_contact,paper_email,comments) VALUES ('$inst','$name','$email','$dept','$title','$desc','$loc','$cat','$pub','$purl','$cite','$poster','$posturl','$paper','$papercon','$paperemail','$com')";
				$result = mysqli_query($db, $report);
				
				//Check Query
				if(!$result)
					die("Database insert query failed.");
				else
					header('Location: report-success.php');
					exit();
				
		
				
}//End if
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>HVMR | Add Report</title>
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
                    <li><a href="#" >Add Report</a></li>
                    <li><a href="#">Update Report</a></li>
                    <li><a href="#">Delete Report</a></li>
                 </ul>
                    
                    
                    
                    </li>
                    <li><a href="#">Reports</a></li>
                 </ul>
                 
             </nav>
         </aside>
        <div class="content">
        	<h2>Logged in as: <?php echo $_SESSION['login_user'] ?></h2>
            <h3>Add a report</h3>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" id="add">
            <input type="text" name="institution" placeholder="institution">
            <input type="text" name="name" placeholder="name">
            <input type="text" name="email" placeholder="email">
            <input type="text" name="department" placeholder="department">
            <input type="text" name="project_title" placeholder="project title">
            <input type="text" name="project_desc" placeholder="project description">
            <input type="text" name="project_loc" placeholder="project location">
            <input type="text" name="category" placeholder="category">
            <input type="text" name="published" placeholder="published">
            <input type="text" name="paper_url" placeholder="paper url">
            <input type="text" name="citation" placeholder="citation">
            <input type="text" name="poster" placeholder="poster">
            <input type="text" name="poster_url" placeholder="poster url">
            <input type="text" name="internal_paper" placeholder="internal paper">
            <input type="text" name="paper_contact" placeholder="paper contact">
            <input type="text" name="paper_email" placeholder="paper email">
            <textarea type="text" name="comments" placeholder="comments"></textarea>
            <button type="submit"  id="submit"  name="submit" >Submit</button>
            
            
            </form>
        </div>
    </section>
</main>
<footer>
<?php include '../includes/footer.php'; ?>
</footer>
</body>
</html>