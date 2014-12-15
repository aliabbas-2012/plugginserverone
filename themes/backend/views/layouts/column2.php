<?php $this->beginContent('//layouts/main'); ?>
<?php
$pluggins_array = array(
    "motoDairy",
    "banner",
    "motoGallery",
    "teamImage",
    "innerSlider",
        )
?>
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <!-- side-menu -->
        <ul class="nav" id="side-menu">
            <li>
                <!-- user image section-->
                <div class="user-section">
                    <div class="user-section-inner">
                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/user.jpg" alt="">
                    </div>
                    <div class="user-info">
                        <div><?php echo Yii::app()->user->user->first_name; ?> <strong><?php echo Yii::app()->user->user->last_name; ?></strong></div>
                        <div class="user-text-online">
                            <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                        </div>
                    </div>
                </div>
                <!--end user image section-->
            </li>
            <li class="sidebar-search">
                <!-- search section-->
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <!--end search section-->
            </li>
            <li class="<?php echo $this->id == "site" && $this->action->id == "index" ? "selected" : "" ?>">
                <a href="<?php echo $this->createUrl("/site/index"); ?>"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
            </li>
            <li class="<?php echo $this->id == "plateform" ? "selected" : "" ?>">
                <a href="<?php echo $this->createUrl("/plateform/index"); ?>"><i class="fa fa-edit fa-fw"></i> Plateforms<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo $this->createUrl("/plateform/index/"); ?>">List</a>
                    </li>
                    <li>
                        <a href="<?php echo $this->createUrl("/plateform/create/"); ?>">Create</a>
                    </li>
                </ul>
                <!-- second-level-items -->
            </li>
            <li class="<?php echo $this->id == "pluggin" ? "selected" : "" ?>">
                <a href="<?php echo $this->createUrl("/pluggin/index"); ?>"><i class="fa fa-edit fa-fw"></i> Pluggins<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo $this->createUrl("/pluggin/index/"); ?>">List</a>
                    </li>
                    <li>
                        <a href="<?php echo $this->createUrl("/pluggin/create/"); ?>">Create</a>
                    </li>
              
                </ul>
                <!-- second-level-items -->
            </li>
           
            <?php
            if (strstr(Yii::app()->request->hostInfo, "localhost")) {
                //$this->renderPartial("//layouts/_menus_local_host");
            }
            ?>
        </ul>
        <!-- end side-menu -->
    </div>
</nav>go
<!-- end sidebar-collapse -->
<!--  page-wrapper -->
<div id="page-wrapper">
    <?php
    if (Yii::app()->user->hasFlash('success')) {
        echo "<div class='col-lg-12'>";
        echo "<div class='alert-margin alert alert-success'>" . Yii::app()->user->getFlash('success') . "</div>";
        echo "</div>";
    }
    ?>
    <?php echo $content; ?>
</div>
<!-- end page-wrapper -->
<?php $this->endContent(); ?>
