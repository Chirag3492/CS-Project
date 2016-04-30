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
        	<h2>Select search criteria</h2>
            <form action="search-results.php" method="post">
                <select name="criteria" id="">
                <option value=""></option>
                
                    <option value="category">Category Name</option>
                    <option value="comments">Comments</option>
                    <option value="citation">Complete cittation of paper</option>
                    <option value="department">Department</option>
                    <option value="proj_desc">Description</option>
                    <option value="email">Email</option>
                    <option value="paper_email">Email address for internal paper contact</option>
                    <option value="institution">Institution</option>
                    <option value="internal_paper">Internal Paper</option>
                    <option value="name">Name</option>
                    <option value="paper_contact">Name of contact for internal paper</option>
                    <option value="poster">Poster</option>
                    <option value="published">Published</option>
                    <option value="proj_loc">State, County</option>
                    <option value="project_title">Title of Resarch or Project</option>
                    <option value="project_url">URL of paper</option>
                    <option value="poster_url">URL of Poster</option>
                    
                </select>
                <input name="search" type="text" placeholder="search">
                <input name="submit" type="submit" value="Submit">
            </form>
        </div>
    </section>
</main>
<footer>
<?php include 'includes/footer.php' ?>
</footer>
</body>
</html>
