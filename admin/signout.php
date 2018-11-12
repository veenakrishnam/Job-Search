<?php
	session_start();


	$_SESSION['company_id'] = null;

	session_destroy();

	$script = "<script> window.location.href = 'signin.php' </script>";
    echo $script;
?>