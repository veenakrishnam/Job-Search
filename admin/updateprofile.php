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
        if (!($_SESSION['admin_id'])) {
            $script = "<script> window.location.href = 'signin.php' </script>";
            echo $script;
        }

        $admin_id = $_SESSION['admin_id'];

        $sql_admin = "SELECT * FROM Admin WHERE id = '$admin_id'";
        $result_admin = mysqli_query($dblink, $sql_admin);

        while ($data_admin = mysqli_fetch_array($result_admin)) {
            $admin_name = $data_admin['admin_name'];
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
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $admin_name ?></div>
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
                    <li class="active">
                        <a href="index.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="company.php">
                            <i class="material-icons">domain</i>
                            <span> Company</span>
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
                <h2>ABOUT</h2>
                <ol class="breadcrumb breadcrumb-col-teal">
                    <li><a href="about.php"><i class="material-icons">person</i> About</a></li>
                    <li class="active"><i class="material-icons">library_books</i> Update Profile</li>
                </ol>
            </div>
            <?php
                $sql_admin = "SELECT * FROM admin WHERE id = '$admin_id'";
                $result_admin = mysqli_query($dblink,$sql_admin);

                while ($data_admin = mysqli_fetch_array($result_admin)) {
                    $username = $data_admin['username'];
                    $admin_name = $data_admin['admin_name'];
                }
            ?>

            <!-- Starts here -->
            <!-- Basic Example -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <form method="POST">
                        <div class="card">
                            <div class="header bg-orange">
                                <h2>
                                    Basic Details
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
                                                                    <i class="material-icons">event_seat</i>
                                                                    <span class="icon-name">Username</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group">
                                                                <div class="form-line">
                                                                    <input type="text" class="form-control" name="username" placeholder="Username" <?php echo "value=\"".$username."\""; ?> required autofocus>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="row clearfix demo-icon-container">
                                                                <div class="demo-google-material-icon">
                                                                    <i class="material-icons">person</i>
                                                                    <span class="icon-name">Admin name</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group">
                                                                <div class="form-line">
                                                                    <input type="text" class="form-control" name="admin_name" placeholder="Admin name" <?php echo "value=\"".$admin_name."\""; ?> required autofocus>
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
                            $username = false;
                            if (isset($_POST['username'])) {
                                $username = $_POST['username'];
                            }

                            $admin_name = false;
                            if (isset($_POST['admin_name'])) {
                                $admin_name = $_POST['admin_name'];
                            }

                            if ($username) {
                                $sql_update = "UPDATE admin SET username = '$username', admin_name = '$admin_name' WHERE id = '$admin_id'";
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
