<?php
session_start();
  include "../config.php";
  

  if (isset($_SESSION['ID'])) {
    header("Location: index.php");
    exit();
}

  if (isset($_POST['submit'])) {
    $errorMsg = "";
    $username = $con->real_escape_string($_POST['username']);
    $password = $con->real_escape_string($_POST['password']);
    if (!empty($username) || !empty($password)) {
        $query = "SELECT * FROM `users` WHERE `user_name` = '$username'";
        $result = $con->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashed_password = $row['password'];
            if (password_verify($password, $hashed_password)) {
				$_SESSION['ID'] = $row['id'];
                header("Location:index.php");
                die();
            } else {
                $errorMsg = "Invalid password";
            }
        } else {
            $errorMsg = "No user found with this username";
        }
    } else {
        $errorMsg = "Username and password are required";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lee's Portfolio</title>
        <link rel="stylesheet" href="../css/admin.css">

        <!-- for links -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

 
    </head>

    <body>
        <div class="form-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8">
                        <div class="form-container">
                            <div class="form-icon">
                            <lord-icon
                                    src="https://cdn.lordicon.com/bgebyztw.json"
                                    trigger="hover"
                                    colors="primary:#0a5c15,secondary:#0a5c15"
                                    style="width:250px;height:150px">
                                </lord-icon>
                            </div>
                            <form class="form-horizontal" action="" method="POST">
                                <h3 class="title">Hello, Admin!</h3>
                                <div class="form-group">
                                    <span class="input-icon"><i class="fa fa-envelope"></i></span>
                                    <input class="form-control" type="text" name="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <span class="input-icon"><i class="fa fa-lock"></i></span>
                                    <input class="form-control" type="password" name="password" placeholder="Password">
                                </div>
                                <button class="btn signin" type="submit" name="submit">Login</button>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.lordicon.com/lordicon.js"></script>

    </body>
</html>