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

if(isset($_POST['addnews']))
{
    $hcl->addnewsandevents();
}
elseif(isset($_POST['editnews']))
{
    $hcl->getupdatedcontents();
}

//if(isset($_POST['addnews']))
//{
//    $hcl->addnewsandevents();
//}


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
            <h1 class="page-header">News And Notices</h1>

            <?php if(isset($_REQUEST['data']))
            {

                $newsdetail=$_SESSION['editnewscontents'];
                $newsid=$newsdetail['id'];
                $title=$newsdetail['title'];
                $description=$newsdetail['description'];
                $status=$newsdetail['status'];
                ?>
                <form method="post" action="#">
                    <input type="hidden" name="newsid" value="<?php echo $newsid; ?>">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?php echo $title; ?>" required="required">
                    </div>
                    <div class="form-group">
                        <label for="description">News Description</label>
                        <textarea id="description" name="description" required="required">
                            <?php echo $description; ?>
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="active" selected>Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success" name="editnews" id="editnews">Edit
                        News/Events</button>
                </form>
            <?php }
            else
            {?>
            <form method="post" action="#">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="form-group">
                    <label for="description">News Description</label>
                    <textarea id="description" name="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="active" selected>Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success" name="addnews" id="addnews">Add News/Events</button>
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
<script type="text/javascript">
    CKEDITOR.replace('description');
    $(document).ready( function() {
        $('#helpBlock').delay(2000).fadeOut();
    });
</script>
</body>
</html>