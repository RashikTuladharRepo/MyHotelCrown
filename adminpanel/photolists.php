<?php
include "lib/getstatic.php";
include "lib/hotelcrownlib.php";

$gs=new getstatic();
$gs->checksession();
$baseurl=$gs->home_base_url();

$hcl=new hotelcrownlib();
$photolists=$hcl->getphotolists();

if(isset($_REQUEST['method'])=="logout")
{
    $gs->logout();
}

if(isset($_REQUEST['cid']))
{
    $hcl->changeimagestatus($_REQUEST['cid']);
}
elseif(isset($_REQUEST['did']))
{
    $hcl->deleteimage($_REQUEST['did'],$_REQUEST['image']);
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

            <a href="photos.php" class="btn btn-success">Add New Photo To Gallery</a>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr><th>Photo Preview</th><th>Status</th><th>Remarks</th></tr>
                    </thead>
                    <?php foreach ($photolists as $row) { ?>
                    <tbody>
                        <td><img src="<?php echo $baseurl; ?>images/<?php echo $row['image'];?>" width="150"
                                 height="70"></td>
                        <td valign="middle"><?php echo $row['status']; ?></td>
                        <td>
                            <a href = "<?php echo $baseurl; ?>photolists.php?did=<?php echo $row['id'];?>&image=<?php
                            echo $row['image'];?>"
                               class="btn
                            btn-danger" data-toggle="tooltip" title="Delete Image!" onclick="return confirm
                            ('Are ' +
                             'You Sure to Delete The Image?')" id="delete">
                                <i class="fa fa-eraser" >&nbsp;</i >
                            </a >
                            <a href ="<?php echo $baseurl; ?>photolists.php?cid=<?php echo $row['id'];?>"
                               data-toggle="tooltip" title="Change Status!" class="btn
                            btn-warning" >
                                <i class="fa fa-recycle" >&nbsp;</i >
                            </a >
                        </td>
                    </tbody>
                    <?php }?>
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
<script type="text/javascript">
    $(document).ready( function() {
        $('#helpBlock').delay(2000).fadeOut();
    });
</script>
</body>
</html>