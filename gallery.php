<?php
include "adminpanel/lib/hotelcrownlib.php";
$hcl=new hotelcrownlib();
$imagelist=$hcl->getphotolistsclient();
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>PHOTO GALLERY | HOTEL CROWN TANSEN,PALPA</title>
    <link rel='shortcut icon' href='images/logo.png' type='image/x-icon'/>
    <link rel="stylesheet" href="styles/style.css" type="text/css">
    <link rel="stylesheet" href="styles/iconFont.css" type="text/css">
    <script src="scripts/jquery.js"></script>
    <script src="scripts/amazingslider.js"></script>
    <script src="scripts/initslider-1.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/default.css" />
    <link rel="stylesheet" type="text/css" href="styles/component.css" />
    <script src="scripts/modernizr.custom.js"></script>
    <script src="scripts/jquery.smoothscroll.js" type="text/javascript"></script
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Dancing+Script">


    <!-- Start VisualLightBox.com HEAD section -->
    <link rel="stylesheet" href="lightbox/vlb_files1/vlightbox1.css" type="text/css" />
    <link rel="stylesheet" href="lightbox/vlb_files1/visuallightbox.css" type="text/css" media="screen" />
    <script src="lightbox/vlb_engine/visuallightbox.js" type="text/javascript"></script>
    <!-- End VisualLightBox.com HEAD section -->

</head>
<body>


<div class="info-wrapper" id="home">
    <div class="info">
        <div class="info-contact-details f-left">
            <span class="icon-phone"></span>&nbsp; +977-75-522503 &nbsp;&nbsp;|&nbsp;&nbsp;
            <span class="icon-comments"></span>&nbsp; hotelcrownpalpali@gmail.com
        </div>
        <div class="info-social-details f-right">
            Contact Us Via :&nbsp;&nbsp;
            <a href="#"><span class="icon-facebook"></span>&nbsp; /facebook &nbsp;&nbsp;|&nbsp;&nbsp;</a>
            <a href="#"><span class="icon-twitter"></span>&nbsp; #twitter</a>
        </div>
        <div class="clear-both"></div>
    </div>
</div>


<div class="navigation-wrapper">
    <div class="navigation">
        <div class="logo f-left">
            <img src="images/logo.png" alt="logo" title="logo">
        </div>
        <div class="nav f-left">
            <?php include "includes/menu.php"; ?>
        </div>
        <div class="clear-both"></div>
    </div>
</div>


<div class="slider-wrapper">
    <div class="slider">
        <!--<img src="images/slide-bg.jpg" alt="slider image" title="slider image">-->
        <div id="amazingslider-1" style="display:block;position:relative;margin:16px auto 32px;">
            <ul class="amazingslider-slides" style="display:none;">
                <li><img src="images/gallery.jpg" alt="About Hotel Crown" /></li>
            </ul>
        </div>
    </div>
</div>



<div class="features-wrapper">
    <div class="features">
        <div class="features-heading">
            <h2><span class="icon-camera"> Photo Gallery</span><hr></h2>
        </div>
        <br><br>
        <div class="features-contents">
            <!-- Start VisualLightBox.com BODY section id=1 -->
            <div id="vlightbox1">

                <?php foreach($imagelist as $row) {?>

                <a class="vlightbox1" href="adminpanel/images/<?php echo $row['image']; ?>" title="<?php echo $row['description'];?>">
                    <img src="adminpanel/images/<?php echo $row['image']; ?>" alt="<?php echo $row['description'];?>"
                         width="200" height="200"/>
                </a>

                <?php } ?>

<!--                <a class="vlightbox1" href="lightbox/vlb_images1/dining_hall.jpg" title="dining hall"><img-->
<!--                        src="lightbox/vlb_thumbnails1/dining_hall.jpg" alt="dining hall"/></a>-->
<!--                <a class="vlightbox1" href="lightbox/vlb_images1/3.jpg" title="Rooms Offered"><img-->
<!--                		src="lightbox/vlb_thumbnails1/3.jpg" alt="Rooms Offered"/></a>-->
<!--                <a class="vlightbox1" href="lightbox/vlb_images1/4.jpg" title="Shared Rooms"><img-->
<!--                		src="lightbox/vlb_thumbnails1/4.jpg" alt="Shared Rooms"/></a>-->
<!--                <a class="vlightbox1" href="lightbox/vlb_images1/5.jpg" title="Conference Hall"><img-->
<!--                		src="lightbox/vlb_thumbnails1/5.jpg" alt="Conference Hall"/></a>-->
<!--                <a class="vlightbox1" href="lightbox/vlb_images1/6.jpg" title="Hotel View"><img-->
<!--                		src="lightbox/vlb_thumbnails1/6.jpg" alt="Hotel View"/></a>-->
<!--                <a class="vlightbox1" href="lightbox/vlb_images1/7.jpg" title="Environment Seen From Hotel"><img-->
<!--                		src="lightbox/vlb_thumbnails1/7.jpg" alt="Environment Seen From Hotel"/></a>-->
<!--                <a class="vlightbox1" href="lightbox/vlb_images1/8.jpg" title="Environment Seen From the Top Of The Hotel"><img-->
<!--                		src="lightbox/vlb_thumbnails1/8.jpg" alt="Environment Seen From the Top Of The Hotel"/></a>-->

            </div>
            <script src="lightbox/vlb_engine/vlbdata1.js" type="text/javascript"></script>
            <!-- End VisualLightBox.com BODY section -->
        </div>
    </div>
