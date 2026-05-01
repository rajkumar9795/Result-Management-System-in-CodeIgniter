<?php require(APPPATH . "Views/pagelib.php"); ?>
<?= $this->extend('admin/shared/layout') ?>
<?= $this->section('content') ?>
<?php $pt = "Course Management" ?>
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

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-dismissable alert-success">
            <strong>Well done!</strong> <?= session()->getFlashdata('success') ?>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        </div>
    <?php endif; ?>
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
            <a href="<?= site_url('courseadd') ?>">
                <input type="button" value="Add Course" class="btn btn-midnightblue">
            </a>
            <br><br>
            <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables dataTable r table-hover" id="editable" aria-describedby="editable_info">
                    <thead>
                        <tr role="row">
                            <th>Action</th>
                            <th>Course Code</th>
                            <th>Course Name</th>
                            <th>Duration (Months)</th>
                            <th>Is Fix Subject</th>
                            <th>Status</th>
                            <th>Create dDate</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($courses)): ?>
                            <?php foreach ($courses as $row): ?>
                                <tr>
                                    <td>
                                        <a href="<?= site_url('courseadd?id=' . $row['ID']) ?>"
                                            class="">
                                            <i class="fa fa-edit"></i> 
                                        </a>
                                    </td>

                                    <td><?= $row['CCode'] ?></td>
                                    <td><?= $row['CName'] ?></td>
                                    <td><?= $row['Duration'] ?></td>
                                    <td><?php if($row['IsFixSub'] == 1) echo "<span style='color:green'>Yes</span>"; else echo "<span style='color:red'>No</span>"; ?>
                                    <td><?php if($row['RStatus'] == 1) echo "<span style='color:green'>Active</span>"; else echo "<span style='color:red'>Inactive</span>"; ?>
                                    </td>
                                    <td><?= $row['CreatedDate'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6">No data found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>


        </div>

    </div>

</div>
<!-- ====== Button ==========-->



<?= $this->endSection() ?>