<div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Hotel Crown</a>
        </div>
<div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Welcome <?php echo ucwords($gs->getuser());?></a></li>
        <li><a href="<?php echo $baseurl; ?>dashboard.php?method='logout'">Logout <i class="fa fa-plane"></i></a></li>
    </ul>
</div>