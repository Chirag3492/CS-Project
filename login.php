<?php
  session_start();  
  require 'includes/config.php';
  
   
  if($_SERVER["REQUEST_METHOD"] == "POST")  {
      // username and password sent from form 
      
      $username = $_POST['usrnm'];
      $password = $_POST['pswrd']; 
      
      $sql = "SELECT userid FROM register WHERE email = '{$username}' and password = '{$password}'";
      $result = mysqli_query($db,$sql);
	  
	  
	  if(!$result){
			die("Database query failed.");
		}
		
		
      $row = mysqli_fetch_assoc($result);
	  
    //  $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
     //   session_register("username");
       	$_SESSION['login_user'] = $username;
        header("location: admin/index.php");
		
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
        	<h2>Log-in</h2>
            <span><?php echo $error ?></span>
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
<?php include 'includes/footer.php' ?>
</footer>

</body>
</html>
<?php
mysqli_close($db);
?>