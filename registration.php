<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8" />
    <title>Ragistration</title>
    <link rel="stylesheet" href="css/registration.css" />
    <link rel="stylesheet" href="css/hello.css" />
    <link rel="icon" href="images/favicon.png" type="image/png" />
    <style>
    .error {color: #FF0000;}
    </style>
  </head>
  <body>

  <?php
  // define variables and set to empty values
   $nameErr =  $emailErr = $phnnumErr = $fileToUploadErr = $genderErr =  "";
   $name =  $email = $phnnum = $fileToUpload = $gender =  "";

     if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
           $nameErr = "Name is required!";
         } else {
           $name = test_input($_POST["name"]);

    // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        $nameErr = "Only letters and white space allowed!";
        }
     }
  
    if (empty($_POST["email"])) {
      $emailErr = "Email is required!";
    } else {
      $email = test_input($_POST["email"]);

    // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format!";
     }
   }
    
    if (empty($_POST["phnnum"])) {
      $phnnumErr = "Phone Number is required!";
    } else {
      $phnnum = test_input($_POST["phnnum"]);

    // check if phone number syntax is valid
    if (!filter_var($phnnum, FILTER_SANITIZE_NUMBER_INT)) {
      $phnnumErr = "Only number allowed!";
      }    
   }

   if (empty($_POST["fileToUpload"])) {
    $fileToUploadErr = "File is required";
  } else {
    $fileToUpload = test_input($_POST["fileToUpload"]);
  }

    if (empty($_POST["gender"])) {
      $genderErr = "Gender is required";
    } else {
      $gender = test_input($_POST["gender"]);
    }
  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
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
            <h2>Registration</h2>
            <p>
                <form action="registration.php" method="POST" enctype="multipart/form-data">
                    <div class="container">

                      <label for="name"><b>Name</b></label>
                      <span class="error">* <?php echo $nameErr;?></span>
                      <input type="text" placeholder="Enter Name" name="name" id="name" >
                      
                  
                      <label for="email"><b>Email</b></label>
                      <span class="error">* <?php echo $emailErr;?></span>
                      <input type="text" placeholder="Enter Email" name="email" id="email">

                      <label for="phnnum"><b>Phone Number</b></label>
                      <span class="error">* <?php echo $phnnumErr;?></span>
                      <input type="text" placeholder="Enter Phone Number" name="phnnum" id="phnnum">

                      <!--Upload-->

                        <label><b>Select image to upload:</b></label>
                        <span class="error">*</span><br><br>                        
                        <input type="file" name="fileToUpload" id="fileToUpload">
                        <input type="submit" value="Upload Image" name="submit"> <br><br>

                        <label><b>Gender:</b></label><br><br>
                       <input type="radio" name="gender" value="female">Female
                       <input type="radio" name="gender" value="male">Male
                       <input type="radio" name="gender" value="other">Other
                       <span class="error">* <?php echo $genderErr;?></span>
                       <br><br>
                  
                      <label for="psw"><b>Password</b></label>
                      <span class="error">*</span>
                      <input type="password" placeholder="Enter Password" name="psw" id="psw">
                  
                      <label for="psw-repeat"><b>Confirm Password</b></label>
                      <span class="error">*</span>
                      <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat">
                  
                      <button type="submit" name="submit" id="submit" class="registerbtn">Register</button>
                    </div>
                    
                    <div class="container signin">
                      <p>Already have an account? <a href="login.php">Sign in</a>.</p>
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