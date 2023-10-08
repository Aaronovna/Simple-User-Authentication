<?php
    ini_set("display_errors", "1");
    error_reporting(E_ALL);

    session_start();
    $accType = $_SESSION['varname'];
    $FColor = '';

    if($accType == 'ADMIN')
    {
        $FColor = 'red';
    }
    if($accType == 'USER')
    {
        $FColor = 'blue';
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
        <span> <p style='color: <?php echo $FColor?>; font-size: 200px;'> <?php echo $accType;?> </p> </span>

    </body>
</html>