</div>


<!--<div class="clients-wrapper">
    <div class="clients">
        <div class="clients-heading">
            <h2><span class="icon-user"> What Our Clients Has To Say?</span><hr></h2>
        </div>
        <div class="clients-contents">
            <div class="clients-view1 f-left">
                <div class="client-view-up-down f-left">
                    <div class="client-pic f-left">
                        <span><img src="images/client-1.jpg" alt="client-1" title="client-1"></span>
                    </div>
                    <div class="client-views f-left">
                        <h3>Stoppard, Tom</h3>
                        <p>
                            Unfeeling so rapturous discovery he exquisite Reasonably so middle tons or impression
                            by terminated Unfeeling so rapturous discovery he exquisite.
                        </p>
                    </div>
                    <div class="clear-both"></div>
                </div>
                <div class="client-view-up-down f-left">
                    <div class="client-pic f-left">
                        <span><img src="images/client-2.jpg" alt="client-2" title="client-2"></span>
                    </div>
                    <div class="client-views f-left">
                        <h3>Alba, Jessica</h3>
                        <p>
                            Unfeeling so rapturous discovery he exquisite Reasonably so middle tons or impression
                            by terminated Unfeeling so rapturous discovery he exquisite.
                        </p>
                    </div>
                </div>
                <div class="clear-both"></div>
            </div>
            <div class="clients-view1 f-left">
                <div class="client-view-up-down f-left">
                    <div class="client-pic f-left">
                        <span><img src="images/client-3.jpg" alt="client-3" title="client-3"></span>
                    </div>
                    <div class="client-views f-left">
                        <h3>Sweetnam, Skye</h3>
                        <p>
                            Unfeeling so rapturous discovery he exquisite Reasonably so middle tons or impression
                            by terminated Unfeeling so rapturous discovery he exquisite.
                        </p>
                    </div>
                    <div class="clear-both"></div>
                </div>
                <div class="client-view-up-down f-left">
                    <div class="client-pic f-left">
                        <span><img src="images/client-4.jpg" alt="client-4" title="client-4"></span>
                    </div>
                    <div class="client-views f-left">
                        <h3>Raleigh, Sir Walter</h3>
                        <p>
                            Unfeeling so rapturous discovery he exquisite Reasonably so middle tons or impression
                            by terminated Unfeeling so rapturous discovery he exquisite.
                        </p>
                    </div>
                </div>
                <div class="clear-both"></div>
            </div>
            <div class="clear-both"></div>
        </div>

    </div>
</div>-->



<div class="footer-wrapper">
    <div class="footer">
        <div class="footer-left f-left">
            <table>
                <tr>
                    <td colspan="2"><h3>Contact Us</h3></td>
                </tr>
                <tr>
                    <td colspan="3">Hotel Crown Pvt. Ltd</td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>:</td>
                    <td>+977-75-522503</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td>hotelcrownpalpali@gmail.com</td>
                </tr>
                <tr>
                    <td>Fax</td>
                    <td>:</td>
                    <td>+977-75-522503</td>
                </tr>
                <tr>
                    <td>Website</td>
                    <td>:</td>
                    <td colspan="2">www.hotelcrown.com</td>
                </tr>
            </table>
        </div>

        <div class="footer-center f-left">
            <form method="post" action="#">
                <table>
                    <tr>
                        <td colspan="2"><h3>Subscribe</h3></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="email" name="email" placeholder="Your Email Address" required="required">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" value="Subscribe">
                        </td>
                    </tr>
                </table>
            </form>
        </div>

        <div class="footer-right f-left">
            <table>
                <tr>
                    <td colspan="2"><h3>Connect Us Via</h3></td>
                </tr>
                <tr>
                    <td>
                        <span class="icon-facebook"></span>
                        <span class="icon-twitter"></span>
                        <span class="icon-youtube"></span>
                    </td>
                </tr>
            </table>
        </div>

        <div class="clear-both"></div>
    </div>
</div>

<div class="footer-wrapper-tail">
    <div class="footer-tail">
        &copy; 2015 Hotel Crown All Rights Reserved
        <a href="#home"><span class="icon-arrow-up-2"></span></a>
    </div>
</div>

<script type="text/javascript">
    var header = document.querySelector('.navigation-wrapper');
    var origOffsetY = header.offsetTop;
    function onScroll(e) {
        window.scrollY >= origOffsetY ? header.classList.add('sticky') :
                header.classList.remove('sticky');
    }
    document.addEventListener('scroll', onScroll);
</script>

</body>
</html>