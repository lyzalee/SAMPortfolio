<?php
   

   include_once('../config.php');
   session_start();
   if (!isset($_SESSION['ID'])) {
       header("Location:admin.php");
       exit();
   }

?>
<!DOCTYPE html>
<html lang="en">

  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Portfolio | ADMIN </title>
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/typicons/typicons.css">
  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="js/select.dataTables.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <style>
    /* CSS styling */
    .container {
      margin-top: 50px;
    }
    
    .chart-container {
      width: 80%;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
    }
  </style>
  </head>

  <body>
    <div class="container-scroller">
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
          <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
              <span class="icon-menu"></span>
            </button>
          </div>
          <div>
            <a class="navbar-brand brand-logo text-success" href="LP_ADMIN/index.php">LYLORE</a>
          </div>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-top"> 
          <ul class="navbar-nav">
            <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
              <h1 class="welcome-text my-5">Welcome, <span class="text-success fw-bold">Lyza!</span></h1>
            </li>
          </ul>
         
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
   
      <div class="container-fluid page-body-wrapper">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="index.php">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">
                <i class="mdi mdi-cash menu-icon"></i>
                <span class="menu-title">About</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="projects.php">
                <i class="menu-icon mdi mdi-book"></i>
                <span class="menu-title">Projects</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="message.php">
                <i class="mdi mdi-message menu-icon"></i>
                <span class="menu-title">Messages</span>
              </a>
            </li>
          
            <li class="nav-item">
              <a class="nav-link" href="logout.php">
                <i class="mdi mdi-logout menu-icon"></i>
                <span class="menu-title">Log out</span>
              </a>
            </li>
          </ul>
        </nav>  
        <?php


// Fetch total message count
$sqlTotalMessages = "SELECT COUNT(*) AS total_messages FROM contact_me";
$resultTotalMessages = $con->query($sqlTotalMessages);
$totalMessages = 0;
if ($resultTotalMessages->num_rows > 0) {
    $rowTotalMessages = $resultTotalMessages->fetch_assoc();
    $totalMessages = $rowTotalMessages['total_messages'];
}

// Fetch total works posted count
$sqlTotalWorksPosted = "SELECT COUNT(id) AS total_works FROM work"; 
$resultTotalWorksPosted = $con->query($sqlTotalWorksPosted);
$totalWorksPosted = 0;

if ($resultTotalWorksPosted->num_rows > 0) {
    $rowTotalWorksPosted = $resultTotalWorksPosted->fetch_assoc();
    $totalWorksPosted = $rowTotalWorksPosted['total_works'];
}
?>
    <div class="main-panel">        
        <div class="content-wrapper">
          <div class="container">
            <div class="row gutters d-flex justify-content-center mt-5">
                <div class="col-xl-9 col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body m-4">
                        <h1 id="totalMessages" class="text-success"><?php echo $totalMessages; ?></h1>
                            <h5 class="pb-1">Total Messages Received</h5>
                           
                          
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <div class="container">
            <div class="row gutters d-flex justify-content-center mt-5">
                <div class="col-xl-9 col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body m-4">
                            <h1 id="totalWorksPosted" class="text-success"><?php echo $totalWorksPosted; ?></h1> 
                            <h5 class="pb-1">Total works Posted</h5>
                            
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

   
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/jquery.cookie.js" type="text/javascript"></script>
  </body> 

</html>


