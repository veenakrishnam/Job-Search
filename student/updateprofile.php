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
                    <img src="images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $student_name ?></div>
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
                    <li class="active">
                        <a href="index.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
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
            <div class="block-header">
                <h2>ABOUT</h2>
                <ol class="breadcrumb breadcrumb-col-teal">
                    <li><a href="about.php"><i class="material-icons">person</i> About</a></li>
                    <li class="active"><i class="material-icons">library_books</i> Update Profile</li>
                </ol>
            </div>
            <?php
                $sql_student = "SELECT * FROM student WHERE id = '$student_id'";
                $result_student = mysqli_query($dblink,$sql_student);

                while ($data_student = mysqli_fetch_array($result_student)) {
                    $student_name = $data_student['student_name'];
                    $student_email = $data_student['student_email'];
                    $usn = $data_student['usn'];
                    $student_contact = $data_student['student_contact'];
                    $gender = $data_student['gender'];
                    $date_of_birth = $data_student['date_of_birth'];
                    $student_address = $data_student['student_address'];
                    $college_name = $data_student['college_name'];
                    $university_name = $data_student['university_name'];
                    $qualification = $data_student['qualification'];
                    $branch = $data_student['branch'];
                    $year_of_passing = $data_student['year_of_passing'];
                    $percentage = $data_student['percentage'];
                    $skills = $data_student['skills'];
                }
            ?>

            <!-- Starts here -->
            <!-- Basic Example -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <form method="POST">
                        <div class="card">
                            <div class="header bg-teal">
                                <h2>
                                    <?php echo $student_email ?>
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
                                                        <td>
                                                            <div class="row clearfix demo-icon-container">
                                                                <div class="demo-google-material-icon">
                                                                    <i class="material-icons">person</i>
                                                                    <span class="icon-name">Name</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group">
                                                                <div class="form-line">
                                                                    <input type="text" class="form-control" name="student_name" placeholder="Name" <?php echo "value=\"".$student_name."\""; ?> required autofocus>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="row clearfix demo-icon-container">
                                                                <div class="demo-google-material-icon">
                                                                    <i class="material-icons">bubble_chart</i>
                                                                    <span class="icon-name">USN</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group">
                                                                <div class="form-line">
                                                                    <input type="text" class="form-control" name="usn" placeholder="USN" <?php echo "value=\"".$usn."\""; ?> required autofocus>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="row clearfix demo-icon-container">
                                                                <div class="demo-google-material-icon">
                                                                    <i class="material-icons">call</i>
                                                                    <span class="icon-name">Contact</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group">
                                                                <div class="form-line">
                                                                    <input type="text" class="form-control" name="student_contact" placeholder="Contact" <?php echo "value=\"".$student_contact."\""; ?> required autofocus>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="row clearfix demo-icon-container">
                                                                <div class="demo-google-material-icon">
                                                                    <i class="material-icons">face</i>
                                                                    <span class="icon-name">Gender</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group">
                                                                <div class="form-line">
                                                                    <input type="text" class="form-control" name="gender" placeholder="Gender" <?php echo "value=\"".$gender."\""; ?> required autofocus>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="row clearfix demo-icon-container">
                                                                <div class="demo-google-material-icon">
                                                                    <i class="material-icons">cake</i>
                                                                    <span class="icon-name">Date of Birth</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group">
                                                                <div class="form-line">
                                                                    <input type="text" class="form-control" name="date_of_birth" placeholder="Date of Birth" <?php echo "value=\"".$date_of_birth."\""; ?> required autofocus>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="row clearfix demo-icon-container">
                                                                <div class="demo-google-material-icon">
                                                                    <i class="material-icons">directions</i>
                                                                    <span class="icon-name">Address</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group">
                                                                <div class="form-line">
                                                                    <input type="text" class="form-control" name="student_address" placeholder="Address" <?php echo "value=\"".$student_address."\""; ?> required autofocus>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- #END# Basic Table -->
                            </div>
                        </div>
                        <div class="card">
                            <div class="header bg-deep-orange">
                                <h2>
                                    Education Details
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
                                                        <td>
                                                            <div class="row clearfix demo-icon-container">
                                                                <div class="demo-google-material-icon">
                                                                    <i class="material-icons">domain</i>
                                                                    <span class="icon-name">College name</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group">
                                                                <div class="form-line">
                                                                    <input type="text" class="form-control" name="college_name" placeholder="College name" <?php echo "value=\"".$college_name."\""; ?> required autofocus>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="row clearfix demo-icon-container">
                                                                <div class="demo-google-material-location_city">
                                                                    <i class="material-icons">location_city</i>
                                                                    <span class="icon-name">University Name</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group">
                                                                <div class="form-line">
                                                                    <input type="text" class="form-control" name="university_name" placeholder="University Name" <?php echo "value=\"".$university_name."\""; ?> required autofocus>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="row clearfix demo-icon-container">
                                                                <div class="demo-google-material-icon">
                                                                    <i class="material-icons">school</i>
                                                                    <span class="icon-name">Qualification</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group">
                                                                <div class="form-line">
                                                                    <input type="text" class="form-control" name="qualification" placeholder="Qualification" <?php echo "value=\"".$qualification."\""; ?> required autofocus>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="row clearfix demo-icon-container">
                                                                <div class="demo-google-material-icon">
                                                                    <i class="material-icons">group_work</i>
                                                                    <span class="icon-name">Branch</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group">
                                                                <div class="form-line">
                                                                    <input type="text" class="form-control" name="branch" placeholder="Branch" <?php echo "value=\"".$branch."\""; ?> required autofocus>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="row clearfix demo-icon-container">
                                                                <div class="demo-google-material-icon">
                                                                    <i class="material-icons">event_note</i>
                                                                    <span class="icon-name">Year of Passing</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group">
                                                                <div class="form-line">
                                                                    <input type="text" class="form-control" name="year_of_passing" placeholder="Year of Passing" <?php echo "value=\"".$year_of_passing."\""; ?> required autofocus>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="row clearfix demo-icon-container">
                                                                <div class="demo-google-material-icon">
                                                                    <i class="material-icons">show_chart</i>
                                                                    <span class="icon-name">Percentage</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group">
                                                                <div class="form-line">
                                                                    <input type="text" class="form-control" name="percentage" placeholder="Percentage" <?php echo "value=\"".$percentage."\""; ?> required autofocus>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="row clearfix demo-icon-container">
                                                                <div class="demo-google-material-icon">
                                                                    <i class="material-icons">stars</i>
                                                                    <span class="icon-name">Skills</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group">
                                                                <div class="form-line">
                                                                    <input type="text" class="form-control" name="skills" placeholder="Skills" <?php echo "value=\"".$skills."\""; ?> required autofocus>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- #END# Basic Table -->
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-4">
                                <button name="update_profile" class="btn btn-primary waves-effect" type="submit">UPDATE</button>
                            </div>
                        </div>
                        <br><br>
                    </form>
                    <?php
                        if (isset($_POST['update_profile'])) {
                            $student_name = false;
                            if (isset($_POST['student_name'])) {
                                $student_name = $_POST['student_name'];
                            }

                            $usn = false;
                            if (isset($_POST['usn'])) {
                                $usn = $_POST['usn'];
                            }

                            $student_contact = false;
                            if (isset($_POST['student_contact'])) {
                                $student_contact = $_POST['student_contact'];
                            }

                            $gender = false;
                            if (isset($_POST['gender'])) {
                                $gender = $_POST['gender'];
                            }

                            $date_of_birth = false;
                            if (isset($_POST['date_of_birth'])) {
                                $date_of_birth = $_POST['date_of_birth'];
                            }

                            $student_address = false;
                            if (isset($_POST['student_address'])) {
                                $student_address = $_POST['student_address'];
                            }

                            $college_name = false;
                            if (isset($_POST['college_name'])) {
                                $college_name = $_POST['college_name'];
                            }

                            $university_name = false;
                            if (isset($_POST['university_name'])) {
                                $university_name = $_POST['university_name'];
                            }

                            $qualification = false;
                            if (isset($_POST['qualification'])) {
                                $qualification = $_POST['qualification'];
                            }

                            $branch = false;
                            if (isset($_POST['branch'])) {
                                $branch = $_POST['branch'];
                            }

                            $year_of_passing = false;
                            if (isset($_POST['year_of_passing'])) {
                                $year_of_passing = $_POST['year_of_passing'];
                            }

                            $percentage = false;
                            if (isset($_POST['percentage'])) {
                                $percentage = $_POST['percentage'];
                            }

                            $skills = false;
                            if (isset($_POST['skills'])) {
                                $skills = $_POST['skills'];
                            }

                            if ($student_name) {
                                $sql_update = "UPDATE student SET student_name = '$student_name', usn = '$usn', student_contact = '$student_contact', gender = '$gender', date_of_birth = '$date_of_birth', student_address = '$student_address', college_name = '$college_name', university_name = '$university_name', qualification = '$qualification', branch = '$branch', year_of_passing = '$year_of_passing', percentage = '$percentage', skills = '$skills' WHERE id = '$student_id'";
                                $result_update = mysqli_query($dblink, $sql_update);

                                if ($result_update) {
                                    $_SESSION['success_udpate_profile'] = "Yes";
                                    $script = "<script> window.location.href = 'about.php' </script>";
                                    echo $script;
                                }
                                else{
                                    $_SESSION['unsuccess_udpate_profile'] = "Yes";
                                    $script = "<script> window.location.href = 'updateprofile.php' </script>";
                                    echo $script;
                                }
                            }
                        }
                    ?>
                </div>
            </div>
            <!-- #END# Basic Example -->
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

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
</body>

</html>
