<?php
	@session_start();
	session_destroy();
	//header("Location: ../index.php");
	Header("Location: ../index.php?logout=si");

 ?>
