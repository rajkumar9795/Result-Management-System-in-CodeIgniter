<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal | Secure Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            /* High-quality admin-themed background */
            background: linear-gradient(rgba(15, 23, 42, 0.8), rgba(15, 23, 42, 0.9)), url('<?php echo base_url('img/page/bg-admin.jpg') ?>');
            background-size: cover;
            background-position: center;
            height: 100vh;
        }

        .admin-card {
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.95);
        }
    </style>
</head>
<body class="flex items-center justify-center font-sans">

    <div class="admin-card w-full max-w-md p-8 rounded-xl shadow-2xl border-t-4 border-indigo-600">
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-indigo-100 rounded-full mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="Vector D-path for Shield or Lock" />
                    <path d="M12 11c0 1.105-1.12 2-2.5 2S7 12.105 7 11s1.12-2 2.5-2 2.5.895 2.5 2z" />
                    <path d="M12 7c0-1.105 1.12-2 2.5-2S17 5.895 17 7s-1.12 2-2.5 2-2.5-.895-2.5-2z" />
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-gray-800">Admin Login</h1>
            
        </div>

        <form action="<?= site_url('login') ?>" method="POST">
             <?= csrf_field() ?>
            <div class="mb-5">
                <label class="block text-xs font-semibold uppercase text-gray-400 mb-1">Username</label>
                <input type="text" name="Username" required
                       class="w-full px-4 py-3 rounded-lg bg-gray-100 border-transparent focus:border-indigo-500 focus:bg-white focus:ring-0 text-sm transition-all"
                       placeholder="Enter your admin username">
            </div>

            <div class="mb-6">
                <label class="block text-xs font-semibold uppercase text-gray-400 mb-1"> Password</label>
                <input type="password" name="Pass" required
                       class="w-full px-4 py-3 rounded-lg bg-gray-100 border-transparent focus:border-indigo-500 focus:bg-white focus:ring-0 text-sm transition-all"
                       placeholder="••••••••">
            </div>
            <input type="submit" value="Log In to System"  class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-4 rounded-lg shadow-lg hover:shadow-indigo-500/30 transition-all duration-300">
             <?php if (session()->getFlashdata('error')): ?>
                    <p style="color:red;text-align: center;"><?= session()->getFlashdata('error') ?> </p>
                <?php endif; ?>
          
        </form>

        <div class="mt-8 text-center">
            <a href="tel:9795620855" class="text-xs text-indigo-600 hover:underline"> Contact IT Support</a>
            |
            <a href="<?= site_url('/') ?>" class="text-xs text-indigo-600 hover:underline">Result</a>
        </div>
    </div>

</body>
</html>