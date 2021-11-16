<?php
    // --Db Conn--
    require_once "./dbh.php";

    if(isset($_GET["del"])){
        // Variables
        $id_num = $_GET["del"];
        
        // Delete specific row of the table
        $sql = "DELETE FROM property WHERE identification_num = $id_num";
        if(mysqli_query($conn, $sql)){
            header("location: ../properties.php?success=deleted");
        }
        else{
            header("location: ../properties.php?err=failed");
        }
    }
?>