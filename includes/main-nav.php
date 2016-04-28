<?php


                
          echo     ' <ul>
                    <li><a href="index.php">Search</a></li>
                    <li><a href="view-all.php">View All</a></li>';
					
					if(isset($_SESSION['login_user'])){
                 echo   '<li><a href="admin/edit.php" >Edit</a>
                    </li>';
					}
            echo '<li><a href="#">Reports</a></li>
                 </ul>';
				 
				 
				 ?>