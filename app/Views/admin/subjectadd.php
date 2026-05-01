<?php require(APPPATH . "Views/pagelib.php"); ?>
<?= $this->extend('admin/shared/layout') ?>
<?= $this->section('content') ?>
<?php $pt = "Manage Subject" ?>
<!--==========  breadcrumbs   ======-->
<div class="page-breadcrumbs" style="background-image:url('/AppImage/page/header.jpg')">
    <ul class="breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?= site_url('dashboard') ?>">Home</a>
        </li>
        <li>
            <a href="<?= site_url('subjectindex') ?>">Subject Index</a>
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
            <form method="post" action="<?= site_url('subjectsave') ?>">
                <?= csrf_field() ?>
                <input type="hidden" name="ID" value="<?= $subject['ID'] ?? '' ?>">

                <div class="row">


                    <div class="col-md-4 mb-3">
                        Select Course
                        <select name="CID" class="form-control" required>
                            <option value="">-- Select Course --</option>

                            <?php if (!empty($courses)) : ?>
                                <?php foreach ($courses as $course) : ?>
                                    <option value="<?= $course['ID'] ?>"
                                        <?= (isset($subject['CID']) && $subject['CID']  == $course['ID']) ? 'selected' : '' ?>>
                                        <?= $course['CName'] ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>

                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        Subject Code
                        <input type="text" name="SCode" value="<?= $subject['SCode'] ?? '' ?>" class="form-control"
                            required>
                    </div>

                    <div class="col-md-4 mb-3">
                        Subject Name
                        <input type="text" name="SName" value="<?= $subject['SName'] ?? '' ?>" class="form-control"
                            required>
                    </div>
                    <div class="col-md-4 mb-3">
                        Semester
                        <input type="number" name="Sem" value="<?= $subject['Sem'] ?? '' ?>" class="form-control"
                            required>
                    </div>
                    <div class="col-md-4 mb-3">
                        Sequence No
                        <input type="text" name="SeqNo" value="<?= $subject['SeqNo'] ?? '' ?>" class="form-control"
                            required>
                    </div>

                    <div class="col-md-4 mb-3">
                        Max Marks
                        <input type="number" name="MaxMark" value="<?= $subject['MaxMark'] ?? 70 ?>"
                            class="form-control" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        Pass Marks
                        <input type="number" name="PassMark" value="<?= $subject['PassMark'] ?? 23 ?>"
                            class="form-control" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        Practical Max Marks
                        <input type="number" name="MaxPracMark" value="<?= $subject['MaxPracMark'] ?? 30 ?>"
                            class="form-control" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        Practical Pass Marks
                        <input type="number" name="PassPracMark" value="<?= $subject['PassPracMark'] ?? 10 ?>"
                            class="form-control" required>
                    </div>
                    <?php
                    if (isset($subject)) {
                    ?>

                        <div class="col-md-4 mb-3">
                            Status
                            <select name="RStatus" id="" class="form-control">
                                <option value="1" <?= $subject['RStatus'] == "1" ? 'selected' : ''  ?>>Active</option>
                                <option value="0" <?= $subject['RStatus'] == "0" ? 'selected' : ''  ?>>Block</option>
                            </select>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <br>
                <input type="submit" value="<?= isset($subject) ? 'Update Subject' : 'Save Subject' ?>"
                    class="btn btn-midnightblue g-center">
            </form>

        </div>

    </div>

</div>



<?= $this->endSection() ?>