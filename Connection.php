<?php
    require 'Creditentials.php';

    $tbname = "users";
    $sql = "SHOW TABLES LIKE '$tbname'";
    if(empty(mysqli_fetch_array(mysqli_query($mysqli, $sql)))){
        $sql = "CREATE TABLE $tbname(
            id int(3) auto_increment, 
            primary key(id),
            firstName varchar(30),
            lastName varchar(30),
            username varchar(30),
            password varchar(30),
            dateOfBirth date,
            isMale bool,
            isAdmin bool
        )";
        if(!mysqli_query($mysqli, $sql)){
            echo "Error creating table: " . mysqli_error($mysqli);
        }
    }
    

    mysqli_close($mysqli);
?>