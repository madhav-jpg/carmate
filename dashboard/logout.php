<?php
		session_start();
		if(isset($_SESSION['mob_num']))
		{		
			session_destroy();
		}
		header("Location:../index.php");
?>