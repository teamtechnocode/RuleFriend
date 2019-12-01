<?php
session_start();
if(isset($_SESSION['myusername']))
{
    $myusername = $_SESSION['myusername'];
}
else
{
     echo"<script type='text/javascript'>
     window.location.href='/login';
     </script>";
}
include 'config.php';
                      $row=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM user WHERE email='".$myusername."'"));
?><!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <link href="assets/plugins/css-chart/css-chart.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="assets/plugins/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue-dark.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
                 
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                        <div class="navbar-header">
                    <a class="navbar-brand" href="dashboard.php">
                        <!-- Logo icon -->
                        <b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>
                         <h1 style="color:white;">Rule Friend</h1></span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0 ">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="icon-arrow-left-circle"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile-->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/users/1.jpg" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="<?php echo $row['img']; ?>" alt="user"></div>
                                            <div class="u-text">
                                                <h4><?php echo $row['name']; ?></h4>
                                                <p class="text-muted"><?php echo $row['email']; ?></p><a href="profile.php" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="profile.php"><i class="ti-user"></i> My Profile</a></li>
                                    <li><a href="email.php"><i class="ti-email"> </i> Compose Mail </a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="change-password.php"><i class="ti-settings"></i> Change Password</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        
                        <li>
                            <a class="" href="dashboard.php" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard </span></a>

                            
                        </li>
                        
                        
                        
                        <li>
                            <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Profile</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="profile.php">View/Modify Profile</a></li>
                                
                                <li><a href="change-password.php">Change Password</a></li>
                                
                            </ul>
                        </li>
                        
                        
                        
                        <li class="nav-devider"></li>
                        <li> <a class="" href="ask-question.php" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">Ask Question</span></a>
                        </li>
                        <li> <a class="" href="feed.php" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">Feed</span></a>
                        </li>
                        
                        
                        
                        
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->
            <div class="sidebar-footer">
                <!-- item-->
                <a href="#" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
                <!-- item-->
                <a href="/contact-us" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
                <!-- item-->
                <a href="logout.php" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
            </div>
            <!-- End Bottom points-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        