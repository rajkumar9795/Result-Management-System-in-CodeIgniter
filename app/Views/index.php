<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Institution Login | Student Portal</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #1a2a6c;
            --secondary: #b21f1f;
            --accent: #fdbb2d;
            --glass: rgba(255, 255, 255, 0.92);
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', Roboto, sans-serif;
            background: #1a2a6c;
            /* Fallback */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        /* Background Animation Logic */
        .area {
            background: linear-gradient(to right, rgba(26, 42, 108, 0.8), rgba(178, 31, 31, 0.8)), url('<?php echo base_url('img/page/bg-book.jpg') ?>');
            background-size: cover;
            background-position: center;
            width: 100%;
            height: 100vh;
            position: absolute;
            z-index: -1;
        }

        .circles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            margin: 0;
            padding: 0;
        }

        .circles li {
            position: absolute;
            display: block;
            list-style: none;
            width: 20px;
            height: 20px;
            background: rgba(255, 255, 255, 0.15);
            color: rgba(255, 255, 255, 0.6);
            font-size: 24px;
            display: flex;
            justify-content: center;
            align-items: center;
            bottom: -150px;
            animation: animate 25s linear infinite;
        }

        /* Randomize positions for floating icons */
        .circles li:nth-child(1) {
            left: 25%;
            width: 80px;
            height: 80px;
            animation-delay: 0s;
        }

        .circles li:nth-child(2) {
            left: 10%;
            width: 40px;
            height: 40px;
            animation-delay: 2s;
            animation-duration: 12s;
        }

        .circles li:nth-child(3) {
            left: 70%;
            width: 60px;
            height: 60px;
            animation-delay: 4s;
        }

        .circles li:nth-child(4) {
            left: 40%;
            width: 50px;
            height: 50px;
            animation-delay: 0s;
            animation-duration: 18s;
        }

        .circles li:nth-child(5) {
            left: 65%;
            width: 30px;
            height: 30px;
            animation-delay: 0s;
        }

        @keyframes animate {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 1;
                border-radius: 0;
            }

            100% {
                transform: translateY(-1000px) rotate(720deg);
                opacity: 0;
                border-radius: 50%;
            }
        }

        /* Login Card Styling */
        .login-card {
            background: var(--glass);
            width: 100%;
            height: 400px;
            max-width: 320px;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            position: relative;
            z-index: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            /* Centers content vertically */
            padding: 20px 30px;
            border-top: 5px solid var(--primary);
            transition: all 0.3s ease;
        }

        .logo-circle {

            width: 70px;
            height: 70px;
            background: var(--primary);
            color: white;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 15px;
            font-size: 2rem;
            box-shadow: 0 5px 15px rgba(26, 42, 108, 0.3);
        }

        .card-header h2 {
            text-align: center;
            color: var(--primary);
            margin: 0;
            font-size: large;
        }

        .card-header p {
            text-align: center;
            color: #666;
            font-size: 0.9rem;
            margin-top: 0px;
        }

        .input-group {
            margin-top: 10px;
        }

        .input-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #444;
            font-size: 13px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary);
        }

        .input-wrapper input {
            width: 100%;
            padding: 8px 10px 8px 40px;
            border: 2px solid #eee;
            border-radius: 10px;
            box-sizing: border-box;
            transition: 0.3s;
        }

        .input-wrapper input:focus {
            border-color: var(--primary);
            outline: none;
        }

        .login-btn {
            width: 100%;
            margin-top: 13px;

            padding: 12px;
            background: linear-gradient(to right, var(--primary), #2a5298);
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: bold;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            transition: 0.3s;
        }

        .login-btn:hover {
            letter-spacing: 1px;
            box-shadow: 0 5px 15px rgba(26, 42, 108, 0.4);
        }

        .card-footer {
            text-align: center;
            margin-top: 15px;
            border-top: 1px solid #ddd;
            padding-top: 15px;
        }

        .card-footer p {
            font-size: 0.8rem;
            color: #777;
        }

        .card-footer a {
            color: var(--secondary);
            text-decoration: none;
            font-weight: bold;
            font-size: 0.85rem;
        }
    </style>
</head>

<body>
    <div class="area">
        <ul class="circles">
            <li><i class="fas fa-book"></i></li>
            <li><i class="fas fa-graduation-cap"></i></li>
            <li><i class="fas fa-pencil-alt"></i></li>
            <li><i class="fas fa-microscope"></i></li>
            <li><i class="fas fa-apple-alt"></i></li>
            <li><i class="fas fa-book-open"></i></li>
            <li><i class="fas fa-university"></i></li>
            <li><i class="fas fa-user-graduate"></i></li>
            <li><i class="fas fa-calculator"></i></li>
            <li><i class="fas fa-brain"></i></li>
        </ul>
    </div>

    <div class="login-card">
        <div class="card-header">
            <img src="<?php echo base_url('img/page/logo.png') ?>" style="width: 80px;display: block;margin:auto">
            <h2>Student Login  </h2>
            <p>Enter your details to access the portal</p>
        </div>

        <form action="<?= site_url('getmarksheet') ?>"  method="post">
            <?= csrf_field() ?>
            <div class="input-group">
                <label>Registration No.</label>
                <div class="input-wrapper">
                    <i class="fas fa-id-card"></i>
                    <input type="text" name="RegNo" value="202602006" placeholder="e.g. 2026-REG-001" required="">
                </div>
            </div>

            <div class="input-group">
                <label>Date of Birth </label>
                <div class="input-wrapper">
                    <i class="fas fa-calendar-alt"></i>
                    <input type="date" name="DOB" required="">
                </div>
            </div>
           
                <button type="submit" class="login-btn">
                    <span>Search Result</span>
                    <i class="fas fa-sign-in-alt"></i>
                </button>
            

        </form>

        <div class="card-footer">

            <a href="<?= site_url('jskjhdUjsa65') ?>" rel="nofollow">
                Admin Login
            </a>
        </div>

    </div>
    <a href="https://girfa.co.in/" target="_blank" style="position: absolute;bottom: 10px;color:white">
        Power By Girfa IT Services
    </a>
</body>

</html>