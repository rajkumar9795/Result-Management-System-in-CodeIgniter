<?php require(APPPATH . "Views/pagelib.php"); ?>
<?= $this->extend('admin/shared/layout') ?>
<?= $this->section('content') ?>
<?php $pt = "Course Entry" ?>
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
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-dismissable alert-danger">
            <strong>Error !</strong> <?= session()->getFlashdata('error') ?>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('delsuccess')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('delsuccess') ?></div>
    <?php endif; ?>
    <div class="panel panel-midnightblue">
        <div class="panel-heading">
            <h4>
                <?php echo $pt; ?> [<?= $student['Name'] ?>]
            </h4>
            <div class="options">
                <a class="panel-collapse" href="#">
                    <i class="fa fa-chevron-down"></i>
                </a>
            </div>
        </div>
        <div class="panel-body">

            <table class="table table-striped table-bordered datatables dataTable r table-hover" id="editable" aria-describedby="editable_info">
                <thead>
                    <tr>
                        <th>Action</th>

                        <th>Course Name</th>
                        <th>Admission Data</th>

                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($admission)) : ?>
                        <?php foreach ($admission as $row) : ?>

                            <tr>
                                <td>
                                    <input type="button" value="Result" class="btn btn-midnightblue" onclick="ShowM(<?= $row['ID'] ?>,<?= $reg ?>)">
                                </td>
                                <td><?= $row['CourseName'] ?></td>
                                <td><?= $row['CreatedDate'] ?></td>

                            </tr>

                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>



            </table>

        </div>

    </div>

</div>
<script>
    function ShowM(admid, regno) {

        $('#myModal').modal('show');
        $("#AdmissionID").val(admid);

        fetch("<?= site_url('getresultlist') ?>/" + admid + "/" + regno)
            .then(res => res.text())
            .then(data => {
                document.getElementById("resultListArea").innerHTML = data;
            });
    }
</script>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <form method="post" action="<?= site_url('resultsave') ?>">
                            <?= csrf_field() ?>
                            <input type="hidden" name="RegNo" value="<?= $reg ?>">
                            <input type="hidden" id="AdmissionID" name="AdmissionID"><br>
                            Enter Semerster
                            <input type="number" name="Sem" placeholder="Semester" required class="form-control"><br>
                            <input type="submit" value="Save" class="btn btn-midnightblue g-center">
                        </form>
                        <br>

                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div id="resultListArea"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection() ?>