<div class="nav-bar">
    <div class="logo"><span>Real Estate</span> Company</div>
    <ul class="menu">
        <li><a href="./dashboard.php">Dashboard</a></li>
        <li><a href="./properties.php">Properties</a></li>
        <li><a href="./buyers.php">Buyers</a></li>
        <li><a href="./inc/logout.php">Logout</a></li>
        <li class="user">Welcome <?php if(isset($_SESSION["username"])) echo $_SESSION["username"]; ?></li>
    </ul>
</div>