<!--
Name :Mohammad Mahmudur  Rahman
Date: 2020/10/14
Subject : CIS-2288
Assignment: 03
This section is about navigating menu bar and assisting ordervegetables php page to shape as more dynamic page
-->

<?php
$page = "navPanel.php";
?>
<nav>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="navbar-brand" href="./orderVegetables.php">Acme International</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./orderVegetables.php">Shop <span class="<?php if ($page == "orderVeg") echo "current"; ?>"></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="viewOrders.php">View Order <span class="<?php if ($page == "viewOrder") echo "current"; ?>"></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./resetOrders.php">Reset Order <span class="<?php if ($page == "resetOrder") echo "current"; ?>"></span></a>
            </li>
        </ul>
    </div>
</nav>

<div><img src="./images/vegetables.jpg" class="img-responsive"></div>