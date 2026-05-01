<html>

<head>

    <title>
        Markesheet
    </title>

    <link href="<?php echo base_url('AppCss/gcss.css') ?>" rel="stylesheet">
    <style>
        :root {
            --cellbg: #d3d3d3;

        }

        .tbl-first-row {}

        .tbl-first-row table tr:first-child td {
            background-color: var(--cellbg);
            font-weight: bold;
            text-align: center;
            text-transform: uppercase;
        }

        /*================== A4 ==========================*/
        @media print {
            body * {
                visibility: hidden;
            }

            #marksheet,
            #marksheet * {
                visibility: visible;
            }

            #marksheet {

                width: 210mm;
                min-height: 297mm;
                margin: auto;
            }
        }
    </style>
</head>

<body style="background-image:url('<?php echo base_url('img/page/bg.jpg') ?>');background-size:cover;">

    <div class="marksheet-container" id="marksheet">
        <table style="width:100%" cellspacing="0" class="border">
            <!--  Image -->
            <tr>
                <td>
                    <img src="<?php echo base_url('img/page/result-banner.png') ?>" class="imglogo" />

                </td>
            </tr>
            <!-- // Image -->
            <!-- Name-->
            <tr>
                <td>
                    <div style="background-color: #29a31f;color:white;font-size:x-large;text-align: center;padding:5px">
                        Neat Computer Education & Software Solutions- Uttar Pradesh<br>
                        नीट कंप्यूटर एजुकेशन एंड सॉफ्टवेयर सोल्युशंस उत्तर प्रदेश
                    </div>
                </td>
            </tr>
            <!-- //Name-->
            <!-- ISO-->
            <tr>
                <td>
                    <div style="padding:3px 5px 3px 5px;">
                        <p style="font-size: small;">
                            An Autonomous Non-Profit Making Organization Registered Under Sub-Section (2) of Section 7 and Sub-Section (1) of Section 8 of the Companies Act, 2013 (18 of 2013) and Rule 18 of the Companies (Incorporation) Rules, 2014 by Ministry of Corporate Affairs, Govt. of India (CIN: U80903UP2022PTC168054). And Also an ISO 9001:2015 Certified Computer Educational Organization (Certificate Number is QVA-NSPL-22-2213891).

                        </p>

                    </div>
                </td>
            </tr>
            <!-- //ISO-->
            <tr>
                <td>
                    <p style="text-align: center;">
                        <span style="border-bottom:2px solid #80472b;color:#80472b;font-size:xx-large;font-weight:bolder">
                            STATEMENT OF MARKS
                        </span>
                    </p>

                    <table style="width:100%;">
                        <tr>
                            <td width="18%" class="bold padl" valign="top">

                                Name of Student <br />
                                Father's Name <br />
                                Mother's Name <br />
                                Course Name :
                            </td>
                            <td width="35%" valign="top">

                                : <?= $stu['Name'] ?> <br />
                                : <?= $stu['FName'] ?> <br />
                                : <?= $stu['MName'] ?> <br>
                                : <?= $admission['CName'] ?>
                            </td>
                            <td style="width:30%" valign="top">
                                <strong>Serial No.</strong> : <?= 100000 +  $result['ID'] ?> <br>
                                <strong>Enrol. No.</strong> : <?= $stu['RegNo'] ?> <br />
                                <strong>Semester.</strong> : <?= $result['Sem'] ?> <br />
                                <strong>Examination</strong> : <?= date('F-Y', strtotime($admission['CreatedDate'])) ?>
                            </td>
                            <td style="width:17%" valign="top">
                                <img src="<?php echo base_url("upload/stupic/" . $stu['ID'] . ".jpg") ?>" style="width:80px;height:110px;padding-top:5px" />
                            </td>
                        </tr>

                    </table>
                </td>
            </tr> <!-- // Stu. Detail-->

            <tr>
                
                <td class="border-top">
                    <table style="width:100%" cellspacing="0">
                        <tr class="bold" style="background-color: #d3d3d3">

                            <td class="border-right padl border-bottom" align="center">
                                PAPER/SUBJECT
                            </td>
                            <td class="border-right padl border-bottom" colspan="2">
                                <table style="width:100%">
                                    <tr>
                                        <td colspan="2" align="center" class="border-bottom">
                                            <strong>
                                                THEORY EXAM
                                            </strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-right" align="center" style="width: 100px;">Max. Marks</td>
                                        <td align="center"> Obtain Marks</td>
                                    </tr>
                                </table>

                            </td>
                            <td class="border-right padl border-bottom" colspan="2">
                                <table style="width:100%">
                                    <tr>
                                        <td colspan="2" align="center" class="border-bottom">
                                            <strong>
                                                Practical EXAM
                                            </strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-right" align="center" style="width: 100px;">Max. Marks</td>
                                        <td align="center"> Obtain Marks</td>
                                    </tr>
                                </table>

                            </td>
                            <td class="padl border-right border-bottom" align="center">
                                Max Marks
                            </td>
                            <td class="padl border-right border-bottom" align="center">
                                Min Marks
                            </td>
                            <td class="padl border-right border-bottom" align="center">
                                Obtain Marks
                            </td>
                            <td class="padl border-bottom" align="center">
                                Remark
                            </td>
                        </tr> <!-- // Header-->
                        <?php
                        $totalmarks = 0;
                        $totalmaxmarks = 0;
                        foreach ($marks as $item) {
                            $totalmarks = $totalmarks + $item['ObtainMark'] + $item['MaxObtainMark'];
                            $totalmaxmarks = $totalmaxmarks + $item['MaxMark'] + $item['MaxPracMark'];
                        ?>
                            <tr>

                                <td class="padl  border-right">
                                    <?= $item['SubjectName'] ?>
                                </td>
                                <td class="padl   border-right padr" align="right" style="width: 100px;">
                                    <?= $item['MaxMark'] ?>
                                </td>
                                <td class="padl   border-right padr" align="right">
                                    <?= $item['ObtainMark'] ?>
                                </td>
                                <td class="padl  border-right padr" align="right" style="width: 100px;">
                                    <?= $item['MaxPracMark'] ?>
                                </td>
                                <td class="padl  border-right padr" align="right">
                                    <?= $item['MaxObtainMark'] ?>
                                </td>
                                <td class="padl  border-right padr" align="right">
                                    100
                                </td>
                                <td class="padl  border-right padr" align="right">
                                    50
                                </td>
                                <td class="padl  border-right " align="center">
                                    
                                    <?= ($item['ObtainMark'] + $item['MaxObtainMark']) ?>
                                </td>
                                <td align="center">
                                    <?php
                                    if (($item['ObtainMark'] + $item['MaxObtainMark']) > 33)
                                        echo "P";
                                    else
                                        echo "F";
                                    ?>
                                </td>
                            </tr>
                        <?php
                        }
                        // ========== Grand Total ========= 

                        $grandtotal = $totalmaxmarks;
                        if ($Sem == 2)
                            $grandtotal = $grandtotal + $Sem1MaxMarks;
                      

                        // ========== // Grand Total ========= -->
                        // ========== Grand Obtain ========= 

                        $grandobtain = $totalmarks;
                        if ($Sem == 2)
                            $grandobtain = $grandobtain + $Sem1ObtainMarks;
                        

                        // ========== // Grand Obtain ========= 
                        ?>


            </tr> <!-- // Marks-->
            <tr style="background-color: #d3d3d3">
                <td class="border-top border-right">
                    <strong>
                        TOTAL OBTAINED MARKS
                    </strong>
                </td>
                <td colspan="6" class="border-top border-right">

                </td>
                <td class="border-top" colspan="2" align="center">
                    <strong>
                        <?= $totalmarks ?>
                    </strong>
                </td>
            </tr> <!-- // Obtain MarksMarks-->

        </table>
        </td>
        </tr>
        </table>
        <!-- // ================= Aggregate Marks ==========================-->
        <span style="text-transform: uppercase;display: block;text-align: center;padding: 30px;font-size: large;font-weight: bolder;">
            Aggregate Marks
        </span>
        <div class="tbl-first-row ">


            <table style="width: 100%;" class="border " cellspacing="0">
                <tr>
                    <td class="border-right border-bottom">
                        Semester
                    </td>
                    <td class="border-right border-bottom">
                        1 st Semester
                    </td>
                    <td class="border-right border-bottom">
                        2 nd Semester
                    </td>
                    <td class="border-right border-bottom">
                        Grand Total
                    </td>
                    <td class="border-right border-bottom">
                        Result
                    </td>
                    <td class="border-bottom">
                        Percentage
                    </td>
                </tr>
                <tr>
                    <td class="border-right">
                        Max Marks
                    </td>
                    <td class="border-right" align="center">
                        <?php
                        if ($Sem == 2) {
                            echo  $Sem1MaxMarks;
                        } else
                            echo $totalmaxmarks;

                        ?>
                    </td>
                    <td class="border-right" align="center">
                        <?php
                        if ($Sem == 2)
                            echo  $totalmaxmarks;
                        ?>

                    </td>
                    <td class="border-right" align="center">
                        <?= $grandtotal ?>
                    </td>
                    <td rowspan="2" class="border-right" align="center">
                        <?php
                        if ($grandobtain >= ($grandtotal / 2))
                            echo "Pass";
                        else
                            echo "Fail";
                        ?>

                    </td>
                    <td rowspan="2" align="center"> <!-- Percentage -->
                        <?php
                        if ($grandtotal > 0) {
                            $percentage = ($grandobtain / $grandtotal) * 100;
                        } else {
                            $percentage = 0;
                        }

                        // Optional: round to 2 decimal places
                        $percentage = round($percentage, 2);

                        echo $percentage . '%';
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="border-right">
                        Obt. Marks
                    </td>
                    <td class="border-right" align="center">
                        <?php
                        if ($Sem == 2) {
                            echo  $Sem1ObtainMarks;
                        } else
                            echo $totalmarks;
                        ?>
                    </td>
                    <td class="border-right" align="center">
                        <?php
                        if ($Sem == 2)
                            echo $totalmarks;
                        ?>
                    </td>
                    <td class="border-right" align="center">
                        <?= $grandobtain ?>
                    </td>

                </tr>
            </table>
        </div>
        <!-- // ================= // Aggregate Marks ==========================-->
        <!-- // =================  Sign Logo ==========================-->
        <div>
            <img src="<?php echo base_url('img/page/sign-banner.png?v=10242026'); ?>" alt="" style="width: 100%;">
            <hr style="border-bottom: solid 2px blue;">
        </div>
        <!-- // ================= // Sign Logo ==========================-->
        <!-- // =================  Grade Legend ==========================-->
        <div style="background-color: #dab794;padding: 0px;">
            <p style="text-align: center;font-weight: bold;font-size: large;">
                Grade Legend
                &nbsp;
                S [85% or Above]
                &nbsp;
                S [75% or Above]
                &nbsp;
                B [65% or Above]
                &nbsp;
                C [55% or Above]
                &nbsp;
                D [50% or Above]
                &nbsp;
                Under 50% Fail
            </p>

        </div>
        <!-- // ================= //  Grade Legend ==========================-->
        <!-- // =================   Abbreviations ==========================-->
        <div>

            <strong style="font-size: 18px;margin-left:2%;">
                Abbreviations :
            </strong>
            <br>
            <ul style="margin-left: 10%;">
                <li> For Passing the candidate is required to Obtain 50% in each paper/subject </li>
                <li> Student must passed in theory and Practical separately</li>
                <li><strong>Remarks: P- Passed A- Absent S- Eligible for Supplementary G- Passed By Grace F- Fail NE- Not Eligible</strong></li>
            </ul>
            <hr style="border-bottom: solid 2px blue;">
        </div>
        <!-- // ================= //  Abbreviations ==========================-->

        <!-- // =================   Head Office ==========================-->
        <p style="font-size: larger;font-weight: bolder;color:blue;text-align: center;">
            Head Office : Budhanpur, Shishupar, Sadat, Ghazipur, Uttar Pradesh - 275204
        </p>
        <!-- // ================= //  Head Office ==========================-->

    </div>
</body>

</html>