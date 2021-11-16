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
        
        // Update the table with variables
        $sql = "UPDATE property SET area = '$area', estimated_value = $est_val, sale_type_id = $sale_type, property_address = '$prop_addr', property_type_id = $property_type WHERE identification_num = $id_num";
        if(mysqli_query($conn, $sql)){
            header("location: ../properties.php?success=updated");
        }
        else{
            header("location: ../properties.php?err=failed");
        }
    }
?>