<?php
    // --Db Conn--
    require_once "./dbh.php";

    if(isset($_POST["prop-btn"])){
        // Variables
        $id_num = mysqli_real_escape_string($conn, $_POST["id_num"]);
        $area = mysqli_real_escape_string($conn, $_POST["area"]);
        $est_val = mysqli_real_escape_string($conn, $_POST["est_val"]);
        $sale_type = mysqli_real_escape_string($conn, $_POST["sale_type"]);
        $prop_addr = mysqli_real_escape_string($conn, $_POST["prop_addr"]);
        $property_type = mysqli_real_escape_string($conn, $_POST["property_type"]);

        // Check if id already available
        $check = "SELECT * FROM property WHERE identification_num ='$id_num'";
        $result = mysqli_query($conn, $check);

        if(mysqli_num_rows($result) > 0){
            header("location: ../properties.php?err=idexist");
            exit();
        }
        
        // Insert new row to the table with variables
        $sql = "INSERT INTO property (company_id, identification_num, area, estimated_value, sale_type_id, property_address, property_type_id) VALUES(1111, $id_num, '$area', $est_val, $sale_type, '$prop_addr', $property_type)";
        if(mysqli_query($conn, $sql)){
            header("location: ../properties.php?success=inserted");
        }
        else{
            header("location: ../properties.php?err=failed");
        }
    }
?>