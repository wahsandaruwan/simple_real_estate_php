<?php
    // --Db Conn--
    require_once "./dbh.php";

    if(isset($_GET["del"])){
        // Variables
        $nic_num = $_GET["del"];
        
        // Delete specific row of the table
        $sql = "DELETE FROM buyer WHERE nic_number = '$nic_num'";
        if(mysqli_query($conn, $sql)){
            header("location: ../buyers.php?success=deleted");
        }
        else{
            header("location: ../buyers.php?err=failed");
        }
    }
?>