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
          <a class="navbar-brand brand-logo" href="index.html">LYLORE</a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top"> 
        <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text my-5">Welcome, <span class="text-black fw-bold">Lyza!</span></h1>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown"> 
            <a class="nav-link count-indicator" id="countDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="mdi mdi-message icon-lg"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="countDropdown">
              <a href="#" class="dropdown-item py-3">
                <p class="mb-0 font-weight-medium float-left">You have 7 unread messages </p>
                <span class="badge badge-pill badge-primary float-right">View all</span>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-item-content flex-grow py-2">
                  <p class="preview-subject ellipsis font-weight-medium text-dark">Mario Garner</p>
                  <small><span>messages here</span></small>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item dropdown d-none d-lg-block user-dropdown">
            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="mdi mdi-account icon-lg"></i>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
                <p class="mb-1 mt-3 font-weight-semibold">Angelina Moreno</p>
                <p class="fw-light text-muted mb-0">angelinamoreno@gmail.com</p>
              </div>
              <a href="myaccount.html" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile </a>
              <a href="#" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Log Out</a>
            </div>
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

        <div class="container-fluid">
          <div class="row justify-content-center">
              <div class="col-md-9 mt-5">
                  <div class="card">
                      <div class="card-body">
                          <h4 class="card-title py-3 border-bottom text-primary">Edit Details</h4>
                          <form>
                              
                              <div class="form-group">
                                  <label for="id">Title:</label>
                                  <input type="text" class="form-control" id="title" readonly>
                              </div>
                              <div class="form-group">
                                  <label for="description">Description:</label>
                                  <textarea class="form-control-desc" id="description"></textarea>
                              </div>
                              <div class="form-group">
                                <label for="image">Image:</label>
                                <input type="file" class="form-control-file" id="image">
                              </div>
                              <div class="form-group">
                                  <label for="file">URL:</label>
                                  <input type="url" class="form-control" id="link">
                              </div>
                              <div class="form-group text-right d-flex justify-content-end">
                                  <button type="submit" class="btn btn-primary">Save Changes</button>
                                  <button type="button" class="btn btn-danger mx-3">Cancel</button>
                              </div>
                          </form>
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
  <script src="js/jquery.cookie.js" type="text/javascript"></script>
  <script src="js/main.js"></script>
</body>

</html>

