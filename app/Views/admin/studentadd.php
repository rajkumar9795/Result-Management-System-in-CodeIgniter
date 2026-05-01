<?php require(APPPATH . "Views/pagelib.php"); ?>
<?php require(APPPATH . "Views/admin/pagelib.php"); ?>
<?= $this->extend('admin/shared/layout') ?>
<?= $this->section('content') ?>
<?php $pt = "Manage Student" ?>
<!--==========  breadcrumbs   ======-->
<div class="page-breadcrumbs" style="background-image:url('/AppImage/page/header.jpg')">
    <ul class="breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?= site_url('dashboard') ?>">Home</a>
        </li>
        <li><a href="<?= site_url('studentindex') ?>"> Student Index</a></li>
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
            <form method="post" action="<?= site_url('studentsave') ?>" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <input type="hidden" name="ID" value="<?= $student['ID'] ?? '' ?>" class="form-control">
                <input type="hidden" name="RegNo" value="<?= $student['RegNo'] ?? '' ?>" class="form-control">
                <div class="row">

                    
                    <div class="col-md-6">
                        Name <?php MandateSymbol() ?>
                        <input type="text" name="Name" value="<?= $student['Name'] ?? '' ?>" class="form-control" required><br>
                    </div>

                    <div class="col-md-6">
                        Father Name <?php MandateSymbol() ?>
                        <input type="text" name="FName" value="<?= $student['FName'] ?? '' ?>" class="form-control" required><br>
                    </div>

                    <div class="col-md-6">
                        Mother Name
                        <input type="text" name="MName" value="<?= $student['MName'] ?? '' ?>" class="form-control"><br>
                    </div>

                    <div class="col-md-6">
                        Phone <?php MandateSymbol() ?>
                        <input type="text" name="Phone" pattern="[0-9]{10}" title="Only Ten Digit number is allowed" value="<?= $student['Phone'] ?? '' ?>" class="form-control" required><br>
                    </div>

                    <div class="col-md-6">
                        Whatsapp
                        <input type="text" name="Whatsapp" value="<?= $student['Whatsapp'] ?? '' ?>" class="form-control"><br>
                    </div>

                    <div class="col-md-6">
                        Email
                        <input type="email" name="Email" value="<?= $student['Email'] ?? '' ?>" class="form-control"><br>
                    </div>

                    <div class="col-md-6">
                        Date of Birth <?php MandateSymbol() ?>
                        <input type="date" name="DOB" value="<?= $student['DOB'] ?? '' ?>" class="form-control" required><br>
                    </div>

                    <div class="col-md-6">
                        Address
                        <textarea name="Address" class="form-control"><?= $student['Address'] ?? '' ?></textarea><br>
                    </div>
                    <div class="col-md-6">
                        Admission Date <?php MandateSymbol() ?>
                        <input type="date" name="AdmissionDate" value="<?= $student['DOB'] ?? '' ?>" class="form-control" required><br>
                    </div>
                    <div class="col-md-6">
                        Student Photo
                        <input type="file" name="Photo" class="form-control"><br>
                    </div>

                    <?php
                    if (isset($student)) {
                    ?>
                        <div class="col-md-6">
                            IS Result Create
                            <select name="IsResult" id="IsResult" class="form-control">
                                <option value="1" <?= ($student['IsResult'] == 1) ? 'selected' : '' ?>>Yes</option>
                                <option value="0" <?= ($student['IsResult'] == 0) ? 'selected' : '' ?>>No</option>
                            </select><br>
                        </div>
                        <div class="col-md-6">
                            IS Fee Paid
                            <select name="IsFeePaid" id="IsFeePaid" class="form-control">
                                <option value="1" <?= ($student['IsFeePaid'] == 1) ? 'selected' : '' ?>>Paid</option>
                                <option value="0" <?= ($student['IsFeePaid'] == 0) ? 'selected' : '' ?>>Pending</option>
                            </select>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="col-md-12">
                        <br>
                        <input type="submit" value="<?= isset($student) ? 'Update Student' : 'Save Student' ?>" class="btn btn-primary g-center">
                    </div>

                </div>
            </form>
        </div>

    </div>

</div>



<?= $this->endSection() ?>