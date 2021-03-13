<?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $mysqli = mysqli_connect($dbhost, $dbuser, $dbpass);

    // if database exists
    $dbname = "restoranutsif430";
    $sql = "SHOW DATABASES LIKE '$dbname'";
    if(empty(mysqli_fetch_array(mysqli_query($mysqli, $sql)))){
        $sql = "CREATE DATABASE $dbname";
        if(!mysqli_query($mysqli, $sql)){
            echo "Error creating database: " . mysqli_error($mysqli);
        }
    }
    mysqli_select_db($mysqli, $dbname);
?>