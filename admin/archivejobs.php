<?php

    session_start();



    require 'dbfile.php';

    if (!($_SESSION['company_id'])) {

        $script =  '<script type="text/javascript">';

        $script.= 'window.location.href = "signin.php"';

        $script.= '</script>';

        echo $script;

    }

    else

    {

        $company_id = $_SESSION['company_id'];


	    $id = $_GET['id'];



	    $sql = "UPDATE job SET status = 'archived' WHERE id = '$id'";

	    $result = mysqli_query($dblink, $sql);



	    if ($result) {


	    	$_SESSION['success_archived_message'] = "Yes";



		    $script =  '<script type="text/javascript">';

		    $script.= 'window.location.href = "jobs.php"';

		    $script.= '</script>';

		    echo $script;

	    }

    }

?>