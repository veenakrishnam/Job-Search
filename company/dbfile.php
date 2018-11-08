<?php
	$dblink = mysqli_connect('localhost','root','');

	if ($dblink) {
		$dbselected = mysqli_select_db($dblink,'jobsearch');
	}
?>