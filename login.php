<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOGIN</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css"/>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

    <link rel = "stylesheet" href="assets/css/all.css"/>
    <link rel = "stylesheet" href="assets/css/style.css"/>
   
   
</head>
<body>
        <?php
        include ('init.php');
        global $connect;
        $username = $password = "";

        if($_SERVER["REQUEST_METHOD"] == "POST"){
          $username = test_input($_POST["UserName"]);
          $password = test_input($_POST["Password"]);

          $checkQuery = "select * from userlogin where userName='$username' AND password='$password'";
          $tempresult = mysqli_query($connect,$checkQuery);
          $temprow = mysqli_fetch_assoc($tempresult);
          $role = $temprow["role"];
			// echo $username;
			// echo $password;


            if(mysqli_num_rows($tempresult)==0){
              echo '<script>alert("Wrong Credentials")</script>';
            }
            else if($role == "admin"){
              echo '<script>window.location="http://localhost/VMS/admin/dashboardAdmin.php";</script>';
            }else{
              echo '<script>window.location="http://localhost/VMS/dashboard.php";</script>';
            }  

        }

        function test_input($data){
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }

        ?>  

        <br/><br/>
            
            
        
        <div class="container">
        <div class="row">
              <div class="col-sm-2"></div>
              <div class="col-sm-8">
                <img src="assets/img/logo.png" class="mx-auto d-block" alt="AKD-LOGO" height="80px" weight="80%">  
              </div>
              <div class="col-sm-2"></div>
            </div>
                <div class="row">
                  <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card card-signin my-5">
                      <div class="card-body">
                        <h5 class="card-title text-center">VISITOR MANAGEMENT SYSTEM</h5>
                        <form class="form-signin" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                          <div class="form-label-group">
                            <input type="name" id="UserName" name="UserName" class="form-control" placeholder="Userame" required autofocus>
                            <label for="UserName">Username</label>
                          </div>
            
                          <div class="form-label-group">
                            <input type="password" id="inputPassword" name="Password" class="form-control" placeholder="Password" required>
                            <label for="inputPassword">Password</label>
                          </div>
                          
                          <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Remember password</label>
                          </div>
                          <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Log in</button> 
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
          
              
</body>
</html>