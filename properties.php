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
        <div class="common-frm">
            <h2>Manage Properties</h2>
            <form action="./inc/login.php" method="post">
                <input type="text" name="username" placeholder="Enter your username..." required>
                <input type="password" name="password" placeholder="Enter your password..." required>
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