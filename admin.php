<?php
session_start();
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

    <div class="container">
        <h1>HVMR</h1>
        <p>A Database for a Research Inventory in the Hudson/Mohawk Watershed</p>
        <button type="submit" onClick="window.open('index.php','_self')">Log-out</button>
    </div>
</header>
<main>
    <section>
    	<aside>
            <nav>
                <ul>
                    <li><a href="index.php">Search</a></li>
                    <li><a href="view-all.php">View All</a></li>
                    <li><a href="edit.php">Edit</a></li>
                    <li><a href="reports.php">Reports</a></li>
                 </ul>
                 
             </nav>
         </aside>
        <div class="content">
        	<h2>Logged in as: <?php echo $_SESSION["greet"] ?></h2>
            
        </div>
    </section>
</main>
<footer>
<div class="container">
<p>&copy; <?php echo date('Y')?> HVMR. All rights reserved.</p>
</div>
</footer>
</body>
</html>
