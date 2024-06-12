<?php 
    // error_reporting(0);
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "myform";

    $connection = mysqli_connect($servername, $username, $password, $dbname);
    
    if($connection){
        // echo "Connected";
    }
    else{
        echo "Not Connected".mysqli_connect_error();
    }
?>