<?php

    session_start();



    require 'dbfile.php';

    if (!($_SESSION['student_id'])) {

        $script =  '<script type="text/javascript">';

        $script.= 'window.location.href = "signin.php"';

        $script.= '</script>';

        echo $script;

    }

    else

    {

        $job_id = $_GET['id'];

        $company_id = $_GET['company_id'];

        $student_id = $_SESSION['student_id'];


        $sql = "INSERT INTO job_register (company_id, job_id, student_id) VALUES ('$company_id', '$job_id', '$student_id')";

        $result = mysqli_query($dblink, $sql);



        if ($result) {


            $_SESSION['success_register_message'] = "Yes";



            $script =  '<script type="text/javascript">';

            $script.= 'window.location.href = "viewcompanyjob.php"';

            $script.= '</script>';

            echo $script;

        }

    }

?>