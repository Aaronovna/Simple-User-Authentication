<?php
    $connections = mysqli_connect ("localhost","root","","pyredatabase");

    if(mysqli_connect_errno())
    {
        echo "Failed to connect to Mysqli; " . mysqli_connect_error();
    }
?>