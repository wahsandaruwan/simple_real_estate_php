<?php
    session_start();
    // Not logged in
    if(!isset($_SESSION["user_id"])){
        header("location: ./index.php");
    }

    // Header
    require_once "./inc/header.php";

    // --Db Conn--
    require_once "./inc/dbh.php";
?>
<body>
    <div class="nav-bar">
        <div class="logo"><span>Real Estate</span> Company</div>
        <ul class="menu">
            <li><a href="./dashboard.php">Dashboard</a></li>
            <li><a href="./properties.php">Manage Properties</a></li>
            <li><a href="./buyers.php">Manage Buyers</a></li>
            <li><a href="./inc/logout.php">Logout</a></li>
            <li class="user">Welcome User</li>
        </ul>
    </div>
    <div class="main-sec">
        <div class="sum-box">
            <img src="./images/home.png" alt="">
            <h2>Number of Properties</h2>
            <h2 class="num">
                <?php
                    // Get property count
                    $sql = "SELECT COUNT(*) FROM property";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) >= 1){
                        $row = mysqli_fetch_assoc($result);
                        echo $row["COUNT(*)"];
                    }
                    else{
                        echo 0;
                    }
                ?>
            </h2>
        </div>
        <div class="sum-box">
            <img src="./images/buyers.png" alt="">
            <h2>Number of Buyers</h2>
            <h2 class="num">
                <?php
                    // Get property count
                    $sql = "SELECT COUNT(*) FROM buyer";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) >= 1){
                        $row = mysqli_fetch_assoc($result);
                        echo $row["COUNT(*)"];
                    }
                    else{
                        echo 0;
                    }
                ?>
            </h2>
        </div>
        <div class="sum-box">
            <img src="./images/workers.png" alt="">
            <h2>Number of Workers</h2>
            <h2 class="num">
                <?php
                    // Get property count
                    $sql = "SELECT COUNT(*) FROM worker";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) >= 1){
                        $row = mysqli_fetch_assoc($result);
                        echo $row["COUNT(*)"];
                    }
                    else{
                        echo 0;
                    }
                ?>
            </h2>
        </div>
    </div>
</body>
</html>