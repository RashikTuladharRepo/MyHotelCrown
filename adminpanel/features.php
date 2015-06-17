<?php
include "lib/getstatic.php";
include "lib/hotelcrownlib.php";

$gs=new getstatic();
$gs->checksession();
$baseurl=$gs->home_base_url();

$hcl=new hotelcrownlib();
$featuresdesc=$hcl->getfeaturesuscontents();

if(isset($_REQUEST['method'])=="logout")
{
    $gs->logout();
}

if(isset($_POST['featuresupdate']))
{
    $hcl->updatefeaturescontents($_POST['features']);
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Welcome To Hotel Crown's Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo $baseurl; ?>images/logo.png">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseurl; ?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseurl; ?>css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseurl;?>css/customstyle.css">
    <script src="//cdn.ckeditor.com/4.4.7/standard/ckeditor.js"></script>
</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <?php include "includes/admin-top-menu.php"; ?>
    </div>
</nav>

<div class="clearfix"></div>

<div class="container-fluid dashboard-container">
    <div class="row">

        <?php include "includes/admin-left-menu.php"; ?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Our Features</h1>
            <div class="has-error">
                    <span id="helpBlock" class="help-block">
                        <?php
                        if(isset($_SESSION['msg']))
                        {
                            echo $_SESSION['msg'];
                            $_SESSION['msg'] = null;
                            unset($_SESSION['msg']);
                        }
                        ?>
                    </span>
            </div>
            <form method="post" action="#">
                <div class="form-group">
                    <label for="features">Our Features Description</label>
                    <textarea name="features" id="features" required="required">
                        <?php echo $featuresdesc['description']; ?>
                    </textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success" name="featuresupdate" id="featuresupdate">
                        Update Features Content
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo $baseurl; ?>js/jquery.min.js"></script>
<script src="<?php echo $baseurl; ?>js/bootstrap.min.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('features');
    $(document).ready( function() {
        $('#helpBlock').delay(2000).fadeOut();
    });
</script>
</body>
</html>