<?php
include "lib/getstatic.php";
include "lib/hotelcrownlib.php";

$gs=new getstatic();
$gs->checksession();
$baseurl=$gs->home_base_url();

$hcl=new hotelcrownlib();

if(isset($_REQUEST['method'])=="logout")
{
    $gs->logout();
}

if(isset($_POST['changepassword']))
{
    $hcl->changepassword();
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
            <h1 class="page-header">Change Password</h1>

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
                    <label for="oldpassword">Old Password</label>
                    <input type="password" class="form-control" name="oldpassword" id="oldpassword">
                </div>
                <div class="form-group">
                    <label for="newpassword">New Password</label>
                    <input type="password" class="form-control" name="newpassword" id="newpassword">
                </div>
                <div class="form-group">
                    <label for="confirmnewpassword">Confirm New Password</label>
                    <input type="password" class="form-control" name="confirmnewpassword" id="confirmnewpassword">
                </div>
                <div class="form-group">
                    <label for="verification"></label>
                </div>
                <button type="submit" class="btn btn-success" id="changepassword" name="changepassword">Change Password</button>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo $baseurl; ?>js/jquery.min.js"></script>
<script src="<?php echo $baseurl; ?>js/bootstrap.min.js"></script>
<script>
    $(function() {
        $("#changepassword").attr("disabled",true);
        $("#confirmnewpassword").keyup(function () {
            var confirmnewpassword = $("#confirmnewpassword").val();
            var newpassword = $("#newpassword").val();
            var oldpassword=$("#oldpassword").val();

            if(oldpassword==='')
            {
                alert('Please Type In Your Old Password First!!');
            }
            if(confirmnewpassword!=newpassword)
            {
                jQuery("label[for='verification']").html("<p style='color:red'>New And Confirm Password Does Not " +
                "Match</p>");
                $("#changepassword").attr("disabled",true);
            }
            else
            {
                jQuery("label[for='verification']").html("<p style='color:green'>Verification Successfull!!</p>");
                $("#changepassword").attr("disabled",false);
            }
        });
    });


    $(document).ready( function() {
        $('#helpBlock').delay(2000).fadeOut();
    });

</script>

</body>
</html>