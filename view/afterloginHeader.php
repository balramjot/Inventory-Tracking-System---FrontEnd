<?php require('../model/check_session.php'); ?>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo APP_URL; ?>/dashboard/index.php?action=dashboard">Inventory Tracking System</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="<?php echo APP_URL; ?>/inventory/index.php?action=inventoryTrack">Inventory Transaction</a></li>
            <li><a href="<?php echo APP_URL; ?>/inventory/index.php?action=myInventoryTrack">My Transaction</a></li>
            <li><a href="<?php echo APP_URL; ?>/contactus/index.php?action=contactUS">Contact Us</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;<?php echo $_SESSION['account']['name']; ?> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                <li><a href="<?php echo APP_URL; ?>/changepassword"> <span class="glyphicon glyphicon-cog"></span> Change Password</a></li>
                <li><a href="../logout"><span class="glyphicon glyphicon-log-out"></span>  Sign Out</a></li>
                </ul>
            </li>
        </ul>
            <div class="clear"></div>
    </div>
</nav>
<div class="clear ht_50"></div><div class="ht_20"></div>