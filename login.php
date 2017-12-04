<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
    $myusername = mysqli_real_escape_string($db,$_POST['username']);
    $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT * FROM users WHERE username = '$myusername' and pass = '$mypassword'";
      $result = mysqli_query($db,$sql);
      if (!$result) {
        printf("Error: %s\n", mysqli_error($db));
        exit();
    }

      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      	
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         
         header("location: controller.html");
      }
   }
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Parrot Airborne Cargo</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="all,follow">
        <!-- Bootstrap CSS-->
        <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome CSS-->
        <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
        <!-- Custom icon font-->
        <link rel="stylesheet" href="css/fontastic.css">
        <!-- Google fonts - Roboto -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
        <link rel="stylesheet" href="css/login.css"> 
    </head> 
    <body>
        <div class="drone-logo">
            <img src="images/drone.png" height="300px"> 
        </div> 
        <div class="text-center" style="padding:50px 0">
	        <div class="login-form-1">
		        <form id="login-form" class="text-left" role="form" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "post">
                    <div class="login-form-main-message"></div>
			        <div class="main-login-form">
				        <div class="login-group">
					        <div class="form-group">
						        <label name="username" for="lg_username" class="sr-only">Username</label>
						        <input type="text" class="form-control" id="lg_username" name="username" placeholder="username">
					        </div>
					        <div class="form-group">
						        <label name="password"for="lg_password" class="sr-only">Password</label>
						        <input type="password" class="form-control" id="lg_password" name="password" placeholder="password">
					        </div>
				        </div>
				        <button type="submit" value="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
			        </div>
		        </form>
	        </div>
        </div>
    </body>
</html>