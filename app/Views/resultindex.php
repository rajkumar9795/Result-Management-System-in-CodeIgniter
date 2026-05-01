<html>

<head>

    <title>
        Markesheet
    </title>

    <link href="<?php echo base_url('AppCss/gcss.css') ?>" rel="stylesheet">
</head>

<body style="">
    <h3>
        <?= $resultstatus ?>
    </h3>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var el = document.getElementById('<?= $resultstatus ?>');
            if (el) {
                el.style.display = 'block';
            }
        });
    </script>
    <div style="max-width:500px;margin:40px auto;font-family:Arial,sans-serif;">

        <!-- RESULT AVAILABLE -->
        <div id="rfound" style="display:none;background:#e6f7ee;padding:25px;border-radius:12px;box-shadow:0 5px 20px rgba(0,0,0,0.08);text-align:center;margin-bottom:20px;">
            <div style="font-size:55px;margin-bottom:10px;">✅</div>
            <h2 style="color:#28a745;margin-bottom:10px;">Result Available</h2>
            <p style="color:#555;margin-bottom:20px;">Your result has been published. Click below to view.</p>
            <?php 
            if(isset($stu))
                {
            ?>
            <a href="<?= site_url('studentresult/'.$stu['ID']) ?>" style="display:inline-block;padding:10px 20px;background:#28a745;color:#fff;border-radius:6px;text-decoration:none;">
                View Result
            </a>
            <?php 
                }
            ?>
        </div>

        <!-- RESULT NOT FOUND -->
        <div id="rnotfound" style="display:none;background:#fff3cd;padding:25px;border-radius:12px;box-shadow:0 5px 20px rgba(0,0,0,0.08);text-align:center;margin-bottom:20px;">
            <div style="font-size:55px;margin-bottom:10px;">❌</div>
            <h2 style="color:#856404;margin-bottom:10px;">Result Not Found</h2>
            <p style="color:#555;">We could not find your result. Please check your details and try again.</p>
        </div>

        <!-- Invalid Student Record -->
        <div id="rinvalidstu" style="display:none;background:#fff3cd;padding:25px;border-radius:12px;box-shadow:0 5px 20px rgba(0,0,0,0.08);text-align:center;margin-bottom:20px;">
            <div style="font-size:55px;margin-bottom:10px;">❌</div>
            <h2 style="color:#856404;margin-bottom:10px;">Invalid Student</h2>
            <p style="color:#555;">We could not find your result. Please check your details and try again.</p>
        </div>
        <!-- FEE PENDING -->
        <div id="rfee" style="display:none;background:#fdecea;padding:25px;border-radius:12px;box-shadow:0 5px 20px rgba(0,0,0,0.08);text-align:center;margin-bottom:20px;">
            <div style="font-size:55px;margin-bottom:10px;">💰</div>
            <h2 style="color:#dc3545;margin-bottom:10px;">Fee Pending</h2>
            <p style="color:#555;">Please clear your dues to access your result.</p>
        </div>

        <!-- NOT ELIGIBLE -->
        <div id="rnoteligible" style="display:none;background:#fff4e5;padding:25px;border-radius:12px;box-shadow:0 5px 20px rgba(0,0,0,0.08);text-align:center;margin-bottom:20px;">
            <div style="font-size:55px;margin-bottom:10px;">🚫</div>
            <h2 style="color:#ff9800;margin-bottom:10px;">Not Eligible</h2>
            <p style="color:#555;">You are not eligible to view the result.</p>
        </div>

        <!-- RESULT ON HOLD -->
        <div style="display:none;background:#e7f1ff;padding:25px;border-radius:12px;box-shadow:0 5px 20px rgba(0,0,0,0.08);text-align:center;margin-bottom:20px;">
            <div style="font-size:55px;margin-bottom:10px;">⏳</div>
            <h2 style="color:#007bff;margin-bottom:10px;">Result On Hold</h2>
            <p style="color:#555;">Your result is currently on hold. Please contact administration.</p>
        </div>

    </div>

</body>

</html>