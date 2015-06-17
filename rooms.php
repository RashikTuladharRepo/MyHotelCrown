<?php
error_reporting(E_ERROR | E_PARSE);
include "adminpanel/lib/hotelcrownlib.php";
$hcl=new hotelcrownlib();
$rooms=$hcl->getroomlistsclients();
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>OUR ROOMS | HOTEL CROWN TANSEN,PALPA</title>

    <link rel='shortcut icon' href='images/logo.png' type='image/x-icon'/>

    <link rel="stylesheet" href="styles/style.css" type="text/css">
    <link rel="stylesheet" href="styles/iconFont.css" type="text/css">

    <script src="scripts/jquery.js"></script>
    <script src="scripts/amazingslider.js"></script>
    <script src="scripts/initslider-1.js"></script>

    <!-- Tickr -->
    <link href="styles/global.css" rel="stylesheet" type="text/css" />
    <!-- End Tickr -->

    <link rel="stylesheet" type="text/css" href="styles/default.css" />
    <link rel="stylesheet" type="text/css" href="styles/component.css" />
    <script src="scripts/modernizr.custom.js"></script>

    <script src="scripts/jquery.smoothscroll.js" type="text/javascript"></script>

    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Dancing+Script">

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
                <li><img src="images/rooms.jpg" alt="Feature of Hotel Crown" /></li>
            </ul>
        </div>
    </div>
</div>



<div class="features-wrapper">
    <div class="features">
        <div class="features-heading">
            <h2><span class="icon-tag"> Hotel Rooms</span><hr></h2>
            <h2 style="text-align: center; font-weight: 100; font-family: Dancing Script;">
                “Customer Satisfaction Is The Only Means of Wining The Real Crown”
            </h2>
        </div>

        <div class="rooms">
            <?php foreach($rooms as $roomsrows) {?>
        <div class="flip3d">

            <div class="back">
                <div id="desc">
                    <br>
                    <strong><?php echo $roomsrows['title']; ?></strong><br><br>
                    <?php echo $roomsrows['description']; ?>
                </div>
            </div>
            <div class="front"><img src="adminpanel/images/<?php echo $roomsrows['image']; ?>" height="320"
                                    width="320"></div>

        </div><?php }?>

        <!-- <div class="flip3d">
            <div class="back"><div id="desc">back part</div></div>
            <div class="front"></div>
        </div>

        <div class="flip3d">
            <div class="back"><div id="desc">back part</div></div>
            <div class="front"></div>
        </div>

        <div class="flip3d">
            <div class="back"><div id="desc">back part</div></div>
            <div class="front"></div>
        </div> -->

        <div class="clear-both"></div>
        </div>
        <br><br>

        <strong>Terms and Conditions</strong><br><br>

            <span class="icon-redo"></span>The above mentioned rates are inclusive 10% service charge and 13% VAT.<br>
            <span class="icon-redo"></span>The above room tariff are on European Plan EP (room only)<br>
            <span class="icon-redo"></span>Check Out Time 12 Noon.<br>
            <span class="icon-redo"></span>Rooms retained after 12 noon until 18.00 hrs. will be subject to half day charge.<br>
            <span class="icon-redo"></span>Full day charge will be levied beyond 18.00 hrs.<br>


            <br><br>

    </div>


    </div>
</div>

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