<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Approved</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f6f6f6;
            margin: 0;
            padding: 40px 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.06);
            border: 1px solid #e5e7eb;
        }
        .header {
            text-align: center;
            border-bottom: 3px solid #22C55E;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .header .logo {
            font-size: 28px;
            font-weight: 700;
            color: #1a3a5c;
        }
        .header .logo span {
            color: #4F7CFF;
        }
        .header .sub {
            font-size: 14px;
            color: #94a3b8;
            margin-top: 4px;
        }
        .greeting {
            font-size: 22px;
            font-weight: 700;
            color: #0b1e33;
            margin-bottom: 6px;
        }
        .message {
            font-size: 15px;
            color: #475569;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        .success-box {
            background: #ECFDF5;
            border: 1px solid #86EFAC;
            border-radius: 10px;
            padding: 20px 24px;
            margin: 20px 0 24px 0;
            text-align: center;
        }
        .success-box .icon {
            font-size: 48px;
            display: block;
            margin-bottom: 10px;
        }
        .success-box .title {
            font-size: 20px;
            font-weight: 700;
            color: #166534;
        }
        .success-box .sub {
            font-size: 14px;
            color: #15803D;
        }
        .credentials {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 20px 24px;
            margin: 20px 0 24px 0;
        }
        .credentials .row {
            display: flex;
            padding: 6px 0;
            font-size: 14px;
        }
        .credentials .row .label {
            font-weight: 600;
            color: #64748b;
            width: 120px;
            flex-shrink: 0;
        }
        .credentials .row .value {
            color: #0b1e33;
            font-weight: 500;
        }
        .btn {
            display: inline-block;
            padding: 12px 32px;
            background: #1a3a5c;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            margin: 8px 0 4px 0;
        }
        .btn:hover {
            background: #0f2a44;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
            font-size: 13px;
            color: #94a3b8;
            text-align: center;
        }
        .footer strong {
            color: #0b1e33;
        }
        @media (max-width: 480px) {
            .container {
                padding: 20px;
            }
            .credentials .row {
                flex-direction: column;
                gap: 2px;
            }
            .credentials .row .label {
                width: 100%;
            }
            .btn {
                display: block;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">IEP<span>System</span></div>
            <div class="sub">Individual Education Plan Management System</div>
        </div>

        <div class="greeting">Hello <?php echo e($parent->name); ?>,</div>

        <div class="message">
            We are pleased to inform you that your account registration has been approved!
        </div>

        <div class="success-box">
            <span class="icon"></span>
            <div class="title">Account Approved!</div>
            <div class="sub">You can now access your child's IEP information</div>
        </div>

        <div class="credentials">
            <div class="row">
                <span class="label">Email</span>
                <span class="value"><?php echo e($parent->email); ?></span>
            </div>
            <div class="row">
                <span class="label">Password</span>
                <span class="value">[Your registered password]</span>
            </div>
        </div>

        <div style="text-align: center;">
            <a href="<?php echo e($loginUrl); ?>" class="btn">Login to Your Account</a>
        </div>

        <div class="footer">
            &copy; <?php echo e(date('Y')); ?> IEP System. All rights reserved.<br>
            If you have any questions, please contact the school administrator.
        </div>
    </div>
</body>
</html><?php /**PATH C:\Users\fatin\iep-system\resources\views/emails/parent-approved.blade.php ENDPATH**/ ?>