<?php require(APPPATH . "Views/pagelib.php"); ?>
<?= $this->extend('admin/shared/layout') ?>
<?= $this->section('content') ?>
<?php $pt = "Result Print" ?>
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
                <?php echo $pt; ?>
            </h4>
            <div class="options">
                <a class="panel-collapse" href="#">
                    <i class="fa fa-chevron-down"></i>
                </a>
            </div>
        </div>
        <div class="panel-body">
            <form id="searchForm" data-url="<?= site_url('searchreg') ?>">
                <div class="row">
                    <div class="col-md-3"></div>

                    <div class="col-md-4">
                        Student Registration No
                        <input type="text" name="RegNo" id="RegNo" placeholder="Enter Registration No" required class="form-control">
                    </div>

                    <div class="col-md-2">
                        <input type="submit" value="Search" class="btn btn-primary" style="margin-top: 20px;">
                    </div>

                    <div class="col-md-3"></div>
                </div>
            </form>
            <script>
                var searchUrl = "<?= site_url('searchreg') ?>";
            </script>
            <!-- Result Div -->
            <div id="resultBox" style="margin-top:20px; text-align:center;"></div>
        </div>

    </div>

</div>


<script src="<?= base_url('Appjs/gjs.js') ?>"> </script>
<?= $this->endSection() ?>