<?php
	session_start();


	$_SESSION['admin_id'] = null;

	session_destroy();

	$script = "<script> window.location.href = 'signin.php' </script>";
    echo $script;
?>