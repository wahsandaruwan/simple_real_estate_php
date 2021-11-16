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
        <div class="common-frm">
            <h2>Add Property</h2>
            <form action="./inc/login.php" method="post">
                <input type="text" name="username" placeholder="Enterthe the area..." required>
                <input type="text" name="username" placeholder="Enterthe the estimated value..." required>
                <div class="drop-down">
                    <label for="sale_type">Enter sale type...</label>
                    <select name="sale_type" id="sale_type">
                        <option value="1">Sale</option>
                        <option value="2">Rent</option>
                        <option value="3">Lease</option>
                    </select>
                </div>
                <input type="text" name="username" placeholder="Enterthe the property address..." required>
                <div class="drop-down">
                    <label for="property_type">Enter property type...</label>
                    <select name="property_type" id="property_type">
                        <option value="1">House</option>
                        <option value="2">Land</option>
                    </select>
                </div>
                <button type="submit" name="prop-btn" class="frm-btn">Save</button>
            </form>
        </div>
        <div class="data-tbl">
            <table>
                <thead>
                    <tr>
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
                    <tr>
                        <td>2</td>
                        <td>1000</td>
                        <td>100000</td>
                        <td>Lease</td>
                        <td>Panadura</td>
                        <td>House</td>
                        <td><a class="btn-tbl btn-edit" href="#">Edit</a></td>
                        <td><a class="btn-tbl btn-del" href="#">Delete</a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>1000</td>
                        <td>100000</td>
                        <td>Lease</td>
                        <td>Panadura</td>
                        <td>House</td>
                        <td><a class="btn-tbl btn-edit" href="#">Edit</a></td>
                        <td><a class="btn-tbl btn-del" href="#">Delete</a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>1000</td>
                        <td>100000</td>
                        <td>Lease</td>
                        <td>Panadura</td>
                        <td>House</td>
                        <td><a class="btn-tbl btn-edit" href="#">Edit</a></td>
                        <td><a class="btn-tbl btn-del" href="#">Delete</a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>1000</td>
                        <td>100000</td>
                        <td>Lease</td>
                        <td>Panadura</td>
                        <td>House</td>
                        <td><a class="btn-tbl btn-edit" href="#">Edit</a></td>
                        <td><a class="btn-tbl btn-del" href="#">Delete</a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>1000</td>
                        <td>100000</td>
                        <td>Lease</td>
                        <td>Panadura</td>
                        <td>House</td>
                        <td><a class="btn-tbl btn-edit" href="#">Edit</a></td>
                        <td><a class="btn-tbl btn-del" href="#">Delete</a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>1000</td>
                        <td>100000</td>
                        <td>Lease</td>
                        <td>Panadura</td>
                        <td>House</td>
                        <td><a class="btn-tbl btn-edit" href="#">Edit</a></td>
                        <td><a class="btn-tbl btn-del" href="#">Delete</a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>1000</td>
                        <td>100000</td>
                        <td>Lease</td>
                        <td>Panadura</td>
                        <td>House</td>
                        <td><a class="btn-tbl btn-edit" href="#">Edit</a></td>
                        <td><a class="btn-tbl btn-del" href="#">Delete</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>