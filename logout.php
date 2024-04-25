<?php
		session_start();
		if(isset($_SESSION['mob_num']))
		{		
			session_destroy();
			// unset($_COOKIE['mob_num']); 
   //  		setcookie('mob_num', null, -1, '/'); 
		}
		header("Location:index.php");
?>