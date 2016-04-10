<?php
// Start the session
session_start();

//Open Connection
//$db = mysqli_connect('localhost','root','root','hvmr');
$db = mysqli_connect('localhost','enriquep_admin','Cp121872*','enriquep_hvmr');

//Test connection
if(mysqli_connect_errno()){
	die("Database connection failed:" . mysqli_connect_error() . "(" . mysqli_connect_errno() . ")" );
};


if(isset($_POST['submit'])){
	//Query exisiting user
	$usr = 'SELECT email, password FROM register';
	$result = mysqli_query($db, $usr);
	
	//Check Query
	if(!$result){
		die("Database query failed.");
	}
	
	//Set variables
	$email = $_POST['usrnm'];
	$pswrd = $_POST['pswrd'];
	$_SESSION["greet"] = $email;

//Check username field

	//Fetch rows
	while($row = mysqli_fetch_assoc($result)){
			//Check if user exists
			if ($row['email'] == $email && $row['password'] == $pswrd){
				$usrexist = true;
			}else{ 
				$usrexist = false;
			}
			
	}//End while	
		
			//release previous query
		//	mysqli_free_result();
		
			if($usrexist == true){
				
				//Escape string characters before inserting
				$email = mysqli_real_escape_string($db, $_POST['usrnm']);
				$pswrd = mysqli_real_escape_string($db, $_POST['pswrd']);
				
				//Insert new user
				$usrlog = "INSERT INTO login (email, password) VALUES ('$email','$pswrd')";
				$result = mysqli_query($db, $usrlog);
				
				//Check Query
				if(!$result)
					die("Database insert query failed.");
				else
					header('Location: admin.php');
				
				
			}else{
				$usrmsg = 'Username/password not found.';
			}
				
}//End if

?>
<html>
<head>

<title>HVMR</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="stylesheets/screen.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
var msg, display, submitBtn;



window.onload = function(){
	submitBtn = document.getElementById('submit');
	submitBtn.disabled = true;
	
}

function usrName(u){
	
	var checkusr = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
	display = document.getElementById('usrmsg');
	
	if(u.match(checkusr)){
		
		msg = display.innerHTML = '';
		
		return msg;
	} else {
		display.style.color = 'red';
		msg = display.innerHTML = 'Incorrect username';
		
		return msg;
	}
	
} 

function pswrdChk(p){
	
	var checkpswd = /^[A-Z]{1}[a-zA-z0-9]{6,12}/g;
	display = document.getElementById('pswdmsg');
	
	if(p.match(checkpswd)){
		
		msg = display.innerHTML = '';
		
		return msg;
	} else {
		display.style.color = 'red';
		msg = display.innerHTML = 'Incorrect password';
		
		return msg;
	}
	
	
} 

function validateFld(){
	var count = 0;
	var uname = document.getElementById('usrnm');
	var pword = document.getElementById('pswrd'); 
	
	
		
		if(uname.value == '' || pword.value == ''){
			count++;
		}else {
			count = 0;
		}

	
	if(count == 0){
		submitBtn.disabled = false;
	}
	
}//End function


	

</script>
</head>

<body>
<header>

    <div class="container">
        <h1>HVMR</h1>
        <p>A Database for a Research Inventory in the Hudson/Mohawk Watershed</p>
    </div>
</header>
<main>
    <section>
    	<aside>
            <nav>
                <ul>
                    <li><a href="index.php">Search</a></li>
                    <li><a href="view-all.php">View All</a></li>
                    <li><a href="reports.php">Reports</a></li>
                 </ul>
             </nav>
         </aside>
        <div class="content">
        	<h2>Log-in</h2>
            <span><?php echo $usrmsg ?></span>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
              	<input type="text" name="usrnm" id="usrnm" placeholder="username" onKeyUp="validateFld()"  onKeyPress="usrName(this.value)" autofocus autocomplete="off">
                <span id="usrmsg"></span>
                <input name="pswrd" maxlength="12" type="password" id="pswrd" placeholder="password" onKeyPress="pswrdChk(this.value)" onKeyUp="validateFld()">
                 <span id="pswdmsg"></span>
                <input type="submit" id="submit" name="submit" value="Log-in">
            </form>
        </div>
    </section>
</main>
<footer>
<div class="container">
<p>&copy;<?php echo date('Y'); ?> HVMR. All rights reserved.</p>
</div>
</footer>

</body>
</html>
<?php
mysqli_close($db);
?>