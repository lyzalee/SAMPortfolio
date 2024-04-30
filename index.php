<?php
include_once('config.php');

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

$query_about = "SELECT * FROM about "; 
$result_about = $con->query($query_about); 

if ($result_about->num_rows > 0) {
$ipcr_about = $result_about->fetch_assoc();
                  $stdid = $ipcr_about['id'];
                  $name = $ipcr_about['name'];
                  $des1 = $ipcr_about['des1'];
                  $des2 = $ipcr_about['des2'];
                  $des3 = $ipcr_about['des3'];


}
$query = "SELECT * FROM socialmedia "; 
$result = $con->query($query); 

if ($result->num_rows > 0) {
$row = $result->fetch_assoc();
                  $logo = $row['logo'];
                  $link = $row['link'];
                  


}

function insertContactData($name, $email, $subject, $message, $con) {
    
    $stmt = $con->prepare("INSERT INTO contact_me (name, email, subject, message) VALUES (?, ?, ?, ?)");
    
    // Bind parameters
    $stmt->bind_param("ssss", $name, $email, $subject, $message);
    

    if ($stmt->execute()) {
        return true; 
    } else {
        return false;
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    
    if (insertContactData($name, $email, $subject, $message, $con)) {
        echo "<script>alert('Message sent successfully');</script>";
    } else {
        echo "<script>alert('Error sending message');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lee's Portfolio</title>
  <link rel="stylesheet" href="css/style.css">

  <!--for links-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
</head>

<body>

  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
      <div class="logo">
        <a class="navbar-brand" id="logo" href="LP_ADMIN/admin.php">LYLORE</a>
      </div>
      
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a href="#home" class="nav-link"><span data-hover="Home">Home</span></a>
                </li>
                <li class="nav-item">
                    <a href="#aboutme" class="nav-link"><span data-hover="About">About</span></a>
                </li>
                <li class="nav-item">
                    <a href="#portfolio" class="nav-link"><span data-hover="Portfolio">My Works</span></a>
                </li>
                <li class="nav-item">
                    <a href="#contact" class="nav-link"><span data-hover="Contact">Contact</span></a>
                </li>
                <li class="nav-item">
                    <a href="LYLORE.pdf" download class="nav-link"><span data-hover="">Download CV</span></a>
                   
                </li>
            </ul>
        </div>
     </div>
  </nav>
 

    <!-- home section -->
    <section class="home mt-5 mx-auto col-lg-9 col-md-10  " id="home">
        <div class="home-text">
            <div class="intro">
                <span><?php echo $skill1?></span>
                <h1><?php echo $displayname?></h1>
                <p><?php echo $description?></p>
            </div>
            <?php
                            $query = "SELECT * FROM socialmedia"; 
                            $result = $con->query($query); 

                            if ($result->num_rows > 0) {
                                echo '<div class="socialbtn mt-5">';
                                while ($row = $result->fetch_assoc()) {
                                    $logo = $row['logo'];
                                    $link = $row['link'];

                                    // Dynamically generate the HTML for each social media icon and link
                                    echo '<a href="' . $link . '" class="rectangle"class="socmed">';
                                    echo '<i class="' . $logo . '"></i>';
                                    echo '</a>';
                                }
                                echo '</div>';
                            } else {
                                echo "No social media links found";
                            }
                            ?>
                        </div>
                   </div>
        <div class="col-lg-6 col-md-12 col-12 mx-auto mt-4">
          <div class="home-img">
              <img src="LP_ADMIN/img/<?php echo $home_picture?>" class="img-fluid">
          </div>
      </div>

    </section>

    <!-- about me section -->
    <section class="about col-lg-10 col-md-10" id="aboutme">
    <div class="about">     
        <div class="left">
            <h2 class="title"><?php echo $name ?></h2>
            <hr>
            <br>
            <p><?php echo $des1 ?></p>
            <p><?php echo $des2 ?></p>
            <p><?php echo $des3 ?></p>
        </div>
        
        <div class="right">
            <h3 class="title">My Skills</h3>
            <?php
            $query = "SELECT * FROM skill";
            $result = $con->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
            <div class="progress-container">
                <p class="skill-name"><?php echo $row['skillname']; ?></p>
                <div class="progress " style="height: 30px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $row['skillper']; ?>%;" aria-valuenow="<?php echo $row['skillper']; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <?php
                }
            } else {
                echo "No skill data found";
            }
            ?>
        </div>
    </div>  
</section>

    
    <section class="portfolio" id="portfolio" >
        <div class="container col-lg-9 col-md-10"  >
        <h2  >My Works</h2>
          <ul class="cards" >
                      <?php

            $query = "SELECT * FROM work";
            $result = $con->query($query);

            if ($result->num_rows > 0) {
                
                while ($row = $result->fetch_assoc()) {
                  echo '<li class="card">';
                  echo '<div>';
                  echo '<h3 class="card-title">' . $row['title'] . '</p>';
                  echo '<div class="card-content">';
                  echo ' <img src="LP_ADMIN/img/' . $row['picture'] . '"alt="">';
                  echo '<p>' . $row['description'] . '</p>';
                  echo '</div>';
                  echo '</div>';
                  echo '<div class="card-link-wrapper">';
                  echo '<a href="'. $row['link'] .'" class="card-link">View Website</a>';
                  echo '</div>';
                  echo '</li>';

              }
            } else {
              echo "No skill data found";
            }
            ?>  
              
            
          </ul>
        </div>
    </section>

    <!-- contact section -->
    <section class="contact col-lg-12 col-md-10" id="contact">
        <div class="background">
            <div class="container">
              <div class="screen">
                <div class="screen-header">
                  <div class="screen-header-left">
                    <div class="screen-header-button close"></div>
                    <div class="screen-header-button maximize"></div>
                    <div class="screen-header-button minimize"></div>
                  </div>
                  <div class="screen-header-right">
                    <div class="screen-header-ellipsis"></div>
                    <div class="screen-header-ellipsis"></div>
                    <div class="screen-header-ellipsis"></div>
                  </div>
                </div>
                <div class="screen-body">
                  <div class="screen-body-item left col-lg-5">
                    <div class="app-title">
                      <span>CONTACT</span>
                      <span>ME</span>
                    </div>
                    <div class="app-contact">CONTACT INFO : +63 945 238 0867</div>
                  </div>
                  <form method="POST" action="" class=" col-lg-7">
                  <div class="screen-body-item ">
                  
                    <div class="app-form">
                      <div class="app-form-group">
                        <input class="app-form-control" name="name" placeholder="NAME">
                      </div>
                      <div class="app-form-group">
                        <input class="app-form-control"  name="email" placeholder="EMAIL">
                      </div>
                      <div class="app-form-group">
                        <textarea class="app-form-control" name="subject" rows="2" placeholder="Subject"></textarea>
    
                      </div>
                      <div class="app-form-group message">
                        <input class="app-form-control"  name="message" placeholder="MESSAGE">
                      </div>
                      <div class="app-form-group buttons">
                        
                        <button type="submit" class="app-form-button">SEND</button>
                      </div>
                    </div>
                   
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          
    </section>

    <footer>
      <div class="text">
          <span> &copy; Lylore. 2024 All Rights Reserved. </span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="main.js"></script>
</body>
</html>