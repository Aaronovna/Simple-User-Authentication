<?php
  include("connection.php");
  ini_set("display_errors", "1");
  error_reporting(E_ALL);

  $email = $first_name = $last_name = $address = $birthday = $new_password = $gender = $account_type = "";
  $emailErr = $first_nameErr = $last_nameErr = $addressErr = $birthdayErr = $new_passwordErr = $genderErr = $account_typeErr = "";

  if($_SERVER["REQUEST_METHOD"]== "POST")
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

      if(empty($_POST["first_name"]))
      {
          $first_nameErr = "First Name is Required!";
          //die("FILL UP ALL THE INFORMATION NEEDED");
      }
      else
      {
              $first_name = $_POST["first_name"];
      }

      if(empty($_POST["last_name"]))
      {
          $last_nameErr = "Last Name is Required!";
          //die("FILL UP ALL THE INFORMATION NEEDED");
      }
      else
      {
              $last_name = $_POST["last_name"];
      }

      if(empty($_POST["address"]))
      {
          $addressErr = "Address is Required!";
          //die("FILL UP ALL THE INFORMATION NEEDED");
      }
      else
      {
              $address = $_POST["address"];
      }

      if(empty($_POST["birthday"]))
      {
          $birthdayErr = "Birthday is Required!";
          //die("FILL UP ALL THE INFORMATION NEEDED");
      }
      else
      {
              $birthday = $_POST["birthday"];
      }

      if(empty($_POST["new_password"]))
      {
          $new_passwordErr = "New Password is Required!";
          //die("FILL UP ALL THE INFORMATION NEEDED");
      }
      else
      {
              $new_password = $_POST["new_password"];
      }

      if(empty($_POST["gender"]))
      {
          $genderErr = "Gender is Required!";
          //die("FILL UP ALL THE INFORMATION NEEDED");
      }
      else
      {
              $gender = $_POST["gender"];
      }
      if(empty($_POST["account_type"]))
      {
          $account_typeErr = "Account Type is Required!";
          //die("FILL UP ALL THE INFORMATION NEEDED");
      }
      else
      {
              $account_type = $_POST["account_type"];
      }

    $sql = mysqli_query($connections,"INSERT INTO createAccount (EMAIL, FIRST_NAME, LAST_NAME, ADDRESS, BIRTHDAY, PASSWORD, GENDER, ACCOUNT_TYPE) 
              VALUES('$email', '$first_name', '$last_name', '$address', '$birthday', '$new_password', '$gender', '$account_type')");

    if($email && $first_name && $last_name && $address && $birthday && $new_password && $gender && $account_type)
    {
      $check_email = mysqli_query($connections, "SELECT * FROM createAccount WHERE EMAIL = '$email'");
      $check_email_row = mysqli_num_rows($check_email);
      if($check_email_row > 0)
      { 
        $emailErr = "Email is already registered!";
      }
      else
    {
      $query = mysqli_query($connections, $sql);
      echo "<script>window.location.href = 'accountCreateSuccess.html'</script>";
    }
      
    }
    
  }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Create Account</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width , initial-scale=1.0">
        <link rel=icon          href="bcp_logo.png"   sizes="16x16"   type="image/png">
        <link rel="stylesheet"  href="style.css">
    </head>

    <body>
        <section class="create">
            <div class="create">
              <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="createFormColumn">
                  <label style="margin-bottom: 20px;">Create An Account</label>
                  <input value="<?php echo $email;?>" type="email" class="create" name="email" id="email" placeholder="Email" title="Email is required">
                  <span> <p class="error"><?php echo $emailErr;?> </p> </span>
                </div>

                <div class="loginFormCentered">
                  <input value="<?php echo $first_name;?>" type="text" name="first_name" id="first_name" placeholder="First Name" title="First name is required">
                  
                  <input value="<?php echo $last_name;?>" type="text" name="last_name" id="last_name" placeholder="Last Name" title="Last name is required">
                </div>
                <div class="loginFormCentered">
                  <span> <p class="error""><?php echo $first_nameErr;?> </p> </span>
                  <span> <p class="error""><?php echo $last_nameErr;?> </p> </span>
                </div>

                <div class="createFormColumn">
                  <input value="<?php echo $address;?>" type="text" class="create" name="address" id="address" placeholder="Address" title="Address is required">
                  <span> <p class="error"><?php echo $addressErr;?> </p> </span>

                  <label for="birthday" style="margin: 10px 0px; font-size: smaller;">Birthday</label>
                  <input value="<?php echo $birthday;?>" type="date" class="create" name="birthday" id="birthday" placeholder="Birthday" title="Birthdate is required">
                  <span> <p class="error"><?php echo $birthdayErr;?> </p> </span>

                  <input value="<?php echo $new_password;?>" type="password" class="create" name="new_password" id="new_password" placeholder="New Password" title="Password is required">
                  <span> <p class="error"><?php echo $new_passwordErr;?> </p> </span>
                </div>
                
                <div class="loginFormCentered" style="justify-content:center;">
                  <span class="sexBox">
                    <label for="user_radio" class="sex">User</label>
                    <input type="radio" name="account_type" value="2" id="user_radio">
                  </span>

                  <span class="sexBox">
                    <label for="admin_radio" class="sex">Admin</label>
                    <input type="radio" name="account_type" value="1" id="admin_radio">
                  </span>
                  </div>
                  <span> <p class="error"><?php echo $account_typeErr;?> </p> </span>

                <div class="loginFormCentered">

                  <span class="sexBox">
                    <label for="male_radio" class="sex">Male</label>
                    <input type="radio" name="gender" value="male" id="male_radio">
                  </span>
                  
                  <span class="sexBox">
                    <label for="female_radio" class="sex">Female</label>
                    <input type="radio" name="gender" value="female" id="female_radio">
                  </span>
                  
                  <button id="createCreate" class="create" >Create Account</button>
                  
                </div>
                <span> <p class="error"><?php echo $genderErr;?> </p> </span>
                <!-- <span> <p class="error"><?php echo $gender;?> </p> </span> -->

              </form>
            </div>
          </section>
          <div class="footer">
            <img src="bcp_logo.png" width="48px" style="margin: 0px 20px 0px;">
            <p  style="font-size: smaller;">BESLINK COLLEGE OF THE PHILIPPINES</p>
          </div>
    </body>
</html>