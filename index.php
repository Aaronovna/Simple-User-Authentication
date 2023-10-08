<?php
    ini_set("display_errors", "1");
    error_reporting(E_ALL);
    
    $email = $password = "";
    $emailErr = $passwordErr = "";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
      if(empty($_POST["email"]))
      {
          $emailErr = "Email is Required!";
          //die("FILL UP ALL THE INFORMATION NEEDED");
      }
      else
      {
        $email = $_POST["email"];
      }
      if(empty($_POST["password"]))
      {
          $passwordErr = "Password is Required!";
          //die("FILL UP ALL THE INFORMATION NEEDED");
      }
      else
      {
        $password = $_POST["password"];
      }
    }

    if($email && $password)
    {
	    include("connection.php");

        $check_email = mysqli_query ($connections, "SELECT * FROM createAccount WHERE email = '$email'");
        $check_email_row = mysqli_num_rows($check_email);

        if($check_email_row > 0)
        {
	        while($row = mysqli_fetch_assoc($check_email))
            {
                $db_password = $row ["PASSWORD"];
                $db_account_type = $row ["ACCOUNT_TYPE"];
            
                if($password == $db_password)
                {
                    if($db_account_type == 1)
                    {
                        session_start();
                        $_SESSION['varname'] = 'ADMIN';
                        echo "<script> window.location.href = 'home.php'; </script>";
                        
                    }
                    else
                    {
                        session_start();
                        $_SESSION['varname'] = 'USER';
                        echo "<script> window.location.href = 'home.php'; </script>";
                    }
                }
                else
                {
                    $passwordErr = "Password is Incorrect!";
                }
            }
	        
	    }
		else
		{
		  $emailErr = "Email is not registered";
		}
   }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Log In</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width , initial-scale=1.0">
        <link rel=icon          href=bcp_logo.png   sizes="16x16"   type="image/png">
        <link rel="stylesheet"  href="style.css">
    </head>
    <body>
        <img onclick="location.href = 'index.php';" class="logo" src="bcp_logo.png" width="512px" title="Beslink College of the Philippines">
        <section class="login">
            <div class="login">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="loginFormCentered">
                        <input type="email"     name="email"    placeholder="Email"     title="Email is required"> 
                        <input type="password"  name="password" placeholder="Password"  title="Password is required">   
                    </div>
                    <div class="loginFormCentered">
                        <span> <p class="error"><?php echo $emailErr;?> </p> </span>
                        <span> <p class="error"><?php echo $passwordErr;?> </p> </span>
                    </div>
                    <div class="loginFormColumn">
                        <button id="loginLogin">Log In</button>
                    </div>
                </form>

                <div class="loginFormColumn">
                    <hr>
                    <button id="forgotLogin" onclick="location.href = 'forgot.html';">Forgot Password</button>
                    <button id="createLogin" onclick="location.href = 'create.php';">Create Account</button>
                </div>
            </div>
            <div class="footer">
                <img src="bcp_logo.png" width="48px" style="margin: 0px 20px 0px;">
                <p  style="font-size: smaller;">BESLINK COLLEGE OF THE PHILIPPINES</p>
            </div>
        </section>

    </body>
</html>
