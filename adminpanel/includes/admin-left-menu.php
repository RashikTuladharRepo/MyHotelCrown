<?php
$uri= $_SERVER['REQUEST_URI'];
$array=explode("/",$uri);
$count=count($array);
$page=trim(strtolower($array[$count-1]));
//echo $page=trim($page);
?>

<div class="dashboard-sidebar col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li class="<?php echo ($page=="dashboard.php"||$page=="")?"active" :""; ?>"><a href="<?php echo $baseurl;
            ?>dashboard.php"><i class="fa fa-home"></i> Dashboard</a></li>
        <li class="<?php echo ($page=="aboutus.php")?"active" :""; ?>"><a href="<?php echo $baseurl; ?>aboutus
        .php"><i class="fa fa-group"></i> About Us</a></li>
        <li class="<?php echo ($page=="features.php")?"active" :""; ?>"><a href="<?php echo $baseurl; ?>features
        .php"><i class="fa fa-thumbs-o-up"></i> Our Features</a></li>
        <li class="<?php echo ($page=="newslists.php"||$page=="newsandevents.php")?"active" :""; ?>"><a href="<?php
            echo $baseurl; ?>newslists.php"><i class="fa fa-newspaper-o"></i> News And Notice</a></li>
        <li class="<?php echo ($page=="accomodationlists.php"||$page=="accomodation.php")?"active" :""; ?>"><a
                href="accomodationlists.php"><i class="fa fa-bed"></i> Accomodation/Rooms</a></li>
        <li class="<?php echo ($page=="photolists.php"||$page=="photos.php")?"active" :""; ?>"><a href="<?php echo
            $baseurl; ?>photolists.php"><i class="fa fa-photo"></i> Photo Gallery</a></li>
        <li class="<?php echo ($page=="imageslider.php")?"active" :""; ?>"><a href="<?php echo
            $baseurl; ?>imageslider.php"><i class="fa fa-image"></i> Image Slider</a></li>
        <li class="<?php echo ($page=="password.php")?"active" :""; ?>"><a href="<?php echo $baseurl; ?>password
        .php"><i class="fa fa-key"></i> Change Password</a></li>
    </ul>
</div>