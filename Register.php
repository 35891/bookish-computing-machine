<!DOCTYPE html>
    <html>
     <head>
        <title>Login Disini Beb</title>
        <style>
            label{ 
                display: block;
            }
        </style>    
    </head>
    <?php require 'Connection.php';?>
    <body>
        <?php
            function validate_input($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = validate_input($_POST["username"]);
                $password = validate_input($_POST["password"]);
                $password2 = validate_input($_POST["password2"]);
            }
            $bool = isset($_POST['form_submitted']) &&
                    !empty($_POST["username"]) && strlen($username) <= 30 &&
                    !empty($_POST["password"]) && strlen($password) <= 30 &&
                    strcmp($_POST["password"], $_POST["password2"]) == 0;
            if ($bool):
                require 'Creditentials.php';
                    $sql = "
                        INSERT INTO
                        users(username, password, isAdmin)
                        VALUES('$username', '$password', 0)
                    ";
                    if(!mysqli_query($mysqli, $sql)){
                        echo "Error inserting to table: " . mysqli_error($mysqli);
                    }
                mysqli_close($mysqli);
        ?>
            <h2>Thank You <?php validate_input($_POST["username"]);?></h2>

            <p>Go <a href="">back</a> to the form</p>
        <?php else: ?>
            <h1>Login Disini Beb</h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="Post">
                <ul?>
                    <li>
                        <label for="username">username :</label>
                        <input type="text" name="username" id="username"/>
                    </li>
                
                    <li>
                        <label for="password">password :</label>
                        <input type="Password" name="password" id="password"/>
                    </li>

                    <li>
                        <label  for="password2">konfirmasi password :</label>
                        <input type="Password" name="password2" id="password2"/>
                    </li>
                    <li>
                        <button type="submit" name="register">register!</button>
                    </li>

                    <input type="hidden" name="form_submitted" value="1"/>
                </ul>
            </form>
      <?php endif; ?> 
    </body>
</html> 