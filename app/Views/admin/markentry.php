<?php require(APPPATH . "Views/pagelib.php"); ?>
<?= $this->extend('admin/shared/layout') ?>
<?= $this->section('content') ?>
<?php $pt = "Marks Entry" ?>
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
            <form method="post" action="<?= site_url('markssave') ?>">
                <?= csrf_field() ?>

                <input type="hidden" name="AdmissionID" value="<?= $admissionId ?>">
                <input type="hidden" name="ResultID" value="<?= $resultId ?>">

                <table class="table table-bordered" id="marksTable">
                    <thead>
                        <tr>
                            <th>Sequence </th>
                            <th>Subject</th>

                            <th>Theory Max Marks</th>
                            <th>Theory Obtain Marks</th>
                            <th>Practical Max Marks</th>
                            <th>Practical Obtain Marks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($marks)): ?>
                            <!-- when entry in markentry table -->
                            <h1>true</h1>
                            <?php foreach ($marks as $s): ?>
                                <tr>

                                    <td>
                                        <input type="text" name="sequence[]" value="<?= $s['Sequence'] ?>" class="form-control">
                                    </td>
                                    <td>

                                        <input type="text" name="subject[]" value="<?= $s['SubjectName'] ?>">

                                    </td>
                                    <td>
                                        <input type="number" name="maxmarks[]" value="<?= $s['MaxMark'] ?>"
                                            class="form-control">
                                    </td>
                                    <td>
                                        <input type="number" name="obtainmarks[]" value="<?= $s['ObtainMark'] ?>"
                                            class="form-control">
                                    </td>
                                    <td>
                                        <input type="number" name="pracmaxmarks[]" value="<?= $s['MaxPracMark'] ?>"
                                            class="form-control">
                                    </td>
                                    <td>
                                        <input type="number" name="pracobtainmarks[]" value="<?= $s['MaxObtainMark'] ?>"
                                            class="form-control">
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php elseif ($isFixSub == 1): ?>
                            <h1>false</h1>
                            <!-- FIXED SUBJECT (when no entry in markentry table) -->
                            <?php foreach ($subjects as $s): ?>
                                <tr>
                                    <td>
                                        <?= $s['SName'] ?>
                                        <input type="hidden" name="subject[]" value="<?= $s['SName'] ?>">

                                    </td>
                                    <td>
                                        <input type="text" name="sequence[]" value="<?= $s['SeqNo'] ?>" class="form-control">
                                    </td>
                                    <td>
                                        <input type="number" name="maxmarks[]" value="<?= $s['MaxMark'] ?>"
                                            class="form-control">
                                    </td>
                                    <td>
                                        <input type="number" name="obtainmarks[]" class="form-control">
                                    </td>
                                    <td>
                                        <input type="number" name="pracmaxmarks[]" value="<?= $s['MaxPracMark'] ?>"
                                            class="form-control">
                                    </td>
                                    <td>
                                        <input type="number" name="pracobtainmarks[]" class="form-control">
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        <?php else: ?>

                            <!-- DYNAMIC SUBJECT -->
                            <tr>
                                <td><input type="text" name="subject[]" class="form-control"></td>
                                <td><input type="text" name="sequence[]" value="1" class="form-control"></td>
                                <td><input type="number" name="maxmarks[]" class="form-control"></td>
                                <td><input type="number" name="obtainmarks[]" class="form-control"></td>
                                <td><input type="number" name="pracmaxmarks[]" class="form-control"> </td>
                                <td><input type="number" name="pracobtainmarks[]" class="form-control"></td>
                            </tr>

                        <?php endif; ?>

                    </tbody>
                </table>

                <?php if ($isFixSub == 0): ?>
                    <button type="button" onclick="addRow()" class="btn btn-success">
                        Add Subject
                    </button>
                <?php endif; ?>

                <br><br>

                <input type="submit" value="Save Marks" class="btn btn-primary  g-center">
            </form>
        </div>

    </div>

</div>
<script>
    let seq = 2;

    function addRow() {
        let table = document.querySelector("#marksTable tbody");

        let row = `
    <tr>
        <td><input type="text" name="subject[]" class="form-control"></td>
         <td><input type="text" name="sequence[]" value="${seq}" class="form-control"></td>
        <td><input type="number" name="maxmarks[]" class="form-control"></td>
        <td><input type="number" name="obtainmarks[]" class="form-control"></td>
         <td><input type="number" name="pracmaxmarks[]" class="form-control"></td>
        <td><input type="number" name="pracmaxmarks[]"  class="form-control"> </td>
         <td>
            <button type="button" class="btn btn-danger" onclick="removeRow(this)">X</button>
        </td>
    </tr>`;

        table.insertAdjacentHTML("beforeend", row);
        seq++;
    }
    // delete row function
    function removeRow(btn) {
        btn.closest("tr").remove();
        updateSequence();
    }

    // re-arrange sequence after delete
    function updateSequence() {
        let rows = document.querySelectorAll("#marksTable tbody tr");

        rows.forEach((row, index) => {
            row.querySelector("input[name='sequence[]']").value = index + 1;
        });
    }
</script>


<?= $this->endSection() ?>