<html>

<head>

    <title>
        Markesheet
    </title>

    <link href="<?php echo base_url('AppCss/gcss.css') ?>" rel="stylesheet">
    <style>
        .gradient {
            background: #002663;
            background: linear-gradient(90deg, rgba(0, 38, 99, 1) 0%, rgba(19, 4, 105, 1) 49%, rgba(141, 6, 9, 1) 100%);
        }
    </style>
</head>

<body>
    <div style="max-width:950px;margin:auto;font-family:Segoe UI, sans-serif;background:#f1f3f8;padding:30px;">

        <!-- Main Card -->
        <div style="background:#fff;border-radius:12px;box-shadow:0 8px 30px rgba(0,0,0,0.1);overflow:hidden;">

            <!-- Top Strip -->
            <div style="color: #fff; padding: 20px; text-align: center;" class="gradient">
                <h2 style="margin:0;letter-spacing:1px;">Neat Computer Education & Software Solutions- Uttar Pradesh</h2>
                <p style="margin:5px 0 0;font-size:14px;">Student Verification Portal</p>
            </div>

            <!-- Profile Section -->
            <div style="display:flex;align-items:center;padding:25px;border-bottom:1px solid #eee;">

                <img src="<?php echo base_url("upload/stupic/" . $stu['ID'] . ".jpg") ?>"
                    style="width:110px;height:110px;border-radius:10px;object-fit:cover;border:3px solid #2a5298;margin-right:20px;">

                <div style="flex:1;">
                    <h3 style="margin:0;color:#2a5298;"><?= $stu['Name'] ?> </h3>
                    <p style="margin:5px 0;color:#555;">Enrollment No: <strong><?= $stu['RegNo'] ?></strong></p>
                    <p style="margin:0;color:#777;font-size:14px;">Course: <?= $admission['CName'] ?></p>
                </div>



                <!-- Verification Badge -->
                <div style="text-align:center;">
                    <div style="background:#28a745;color:#fff;padding:10px 15px;border-radius:50px;font-size:13px;font-weight:bold;">
                        ✔ VERIFIED
                    </div>
                </div>

            </div>

            <!-- Details Grid -->
            <div style="padding:25px;display:grid;grid-template-columns:repeat(2,1fr);gap:20px;">

                <div>
                    <label style="color:#888;font-size:13px;">Father Name</label>
                    <div style="font-weight:600;"><?= $stu['FName'] ?></div>
                </div>

                <div>
                    <label style="color:#888;font-size:13px;">Mother Name</label>
                    <div style="font-weight:600;"><?= $stu['MName'] ?> </div>
                </div>

                <div>
                    <label style="color:#888;font-size:13px;">Date of Birth</label>
                    <div style="font-weight:600;">
                        <?= date('d-m-Y', strtotime($stu['DOB']))   ?>
                    </div>
                </div>

                <div>
                    <label style="color:#888;font-size:13px;">Admission Date</label>
                    <div style="font-weight:600;">
                        <?= date('d-m-Y', strtotime($stu['AdmissionDate']))   ?>
                    </div>
                </div>

                <div>
                    <label style="color:#888;font-size:13px;">Completion Date</label>
                    <div style="font-weight:600;">
                        <?= date('d-m-Y', strtotime($EndDate))   ?>
                    </div>
                </div>

                <div>
                    <label style="color:#888;font-size:13px;">Certificate No</label>
                    <div style="font-weight:600;">
                        <?= $result['ID'] ?>
                    </div>
                </div>

                <div>
                    <label style="color:#888;font-size:13px;">Issue Date</label>
                    <div style="font-weight:600;">
                        <?= date('d-m-Y', strtotime($result['CreatedDate']))   ?>
                    </div>
                </div>

            </div>

            <!-- Result Section -->
            <?php
            $percentage = 0;
            if ($MaxMarks > 0) {
                $percentage = ($ObtainMarks / $MaxMarks) * 100;
            }

            ?>
            <div style="padding:20px;border-top:1px solid #eee;display:flex;justify-content:space-around;text-align:center;">

                <div>
                    <div style="font-size:13px;color:#777;">Grade</div>
                    <div style="font-size:20px;font-weight:bold;color:#2a5298;">
                        <?php
                        if ($percentage >= 85) {
                            echo 'S';
                        } elseif ($percentage >= 75) {
                            echo 'A'; // assuming second S was typo → A
                        } elseif ($percentage >= 65) {
                            echo 'B';
                        } elseif ($percentage >= 55) {
                            echo 'C';
                        } elseif ($percentage >= 50) {
                            echo 'D';
                        } else {
                            echo 'Fail';
                        }
                        ?>
                    </div>
                </div>

                <div>
                    <div style="font-size:13px;color:#777;">Percentage</div>
                    <div style="font-size:20px;font-weight:bold;color:#2a5298;">
                        <?= round($percentage, 2) ?>
                    </div>
                </div>

                <div>
                    <div style="font-size:13px;color:#777;">Result</div>
                    <div style="font-size:20px;font-weight:bold;">
                        <?php
                        if ($percentage > 50)
                            echo "<span style='color:green'>PASS</span>";
                        else
                            echo "<span style='color:red'>FAIL</span>";
                        ?>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <!--
     ###############################################################################################
     ###############################################################################################
     ###############################################################################################
     -->
     



  
</body>

</html>