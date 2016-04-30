<?php
require '../includes/session.php';
?>

<html>
<head>
<title>HVMR</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Hind:400,300,700" rel="stylesheet" type="text/css">
<link href="../stylesheets/screen.css" rel="stylesheet" type="text/css">
</head>

<body>
<header>

    <div class="container">
        <h1>HVMR</h1>
        <p>A Database for a Research Inventory in the Hudson/Mohawk Watershed</p>
        <?php 
		
		if(isset($_SESSION['login_user'])) { ?>


        <button type="submit" onClick="window.open('../logout.php','_self')">Log-out</button>
		
		<?php } ?>
    </div>
</header>
<main>
    <section>
    	<aside>
            <nav>
                <ul>
                    <li><a href="../index.php">Search</a></li>
                    <li><a href="../view-all.php">View All</a></li>
                    <li><a href="#" class="selected">Edit</a>
                    
                    <ul>
                    <li><a href="add-report.php">Add Report</a></li>
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
            <h3>HVMR Admin</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi reiciendis vero possimus officia commodi impedit porro id praesentium dolores! Necessitatibus, aliquid, iste, possimus deleniti assumenda animi alias eum recusandae voluptatibus esse amet sit inventore laborum cupiditate adipisci dolor excepturi ullam officia delectus sapiente laboriosam aspernatur labore modi omnis asperiores error dignissimos cumque iure vel mollitia sunt eos incidunt at sint suscipit nulla quo sed. Reiciendis, corrupti, hic, magnam ducimus tenetur aut dolor voluptates autem sit veniam quas eos vitae mollitia soluta temporibus nulla quo sunt voluptas? Neque, ab, sed delectus in reprehenderit quod quidem sapiente maxime excepturi labore? Aspernatur, ea.</p>
        </div>
    </section>
</main>
<footer>
<?php include '../includes/footer.php'; ?>
</footer>
</body>
</html>
