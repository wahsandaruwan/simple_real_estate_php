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
    <div class="title">
        <h1>Manage Buyers</h1>
    </div>
    <div class="main-sec">
        <!-- Buyers form -->
        <div class="common-frm">
            <h2>
                <?php
                    if(isset($_GET["edit"])){
                        echo "Update Buyer";
                    }
                    else{
                        echo "Add Buyer";
                    }
                ?>
            </h2>
            <?php
                // Get buyer data after edit button clicked
                if(isset($_GET["edit"])){
                    $nic = $_GET["edit"];
                    $sql = "SELECT * FROM buyer WHERE nic_number ='$nic'";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) === 1){
                        $row = mysqli_fetch_assoc($result);
                    }
                }
            ?>
            <form action="
                <?php 
                    if(isset($_GET["edit"])) {
                        echo "./inc/updateBuyer.php";
                    } 
                    else{
                        echo "./inc/addBuyer.php";
                    }
                ?>
            " method="post">
                <input type="text" name="nic_num" value="<?php if(isset($_GET["edit"])) echo $row["nic_number"]; ?>" placeholder="Enter the nic number..." required <?php if(isset($_GET["edit"])) echo "style='pointer-events: none;'"; ?>>
                <input type="text" name="name" value="<?php if(isset($_GET["edit"])) echo $row["Name"]; ?>" placeholder="Enter the name..." required>
                <input type="text" name="address" value="<?php if(isset($_GET["edit"])) echo $row["Address"]; ?>" placeholder="Enter the address..." required>
                <input type="text" name="reg_details" value="<?php if(isset($_GET["edit"])) echo $row["Reg_details"]; ?>" placeholder="Enter the registration details..." required>
                <input type="number" name="phone" value="<?php if(isset($_GET["edit"])) echo $row["Phone_Number"]; ?>" placeholder="Enter the phone number..." required>
                <button type="submit" name="prop-btn" class="frm-btn">
                    <?php
                        if(isset($_GET["edit"])){
                            echo "Update";
                        }
                        else{
                            echo "Add";
                        }
                    ?>
                </button>
                <?php
                    if(isset($_GET["success"])){
                        echo "<div class='msg success'>Successfully executed!</div>";
                    }
                    else if(isset($_GET["err"])){
                        if($_GET["err"] === "nicexist"){
                            echo "<div class='msg err'>NIC number already available!</div>";
                        }
                        else{
                            echo "<div class='msg err'>Failed to execute!</div>";
                        }
                    }
                ?>
            </form>
        </div>
        <!-- Buyers table -->
        <div class="data-tbl">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NIC</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Reg Details</th>
                        <th>Phone Number</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Populate property table data
                        $sql = "SELECT * FROM buyer";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) > 0){
                            $count = 0;
                            while ($row = mysqli_fetch_array($result)) { 
                                $count++;
                            ?>
                                <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $row["nic_number"]; ?></td>
                                <td><?php echo $row["Name"]; ?></td>
                                <td><?php echo $row["Address"]; ?></td>
                                <td><?php echo $row["Reg_details"]; ?></td>
                                <td><?php echo $row["Phone_Number"]; ?></td>
                                <td><a class='btn-tbl btn-edit' href='./buyers.php?edit=<?php echo $row["nic_number"]; ?>'>Edit</a></td>
                                <td><a class='btn-tbl btn-del' href='./inc/deleteBuyer.php?del=<?php echo $row["nic_number"]; ?>'>Delete</a></td>
                                </tr>
                            <?php }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>