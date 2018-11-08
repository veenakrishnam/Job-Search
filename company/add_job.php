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

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="plugins/waitme/waitMe.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

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
                </ul>
            </div>
            <!-- #Menu -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>


    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>JOBS</h2>
                <ol class="breadcrumb breadcrumb-col-teal">
                    <li><a href="jobs.php"><i class="material-icons">business_center</i> Jobs</a></li>
                    <li class="active"><i class="material-icons">library_books</i> Add Job</li>
                </ol>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Add Job
                            </h2>
                        </div>
                        <div class="body">
                            <form method="post">
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group form-float form-group-lg">
                                            <div class="form-line">
                                                <input name="title" type="text" class="form-control" required>
                                                <label class="form-label">Job Title</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input name="position" type="text" class="form-control" required>
                                                <label class="form-label">Position</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <p>Qualification</p>
                                        <select name="qualification" class="form-control show-tick" required>
                                            <option value="">-- Please select --</option>
                                            <option value="BE">BE</option>
                                            <option value="B.Tech">B.Tech</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <p>Branch</p>
                                        <select name="branch[]" class="form-control show-tick" multiple required>
                                            <option value="">-- Please select --</option>
                                            <option value="CSE">CSE</option>
                                            <option value="ISE">ISE</option>
                                            <option value="ECE">ECE</option>
                                            <option value="EEE">EEE</option>
                                            <option value="MECH">MECH</option>
                                            <option value="CIV">CIV</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input name="job_location" type="text" class="form-control" required>
                                                <label class="form-label">Job Location</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input name="batch" type="text" class="form-control" required>
                                                <label class="form-label">Batch</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input name="percentage" type="number" class="form-control" required>
                                                <label class="form-label">Percentage</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input name="skills" type="text" class="form-control" required>
                                                <label class="form-label">Skills</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input name="salary" type="text" class="form-control" required>
                                                <label class="form-label">Salary</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input name="process" type="text" class="form-control" required>
                                                <label class="form-label">Process</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input name="venue" type="text" class="form-control" required>
                                                <label class="form-label">Venue</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <p>Date and Time</p>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name="date_time" type="text" class="datetimepicker form-control" placeholder="Please choose date & time..." required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <button name="add_job" class="btn btn-primary waves-effect" type="submit">ADD JOB</button>
                                    </div>
                                </div>
                            </form>
                            <?php
                                $title = false;
                                if (isset($_POST['title'])) {
                                    $title = $_POST['title'];
                                }

                                $position = false;
                                if (isset($_POST['position'])) {
                                    $position = $_POST['position'];
                                }

                                $qualification = false;
                                if (isset($_POST['qualification'])) {
                                    $qualification = $_POST['qualification'];
                                }

                                $branch = false;
                                $branch_selected = false;
                                if (isset($_POST['branch'])) {
                                    foreach ($_POST['branch'] as $branch) {
                                        if ($branch_selected == false) {
                                            $branch_selected = $branch;
                                        }
                                        else{
                                            $branch_selected = $branch_selected . " / " . $branch;
                                        }
                                    }
                                }

                                $job_location = false;
                                if (isset($_POST['job_location'])) {
                                    $job_location = $_POST['job_location'];
                                }

                                $batch = false;
                                if (isset($_POST['batch'])) {
                                    $batch = $_POST['batch'];
                                }

                                $percentage = false;
                                if (isset($_POST['percentage'])) {
                                    $percentage = $_POST['percentage'];
                                }

                                $skills = false;
                                if (isset($_POST['skills'])) {
                                    $skills = $_POST['skills'];
                                }

                                $salary = false;
                                if (isset($_POST['salary'])) {
                                    $salary = $_POST['salary'];
                                }

                                $process = false;
                                if (isset($_POST['process'])) {
                                    $process = $_POST['process'];
                                }

                                $venue = false;
                                if (isset($_POST['venue'])) {
                                    $venue = $_POST['venue'];
                                }

                                $date_time = false;
                                if (isset($_POST['date_time'])) {
                                    $date_time = $_POST['date_time'];
                                }

                                if ($title != '') {
                                    if (isset($_POST['add_job'])) {
                                        $sql_add_job = "INSERT INTO job (title , position , qualification , branch , job_location , batch , percentage , skills , salary , process , venue , date_time , status , company_id) VALUES ('$title' , '$position' , '$qualification' , '$branch_selected' , '$job_location' , '$batch' , '$percentage' , '$skills' , '$salary' , '$process' , '$venue' , '$date_time' , 'active' , '$company_id')";
                                        $resut_add_job = mysqli_query($dblink, $sql_add_job);

                                        if ($resut_add_job) {
                                            $script = "<script> window.location.href = 'jobs.php' </script>";
                                            echo $script;
                                        }
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Input -->
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

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Autosize Plugin Js -->
    <script src="plugins/autosize/autosize.js"></script>

    <!-- Moment Plugin Js -->
    <script src="plugins/momentjs/moment.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/forms/basic-form-elements.js"></script>
    <script src="js/pages/forms/form-validation.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>

    <!-- Jquery Spinner Plugin Js -->
    <script src="plugins/jquery-spinner/js/jquery.spinner.js"></script>

</body>

</html>
