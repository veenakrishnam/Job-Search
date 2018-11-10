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
        if (!($_SESSION['student_id'])) {
            $script = "<script> window.location.href = 'signin.php' </script>";
            echo $script;
        }

        $student_id = $_SESSION['student_id'];

        $sql_student = "SELECT * FROM Student WHERE id = '$student_id'";
        $result_student = mysqli_query($dblink, $sql_student);

        while ($data_student = mysqli_fetch_array($result_student)) {
            $student_name = $data_student['student_name'];
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
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
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
                    <img src="images/user1.jpg" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $student_name ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>About</a></li>
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
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">domain</i>
                            <span>Company</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="company.php">
                                    <span>View Company</span>
                                </a>
                            </li>
                            <li>
                                <a href="viewcompanyjob.php">
                                    <span>View Company Jobs</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
        	<?php
                if (isset($_SESSION['success_register_message'])) {
                    if ($_SESSION['success_register_message'] == "Yes") {
                        ?>
                        <script type="text/javascript">
                            window.onload = function() {
                                document.getElementById("mybutton").click();
                            }
                        </script>
                        <div class="row clearfix jsdemo-notification-button">
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-2">
                                <button type="button" id="mybutton" style="display: none;" data-text="You have successfully registered for this event" class="btn bg-deep-orange btn-block waves-effect" data-placement-from="bottom" data-placement-align="left" data-animate-enter="animated zoomInLeft" data-animate-exit="animated zoomOutLeft" data-color-name="bg-deep-orange">FADE IN/OUT DOWN</button>
                            </div>
                        </div>
                        <?php
                    }
                    $_SESSION['success_register_message'] = "false";
                }
            ?>
        	<!-- Tabs With Icon Title -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
			           	<div class="body">
			                <!-- Nav tabs -->
			                <ul class="nav nav-tabs tab-col-teal" role="tablist">
			                    <li role="presentation" class="active">
			                        <a href="#active_jobs" data-toggle="tab">
			                            <i class="material-icons">accessibility</i> Active Jobs
			                        </a>
			                    </li>
			                    <li role="presentation">
			                        <a href="#registered_jobs" data-toggle="tab">
			                            <i class="material-icons"> assignment_turned_in</i> Registered Jobs
			                        </a>
			                    </li>
			                </ul>
			                <!-- Tab panes -->
			                <div class="tab-content">
			                    <div role="tabpanel" class="tab-pane fade in active" id="active_jobs">
			                        <p>
			                            <?php
			                                $sql_active_job = "SELECT * FROM job";
			                                $result_active_job = mysqli_query($dblink, $sql_active_job);

			                                while ($data_active_job = mysqli_fetch_array($result_active_job)) {
			                                    $job_id = $data_active_job['id'];
			                                    $company_id = $data_active_job['company_id'];
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

			                                    $sql_register_check = "SELECT * FROM job_register WHERE job_id = '$job_id' AND student_id = '$student_id'";
			                                    $result_register_check = mysqli_query($dblink, $sql_register_check);

			                                    $flag_register_check = 0;
			                                    while ($data_register_check = mysqli_fetch_array($result_register_check)) {
			                                        if (mysqli_num_rows($result_register_check)) {
			                                        	$flag_register_check = 1;
			                                        }
			                                    }

			                                    if ($flag_register_check == 0) { 
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
			                                                        <a data-type="show-message" data-title="Are you sure you want to register to this event ?" data-confirm-button-text="Yes, register" data-confirm-button-color="4BC283" data-confirm-text="You have has been registered successfully." <?php echo "data-url=\"registerjob.php?id=".$job_id."&company_id=".$company_id."\"" ?> href="javascript:void(0);">
			                                                            <i class="material-icons">assignment_turned_in&nbsp; &nbsp;</i>
			                                                        </a>
			                                                    </div>
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
			                                }
			                            ?>
			                        </p>
			                    </div>
			                    <div role="tabpanel" class="tab-pane fade in" id="registered_jobs">
			                        <p>
			                            <?php
			                                $sql_active_job = "SELECT * FROM job";
			                                $result_active_job = mysqli_query($dblink, $sql_active_job);

			                                while ($data_active_job = mysqli_fetch_array($result_active_job)) {
			                                    $job_id = $data_active_job['id'];
			                                    $company_id = $data_active_job['company_id'];
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

			                                    $sql_register_check = "SELECT * FROM job_register WHERE job_id = '$job_id' AND student_id = '$student_id'";
			                                    $result_register_check = mysqli_query($dblink, $sql_register_check);

			                                    $flag_register_check = 0;
			                                    while ($data_register_check = mysqli_fetch_array($result_register_check)) {
			                                        if (mysqli_num_rows($result_register_check)) {
			                                        	$flag_register_check = 1;
			                                        }
			                                    }

			                                    if ($flag_register_check == 1) { 
			                            ?> 
			                            <!-- Basic Example -->
			                            <div class="row clearfix js-sweetalert">
			                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
			                                    <div class="card">
			                                        <div class="header bg-teal">
			                                            <h2>
			                                                <?php echo $title; ?> <small><?php echo $date_time; ?></small>
			                                            </h2>
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
			                                }
			                            ?>
			                        </p>
			                    </div>
			                </div>
			           </div>
			       </div>
			   </div>
			</div>
        </div>
    </section>

   <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Notify Plugin Js -->
    <script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="plugins/flot-charts/jquery.flot.js"></script>
    <script src="plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- SweetAlert Plugin Js -->
    <script src="plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/ui/dialogs.js"></script>
    <script src="js/pages/ui/notifications.js"></script>
    <script src="js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
</body>
</html>
