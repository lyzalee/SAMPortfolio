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
  <title>Portfolio | ADMIN  </title>
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/typicons/typicons.css">
  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="js/select.dataTables.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container-scroller">
    <nav class="navbar default-layout bg-black col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
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
        <!-- <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text my-5">Welcome, <span class="text-black fw-bold">Lyza!</span></h1>
          </li>
        </ul> -->
     
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
      

      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">    
              <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                      <div class="container p-4">
                    <h5 class="card-title">Messages from Clients</h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                
                                $sql = "SELECT * FROM contact_me";
                                $result = $con->query($sql);

                                if ($result->num_rows > 0) {
                                    // Output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row["name"] . "</td>";
                                        echo "<td>" . $row["email"] . "</td>";
                                        echo "<td>" . $row["subject"] . "</td>";
                                        echo "<td>" . $row["message"] . "</td>";
                                        echo "<td><a href='delete_message.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm mb-1'>Delete</a></td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='4'>No messages found</td></tr>";
                                }
                                ?>
                              
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
      </div>
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/jquery.cookie.js" type="text/javascript"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>

