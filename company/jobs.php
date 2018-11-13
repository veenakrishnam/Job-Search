<?php
    include 'dbfile.php';

    session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Job Search</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Sweetalert Css -->
    <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
    <?php
        if (!($_SESSION['company_id'])) {
            $script = "<script> window.location.href = 'signin.php' </script>";
            echo $script;
        }

        $company_id = $_SESSION['company_id'];

        $sql_company = "SELECT * FROM company WHERE id = '$company_id'";
        $result_company = mysqli_query($dblink, $sql_company);

        while ($data_company = mysqli_fetch_array($result_company)) {
            $company_name = $data_company['company_name'];
        }
    ?>
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                `<a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html">JOB SEARCH</a>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $company_name ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="about.php"><i class="material-icons">person</i>About</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="signout.php"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="index.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="jobs.php">
                            <i class="material-icons">business_center</i>
                            <span>Jobs</span>
                        </a>
                    </li>
                    <li>
                        <a href="registeredstudent.php">
                            <i class="material-icons">assignment_turned_in</i>
                            <span>Registered Students</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
        <!-- Tabs With Icon Title -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                JOBS
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="add_job.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="add_job.php">Add Job</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs tab-col-teal" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#active_jobs" data-toggle="tab">
                                        <i class="material-icons">accessibility</i> Active Jobs
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#archived_jobs" data-toggle="tab">
                                        <i class="material-icons"> stars</i> Archived Jobs
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="active_jobs">
                                    <p>
                                        <?php
                                            $sql_active_job = "SELECT * FROM job WHERE status = 'active' AND company_id = '$company_id'";
                                            $result_active_job = mysqli_query($dblink, $sql_active_job);

                                            while ($data_active_job = mysqli_fetch_array($result_active_job)) {
                                                $job_id = $data_active_job['id'];
                                                $title = $data_active_job['title'];
                                                $position = $data_active_job['position'];
                                                $qualification = $data_active_job['qualification'];
                                                $branch = $data_active_job['branch'];
                                                $job_location = $data_active_job['job_location'];
                                                $batch = $data_active_job['batch'];
                                                $percentage = $data_active_job['percentage'];
                                                $skills = $data_active_job['skills'];
                                                $salary = $data_active_job['salary'];
                                                $process = $data_active_job['process'];
                                                $venue = $data_active_job['venue'];
                                                $date_time = $data_active_job['date_time'];
                                        ?>    
                                        <!-- Basic Example -->
                                        <div class="row clearfix js-sweetalert">
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="card">
                                                    <div class="header bg-teal">
                                                        <h2>
                                                            <?php echo $title; ?> <small><?php echo $date_time; ?></small>
                                                        </h2>
                                                        <ul class="header-dropdown m-r-0">
                                                            <li>
                                                                <div class="row clearfix js-sweetalert">
                                                                    <a data-type="show-message" data-title="Are you sure you want to move this to archived jobs ?" data-confirm-button-text="Yes, move it" data-confirm-button-color="4BC283" data-confirm-text="The record has been moved." <?php echo "data-url=\"archivejobs.php?id=".$job_id."\"" ?> href="javascript:void(0);">
                                                                        <i class="material-icons">input&nbsp; &nbsp;</i>
                                                                    </a>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <a data-type="show-message" data-title="Are you sure you want to delete ?" data-confirm-button-text="Yes, delete it" data-confirm-button-color="DD6B55" data-confirm-text="The record has been deleted."<?php echo "data-url=\"deletejob.php?id=".$job_id."\""?> href="javascript:void(0);">
                                                                    <i class="material-icons"> &nbsp;delete</i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="body">
                                                        <!-- Basic Table -->
                                                        <div class="row clearfix">
                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                <div class="body table-responsive">
                                                                    <table class="table">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Position</td>
                                                                                <td><?php echo $position; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Qualification</td>
                                                                                <td><?php echo $qualification; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Branch</td>
                                                                                <td><?php echo $branch; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Job Location</td>
                                                                                <td><?php echo $job_location; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Batch</td>
                                                                                <td><?php echo $batch; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Percentage</td>
                                                                                <td><?php echo $percentage; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Skills</td>
                                                                                <td><?php echo $skills; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Salary</td>
                                                                                <td><?php echo $salary; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Process</td>
                                                                                <td><?php echo $process; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Venue</td>
                                                                                <td><?php echo $venue; ?></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- #END# Basic Table -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- #END# Basic Example -->
                                        <?php
                                            }
                                        ?>
                                    </p>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="archived_jobs">
                                    <p>
                                        <?php
                                            $sql_active_job = "SELECT * FROM job WHERE status = 'archived' AND company_id = '$company_id'";
                                            $result_active_job = mysqli_query($dblink, $sql_active_job);

                                            while ($data_active_job = mysqli_fetch_array($result_active_job)) {
                                                $job_id = $data_active_job['id'];
                                                $title = $data_active_job['title'];
                                                $position = $data_active_job['position'];
                                                $qualification = $data_active_job['qualification'];
                                                $branch = $data_active_job['branch'];
                                                $job_location = $data_active_job['job_location'];
                                                $batch = $data_active_job['batch'];
                                                $percentage = $data_active_job['percentage'];
                                                $skills = $data_active_job['skills'];
                                                $salary = $data_active_job['salary'];
                                                $process = $data_active_job['process'];
                                                $venue = $data_active_job['venue'];
                                                $date_time = $data_active_job['date_time'];
                                        ?>    
                                        <!-- Basic Example -->
                                        <div class="row clearfix js-sweetalert">
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="card">
                                                    <div class="header bg-blue-grey">
                                                        <h2>
                                                            <?php echo $title; ?> <small><?php echo $date_time; ?></small>
                                                        </h2>
                                                        <ul class="header-dropdown m-r-0">
                                                            <li>
                                                                <a data-type="show-message" data-title="Are you sure you want to delete ?" data-confirm-button-text="Yes, delete it" data-confirm-button-color="DD6B55" data-confirm-text="The record has been deleted."<?php echo "data-url=\"deletejob.php?id=".$job_id."\""?> href="javascript:void(0);">
                                                                    <i class="material-icons"> &nbsp;delete</i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="body">
                                                        <!-- Basic Table -->
                                                        <div class="row clearfix">
                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                <div class="body table-responsive">
                                                                    <table class="table">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Position</td>
                                                                                <td><?php echo $position; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Qualification</td>
                                                                                <td><?php echo $qualification; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Branch</td>
                                                                                <td><?php echo $branch; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Job Location</td>
                                                                                <td><?php echo $job_location; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Batch</td>
                                                                                <td><?php echo $batch; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Percentage</td>
                                                                                <td><?php echo $percentage; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Skills</td>
                                                                                <td><?php echo $skills; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Salary</td>
                                                                                <td><?php echo $salary; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Process</td>
                                                                                <td><?php echo $process; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Venue</td>
                                                                                <td><?php echo $venue; ?></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- #END# Basic Table -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- #END# Basic Example -->
                                        <?php
                                            }
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Tabs With Icon Title -->
        </div>
    </section>
     <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Bootstrap Notify Plugin Js -->
    <script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- SweetAlert Plugin Js -->
    <script src="plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/ui/dialogs.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
</body>
</html>