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

        // Check if nic already available
        $check = "SELECT * FROM buyer WHERE nic_number ='$nic_num'";
        $result = mysqli_query($conn, $check);

        if(mysqli_num_rows($result) > 0){
            header("location: ../buyers.php?err=nicexist");
            exit();
        }
        
        // Insert new row to the table with variables
        $sql = "INSERT INTO buyer (nic_number, Name, Address, Reg_details, Phone_Number, company_id) VALUES('$nic_num', '$name', '$address', '$reg_details', $phone, 1111)";
        if(mysqli_query($conn, $sql)){
            header("location: ../buyers.php?success=inserted");
        }
        else{
            header("location: ../buyers.php?err=failed");
        }
    }
?>