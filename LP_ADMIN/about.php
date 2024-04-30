<?php
   

   include_once('../config.php');
   session_start();
   if (!isset($_SESSION['ID'])) {
       header("Location:admin.php");
       exit();
   }

   $query_ipcr = "SELECT * FROM displaycontent "; 
  $result_ipcr = $con->query($query_ipcr); 

  if ($result_ipcr->num_rows > 0) {
  $ipcr_row = $result_ipcr->fetch_assoc();
                    $stdid = $ipcr_row['id'];
                    $displayname = $ipcr_row['display_name'];
                    $skill1 = $ipcr_row['display_skill_1'];
                    $description = $ipcr_row['descriptions'];
                    $home_picture = $ipcr_row['home_picture'];
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['fileImg'])) {

  if ($_FILES['fileImg']['error'] === UPLOAD_ERR_OK) {
    
    $file = $_FILES['fileImg']['tmp_name'];
    $fileName = $_FILES['fileImg']['name'];
    
   
    $destination = 'img/' . $fileName;
    move_uploaded_file($file, $destination);

    // Update the image field in the admin table
    $sql = "UPDATE displaycontent SET home_picture = '$fileName' WHERE id = 1";
    mysqli_query($con, $sql);

    header("Location: about.php");
    exit();

  } else {
 
  }
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<!--   
  <style>
   *{
    border: 1px solid red;
   }

       
  </style> -->
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
          <a class="navbar-brand brand-logo text-success" href="LP_ADMIN/index.html">LYLORE</a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top"> 
        <!-- <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text my-5">Welcome, <span class="text-success fw-bold">Lyza!</span></h1>
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
            <div class="row gutters d-flex justify-content-center">
              <div class="about col-xl-6 col-lg-10 col-md-12 col-sm-12 col-12">
              <div class="card">
                  <div class="card-body ">
                      <div class="account-settings">
                          <div class="user-profile mx-2 text-center">
                          <div class="user-avatar">
                              <img src="img/<?php echo $home_picture?>" alt="Responsive image" style="width: 50%;">
                          </div>
                          </div>
                         
                          <div class="form-group ">
                              <p><strong>Full Name: </strong><span><?php echo $displayname?></span></p>
                              <p><strong>Role: </strong><span><?php echo $skill1?></span></p>
                              <p><strong>Bio: </strong><span><?php echo $description?></span></p>
                              
                              <hr>
                              <p><strong>SKILLS</strong> </p> 
                              <?php
                                    

                                   
                                    $query = "SELECT * FROM skill";
                                    $result = $con->query($query);

                                
                                    if ($result->num_rows > 0) {
                                       
                                        while ($row = $result->fetch_assoc()) {
                                         
                                            echo '<p><strong>' . $row['skillname'] . '</strong> <span>' . $row['skillper'] . '%</span></p>';
                                        }
                                    } else {
                                        echo "No skill data found";
                                    }
                                    ?>
                            
                                  
                           </div>
                      </div>
                  </div>
              </div>
              </div>
              
              </div>
              <br>
              <hr>
  
              <div class="container">
                <div class="row gutters d-flex justify-content-center mt-5" id="update">
                    <div class="col-xl-10 col-lg-9 col-md-12 col-sm-12 col-12">
                        <div class="card h-100">
                            <div class="card-body">
                            
                                <div class="row gutters mx-auto">
                                    <div class="col-xl-10 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <h6 class="mb-2 text-primary">Home Settings</h6>
                                    </div>
                                  <form method="POST" action="home_update.php">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="display_name">Full Name</label>
                                            <input type="text" class="form-control" id="display_name"name="display_name" placeholder="Enter Full Name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="display_skill_1">Role</label>
                                            <input type="text" class="form-control" name="display_skill_1" id="display_skill_1" placeholder="Enter Role">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="descriptions">Bio</label>
                                      <textarea class="form-control" style="resize: vertical; min-height: 50px;" name="descriptions" id="descriptions" placeholder="Short Bio Intro..."></textarea>
                                    </div>
                                    <div class="row gutters">
                                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                          <div class="text-right d-flex justify-content-end">
                                              <button type="submit"  name="submit" class="btn btn-success me-3">Update</button>
                                              
                                          </div>
                                      </div>
                                    </div>
                                  </form>
                                  
                                  <form method="POST" action="" enctype="multipart/form-data">
                                  <hr>
                                    <div class="form-group">
                                        <label for="image">Image:</label>
                                        <input type="file" class="form-control-file" name="fileImg" >
                                    </div>
                                    <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="text-right d-flex justify-content-end">
                                            <button type="submit" id="submit" name="submit" class="btn btn-success me-3">Update</button>
                                        </div>
                                    </div>
                                </div>
                                    </form>
        
                    
                                  
                                    
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="container">
                <div class="row gutters d-flex justify-content-center mt-5" id="update">
                    <div class="col-xl-10 col-lg-9 col-md-12 col-sm-12 col-12">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="row gutters mx-auto">
                                    <div class="col-xl-10 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <h6 class="mb-2 text-primary">About Me Settings</h6>
                                    </div>
                                    <form method="POST" action="about_me.php">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="fullName">Full Name</label>
                                            <input type="text" class="form-control" id="fullName" name="name" placeholder="Enter Full Name">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                      <label for="about">Description 1</label>
                                      <textarea class="form-control" style="resize: vertical; min-height: 50px;" id="about"name="des1" placeholder="Description 1..."></textarea>
                                  </div>
                                  <div class="form-group">
                                      <label for="about">Description 2</label>
                                      <textarea class="form-control" style="resize: vertical; min-height: 50px;" id="about" name="des2"placeholder="Description 2..."></textarea>
                                  </div>
                                  <div class="form-group">
                                      <label for="about">Description 3</label>
                                      <textarea class="form-control" style="resize: vertical; min-height: 50px;" id="about"name="des3" placeholder="Description 3..."></textarea>
                                  </div>
                            
                                  
                                </div>
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="text-right d-flex justify-content-end">
                                            <button type="submit" id="submit" name="submit" class="btn btn-success me-3">Update</button>
                                            
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>



                <hr>
                <div class="container">
                <div class="row gutters d-flex justify-content-center mt-5" id="update">
                    <div class="col-xl-10 col-lg-9 col-md-12 col-sm-12 col-12">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="row gutters mx-auto">
                                    <div class="col-xl-10 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <h6 class="mb-2 text-primary">Skill Settings</h6>
                                    </div>
                                    <form method="POST" action="skill.php"> 
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="fullName">Skill</label>
                                            <input type="text" class="form-control" id="fullName" name="skillname" placeholder="Enter Skill Name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="role">Skill Percentage</label>
                                            <input type="text" class="form-control" id="role" name="skillper" placeholder="Enter Skill Percentage">
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="text-right d-flex justify-content-end">
                                            <button type="submit" id="submit" name="submit" class="btn btn-success me-3">Add Skill</button>
                                            
                                        </div>
                                    </div>
                                </div>
                                </form>
                                <div class="table-responsive mt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Skill Name</th>
                                    <th>Skill Percentage</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                
                                $sql = "SELECT * FROM skill";
                                $result = $con->query($sql);

                                if ($result->num_rows > 0) {
                                    // Output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row["skillname"] . "</td>";
                                        echo "<td>" . $row["skillper"] . "%</td>";
                                        echo "<td><a href='delete_skill.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm mb-1'>Delete</a></td>";
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
                <hr>
                <div class="container">
                <div class="row gutters d-flex justify-content-center mt-5" id="update">
                    <div class="col-xl-10 col-lg-9 col-md-12 col-sm-12 col-12">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="row gutters mx-auto">
                                    <div class="col-xl-10 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <h6 class="mb-2 text-primary">EDIT DETAILS</h6>
                                        
                                    </div>
                                    
                                    <form method="POST" action="link_update.php"> 
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="role">Social Media Link</label>
                                            <input type="text" class="form-control" id="role" name="link" placeholder="Enter Social Media Link">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="fullName">Logo</label>
                                            <input type="text" class="form-control" id="fullName" name="logo" placeholder="(e.g. bi bi-facebook)">
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="text-right d-flex justify-content-end">
                                            <button type="submit" id="submit" name="submit" class="btn btn-success me-3">Add Social Media</button>
                                            
                                        </div>
                                    </div>
                                </div>
                                </form>
                                <div class="table-responsive mt-3">
                                <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Social Media Link</th>
                                    <th>Logo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                
                                $sql = "SELECT * FROM socialmedia";
                                $result = $con->query($sql);

                                if ($result->num_rows > 0) {
                                    // Output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row["link"] . "</td>";
                                        echo '<td><i class="' . $row["logo"] . '"></i></td>';
                                        echo "<td><a href='delete_link.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm mb-1'>Delete</a></td>";
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
  <script src="js/main.js"></script>

</body>
</html>
