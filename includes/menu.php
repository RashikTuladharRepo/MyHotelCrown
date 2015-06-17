<?php
	 $uri= $_SERVER['REQUEST_URI'];
	 $array=explode("/",$uri);
	 $count=count($array);
	 $page=trim(strtolower($array[$count-1]));
	 //echo $page=trim($page);
?>

<ul>
	<li><a href="index.php" class="<?php echo ($page=="index.php"||$page=="")?"active":"";?>"><span class=" icon-home"></span> Home</a></li>
	<li><a href="rooms.php" class="<?php echo ($page=="rooms.php")?"active":"";?>"><span class=" icon-tag"></span> Rooms</a></li>
	<li><a href="features.php" class="<?php echo ($page=="features.php")?"active":"";?>"><span class=" icon-thumbs-up"></span> Features</a></li>
	<li><a href="gallery.php" class="<?php echo ($page=="gallery.php")?"active":"";?>"><span class=" icon-camera"></span> Gallery</a></li>
	<li><a href="contact.php" class="<?php echo ($page=="contact.php")?"active":"";?>"><span class=" icon-address-book"></span> Contact</a></li>
</ul>