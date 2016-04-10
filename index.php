<?php

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
<!-- Test -->
    <section class="container">
    <div style="flex:2;min-width:200px">
    <h1>HVMR</h1>
        <p>A Database for a Research Inventory in the Hudson/Mohawk Watershed</p>
        </div>
        <div style="flex:1;min-width:200px">
        <button type="button" onClick="window.open('login.php','_self')">Log-in</button>
        <button type="button" onClick="window.open('register.php','_self')">Register</button>
    </div>
    </section>
</header>
<main>
    <section>
    	<aside>
            <nav>
                <ul>
                    <li><a href="#" class="selected">Search</a></li>
                    <li><a href="view-all.php">View All</a></li>
                    <li><a href="reports.php">Reports</a></li>
                 </ul>
             </nav>
         </aside>
        <div class="content">
        	<h2>Select search criteria</h2>
            <form action="">
                <select name="criteria" id="">
                <option value=""></option>
                
                    <option value="catname">Category Name</option>
                    <option value="comments">Comments</option>
                    <option value="citation">Complete cittation of paper</option>
                    <option value="department">Department</option>
                    <option value="description">Description</option>
                    <option value="email">Email</option>
                    <option value="emailinternal">Email address for internal paper contact</option>
                    <option value="institution">Institution</option>
                    <option value="internalpaper">Internal Paper</option>
                    <option value="name">Name</option>
                    <option value="contactname">Name of contact for internal paper</option>
                    <option value="poster">Poster</option>
                    <option value="published">Published</option>
                    <option value="stateCounty">State, County</option>
                    <option value="title">Title of Resarch or Project</option>
                    <option value="url">URL of paper</option>
                    <option value="urlpost">URL of Poster</option>
                    <option value="year">Year</option>
                </select>
                <input type="text" placeholder="search">
                <input type="submit" value="Submit">
            </form>
        </div>
    </section>
</main>
<footer>
<div class="container">
<p>&copy;<?php echo date('Y')?> HVMR. All rights reserved.</p>
</div>
</footer>
</body>
</html>
