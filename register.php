<?php

require 'includes/config.php';
// Start the session
session_start();

//Test connection
if(mysqli_connect_errno()){
	die("Database connection failed:" . mysqli_connect_error() . "(" . mysqli_connect_errno() . ")" );
};

if(isset($_POST['submit'])){
//Set variables
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['usrnm'];
$pswrd = $_POST['pswrd'];
$_SESSION["greet"] = $fname;	
	
//Query exisiting user
$exist = 'SELECT email FROM register';
$result = mysqli_query($db, $exist);

//Check Query
if(!$result){
	die("Database query failed.");
}



//Check username field

	//Fetch rows
	while($row = mysqli_fetch_assoc($result)){
			//Check if user exists
			if ($row['email'] == $email){
				$usrexist = true;
			}else{ 
				$usrexist = false;
			}
			
	}//End while	
		
			//release previous query
			mysqli_free_result();
		
			if($usrexist == false){
				
				//Escape string characters before inserting
				$fname = mysqli_real_escape_string($db, $fname);
				$lname = mysqli_real_escape_string($db, $lname);
				$email = mysqli_real_escape_string($db, $email);
				$pswrd = mysqli_real_escape_string($db, $pswrd);
				
				//Insert new user
				$newusr = "INSERT INTO register (fname, lname, email, password ) VALUES ('$fname','$lname','$email','$pswrd')";
				$result = mysqli_query($db, $newusr);
				
				//Check Query
				if(!$result)
					die("Database insert query failed.");
				else
					header('Location: register-success.php');
					exit();
				
			}else{
				$usrmsg = 'User Exists';
			}
				
}//End if

?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>HVMR</title>

<link href="stylesheets/screen.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
var msg, display, submitBtn;

var listener =	function(event){
		event.preventDefault();
	};

window.onload = function(){
	submitBtn = document.getElementById('submit');
	submitBtn.setAttribute('class', 'disabled');
	submitBtn.addEventListener('click', listener, false);
}


function usrName(u){
	
	var checkusr = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
	display = document.getElementById('usrmsg');
	
	if(!u.match(checkusr)){
		display.setAttribute('class','err');
		msg = display.textContent = 'Username must be a valid email';
	} else {
		display.removeAttribute('class');
		msg = display.textContent = '';
	}
	
} 

function pswrdChk(p){
	
	var checkpswd = /^[A-Z]{1}[a-zA-z0-9]{6,12}/g;
	display = document.getElementById('pswdmsg');
	
	if(!p.match(checkpswd)){
		
		display.setAttribute('class','err');
		msg = display.textContent = 'Password must be at least 8 characters and must start with a capital letter';
		
	} else {
		display.removeAttribute('class');
		msg = display.textContent = '';
		
	}
	
	
} 

function validateFld(){
	var count, i;
	var err = document.getElementsByTagName('input');
	debugger;
	for(i=0;i<err.length;i++){
		
		if(err[i].value == ''){
			return;
		} else {
			err[i].removeAttribute('class');
			submitBtn.removeEventListener('click',listener,false);
		}
		
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
               <?php include 'includes/main-nav.php'; ?>
             </nav>
         </aside>
        <div class="content">
        	<h2>Register</h2> 
            <span class="err"><?php echo $usrmsg;?></span>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" name="reg">
            
            <input type="text" name="fname" id="fname" placeholder="First Name" onblur="validateFld()" autofocus>
            
              <input type="text" name="lname" id="lname" placeholder="Last Name" onblur="validateFld()">
              
              	<input type="text" name="usrnm" id="usrnm" placeholder="username"  onkeypress="usrName(this.value)"  autocomplete="off" onblur="validateFld()" required>
               
                <span id="usrmsg"></span>
                
                <input name="pswrd" maxlength="12" type="password" id="pswrd" placeholder="password" onkeypress="pswrdChk(this.value)"  onblur="validateFld()" required>
                
                 <span id="pswdmsg"></span>
                 
               <button type="submit"  id="submit"  name="submit" onClick="validateFld()">Register</button>
            </form> 
        </div>
    </section>
</main>
<footer>
<?php include 'includes/footer.php' ?>
</footer>

</body>
</html>
<?php
mysqli_close($db);
?>