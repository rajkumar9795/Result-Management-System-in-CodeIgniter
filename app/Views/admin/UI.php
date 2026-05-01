<?php require( APPPATH . "Views/pagelib.php"); ?>
<?= $this->extend('admin/shared/layout') ?>
<?= $this->section('content') ?>
<?php $pt="Lorem" ?>
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
            Lorem
        </div>

    </div>
 
</div>
<!-- ====== Button ==========-->
<input type="button" value="Add Client" class="btn btn-midnightblue">
<!-- ====== Table ==========-->
  <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables dataTable r table-hover" id="editable" aria-describedby="editable_info">
                    <thead>
                        <tr role="row">
                            <th>Action</th>
                            <th>Course Code</th>
                            <th>Course Name</th>
                            
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
<?= $this->endSection() ?>