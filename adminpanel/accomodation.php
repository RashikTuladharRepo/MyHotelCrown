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

if(isset($_POST['addrooms']))
{
    $hcl->addrooms();
}

if(isset($_POST['editrooms']))
{
    $hcl->editupdatedrooms($_POST['id']);
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
            <h1 class="page-header">Accomodation And Rooms</h1>

            <?php if(isset($_REQUEST['errorcode'])) {

                $roomsdetail=$_SESSION['editroomscontents'];
                $id=$roomsdetail['id'];
                $image=$roomsdetail['image'];
                $title=$roomsdetail['title'];
                $description=$roomsdetail['description'];
                ?>

            <form method="post" action="#" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="roomimage">Image</label>
                    <input type="file" name="image" id="image" disabled>
                    <input type="hidden" name="id" value="<?php echo $id?>">
                    <img src="<?php echo $baseurl; ?>images/<?php echo $image;?>" alt="your image" id="imageprev"
                    width="250px" height="100px"/>
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" required="required" value="<?php
                    echo $title;?>">
                </div>
                <div class="form-group">
                    <label for="description"></label>
                    <textarea name="description" id="description" required="required"><?php echo $description;
                        ?></textarea>
                    <p class="help-block">Please Use Short Description For The Field.</p>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="active" selected>Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <button type="submit" name="editrooms" id="editrooms" class="btn btn-success">Edit New
                    Rooms/Accomodations</button>
            </form>
            <?php }
            else {
            ?>
            <form method="post" action="#" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="roomimage">Image</label>
                    <input type="file" name="image" id="image">
                    <img src="#" alt="your image" id="imageprev" width="250px" height="100px" style="display:
                        none;"/>
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" required="required">
                </div>
                <div class="form-group">
                    <label for="description"></label>
                    <textarea name="description" id="description" required="required"></textarea>
                    <p class="help-block">*Please Use Short Description For The Field.</p>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="active" selected>Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <button type="submit" name="addrooms" id="addrooms" class="btn btn-success">Add New Rooms/Accomodations</button>
            </form>
            <?php }?>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo $baseurl; ?>js/jquery.min.js"></script>
<script src="<?php echo $baseurl; ?>js/bootstrap.min.js"></script>
<script>
    CKEDITOR.replace('description');
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