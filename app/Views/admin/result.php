<?php require(APPPATH . "Views/pagelib.php"); ?>
<?= $this->extend('admin/shared/layout') ?>
<?= $this->section('content') ?>
<?php $pt = "Result" ?>
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
            <?php
            if (isset($_POST['submit'])) {
                $regNo = $_POST['RegNo'];
                header("Location: " . site_url("admissionlist/" . $regNo));
                exit;
            }
            ?>
            <form onsubmit="goSearch(event)">


                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-4">
                        Student Registration No
                        <input type="text" name="RegNo" id="RegNo" placeholder="Enter Registration No" required class="form-control">
                    </div>
                    <div class="col-md-2">
                        <input name="button" type="submit" value="Search" class="btn btn-primary" style="margin-top: 20px;">
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </form>
            <script>
                function goSearch(e) {
                    e.preventDefault();
                    let reg = document.getElementById('RegNo').value;
                    window.location.href = "<?= site_url('admissionlist/') ?>" + reg;
                }
            </script>
        </div>

    </div>

</div>



<?= $this->endSection() ?>