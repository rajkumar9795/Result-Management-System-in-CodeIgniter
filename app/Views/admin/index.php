<?php require( APPPATH . "Views/pagelib.php"); ?>
<?= $this->extend('admin/shared/layout') ?>
<?= $this->section('content') ?>
<?php $pt="Dashboard" ?>
<!--==========  breadcrumbs   ======-->
<div class="page-breadcrumbs" style="background-image:url('/AppImage/page/header.jpg')">
    <ul class="breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?= site_url('dashboard') ?>">Home</a>
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
                Welcome to Admin <?php echo $pt; ?>
            </h4>
            <div class="options">
                <a class="panel-collapse" href="#">
                    <i class="fa fa-chevron-down"></i>
                </a>
            </div>
        </div>
        <div class="panel-body">
            <a href="<?= site_url('studentindex') ?>">
                <input type="button" value="Add Student" class="btn btn-midnightblue">
            </a>
        </div>

    </div>
 
</div>


<?= $this->endSection() ?>