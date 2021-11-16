<?php
    // --Db Conn--
    require_once "./dbh.php";

    if(isset($_POST["lg-btn"])){
        // Variables
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);
        
        // Check the variables with the users table
        $sql = "SELECT * FROM users WHERE username ='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) === 1){
            // Save row
            $row = mysqli_fetch_assoc($result);
            // Create session variables
            session_start();
            $_SESSION["user_id"] = $row["user_id"];
            $_SESSION["username"] = $row["username"];
            $_SESSION["user_type"] = $row["user_type"];

            header("location: ../dashboard.php");
        }
    }
?>