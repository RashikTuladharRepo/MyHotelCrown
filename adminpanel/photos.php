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

if(isset($_POST['addphoto']))
{
    $hcl->addphototogallery();
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
            <h1 class="page-header">Photo Gallery</h1>

            <form method="post" action="#" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="image">Your Image</label>
                    <input type="file" name="image" id="image">
                    <img src="#" alt="your image" id="imageprev" width="250px" height="100px" style="display:
                        none;"/>
                </div>
                <div class="form-group">
                    <label for="description">Image Description</label>
                    <input type="text" class="form-control" name="description" id="description" required="required">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="active" selected>Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success" name="addphoto" id="addphoto">Add Photo</button>
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
    //for image preview in the form
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imageprev').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#image").change(function(){
        readURL(this);
        document.getElementById('imageprev').style.cssText="display:block;padding-top:10px;";
    });
</script>
</body>
</html>