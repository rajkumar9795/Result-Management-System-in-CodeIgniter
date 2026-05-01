<?php require(APPPATH . "Views/pagelib.php"); ?>
<?= $this->extend('admin/shared/layout') ?>
<?= $this->section('content') ?>
<?php $pt = "Admission Management" ?>
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

    <style>
        .g-table {}

        .g-table td:first-child,
        th:first-child {
            width: 200px !important;
            /* set your required width */
            font-weight: bold;
            white-space: nowrap;
            /* prevents text breaking (optional) */
        }
    </style>
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

            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-dismissable alert-success">
                    <strong>Well done!</strong> <?= session()->getFlashdata('success') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                </div>
            <?php endif; ?>


            <form method="post" action="<?= site_url('getsinglestu') ?>">

                <?= csrf_field() ?>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-4">
                        Student Registration No
                        <input type="text" name="RegNo" placeholder="Enter Registration No" required class="form-control">
                    </div>
                    <div class="col-md-2">
                        <input type="submit" value="Search" class="btn btn-primary" style="margin-top: 20px;">
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </form>
            <br>
            <?php if (!empty($student)) : ?>
                <?php if ($AdmissionFound == 0) : ?>
                    <br>

                    <table class="table table-bordered g-drop-shadow g-table" style="width:50%;margin:auto;">
                        <tr>
                            <td colspan="2" align="center">
                                <h3>Student Details</h3>
                            </td>
                        </tr>
                        <tr>
                            <td>Registration No: </td>
                            <td><?= $student['RegNo'] ?></td>
                        </tr>
                        <tr>
                            <td>Name: </td>
                            <td><?= $student['Name'] ?></td>
                        </tr>
                        <tr>
                            <td>Phone: </td>
                            <td><?= $student['Phone'] ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">

                                <form method="post" action="<?= site_url('saveadmission') ?>" style="margin: auto;display: flex;justify-content: center;align-items: center;">
                                    <?= csrf_field() ?>
                                    <div class="col-md-4">
                                        <input type="hidden" name="StuID" value="<?= $student['RegNo'] ?>">


                                        <select name="CourseID" class="form-control" required>
                                            <option value="">Select Course</option>

                                            <?php foreach ($courses as $course): ?>
                                                <option value="<?= $course['ID'] ?>">
                                                    <?= $course['CName'] ?>
                                                </option>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <button type="submit" class="btn btn-midnightblue">
                                            Save Admission
                                        </button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    </table>
                <?php endif; ?>


            <?php endif; ?>
            <br>
            <!-- =========== Admission List ================ -->
            <div class="table-responsive">


                <table class="table table-striped table-bordered datatables dataTable r table-hover" id="editable" aria-describedby="editable_info">
                    <thead>
                        <tr>

                            <th>Course Name</th>
                            <th>Admission Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($admission)) : ?>
                            <?php foreach ($admission as $row) : ?>

                                <tr>
                                    <td style="width: 50%;">
                                        <?= $row['course_name'] ?>
                                    </td>
                                    <td><?= $row['admission_date'] ?></td>
                                    <td>
                                        <a href="<?php echo site_url('deladmission/' . $RegNo) ?>" onclick="return confirm('Are you sure to delete this Admission')">
                                            <input type="button" value="Delete " class="btn btn-danger">
                                        </a>
                                    </td>
                                </tr>

                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>



                </table>

            </div>
            <!-- =========== // Admission List ================ -->
        </div>



        <?= $this->endSection() ?>