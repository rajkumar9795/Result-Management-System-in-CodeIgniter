<?php require(APPPATH . "Views/pagelib.php"); ?>
<?= $this->extend('admin/shared/layout') ?>
<?= $this->section('content') ?>
<?php $pt = "Manage Course" ?>
<!--==========  breadcrumbs   ======-->
<div class="page-breadcrumbs" style="background-image:url('/AppImage/page/header.jpg')">
    <ul class="breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?= site_url('dashboard') ?>">Home</a>
        </li>
        <li>
            <a href="<?= site_url('courseindex') ?>">Course Index</a>
        </li>

        <li class="active">
            <?php echo $pt; ?>
        </li>
    </ul>
</div>

<!--=========== Page contianer =============-->
<div class="container">


    <div class="panel panel-midnightblue">
        <div class="panel-heading">
            <h4>
                <?php echo $pt; ?>
            </h4>
            <div class="options">
                <a class="panel-collapse" href="#">
                    <i class="fa fa-chevron-down"></i>
                </a>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">

                <div class="col-md-3"></div>

                <div class="col-md-6">

                    <form method="post" action="<?= site_url('coursesave') ?>">
                        <?= csrf_field() ?>
                        <input type="hidden" name="ID" value="<?= $course['ID'] ?? '' ?>">
                        Course Code
                        <input type="text" name="CCode" value="<?= $course['CCode'] ?? '' ?>" class="form-control" require><br>
                        Course Name
                        <input type="text" name="CName" value="<?= $course['CName'] ?? '' ?>" class="form-control" require><br>
                        Duration
                        <input type="text" name="Duration" value="<?= $course['Duration'] ?? '' ?>" class="form-control" require><br>
                         Is Fix Subject  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="IsFixSub" value="1"
                                <?= (($course['IsFixSub'] ?? '') == 1) ? 'checked' : '' ?>> Yes
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="IsFixSub" value="0"
                                <?= (($course['IsFixSub'] ?? '') == 0) ? 'checked' : '' ?>> No <br><br>
                                
                        <?php if (isset($course) && $course): ?>
                            Course Status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="RStatus" value="1"
                                <?= (($course['RStatus'] ?? '') == 1) ? 'checked' : '' ?>> Active
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="RStatus" value="0"
                                <?= (($course['RStatus'] ?? '') == 0) ? 'checked' : '' ?>> Inactive <br>
                        <?php endif; ?>
                        <input type="submit" value="<?= isset($course) ? 'Update' : 'Save' ?>" class="btn btn-midnightblue g-center">
                    </form>

                </div>

                <div class="col-md-3"></div>

            </div>

        </div>

    </div>

</div>



<?= $this->endSection() ?>