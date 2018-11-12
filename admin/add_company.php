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
    <title>Add Company</title>
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
                        <a href="index.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    <li>
                    <li class="active">
                        <a href="company.php">
                            <i class="material-icons">domain</i>
                            <span>Company</span>
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
                    <li><a href="company.php"><i class="material-icons">domain</i> Company</a></li>
                    <li class="active"><i class="material-icons">library_books</i> Add company</li>
                </ol>
             </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Add Company
                            </h2>
                        </div>
                        <div class="body">
                             <form method="post">
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group form-float form-group-lg">
                                            <div class="form-line">
                                                <input name="company_name"type="text" class="form-control" required>
                                                <label class="form-label">Company Name</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input name="website"type="text" class="form-control" required>
                                                <label class="form-label">Website</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input name="city"type="text" class="form-control" required>
                                                <label class="form-label">City</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input name="state"type="text" class="form-control" required>
                                                <label class="form-label">State</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input name="postal_code"type="text" class="form-control" required>
                                                <label class="form-label">Postal code</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <select name="country"class="form-control show-tick" required>
                                            <option value=""> Country </option>
                                            <option value="Australia"> Australia</option>
                                            <option value="Brazil"> Brazil </option>
                                            <option value="Canada"> Canada </option>
                                            <option value="Denmark"> Denmark </option>
                                            <option value="India">India</option>
                                            <option value="Thailand">Thailand</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <select name="companytype" class="form-control show-tick" required>
                                            <option value=""> Company Type </option>
                                            <option value="AutoMobiles"> AutoMobiles </option>
                                            <option value="ECommerce"> ECommerce</option>
                                            <option value="It&ITES"> It&ITES </option>
                                            <option value="Manufacturing">Manufacturing </option>
                                            <option value="Railways"> Railways </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <p>Person of contact</p>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input name="firstname"type="text" class="form-control" required>
                                                <label class="form-label">First Name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input name="lastname"type="text" class="form-control" required>
                                                <label class="form-label">Last Name</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input name="number"type="number" class="form-control" required>
                                                <label class="form-label">Contact Number</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input name="email"type="text" class="form-control" required>
                                                <label class="form-label">Email Address</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input name="username" type="text" class="form-control" required>
                                                <label class="form-label">Username</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input name="password" type="password" class="form-control" required>
                                                <label class="form-label">Password</label>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <button name="add_company"type="submit" class="btn btn-primary waves-effect">Add Company</button>
                                    </div>
                                </div>
                            </form>
                                <?php
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
                                    $code = $_POST['postal_code'];
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

                                    $username = false;
                                    if (isset($_POST['username'])) {
                                        $username = $_POST['username'];
                                    }

                                    $password = false;
                                    if (isset($_POST['password'])) {
                                        $password = $_POST['password'];
                                    }

                                     if ($company_name != '') {
                                        if (isset($_POST['add_company'])) {
                                            $sql_add_company = "INSERT INTO company (company_name , website , city , state , postal_code , country , companytype , firstname , lastname , number , email , username, password) VALUES ('$company_name' , '$website' , '$city' , '$state' , '$postal_code' , '$country' , '$companytype' , '$firstname' , '$lastname' , '$number' , '$email' , '$username' , '$password')";
                                            $resut_add_company = mysqli_query($dblink, $sql_add_company);

                                            if ($resut_add_company) {
                                                $script = "<script> window.location.href = 'company.php' </script>";
                                               //echo $script;
                                            }
                                            else{
                                                echo $resut_add_company1;
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

    <!-- Demo Js -->
    <script src="js/demo.js"></script>

    <!-- Jquery Spinner Plugin Js -->
    <script src="plugins/jquery-spinner/js/jquery.spinner.js"></script>
</body>

</html>
