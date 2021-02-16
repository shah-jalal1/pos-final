<?php

session_start();

if (!isset($_SESSION['user'])) {
header('location: login.php');
}

?>


<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminLTE 3 | Starter</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">



  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

    <!-- iCheck for checkboxes and radio inputs -->

    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <!-- daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">

    <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <!-- date-range-picker -->
    <script src="plugins/daterangepicker/daterangepicker.js"></script>

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>

    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>




    <!-- SweetAlert -->
    <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>

    <!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>



</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

 
<!--
=============================================
           NAVBAR
=============================================*/
-->

<nav class="main-header navbar navbar-expand navbar-white navbar-light" >
  <!-- Left navbar links -->
  <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

  </ul>


  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto ">

      <li class="dropdown user user-menu" ;">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" >

              <?php

                if ($_SESSION['picture'] != "") {

                    echo '<img src="'.$_SESSION["picture"].'" alt="" class="user-image">';    // Add picture in profile

                }
                else {
                    echo '<img src="views/img/template/icono-blanco.png" alt="" class="user-image">';
                }

              ?>


              <span class="hidden-xs link-black" > <?php echo $_SESSION['name'] ?> </span>
          </a>

          <ul class="dropdown-menu">

              <li class="user-body">

                  <a href="logout.php" class="btn btn-default btn-flat">logout</a>

              </li>

          </ul>

      </li>

  </ul>
</nav>
<!-- /.navbar -->

<!--
=============================================
           Navbar End
=============================================*/
-->





<!--
=============================================
           Menu
=============================================*/
-->

<?php

    require_once "menu.php";

?>

<!--
=============================================
           Menu End
=============================================*/
-->



