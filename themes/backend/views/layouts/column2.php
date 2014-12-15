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
            <li class="<?php echo $this->id == "category" ? "selected" : "" ?>">
                <a href="<?php echo $this->createUrl("/category/index"); ?>"><i class="fa fa-edit fa-fw"></i> Category<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo $this->createUrl("/category/index/"); ?>">List</a>
                    </li>
                    <li>
                        <a href="<?php echo $this->createUrl("/category/create/"); ?>">Create</a>
                    </li>
                </ul>
                <!-- second-level-items -->
            </li>
            <li class="<?php echo $this->id == "tour" ? "selected" : "" ?>">
                <a href="<?php echo $this->createUrl("/tour/index"); ?>"><i class="fa fa-edit fa-fw"></i> Tour<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo $this->createUrl("/tour/index/"); ?>">List</a>
                    </li>
                    <li>
                        <a href="<?php echo $this->createUrl("/tour/create/"); ?>">Create</a>
                    </li>
                    <li>
                        <a href="<?php echo $this->createUrl("/tour/getHomePageSetting/"); ?>">Home Page Settings</a>
                    </li>
                </ul>
                <!-- second-level-items -->
            </li>
            <li class="<?php echo $this->id == "language" ? "selected" : "" ?>">
                <a href="<?php echo $this->createUrl("/language/index"); ?>"><i class="fa fa-edit fa-fw"></i> Language<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo $this->createUrl("/language/index/"); ?>">List</a>
                    </li>
                    <li>
                        <a href="<?php echo $this->createUrl("/language/create/"); ?>">Create</a>
                    </li>
                </ul>
                <!-- second-level-items -->
            </li>
            <li class="<?php echo in_array($this->id, $pluggins_array) ? "selected" : "" ?>">
                <a href="<?php echo $this->createUrl("/banner/index"); ?>"><i class="fa fa-edit fa-fw"></i> Pluggins & Pages<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo $this->createUrl("/banner/index/"); ?>">Banners</a>
                    </li>
                    <li>
                        <a href="<?php echo $this->createUrl("/motoDairy/index/"); ?>">Moto Dairy</a>
                    </li>
                    <li>
                        <a href="<?php echo $this->createUrl("/motoGallery/index/"); ?>">Moto Gallery</a>
                    </li>
                    <li>
                        <a href="<?php echo $this->createUrl("/teamImage/index/"); ?>">Team Image</a>
                    </li>
                    <li>
                        <a href="<?php echo $this->createUrl("/innerSlider/index/"); ?>">Inner Slider</a>
                    </li>
                </ul>
                <!-- second-level-items -->
            </li>

            <li class="<?php echo $this->id == "faqAndTerms" ? "selected" : "" ?>">
                <a href="<?php echo $this->createUrl("/faq/index"); ?>"><i class="fa fa-edit fa-fw"></i> Faq And Terms<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo $this->createUrl("/faqAndTerms/index/"); ?>">List</a>
                    </li>
                    <li>
                        <a href="<?php echo $this->createUrl("/faqAndTerms/create/"); ?>">Create</a>
                    </li>
                </ul>
                <!-- second-level-items -->
            </li>
            <li class="<?php echo $this->id == "seo" ? "selected" : "" ?>">
                <a href="<?php echo $this->createUrl("/seo/index"); ?>"><i class="fa fa-edit fa-fw"></i> Seo Tags<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo $this->createUrl("/seo/index/"); ?>">List</a>
                    </li>
                    <li>
                        <a href="<?php echo $this->createUrl("/seo/create/"); ?>">Create</a>
                    </li>
                </ul>
                <!-- second-level-items -->
            </li>
<!--            <li class="<?php echo $this->id == "pages" ? "selected" : "" ?>">
                <a href="<?php echo $this->createUrl("/pages/index"); ?>"><i class="fa fa-edit fa-fw"></i> Pages<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo $this->createUrl("/pages/index/"); ?>">List</a>
                    </li>
                    <li>
                        <a href="<?php echo $this->createUrl("/pages/create/"); ?>">Create</a>
                    </li>
                </ul>
                 second-level-items 
            </li>-->
            <li class="<?php echo $this->id == "label" ? "selected" : "" ?>">
                <a href="<?php echo $this->createUrl("/label/index"); ?>"><i class="fa fa-edit fa-fw"></i> Labels<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo $this->createUrl("/label/index/"); ?>">List</a>
                    </li>
                    <li>
                        <a href="<?php echo $this->createUrl("/label/create/"); ?>">Create</a>
                    </li>
                </ul>
                <!-- second-level-items -->
            </li>
            <li class="<?php echo $this->id == "socialMediaLink" ? "selected" : "" ?>">
                <a href="<?php echo $this->createUrl("/socialMediaLink/index"); ?>"><i class="fa fa-edit fa-fw"></i> Social Media Link<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo $this->createUrl("/socialMediaLink/index/"); ?>">List</a>
                    </li>
                    <li>
                        <a href="<?php echo $this->createUrl("/socialMediaLink/create/"); ?>">Create</a>
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
</nav>
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
