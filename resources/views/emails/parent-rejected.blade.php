<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Rejected</title>
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
            border-bottom: 3px solid #EF4444;
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
        .reject-box {
            background: #FEF2F2;
            border: 1px solid #FCA5A5;
            border-radius: 10px;
            padding: 20px 24px;
            margin: 20px 0 24px 0;
            text-align: center;
        }
        .reject-box .icon {
            font-size: 48px;
            display: block;
            margin-bottom: 10px;
        }
        .reject-box .title {
            font-size: 20px;
            font-weight: 700;
            color: #991B1B;
        }
        .reject-box .sub {
            font-size: 14px;
            color: #DC2626;
        }
        .reason-box {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 16px 20px;
            margin: 16px 0;
            border-left: 4px solid #EF4444;
        }
        .reason-box .label {
            font-weight: 600;
            color: #64748b;
            font-size: 13px;
        }
        .reason-box .text {
            color: #0b1e33;
            margin-top: 4px;
            font-size: 14px;
        }
        .contact-box {
            background: #f8fafc;
            border-radius: 10px;
            padding: 16px 20px;
            margin: 16px 0;
        }
        .contact-box .label {
            font-weight: 600;
            color: #64748b;
            font-size: 13px;
        }
        .contact-box .text {
            color: #0b1e33;
            margin-top: 4px;
            font-size: 14px;
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
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">IEP<span>System</span></div>
            <div class="sub">Individual Education Plan Management System</div>
        </div>

        <div class="greeting">Hello {{ $parent->name }},</div>

        <div class="message">
            We regret to inform you that your account registration has been rejected.
        </div>

        <div class="reject-box">
            <span class="icon"></span>
            <div class="title">Registration Rejected</div>
            <div class="sub">Your account could not be approved</div>
        </div>

        @if($reason)
        <div class="reason-box">
            <div class="label">Reason for Rejection:</div>
            <div class="text">{{ $reason }}</div>
        </div>
        @endif

        <div class="contact-box">
            <div class="label">☎ Need Help?</div>
            <div class="text">
                Please contact the school administrator for more information:<br>
                <strong>Email:</strong> admin@school.edu.my<br>
                <strong>Phone:</strong> 03-1234 5678
            </div>
        </div>

        <div class="footer">
            &copy; {{ date('Y') }} IEP System. All rights reserved.<br>
            Thank you for your interest in IEP System.
        </div>
    </div>
</body>
</html>