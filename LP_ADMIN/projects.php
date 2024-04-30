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
  <link rel="stylesheet" href="vendors/select2/select2.min.css">
  <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
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
              <div class="col-md-10 m-auto">
                <div class="card">
                    <div class="card-body">
                     <h4 class="card-title py-3 border-bottom">MY WORKS</h4>
                     <div class="row mt-4 justify-content-end">
                     <div class="table-responsive mt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>LINK</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                                
                                $sql = "SELECT * FROM work";
                                $result = $con->query($sql);

                                if ($result->num_rows > 0) {
                                    // Output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row["id"] . "</td>";
                                        echo '<td> <img src="img/' . $row['picture'] . '"alt="" class="img-fluid"></td>';
                                        echo "<td>" . $row["title"] . "</td>";
                                        echo "<td>" . $row["description"] . "</td>";
                                        echo "<td>" . $row["link"] . "</td>";
                                        echo "<td><a href='delete_projects.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm mb-1'>Delete</a></td>";
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
                    <hr>
                  <form method="POST" action="project.php" enctype="multipart/form-data">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="fullName">Title</label>
                                            <input type="text" class="form-control" id="fullName" name="name" placeholder="Enter Full Name">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group ">
                                        <label for="image">Image:</label>
                                        <input type="file" class="form-control-file" name="fileImg" >
                                    </div>
                                  <div class="form-group">
                                      <label for="about">Description</label>
                                      <textarea class="form-control" style="resize: vertical; min-height: 50px;" id="about" name="description"placeholder="Description "></textarea>
                                  </div>
                                  <div class="form-group">
                                      <label for="about">Link</label>
                                      <textarea class="form-control" style="resize: vertical; min-height: 50px;" id="about"name="link" placeholder="Insert URL"></textarea>
                                  </div>
                            
                                  
                                </div>
                                <div class="row gutters ">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="text-right d-flex justify-content-end">
                                            <button type="submit" id="submit" name="submit" class="btn btn-success me-3">Add Projects</button>
                                            
                                        </div>
                                    </div>
                                </div>
                    </form>
                      
                    <br>
                  </div>
                </div> 
              </div>
          </div> 
        </div>
      </div>
    </div>
  

  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/file-upload.js"></script>
 
</body>

</html>
