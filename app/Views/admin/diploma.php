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
                    <div style="padding:3px 8px 3px 8px;">
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

                        <span style="border-bottom:2px solid #80472b; color:#80472b; font-size:xx-large; font-weight:bolder; width:fit-content;">
                            DIPLOMA
                        </span>
                        <br>
                        <span style="border-bottom:2px solid #80472b; color:#80472b; font-size:large; font-weight:bolder; width:fit-content;">
                            This Institution Awards the Diploma to
                        </span>

                    </p>

                    <table style="width:100%;">
                        <tr>
                            <td width="18%" class="bold padl" valign="top">
                                Name of Student <br />
                                Father's Name <br />
                                Mother's Name <br />

                                Date of Birth :
                            </td>
                            <td width="35%" valign="top">
                                : <?= $stu['Name'] ?> <br />
                                : <?= $stu['FName'] ?> <br />
                                : <?= $stu['MName'] ?> <br>

                                : <?= date("j-F-Y", strtotime($stu['DOB']));  ?>
                            </td>
                            <td style="width:30%" valign="top">
                                <strong>Serial. No.</strong> : <?= 200000 + $ResultID ?> <br />
                                <strong>Enrol. No.</strong> : <?= $stu['RegNo'] ?> <br />


                                <strong>Examination</strong> : <?= date('F-Y', strtotime($admission['CreatedDate'])) ?>
                            </td>
                            <td style="width:17%" valign="top">
                                <img src="<?php echo base_url("upload/stupic/" . $stu['ID'] . ".jpg") ?>" style="width:80px;height:110px;padding-top:5px" />
                            </td>
                        </tr>

                    </table>
                </td>
            </tr> <!-- // Stu. Detail-->
            <tr><!--  Diploma Body -->
                <td>
                    <!-- // =================   Diploma Body ==========================-->
                    <div>
                     
                        <span style="text-align: center;display: block;">
                            For Successfully Completed Course
                        </span>
                        <span style="font-size: x-large;text-transform: uppercase;text-align: center;font-weight: bolder;display: block;padding: 10px;">
                            <?= $admission['CName'] ?>
                            <br>
                            " <?= $admission['CCode'] ?> "
                        </span>

                        <span style="text-align: center;display: block;">
                            Course Duration - <strong><?= $admission['Duration'] ?> Months</strong>
                            <br>
                            Conducted By
                        </span>
                        <span style="text-align: center;display: block;font-size: large;font-style: italic;text-transform: uppercase;padding:10px;font-weight: bolder;">
                            Nice Neat Computer Education & Software Solutions- UTTAR PRADESH
                        </span>
                        <br>
                        <span style="text-align: center;display: block;">
                            He/She cleared all the Examinations and Obtained Average <strong><?= $Percentage ?></strong> % & Marks in overall Course Examinations
                            <br> 
                            And Achived Grade - <strong> <?= $Grade ?></strong>
                            <br> 
                            Course Dutation From Date <strong> <?= date('d-m-Y', strtotime($stu['AdmissionDate'])) ?> </strong>
                            to Date <strong><?= date('d-m-Y', strtotime($EndDate)) ?></strong>
                        </span>
                        <br>
                        <span style="text-align: center;display: block;font-size: large;text-transform: uppercase;padding:10px;font-weight: bolder;">
                            in recoginition of his / her success this diploma is Awarded
                        </span>
                        <br>
                        <strong>
                            Date :
                            <strong>
                                <?= date('d-m-Y', strtotime($CreatedDate)); ?>
                            </strong>
                        </strong>

                    </div>
                    <!-- // ================= //  Diploma Body ==========================-->
                </td>
            </tr><!-- // Diploma Body -->
            <tr><!--  Sign Logo -->
                <td>
                    <!-- // =================  Sign Logo ==========================-->
                    <div>
                        
                        <img src="<?php echo base_url('img/page/sign-banner.png'); ?>" alt="" style="width: 100%;">
                        <hr style="border-bottom: solid 2px blue;">
                    </div>
                    <!-- // ================= // Sign Logo ==========================-->
                </td>
            </tr><!-- // Sign Logo -->
            <tr> <!--  Grade Legend -->
                <td>
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
                </td>
            </tr><!-- // Grade Legend -->
            <tr><!--  Abbreviations -->
                <td>
                    <!-- // =================   Abbreviations ==========================-->
                    <div>
                        
                        <strong style="font-size: 18px;margin-left:2%;">
                            Abbreviations :
                        </strong>
                        
                        <ul style="margin-left: 10%;">
                            <li> For Passing the candidate is required to Obtain 50% in each paper/subject </li>
                            <li> Student must passed in theory and Practical separately</li>
                            <li><strong>Remarks: P- Passed A- Absent S- Eligible for Supplementary G- Passed By Grace F- Fail NE- Not Eligible</strong></li>
                        </ul>
                        <hr style="border-bottom: solid 2px blue;">
                    </div>
                    <!-- // ================= //  Abbreviations ==========================-->
                </td>
            </tr><!-- // Abbreviations -->
            <tr><!--  Head Office -->
                <td>
                    <!-- // =================   Head Office ==========================-->
                    <p style="font-size: larger;font-weight: bolder;color:blue;text-align: center;">
                        Head Office : Budhanpur, Shishupar, Sadat, Ghazipur, Uttar Pradesh - 275204
                    </p>
                    <!-- // ================= //  Head Office ==========================-->
                </td>
            </tr><!-- // Head Office -->
        </table>
        </td>
        </tr>
        </table>







    </div>
</body>

</html>