<?php
    // --Db Conn--
    require_once "./dbh.php";

    if(isset($_POST["prop-btn"])){
        // Variables
        $nic_num = mysqli_real_escape_string($conn, $_POST["nic_num"]);
        $name = mysqli_real_escape_string($conn, $_POST["name"]);
        $address = mysqli_real_escape_string($conn, $_POST["address"]);
        $reg_details = mysqli_real_escape_string($conn, $_POST["reg_details"]);
        $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
        
        // Update the table with variables
        $sql = "UPDATE buyer SET Name = '$name', Address = '$address', Reg_details = '$reg_details', Phone_Number = $phone WHERE nic_number = '$nic_num'";
        if(mysqli_query($conn, $sql)){
            header("location: ../buyers.php?success=updated");
        }
        else{
            header("location: ../buyers.php?err=failed");
        }
    }
?>