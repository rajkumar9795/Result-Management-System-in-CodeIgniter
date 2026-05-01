<?php require(APPPATH . "Views/pagelib.php"); ?>
<?= $this->extend('admin/shared/layout') ?>
<?= $this->section('content') ?>
<?php $pt = "Admit Card" ?>
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
            <div style="width:500px;margin-left:100px;border:solid 1px #808080">
                <img src="<?php echo base_url('img/page/result-banner.png') ?>" style="width:100%" />
                <br />&nbsp;
                <table style="width:100%" class="tbl-detail">
                    <tr>
                        <td style="width:5%"></td>
                        <td style="width:65%">
                            <table style="width:100%">
                                <tr>
                                    <td style="width:25%">Reg. No. </td>
                                    <td style="width:75%">: 132651580181</td>
                                </tr>
                                <tr>
                                    <td>Name </td>
                                    <td>: Jai Prakash Singh Yadav</td>
                                </tr>
                                <tr>
                                    <td>Course </td>
                                    <td>: Advance Diploma Computer Application</td>
                                </tr>
                                <tr>
                                    <td>DOB </td>
                                    <td>: 15-05-1985</td>
                                </tr>
                                <tr>
                                    <td>Session </td>
                                    <td>: Jan-2026</td>
                                </tr>
                            </table>
                            <img src="<?php echo base_url('img/page/sign-ramraj.png') ?>" style="width:150px;float:right" />
                        </td>
                        <td style="width:25%">
                            <img src="<?php echo base_url('img/page/blank-profile.jpg') ?>" style="width:100%;margin-right:50px" />
                        </td>
                        <td style="width:5%"></td>
                    </tr>
                </table>
                <br /> &nbsp;
            </div>
        </div>

    </div>

</div>



<?= $this->endSection() ?>