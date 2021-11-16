<?php
    session_start();
    // Not logged in
    if(!isset($_SESSION["username"])){
        header("location: ./index.php");
    }

    // Header
    require_once "./inc/header.php";

    // --Db Conn--
    require_once "./inc/dbh.php";
?>
<body>
    <?php
        // Navbar
        require_once "./inc/navbar.php";
    ?>
    <div class="main-sec">
        <!-- Number of properties box -->
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
        <!-- Number of buyers box -->
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
        <!-- Number of workers box -->
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