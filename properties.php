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
        <h1>Manage Properties</h1>
    </div>
    <div class="main-sec">
        <!-- Properties form -->
        <div class="common-frm">
            <h2>
                <?php
                    if(isset($_GET["edit"])){
                        echo "Update Property";
                    }
                    else{
                        echo "Add Property";
                    }
                ?>
            </h2>
            <?php
                // Get property data after edit button clicked
                if(isset($_GET["edit"])){
                    $id = $_GET["edit"];
                    $sql = "SELECT * FROM property WHERE identification_num ='$id'";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) === 1){
                        $row = mysqli_fetch_assoc($result);
                    }
                }
            ?>
            <form action="
                <?php 
                    if(isset($_GET["edit"])) {
                        echo "./inc/updateProperty.php";
                    } 
                    else{
                        echo "./inc/addProperty.php";
                    }
                ?>
            " method="post">
                <input type="number" name="id_num" value="<?php if(isset($_GET["edit"])) echo $row["identification_num"]; ?>" placeholder="Enter the identification number..." required <?php if(isset($_GET["edit"])) echo "style='pointer-events: none;'"; ?>>
                <input type="number" name="area" value="<?php if(isset($_GET["edit"])) echo $row["area"]; ?>" placeholder="Enter the area..." required>
                <input type="number" name="est_val" value="<?php if(isset($_GET["edit"])) echo $row["estimated_value"]; ?>" placeholder="Enter the estimated value..." required>
                <div class="drop-down">
                    <label for="sale_type">Enter the sale type...</label>
                    <select name="sale_type" id="sale_type">
                        <option value="1" <?php if(isset($_GET["edit"]) && $row["sale_type_id"] == 1) echo "selected"; ?>>Sale</option>
                        <option value="2" <?php if(isset($_GET["edit"]) && $row["sale_type_id"] == 2) echo "selected"; ?>>Rent</option>
                        <option value="3" <?php if(isset($_GET["edit"]) && $row["sale_type_id"] == 3) echo "selected"; ?>>Lease</option>
                    </select>
                </div>
                <input type="text" name="prop_addr" value="<?php if(isset($_GET["edit"])) echo $row["property_address"]; ?>" placeholder="Enter the property address..." required>
                <div class="drop-down">
                    <label for="property_type">Enter the property type...</label>
                    <select name="property_type" id="property_type">
                        <option value="1" <?php if(isset($_GET["edit"]) && $row["property_type_id"] == 1) echo "selected"; ?>>House</option>
                        <option value="2" <?php if(isset($_GET["edit"]) && $row["property_type_id"] == 2) echo "selected"; ?>>Land</option>
                    </select>
                </div>
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
                        if($_GET["err"] === "idexist"){
                            echo "<div class='msg err'>ID number already available!</div>";
                        }
                        else{
                            echo "<div class='msg err'>Failed to execute!</div>";
                        }
                    }
                ?>
            </form>
        </div>
        <!-- Properties table -->
        <div class="data-tbl">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Area</th>
                        <th>Estimated Value</th>
                        <th>Sale Type</th>
                        <th>Property Address</th>
                        <th>Property Type</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Populate property table data
                        $sql = "SELECT * FROM property";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) > 0){
                            $count = 0;
                            while ($row = mysqli_fetch_array($result)) { 
                                $count++;
                            ?>
                                <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $row["identification_num"]; ?></td>
                                <td><?php echo $row["area"]; ?></td>
                                <td><?php echo $row["estimated_value"]; ?></td>
                                <td>
                                    <?php
                                        // Sale type
                                        if($row["sale_type_id"] == 1){
                                            echo "Sale";
                                        }
                                        else if($row["sale_type_id"] == 2){
                                            echo "Rent";
                                        }
                                        else{
                                            echo "Lease";
                                        }
                                    ?>
                                </td>
                                <td><?php echo $row["property_address"]; ?></td>
                                <td>
                                    <?php 
                                        // Property type
                                        if($row["property_type_id"] == 1){
                                            echo "House";
                                        }
                                        else{
                                            echo "Land";
                                        }
                                    ?>
                                </td>
                                <td><a class='btn-tbl btn-edit' href='./properties.php?edit=<?php echo $row["identification_num"]; ?>'>Edit</a></td>
                                <td><a class='btn-tbl btn-del' href='./inc/deleteProperty.php?del=<?php echo $row["identification_num"]; ?>'>Delete</a></td>
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