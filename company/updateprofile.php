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
                        <a href="jobs.php">
                            <i class="material-icons">business_center</i>
                            <span>Jobs</span>
                        </a>
                    </li>
                    <li>
                        <a href="add_job.php">
                            <i class="material-icons">library_books</i>
                            <span>Add Job</span>
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
            <div class="block-header">
                <h2>ABOUT</h2>
                <ol class="breadcrumb breadcrumb-col-teal">
                    <li><a href="about.php"><i class="material-icons">person</i> About</a></li>
                    <li class="active"><i class="material-icons">library_books</i> Update Profile</li>
                </ol>
            </div>
            <?php
                $sql_company = "SELECT * FROM company WHERE id = '$company_id'";
                $result_company = mysqli_query($dblink,$sql_company);

                while ($data_company = mysqli_fetch_array($result_company)) {
                    $company_name = $data_company['company_name'];
                    $website = $data_company['website'];
                    $city = $data_company['city'];
                    $state = $data_company['state'];
                    $postal_code = $data_company['postal_code'];
                    $country = $data_company['country'];
                    $companytype = $data_company['companytype'];
                    $firstname = $data_company['firstname'];
                    $lastname = $data_company['lastname'];
                    $number = $data_company['number'];
                    $email = $data_company['email'];
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
                                                                    <i class="material-icons">account_balance</i>
                                                                    <span class="icon-name">Company name</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group">
                                                                <div class="form-line">
                                                                    <input type="text" class="form-control" name="company_name" placeholder="Company name" <?php echo "value=\"".$company_name."\""; ?> required autofocus>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="row clearfix demo-icon-container">
                                                                <div class="demo-google-material-icon">
                                                                    <i class="material-icons">web</i>
                                                                    <span class="icon-name">Website</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group">
                                                                <div class="form-line">
                                                                    <input type="text" class="form-control" name="website" placeholder="Website" <?php echo "value=\"".$website."\""; ?> required autofocus>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="row clearfix demo-icon-container">
                                                                <div class="demo-google-material-icon">
                                                                    <i class="material-icons">location_city</i>
                                                                    <span class="icon-name">City</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group">
                                                                <div class="form-line">
                                                                    <input type="text" class="form-control" name="city" placeholder="City" <?php echo "value=\"".$city."\""; ?> required autofocus>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="row clearfix demo-icon-container">
                                                                <div class="demo-google-material-icon">
                                                                    <i class="material-icons">terrain</i>
                                                                    <span class="icon-name">State</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group">
                                                                <div class="form-line">
                                                                    <input type="text" class="form-control" name="state" placeholder="State" <?php echo "value=\"".$state."\""; ?> required autofocus>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="row clearfix demo-icon-container">
                                                                <div class="demo-google-material-icon">
                                                                    <i class="material-icons">markunread_mailbox</i>
                                                                    <span class="icon-name">Postal code</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group">
                                                                <div class="form-line">
                                                                    <input type="text" class="form-control" name="postal_code" placeholder="Postal code" <?php echo "value=\"".$postal_code."\""; ?> required autofocus>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="row clearfix demo-icon-container">
                                                                <div class="demo-google-material-icon">
                                                                    <i class="material-icons">public</i>
                                                                    <span class="icon-name">Country</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group">
                                                                <div class="form-line">
                                                                    <input type="text" class="form-control" name="country" placeholder="Country" <?php echo "value=\"".$country."\""; ?> required autofocus>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="row clearfix demo-icon-container">
                                                                <div class="demo-google-material-icon">
                                                                    <i class="material-icons">bubble_chart</i>
                                                                    <span class="icon-name">Company type</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group">
                                                                <div class="form-line">
                                                                    <input type="text" class="form-control" name="companytype" placeholder="Company type" <?php echo "value=\"".$companytype."\""; ?> required autofocus>
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
                                    Contact Person
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
                                                                    <span class="icon-name">First name</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group">
                                                                <div class="form-line">
                                                                    <input type="text" class="form-control" name="firstname" placeholder="First name" <?php echo "value=\"".$firstname."\""; ?> required autofocus>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="row clearfix demo-icon-container">
                                                                <div class="demo-google-material-icon">
                                                                    <i class="material-icons">person</i>
                                                                    <span class="icon-name">Last name</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group">
                                                                <div class="form-line">
                                                                    <input type="text" class="form-control" name="lastname" placeholder="Last name" <?php echo "value=\"".$lastname."\""; ?> required autofocus>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="row clearfix demo-icon-container">
                                                                <div class="demo-google-material-icon">
                                                                    <i class="material-icons">call</i>
                                                                    <span class="icon-name">Number</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group">
                                                                <div class="form-line">
                                                                    <input type="text" class="form-control" name="number" placeholder="Number" <?php echo "value=\"".$number."\""; ?> required autofocus>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="row clearfix demo-icon-container">
                                                                <div class="demo-google-material-icon">
                                                                    <i class="material-icons">email</i>
                                                                    <span class="icon-name">Email</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group">
                                                                <div class="form-line">
                                                                    <input type="text" class="form-control" name="email" placeholder="Email" <?php echo "value=\"".$email."\""; ?> required autofocus>
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
                            $company_name = false;
                            if (isset($_POST['company_name'])) {
                                $company_name = $_POST['company_name'];
                            }

                            $website = false;
                            if (isset($_POST['website'])) {
                                $website = $_POST['website'];
                            }

                            $city = false;
                            if (isset($_POST['city'])) {
                                $city = $_POST['city'];
                            }

                            $state = false;
                            if (isset($_POST['state'])) {
                                $state = $_POST['state'];
                            }

                            $postal_code = false;
                            if (isset($_POST['postal_code'])) {
                                $postal_code = $_POST['postal_code'];
                            }

                            $country = false;
                            if (isset($_POST['country'])) {
                                $country = $_POST['country'];
                            }

                            $companytype = false;
                            if (isset($_POST['companytype'])) {
                                $companytype = $_POST['companytype'];
                            }

                            $firstname = false;
                            if (isset($_POST['firstname'])) {
                                $firstname = $_POST['firstname'];
                            }

                            $lastname = false;
                            if (isset($_POST['lastname'])) {
                                $lastname = $_POST['lastname'];
                            }

                            $number = false;
                            if (isset($_POST['number'])) {
                                $number = $_POST['number'];
                            }

                            $email = false;
                            if (isset($_POST['email'])) {
                                $email = $_POST['email'];
                            }

                            if ($company_name) {
                                $sql_update = "UPDATE company SET company_name = '$company_name', website = '$website', city = '$city', state = '$state', postal_code = '$postal_code', country = '$country', companytype = '$companytype', firstname = '$firstname', lastname = '$lastname', number = '$number', email = '$email' WHERE id = '$company_id'";
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