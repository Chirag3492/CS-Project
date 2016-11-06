<?php 
session_start();
require 'includes/config.php';

?>
<html>
<head>
<title>HVMR</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
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

		<button type="button" onClick="window.open('login.php','_self')">Log-in</button>
        
		
		<?php }else{ ?>
        
        
        <button type="submit" onClick="window.open('logout.php','_self')">Log-out</button>
        
        <?php } ?>
        <button type="button" onClick="window.open('register.php','_self')">Register</button>
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
        <p style="line-height:150%;">The mission of the Environmental Consortium of Colleges & Universities is to harness higher education’s intellectual and physical resources to advance regional, ecosystem-based environmental research, teaching, and learning with a special emphasis on the greater Hudson-Mohawk River watershed.</p>
        	<h2 style="margin-top:20px;">Select search criteria</h2>
            <form action="search-results.php" method="post">
                <select name="criteria">
                
                
                    <option value="selectField"> Select a field</option>
                    <option value="institution">Institution</option>
                    <option value="fname">Last Name</option>
                    <option value="lname">First Name</option>
                    <option value="email">Email</option>
                    <option value="year">Year</option>
                    <option value="department">Department</option>
                    <option value="titleOfRes">Title of Research or Project</option>
                    <option value="description">Description</option>
                    <option value="state">State</option>  
                    <option value="county">County</option>
                    <option value="category">Category</option>
                    <option value="pubPosInter">Published, Poster, Internal Paper</option>
                    <option value="url">URL of paper</option>
                    <option value="citation">Complete citation of paper</option>
                    <option value="comment">Comments</option>
                    
                </select>
                <input type="text" name="search"> 
                <button name="submit" type="submit">submit</button>
            </form>
        </div>
    </section>
</main>
<footer>
<?php include 'includes/footer.php' ?>
</footer>
</body>
</html>
