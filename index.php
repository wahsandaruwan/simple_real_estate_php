<?php
    session_start();
    // Logged in
    if(isset($_SESSION["user_id"])){
        header("location: ./dashboard.php");
    }
    // Header
    require_once "./inc/header.php";
?>
<body>
    <div class="main-sec">
        <div class="common-frm">
            <h2>Login</h2>
            <form action="./inc/login.php" method="post">
                <input type="text" name="username" placeholder="Enter your username..." required>
                <input type="password" name="password" placeholder="Enter your password..." required>
                <button type="submit" name="lg-btn" class="lg-btn">Login</button>
            </form>
        </div>
    </div>
</body>
</html>