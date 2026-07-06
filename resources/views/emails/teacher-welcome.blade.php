<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to IEP System</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
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
            border-bottom: 3px solid #1a3a5c;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .header .logo {
            font-size: 28px;
            font-weight: 700;
            color: #1a3a5c;
            letter-spacing: 1px;
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
        .credentials .row .value .password {
            font-weight: 700;
            color: #1a3a5c;
            font-size: 16px;
            letter-spacing: 1px;
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
        .note {
            font-size: 13px;
            color: #94a3b8;
            margin-top: 16px;
            padding: 12px 16px;
            background: #fef9e7;
            border-radius: 6px;
            border-left: 4px solid #f59e0b;
        }
        .note strong {
            color: #856404;
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

        <div class="greeting">Hello {{ $teacher->name }},</div>

        <div class="message">
            Welcome to the IEP System! Your teacher account has been created successfully.
            Please find your login credentials below. For security purposes, we recommend
            changing your password after your first login.
        </div>

        <div class="credentials">
            <div class="row">
                <span class="label">Email</span>
                <span class="value">{{ $teacher->email }}</span>
            </div>
            <div class="row">
                <span class="label">Temporary Password</span>
                <span class="value">
                    <span class="password">{{ $tempPassword }}</span>
                </span>
            </div>
        </div>

        <div style="text-align: center;">
            <a href="{{ $loginUrl }}" class="btn">Login to Your Account</a>
        </div>

        <div class="note">
            <strong>Important:</strong> This is your temporary password. Please change it
            immediately after logging in for security purposes.
        </div>

        <div class="footer">
            &copy; {{ date('Y') }} IEP System. All rights reserved.<br>
            If you have any questions, please contact the system administrator.
        </div>
    </div>
</body>
</html>