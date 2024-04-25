<?php
		session_start();
		if(isset($_SESSION['adm_num']))
		{		
			session_destroy();
		}
		header("Location:../index.php");
?>