<?php
include "adminpanel/lib/hotelcrownlib.php";
$hcl=new hotelcrownlib();
$aboutus=$hcl->getaboutuscontents();
$newslist=$hcl->getnewslistsclient();
$rooms=$hcl->getroomlistsclients6();
$sliderimage=$hcl->getimagsliderlistsclient();
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>HOTEL CROWN TANSEN,PALPA</title>

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
                    <?php foreach($sliderimage as $sliderimagerows) {?>
                        <li><img src="adminpanel/images/<?php echo $sliderimagerows['image']; ?>" alt="Hotel Crown"
                                /></li>
                    <?php }?>
                </ul>
            </div>
        </div>
    </div>

    <div class="reservation-wrapper">
        <div class="reservation">
            <br>
            <div class="reservation-heading">
                <h2><span class="icon-bell"> Reservation</span><hr></h2>
                    <label style="text-align:center; color:green;">
                        <?php
                            @session_start();
                            if (isset($_SESSION['msg'])) {
                                echo $_SESSION['msg'];
                                $_SESSION['msg']="";
                            }
                        ?>
                    </label>

            </div>
            <div class="reservation-contents">
                <form method="post" action="sendmail.php">
                    <table>
                        <tr>
                            <td><span class="icon-calendar"></span><input type="date" name="arrival" placeholder="Arrival Date" required></td>
                            <td><span class="icon-calendar"></span><input type="date" name="departure" placeholder="Departure Date" required></td>
                            <td><span class="icon-user-3"></span>
                                <select name="num-of-adults">
                                    <option value="" selected>Number of Adults</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </td>
                            <td><span class="icon-user-3"></span>
                                <select name="num-of-children">
                                    <option value="" selected>Number of Children</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td><span class="icon-user-2"></span><input type="text" name="fullname" placeholder="Your Name" required></td>
                            <td><span class="icon-mail"></span><input type="email" name="email" placeholder="Your Email" required></td>
                            <td><span class="icon-book"></span>&nbsp;<input type="text" name="remarks" placeholder="Remarks...."></td>
                            <td><span class="icon-bell"></span>&nbsp;<input type="submit" name="reservation" value="Send Request"></td>
                        </tr>

                    </table>
                </form>
            </div>
        </div>
    </div>


    <div class="accommodation-wrapper">
        <div class="accommodation">
            <div class="accommodation-heading">
                <h2><span class="icon-coffee"> Accommodation</span><hr></h2>
            </div>
            <div class="accommodation-contents">
                <div class="container demo-3">
                    <ul class="grid cs-style-3">

                        <?php foreach($rooms as $roomsrows) {?>
                        <li>
                            <figure>
                                <div><img src="adminpanel/images/<?php echo $roomsrows['image'];?>" alt="<?php echo $roomsrows['title']; ?>"
                                          width="325" height="240"></div>
                                <figcaption>
                                    <h3><?php echo $roomsrows['title']; ?></h3>
<!--                                    <span>-->
<!--                                        --><?php //echo substr($roomsrows['description'],0,70); ?>
<!--                                    </span>-->
                                    <a href="rooms.php">Take a look</a>
                                </figcaption>
                            </figure>
                        </li>
                        <?php }?>
                    </ul>
                    <div class="clear-both"></div>
                </div>
                <!-- /container -->
                <script src="scripts/toucheffects.js"></script>
            </div>
        </div>
    </div>



    <!--<div class="features-wrapper">-->
        <!--<div class="features">-->
            <!--<div class="features-heading">-->
                <!--<h2><span class="icon-gift"> Our Features</span><hr></h2>-->
                <!--<h2 style="text-align: center; font-weight: 100; font-family: Dancing Script;">-->
                    <!--“Customer Satisfaction Is The Only Means of Wining The Real Crown”-->
                <!--</h2>-->
            <!--</div>-->
            <!--<div class="features-contents">-->
                <!---->
                <!--<div class="features-1 f-left">-->
                    <!--<div class="upper-content"><span class="icon-cloud-4"></span></div>-->
                    <!--<div class="lower-content">-->
                        <!--<h3>Best Environment</h3>-->
                        <!--<p>-->
                            <!--<bR>-->
                            <!--Breakfast procuring nay end happiness allowance assurance frankness.-->
                            <!--Met simplicity nor difficulty unreserved who.<br><br>-->
                            <!--<a href="#"> Read More &raquo;</a>-->
                        <!--</p>-->
                    <!--</div>-->
                <!--</div>-->

                <!--<div class="features-2 f-left">-->
                    <!--<div class="upper-content"><span class="icon-dollar"></span></div>-->
                    <!--<div class="lower-content">-->
                        <!--<h3>Affordable Costs</h3>-->
                        <!--<p>-->
                            <!--<bR>-->
                            <!--Breakfast procuring nay end happiness allowance assurance frankness.-->
                            <!--Met simplicity nor difficulty unreserved who.<br><br>-->
                            <!--<a href="#"> Read More &raquo;</a>-->
                        <!--</p>-->
                    <!--</div>-->
                <!--</div>-->

                <!--<div class="features-3 f-left">-->
                    <!--<div class="upper-content"><span class="icon-location"></span></div>-->
                    <!--<div class="lower-content">-->
                        <!--<h3>Peace Full Location</h3>-->
                        <!--<p>-->
                            <!--<bR>-->
                            <!--Breakfast procuring nay end happiness allowance assurance frankness.-->
                            <!--Met simplicity nor difficulty unreserved who.<br><br>-->
                            <!--<a href="#"> Read More &raquo;</a>-->
                        <!--</p>-->
                    <!--</div>-->
                <!--</div>-->

                <!--<div class="features-4 f-left">-->
                    <!--<div class="upper-content"><span class="icon-cars"></span></div>-->
                    <!--<div class="lower-content">-->
                        <!--<h3>Transportation Facility</h3>-->
                        <!--<p>-->
                            <!--<bR>-->
                            <!--Breakfast procuring nay end happiness allowance assurance frankness.-->
                            <!--Met simplicity nor difficulty unreserved who.<br><br>-->
                            <!--<a href="#"> Read More &raquo;</a>-->
                        <!--</p>-->
                    <!--</div>-->
                <!--</div>-->

                <!--<div class="clear-both"></div>-->
            <!--</div>-->
        <!--</div>-->
    <!--</div>-->

	
	<div class="about-wrapper">
        <div class="about-notice">
            <div class="about-notice-heading">
                <h2><span class="icon-home"> About Us</span> / <span class="icon-newspaper"> News And Notice</span><hr></h2>
            </div>

            <div class="about-notice-contents">
                <div class="about-contents f-left">
                    <div class="about-content-head f-left">
                        <span class="icon-home"></span>
                        About Us
                    </div>
                    <div class="about-content-body f-left">
                        <p>
                            <?php echo substr($aboutus['description'],0,715); ?>....
                        </p>
                            <a href="aboutus.php">Find More About Us</a>
                    </div>
                    <div class="clear-both"></div>
                </div>
                <div class="notice-contents f-left">
                    <div class="notice-content-head f-left">
                        <span class="icon-newspaper"></span>
                        News And Notice
                    </div>

                    <div class="notice-content-body f-left">
                        <ul id="ticker_02" class="ticker">
                            <?php foreach($newslist as $newsrow) {?>
                            <li>
                                <strong style="color:#294BFF; font-weight: 100;"><?php echo $newsrow['title'];
                                    ?></strong>
                                <br>
                                <?php echo substr($newsrow['description'],0,110); ?>
                                <br>
                                <a href="fullnews.php?newsid=<?php echo $newsrow['id']; ?>">Read More &raquo;</a>
                            </li>
                            <?php } ?>
                        </ul>


                        <script>
                            function tick2()
                            {
                                $('#ticker_02 li:first').slideUp( function () { $(this).appendTo($('#ticker_02')).slideDown(); });
                            }
                            setInterval(function(){ tick2 () }, 3000);
                        </script>
                    </div>
                    <div class="clear-both"></div>
                </div>
                <div class="clear-both"></div>
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