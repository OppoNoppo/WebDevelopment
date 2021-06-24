<?php

session_start();
if($_SESSION["loggedin"] != true){
  echo 'not logged in';
  header("Location: login.php?error=loggedout");
  exit;
}

// End Session Required || Login Required

include "./includes/conn.inc.php";
include "./includes/functions.inc.php";
// include "./includes/profile.inc.php";

// End Includes

refreshSession($conn, $_SESSION["userUUID"]);

// $fullUrl = "http://$_SERVER[HOST_URL]$_SERVER[REQUESTED_URL]";   

// End Variables

?>




<!-- 

██╗  ██╗████████╗███╗   ███╗██╗     
██║  ██║╚══██╔══╝████╗ ████║██║     
███████║   ██║   ██╔████╔██║██║     
██╔══██║   ██║   ██║╚██╔╝██║██║     
██║  ██║   ██║   ██║ ╚═╝ ██║███████╗
╚═╝  ╚═╝   ╚═╝   ╚═╝     ╚═╝╚══════╝

 -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>

        <!-- Messages Dropdown Menu -->
        <!-- Notifications Dropdown Menu -->

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo $_SESSION["userUid"]; ?></a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item active">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-calendar-alt"></i>
                <p>
                  Dashboard
                  <!-- <span class="badge badge-info right">2</span> -->
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./profile.php" class="nav-link">
                <i class="nav-icon fas fa-calendar-alt"></i>
                <p>
                  Profile
                  <!-- <span class="badge badge-info right">2</span> -->
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-calendar-alt"></i>
                <p>
                  Edit Profile
                  <!-- <span class="badge badge-info right">2</span> -->
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="logout.php" class="nav-link">
                <i class="nav-icon fas fa-calendar-alt"></i>
                <p>
                  Logout
                  <!-- <span class="badge badge-info right">2</span> -->
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
<<<<<<< Updated upstream
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">General</h3>
              </div>
              <div class="card-body">
                <form method="post" action="./includes/edit_profile.inc.php">
                  <div class="row">
                    <div class="col-6   form-group">
                      <label for="uid">Username (*) </label>
                      <input required type="text" name="uid" id="uid" class="form-control" minlength="1" maxlength="25"
                        value="<?php echo $_SESSION['userUUID'];?>">
                    </div>
                    <div class="col-4 form-group">
                      <label for="status">Custom Status</label>
                      <input type="text" name="status" id="status" class="form-control"
                        value="<?php echo $_SESSION['userStatus'] ? $_SESSION['userStatus'] : 'NULL';?>">
                    </div>
                    <div class="col-2 form-group">
                      <label for="noti">Status (*) </label>
                      <select name="noti" id="noti" class="form-control custom-select">
                        <option disabled>Select one</option>
                        <option <?php if ($_SESSION["userNoti"] == "online"){ echo "selected";}?>>Online</option>
                        <option <?php if ($_SESSION["userNoti"] == "busy"){ echo "selected";}?>>Busy</option>
                        <option <?php if ($_SESSION["userNoti"] == "away"){ echo "selected";}?>>Away</option>
                        <option <?php if ($_SESSION["userNoti"] == "offline"){ echo "selected";}?>>Offline</option>
                      </select>
                    </div>

                  </div>

                  <div class="form-group">
                    <label for="desc">Profile Description</label>
                    <textarea name="desc" id="desc" class="form-control" rows="4">
                <?php $GetUserInfo = GetUserInfo($conn, $_SESSION['userUUID']); echo $GetUserInfo["userMail"];?>
                </textarea>
                  </div>
                  <div class="row">
                    <div class="col-6 form-group">
                      <label for="mail">Mail Address (*) </label>
                      <input required type="email" name="mail" id="mail" class="form-control"
                        value="<?php echo $_SESSION["userMail"]?>" pattern="*@-.-">
                    </div>
                    <div class="col-6 form-group">
                      <label for="pwdConfirm">Confirm Password (*) </label>
                      <input required type="password" name="pwdConfirm" id="pwdConfirm" class="form-control"
                        placeholder="Old Password">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6 form-group">
                      <label for="pwdNew">New Password</label>
                      <input type="password" name="pwdNew" id="pwdNew" class="form-control"
                        placeholder="<?php echo $_SESSION['userUUID']?>">
                    </div>
                    <div class="col-6 form-group">
                      <label for="pwdRepeat">New Password Confirm</label>
                      <input type="password" name="pwdRepeat" id="pwdRepeat" class="form-control"
                        placeholder="<?php echo $_SESSION['userUUID']?>">
                    </div>
                  </div>
                  <div class="row">
                    <!-- <div class="col-8 form-group">
                      <label>UUID</label>
                      <input name="uuid" id="uuid" class="form-control" required disabled
                        value="<?php// $GetUserInfo = GetUserInfo($conn, $_SESSION['userUUID']); echo $GetUserInfo["userUUID"];?>">
                    </div> -->
                    <div class="col-4">
                      <label>* Required</label>
                      <input style="background-color:rgb(0, 255, 0);" name="submitsave" type="submit" value="Save Changes"
                        class="btn btn-success form-control">
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
=======
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
          <form method="POST" action="./includes/edit_profile.inc.php">
            <div class="card-header">
              <h3 class="card-title">General</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
            <div class="row">
              <div class="form-group col-5">
                <label for="uid">Username</label>
                <input type="text" name="uid" id="uid" class="form-control" value="<?php echo $_SESSION['userUUID'];?>">
              </div>
              <div class="form-group col-4">
                <label for="minidesc">Mini Description</label>
                <input type="text" name="minidesc" id="minidesc" class="form-control" value="<?php echo $_SESSION["userMiniDesc"];?>">
              </div>
              <div class="form-group col-3">
                <label for="inputStatus">Status</label>
                <select name="notification" id="inputStatus" class="form-control custom-select">
                  <option disabled>Select one</option>
                  <option <?php if ($_SESSION["userNoti"] == "online"){ echo "selected";}?>>Online</option>
                  <option <?php if ($_SESSION["userNoti"] == "busy"){ echo "selected";}?>>Busy</option>
                  <option <?php if ($_SESSION["userNoti"] == "away"){ echo "selected";}?>>Away</option>
                  <option <?php if ($_SESSION["userNoti"] == "offline"){ echo "selected";}?>>Offline</option>
                </select>
              </div>
              </div>
              <div class="form-group">
                <label for="profileDescription">Profile Description</label>
                <textarea name="description" id="profileDescription" class="form-control" rows="4">
                <?php $GetUserInfo = GetUserInfo($conn, $_SESSION['userUUID']); echo $GetUserInfo["userMail"];?>
                </textarea>
              </div>
              
              <div class="form-group">
                <label for="inputClientCompany">Client Company</label>
                <input type="text" id="inputClientCompany" class="form-control" value="Deveint Inc">
              </div>
              <div class="form-group">
                <label for="inputProjectLeader">Project Leader</label>
                <input type="text" id="inputProjectLeader" class="form-control" value="Tony Chicken">
              </div>
>>>>>>> Stashed changes
            </div>
            <!-- /.card -->
          </div>
<<<<<<< Updated upstream
=======
          </form>
          <!-- /.card -->
>>>>>>> Stashed changes
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- End Content Wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.1.0
      </div>
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>

  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
  <script src="plugins/raphael/raphael.min.js"></script>
  <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
  <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>

  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard2.js"></script>
</body>

</html>