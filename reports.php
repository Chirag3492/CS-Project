<?php 
require 'includes/config.php';
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>HVMR</title>
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
        <button type="button" onClick="window.open('login.php','_self')">Log-in</button>
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
        	<h2>Reports </h2>
            
        </div>
    </section>
</main>
<footer>
<?php include 'includes/footer.php' ?>
</footer>
</body>
</html>
