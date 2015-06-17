<?php
include "lib/getstatic.php";
include "lib/hotelcrownlib.php";

$gs=new getstatic();
$gs->checksession();
$baseurl=$gs->home_base_url();


$hcl=new hotelcrownlib();
$getimagesliders=$hcl->getimagsliderlists();

if(isset($_POST['addslider']))
{
    $hcl->addslider();
}

if(isset($_REQUEST['method'])=="logout")
{
    $gs->logout();
}
elseif(isset($_REQUEST['cid']))
{
    $hcl->changesliderstatus($_REQUEST['cid']);
}
elseif(isset($_REQUEST['did']))
{
    $hcl->deletesliderimage($_REQUEST['did'],$_REQUEST['image']);
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
            <h1 class="page-header">Image Slider</h1>

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

            <form method="post" action="#" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="image">Upload Slider</label>
                    <input type="file" name="image" id="image">
                    <img src="#" alt="your image" id="imageprev" width="250px" height="100px" style="display:
                        none;"/>
                    <p class="help-block">Please use image of dimension 1366px * 360 px</p>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="active" selected>Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <button type="submit" name="addslider" id="addslider" class="btn btn-success">Add Slider</button>
            </form>
            <br><br>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr><th>Slider Preview</th><th>Status</th><th>Remarks</th></tr>
                    </thead>
                    <?php foreach($getimagesliders as $sliderrows) { ?>
                        <tbody>
                            <td><img src="<?php echo $baseurl; ?>images/<?php echo $sliderrows['image']; ?>" width="150"
                                     height="70"></td>
                            <td><?php echo $sliderrows['status']; ?></td>
                            <td>
                                <a href = "<?php echo $baseurl; ?>imageslider.php?did=<?php echo $sliderrows['id'];
                                ?>&image=<?php echo $sliderrows['image'];?>"
                                   class="btn btn-danger" data-toggle="tooltip" title="Delete Image!"
                                   onclick="return confirm('Are You Sure to Delete The Image?')" id="delete">
                                    <i class="fa fa-eraser" >&nbsp;</i >
                                </a >
                                <a href ="<?php echo $baseurl; ?>imageslider.php?cid=<?php echo $sliderrows['id'];?>"
                                   data-toggle="tooltip" title="Change Status!" class="btn
                            btn-warning" >
                                    <i class="fa fa-recycle" >&nbsp;</i >
                                </a >
                            </td>
                        </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo $baseurl; ?>js/jquery.min.js"></script>
<script src="<?php echo $baseurl; ?>js/bootstrap.min.js"></script>
<script>

    $(document).ready( function() {
        $('#helpBlock').delay(2000).fadeOut();
    });

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