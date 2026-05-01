<?php require(APPPATH . "Views/pagelib.php"); ?>
<?= $this->extend('admin/shared/layout') ?>
<?= $this->section('content') ?>
<?php $pt = "Subject" ?>
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
            <a href="<?= site_url('subjectadd') ?>">
                <input type="button" value="Add Subject" class="btn btn-midnightblue">
            </a>
            <br><br>

            <select name="CID" id="course" required style="padding: 7px;">
                <option value="">-- Select Course --</option>

                <?php if (!empty($courses)) : ?>
                    <?php foreach ($courses as $course) : ?>
                        <option value="<?= $course['ID'] ?>">
                            <?= $course['CName'] ?>
                        </option>
                    <?php endforeach; ?>
                <?php endif; ?>

            </select>
            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" id="csrf_token">

            <button id="searchBtn" class="btn-primary btn"
                data-url="<?= site_url('getsubject') ?>"
                data-csrf-name="<?= csrf_token() ?>"
                data-csrf-hash="<?= csrf_hash() ?>">
                Search
            </button>
            <br><br>

            <table id="subjectTable" class="table table-striped table-bordered datatables dataTable r table-hover">
                <thead>
                    <tr>
                        <th>Action</th>

                        <th>Subject Code</th>
                        <th>Subject Name</th>
                        <th>Sem</th>
                        <th>Seq No</th>
                        <th>Max Mark</th>
                        <th>Pass Mark</th>
                        <th>Practical Max Mark</th>
                        <th>Practical Pass Mark</th>
                        <th>Status </th>
                    </tr>
                </thead>
                <script>
                    var baseUrl = "<?= base_url() ?>";
                </script>
                <tbody id="subjectBody">

                </tbody>
            </table>
        </div>

    </div>

</div>



<?= $this->endSection() ?>