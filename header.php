<?php 
session_start();
include"include/config.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
      <li class="nav-item d-none d-sm-inline-block">
        <a href="logout.php" class="nav-link">Logout</a>
      </li>
    </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!--<a href="index.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>-->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a class="d-block"><?php echo $_SESSION['full_name'];?><br>
                              <?php $role = $_SESSION['role']; 
            if($role == '1'){ echo "admin"; }
            if($role == '2') { echo "BDE"; }
            if($role == '3') { echo "Project Manager"; }
            if($role == '4') { echo "Developer"; }
          ?>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <!----  workshhet------------------------------------>
              <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Worksheet
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_worksheet.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Worksheet</p>
                </a>
              </li>
              
              <li class="nav-item">
                  <a href="manage_worksheet.php" class="nav-link"> 
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Worksheet</p>
                </a>
              </li>
            </ul>

              <!-------------- worksheet end ----------------------------->
              

          <?php
          if ($_SESSION['role']==4 ) {
          ?>
          <li class="nav-item">
            <a href="task_list.php" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Task List
              </p>
            </a>
          </li>
          <?php
          }
          ?>
          <li class="nav-item">
            <a href="timesheet.php" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Timesheet
              </p>
            </a>
          </li>
          <?php
          if ($_SESSION['role']==1) {
          ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Employee
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="Approve_employee.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approve Employee</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="employee_list.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee List</p>
                </a>
              </li>
            </ul>
          </li>
          <?php
          }
          ?>
          <?php
          //if ($_SESSION['role']==2 or $_SESSION['role']==1) {
          ?>
		  <?php
                if ($_SESSION['role']==1) {
              ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Projects
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
                  <li class="nav-item">
                    <a href="add_project.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Project</p>
                    </a>
                  </li>
              <li class="nav-item">
                <a href="manage_project.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Project</p>
                </a>
              </li>
         
             
            </ul>
          </li>
          <?php
          }
          ?>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Leave
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_leave.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fill Leave Form</p>
                </a>
              </li>
              
              <li class="nav-item">
                  <a href="manage_leave.php" class="nav-link"> 
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Leave</p>
                </a>
              </li>
              
            </ul>
          </li>
		  <li class="nav-item">
            <a href="Group_chat.php" class="nav-link">
			<i class="fas fa-paper-plane"></i>
              <p>
                Group chat
              </p>
            </a>
          </li>
          
          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Team
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_team.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Team</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manage_team.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Team</p>
                </a>
              </li>
              
            </ul>
          </li> -->
          <?php
          if ($_SESSION['role']==3 or $_SESSION['role']==1) {
          ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Task
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_task.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Task</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manage_task.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Task</p>
                </a>
              </li>
            </ul>
          </li>
          <?php
          }
          ?>
          


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  