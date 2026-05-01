<?php require(APPPATH . "Views/pagelib.php"); ?>
<?= $this->extend('admin/shared/layout') ?>
<?= $this->section('content') ?>
<?php $pt = "Student Index" ?>
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
            <a href="<?= site_url('studentadd') ?>">
                <input type="button" value="Add Student" class="btn btn-midnightblue">
            </a>
            <br><br>
            <div id="copy-tooltip">Copied!</div>

            <div class="table-responsive">


                <table class="table table-striped table-bordered datatables dataTable r table-hover" id="editable" aria-describedby="editable_info">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>Registration No.</th>
                            <th>Name</th>
                            <th>Father Name</th>
                            <th>Mother Name</th>
                            <th>Phone</th>
                            <th>Whatsapp</th>
                            <th>Email</th>
                            <th>DOB</th>
                            <th>Address</th>
                            <th>IS Result</th>
                            <th>Fee Status</th>
                            <th>Admission Date</th>
                            <th>Created Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($students)) : ?>
                            <?php foreach ($students as $row) : ?>

                                <tr>
                                    <td>
                                        <a href="<?= site_url('studentedit/' . $row['ID']) ?>">
                                            <i class="fa fa-pencil" style="color:green"></i>
                                        </a>
                                        &nbsp;&nbsp;
                                        <a href="<?= base_url('upload/stupic/' . $row['ID']) . '.jpg' ?>" target="_blank">
                                            <i class="fa fa-file-photo-o"></i>
                                        </a>
                                    </td>

                                    <td class="copy-text" data-value="<?= $row['RegNo'] ?>">
                                        <?= $row['RegNo'] ?>
                                    </td>

                                    <td><?= $row['Name'] ?></td>
                                    <td><?= $row['FName'] ?></td>
                                    <td><?= $row['MName'] ?></td>
                                    <td><?= $row['Phone'] ?></td>
                                    <td><?= $row['Whatsapp'] ?></td>
                                    <td><?= $row['Email'] ?></td>
                                    <td><?= $row['DOB'] ?></td>
                                    <td><?= $row['Address'] ?></td>
                                    <td>
                                        <?php
                                        if ($row['IsResult'] == "1") {
                                        ?>
                                            <span style="color:green">Eligible</span>
                                        <?php
                                        } else {
                                        ?>
                                            <span style="color:red">Not Eligible</span>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($row['IsFeePaid'] == "1") {
                                        ?>
                                            <span style="color:green">Paid</span>
                                        <?php
                                        } else {
                                        ?>
                                            <span style="color:red">Pending</span>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td><?= $row['AdmissionDate'] ?></td>
                                    <td><?= $row['CreatedDate'] ?></td>
                                </tr>

                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>



                </table>

            </div>

        </div>

    </div>

</div>

<script>
    const tooltip = document.getElementById('copy-tooltip');

    document.addEventListener('click', function(e) {

        let target = e.target.closest('.copy-text'); // important

        if (!target) return;

        let text = target.getAttribute('data-value') || target.innerText;

        navigator.clipboard.writeText(text).then(() => {
            let rect = target.getBoundingClientRect();

            tooltip.style.left = (rect.right -10) + 'px';
            tooltip.style.top = (rect.top + (rect.height / 2)) + 'px';
            tooltip.style.transform = 'translateY(-50%)';
            tooltip.style.display = 'block';

            setTimeout(() => {
                tooltip.style.display = 'none';
            }, 800);

        });

    });
</script>

<?= $this->endSection() ?>