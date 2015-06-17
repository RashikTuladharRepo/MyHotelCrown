<?php
    error_reporting(E_ERROR | E_PARSE);
    include "adminpanel/lib/hotelcrownlib.php";
    $hcl=new hotelcrownlib();
    if(isset($_REQUEST['newsid']))
    {
        $newscontent=$hcl->getparticularnews($_REQUEST['newsid']);
    }
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>FACILITIES AND FEATURES | HOTEL CROWN TANSEN,PALPA</title>

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
                <li><img src="images/newsandevents.jpg" alt="News And Events" /></li>
            </ul>
        </div>
    </div>
</div>



<div class="features-wrapper">
    <div class="features">
        <div class="features-heading">
            <?php foreach($newscontent as $newsrow) {?>
                <h2>
                    <span class="icon-newspaper">
                        <?php echo $newsrow['title'];?>
                    </span>
                    <hr>
                </h2>
            </div>
            <br><br>
            <div class="features-contents">
                <?php echo "Created On:" .date("Y/m/d", strtotime($newsrow['createddate']));?>
                <br><br>
                <?php echo $newsrow['description']; ?>
            </div>
        <?php } ?>
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