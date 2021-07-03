<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8" />
    <title></title>
   

    <link rel="stylesheet" href="css/login.css" />
    <link rel="stylesheet" href="css/hello.css" />
    <link rel="icon" href="images/favicon.png" type="image/png" />

    <style>
    .error {color: #FF0000;}
    </style>

  </head>
  <body>

  <?php
  // define variables and set to empty values
   $unameErr =  "";
   $uname =  "";

     if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["uname"])) {
           $unameErr = "Name is required!";
         } else {
           $uname = test_input($_POST["uname"]);

    // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z-' ]*$/",$uname)) {
        $unameErr = "Only letters and white space allowed!";
        }
     }    
      
  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
   // Set session variables
   $_SESSION["sname"] = "MD. NUR ALAM";

  ?>

    <div id="wrapper">
      <header>
        <div id="header">
            <h2><a href="index.php" class="tea">Tea Shop</a></h2>
          <p>Enjoy your free time with tea...</p>
        </div>
      </header>
  
      <div id="content_wrapper">
        <div id="content">
          <article>
           <h2>Login</h2>
            <p>
                <form action="admin.php" method="POST" enctype="multipart/form-data">
                   
                  
                    <div class="container">
                      <label for="uname"><b>Username</b></label>
                      <span class="error">* <?php echo $unameErr;?></span>
                      <input type="text" placeholder="Enter Username" name="uname" value="<?php echo $_SESSION["sname"]; ?>">
                  
                      <label for="psw"><b>Password</b></label>
                      <span class="error">*</span>
                      <input type="password" placeholder="Enter Password" name="psw">
                          
                      <button type="submit" name="submit" id="submit">Login</button>
                      <label>
                        <input type="checkbox" checked="checked" name="remember"> Remember me
                      </label>
                    </div>
                  
                    <div class="container" style="background-color:#f1f1f1">
                      
                    </div>

                    <div class="container signin">
                      <p>Not yet registred? <a href="registration.php" class="notregistration">Registration</a>.</p>
                    </div>

                  </form>
                  
            </p>
          </article>
        </div>

      </div>

      <footer>
        <div id="footer">
          <p>&copy;All Rigth Reserved by- MD. NUR ALAM</p>
        </div>
      </footer>
    </div>
    
  </body>
</html>