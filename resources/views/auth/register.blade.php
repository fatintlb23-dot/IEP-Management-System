<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - IEP Management System</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        html, body {
            height: 100%;
            overflow-y: auto;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            background: #e8f0fe;
            padding: 30px 20px;
            position: relative;
            overflow-x: hidden;
            padding-top: 40px;
            padding-bottom: 40px;
        }

        /* ========== OUTER DECORATIVE SHAPES ========== */
        .outer-blob-1 {
            position: fixed;
            top: -80px;
            left: -80px;
            width: 300px;
            height: 300px;
            background: rgba(44, 90, 160, 0.06);
            border-radius: 50%;
            pointer-events: none;
            z-index: 0;
            animation: floatBlob 20s ease-in-out infinite;
        }

        .outer-blob-2 {
            position: fixed;
            bottom: -100px;
            right: -100px;
            width: 400px;
            height: 400px;
            background: rgba(44, 90, 160, 0.05);
            border-radius: 50%;
            pointer-events: none;
            z-index: 0;
            animation: floatBlob 25s ease-in-out infinite reverse;
        }

        .outer-circle-1 {
            position: fixed;
            top: 60px;
            right: 60px;
            width: 120px;
            height: 120px;
            background: rgba(44, 90, 160, 0.04);
            border-radius: 50%;
            pointer-events: none;
            z-index: 0;
            animation: floatBlob 15s ease-in-out infinite;
        }

        .outer-circle-2 {
            position: fixed;
            bottom: 80px;
            left: 60px;
            width: 80px;
            height: 80px;
            background: rgba(44, 90, 160, 0.05);
            border-radius: 50%;
            pointer-events: none;
            z-index: 0;
            animation: floatBlob 18s ease-in-out infinite reverse;
        }

        .outer-sparkle-1 {
            position: fixed;
            top: 30%;
            left: 30px;
            width: 6px;
            height: 6px;
            background: rgba(44, 90, 160, 0.10);
            border-radius: 50%;
            pointer-events: none;
            z-index: 0;
            animation: sparkle 3s ease-in-out infinite;
        }

        .outer-sparkle-2 {
            position: fixed;
            bottom: 40%;
            right: 40px;
            width: 8px;
            height: 8px;
            background: rgba(44, 90, 160, 0.08);
            border-radius: 50%;
            pointer-events: none;
            z-index: 0;
            animation: sparkle 4s ease-in-out infinite 1s;
        }

        .outer-sparkle-3 {
            position: fixed;
            top: 15%;
            right: 20%;
            width: 4px;
            height: 4px;
            background: rgba(44, 90, 160, 0.12);
            border-radius: 50%;
            pointer-events: none;
            z-index: 0;
            animation: sparkle 3.5s ease-in-out infinite 0.5s;
        }

        .outer-sparkle-4 {
            position: fixed;
            bottom: 25%;
            left: 15%;
            width: 5px;
            height: 5px;
            background: rgba(44, 90, 160, 0.09);
            border-radius: 50%;
            pointer-events: none;
            z-index: 0;
            animation: sparkle 4.5s ease-in-out infinite 2s;
        }

        .outer-ring {
            position: fixed;
            top: 15%;
            left: 10%;
            width: 200px;
            height: 200px;
            border: 2px solid rgba(44, 90, 160, 0.04);
            border-radius: 50%;
            pointer-events: none;
            z-index: 0;
            animation: floatRing 30s linear infinite;
        }

        /* ========== ANIMATIONS ========== */
        @keyframes floatBlob {
            0%, 100% {
                transform: translate(0, 0) scale(1);
            }
            25% {
                transform: translate(30px, -20px) scale(1.05);
            }
            50% {
                transform: translate(-20px, 30px) scale(0.95);
            }
            75% {
                transform: translate(20px, 20px) scale(1.02);
            }
        }

        @keyframes sparkle {
            0%, 100% {
                opacity: 0.3;
                transform: scale(0.8);
            }
            50% {
                opacity: 1;
                transform: scale(1.2);
            }
        }

        @keyframes floatRing {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        /* ========== MAIN REGISTER CARD ========== */
        .register-container {
            display: flex;
            width: 85%;
            max-width: 1200px;
            min-height: 650px;
            background: white;
            border-radius: 28px;
            box-shadow: 0 25px 80px rgba(0, 0, 0, 0.12), 0 10px 30px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            position: relative;
            z-index: 1;
            margin: 0 auto;
        }

        /* ========== LEFT PANEL - Form (LARGER) ========== */
        .register-left {
            flex: 1;
            padding: 50px 55px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            background: white;
            overflow-y: auto;
            max-height: 850px;
        }

        .register-left .form-header {
            margin-bottom: 25px;
        }

        .register-left .form-header .page-indicator {
            display: inline-block;
            background: #e8f0fe;
            color: #2c5aa0;
            font-size: 13px;
            font-weight: 600;
            padding: 5px 18px;
            border-radius: 20px;
            margin-bottom: 12px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .register-left .form-header h2 {
            font-size: 32px;
            color: #1a3a5c;
            font-weight: 700;
        }

        .register-left .form-header h2 span {
            color: #2c5aa0;
        }

        .register-left .form-header p {
            color: #8895aa;
            font-size: 15px;
            margin-top: 5px;
            line-height: 1.6;
        }

        .register-left .form-header p strong {
            color: #2c5aa0;
        }

        .form-group {
            margin-bottom: 16px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            font-size: 14px;
            color: #445566;
        }

        .form-group label .required {
            color: #dc3545;
            margin-left: 2px;
        }

        .form-group .password-wrapper {
            position: relative;
            width: 100%;
        }

        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 13px 18px;
            border: 2px solid #e8edf3;
            border-radius: 12px;
            font-size: 15px;
            transition: all 0.25s ease;
            background: #f7f9fc;
            color: #1a2a3a;
            font-weight: 400;
        }

        .form-group input:focus, .form-group select:focus, .form-group textarea:focus {
            outline: none;
            border-color: #2c5aa0;
            background: white;
            box-shadow: 0 0 0 5px rgba(44, 90, 160, 0.08);
        }

        .form-group input::placeholder, .form-group textarea::placeholder {
            color: #b0bccd;
            font-weight: 400;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 70px;
            font-family: inherit;
        }

        .form-group .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 20px;
            color: #8895aa;
            background: none;
            border: none;
            padding: 5px;
            transition: color 0.2s;
        }

        .form-group .toggle-password:hover {
            color: #2c5aa0;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .form-options {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin: 18px 0 22px 0;
            font-size: 14px;
        }

        .form-options input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: #2c5aa0;
            cursor: pointer;
            margin-top: 2px;
            flex-shrink: 0;
        }

        .form-options label {
            color: #556677;
            cursor: pointer;
            line-height: 1.5;
        }

        .form-options a {
            color: #2c5aa0;
            text-decoration: none;
            font-weight: 600;
        }

        .form-options a:hover {
            text-decoration: underline;
        }

        .btn-register {
            width: 100%;
            padding: 16px;
            background: #2c5aa0;
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 17px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            letter-spacing: 0.5px;
        }

        .btn-register:hover {
            background: #1e4080;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(44, 90, 160, 0.30);
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            font-size: 15px;
            color: #8895aa;
        }

        .login-link a {
            color: #2c5aa0;
            text-decoration: none;
            font-weight: 600;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .privacy-note {
            text-align: center;
            margin-top: 16px;
            font-size: 13px;
            color: #a0aabb;
        }

        .privacy-note span {
            font-size: 16px;
        }

        /* ========== RIGHT PANEL - Illustration (SMALLER) ========== */
        .register-right {
            flex: 0 0 38%;
            background: linear-gradient(145deg, #EDF5FF, #DCEAFE);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px 30px;
            text-align: center;
            color: #1a3a5c;
            position: relative;
            overflow: hidden;
            min-height: 650px;
        }

        /* ===== INNER DECORATIVE SHAPES ===== */
        .deco-blob-1 {
            position: absolute;
            top: -80px;
            left: -80px;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 50%;
            pointer-events: none;
            animation: floatBlob 18s ease-in-out infinite;
        }

        .deco-blob-2 {
            position: absolute;
            bottom: -60px;
            right: -60px;
            width: 250px;
            height: 250px;
            background: rgba(255, 255, 255, 0.07);
            border-radius: 50%;
            pointer-events: none;
            animation: floatBlob 22s ease-in-out infinite reverse;
        }

        .deco-circle-1 {
            position: absolute;
            top: 20px;
            right: 30px;
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.06);
            border-radius: 50%;
            pointer-events: none;
        }

        .deco-circle-2 {
            position: absolute;
            top: 50%;
            left: 15px;
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.06);
            border-radius: 50%;
            pointer-events: none;
            transform: translateY(-50%);
        }

        .deco-circle-3 {
            position: absolute;
            bottom: 40px;
            left: 60px;
            width: 120px;
            height: 120px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            pointer-events: none;
        }

        .deco-arc {
            position: absolute;
            top: -100px;
            right: -150px;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            border: 80px solid rgba(255, 255, 255, 0.05);
            pointer-events: none;
        }

        .deco-dots {
            position: absolute;
            top: 30px;
            right: 80px;
            display: grid;
            grid-template-columns: repeat(5, 12px);
            gap: 10px;
            pointer-events: none;
            opacity: 0.15;
        }

        .deco-dots span {
            width: 4px;
            height: 4px;
            background: white;
            border-radius: 50%;
        }

        .sparkle {
            position: absolute;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 50%;
            pointer-events: none;
            animation: sparkle 3s ease-in-out infinite;
        }

        .sparkle-1 {
            width: 5px;
            height: 5px;
            top: 15%;
            left: 25%;
        }

        .sparkle-2 {
            width: 3px;
            height: 3px;
            top: 30%;
            right: 20%;
            animation-delay: 0.5s;
        }

        .sparkle-3 {
            width: 4px;
            height: 4px;
            bottom: 25%;
            left: 35%;
            animation-delay: 1s;
        }

        .sparkle-4 {
            width: 6px;
            height: 6px;
            bottom: 15%;
            right: 30%;
            animation-delay: 1.5s;
        }

        .sparkle-5 {
            width: 4px;
            height: 4px;
            top: 45%;
            left: 10%;
            animation-delay: 2s;
        }

        /* ========== ILLUSTRATION ========== */
        .register-right .illustration-wrapper {
            width: 100%;
            max-width: 350px;
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .register-right .illustration-wrapper img {
            width: 100%;
            height: auto;
            max-height: 300px;
            object-fit: contain;
            position: relative;
            z-index: 2;
        }

        .register-right .welcome-text {
            font-size: 14px;
            opacity: 0.9;
            line-height: 1.6;
            max-width: 320px;
            position: relative;
            z-index: 2;
            color: #1a3a5c;
        }

        .register-right .welcome-text strong {
            font-size: 17px;
            display: block;
            margin-bottom: 3px;
            color: #1a3a5c;
        }

        .alert {
            padding: 14px 18px;
            border-radius: 12px;
            margin-bottom: 18px;
            font-size: 14px;
        }

        .alert-error {
            background: #fde8e8;
            color: #c62828;
            border-left: 4px solid #c62828;
        }

        .alert-success {
            background: #e8f5e9;
            color: #2e7d32;
            border-left: 4px solid #2e7d32;
        }

        .error-list {
            background: #fde8e8;
            color: #c62828;
            padding: 14px 18px;
            border-radius: 12px;
            margin-bottom: 18px;
            border-left: 4px solid #c62828;
            font-size: 14px;
        }

        .error-list p {
            margin: 3px 0;
        }

        /* ========== TERMS MODAL ========== */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .modal-overlay.active {
            display: flex;
        }

        .modal-content {
            background: white;
            border-radius: 20px;
            max-width: 600px;
            width: 100%;
            max-height: 80vh;
            overflow-y: auto;
            padding: 35px 40px;
            position: relative;
            box-shadow: 0 25px 80px rgba(0, 0, 0, 0.3);
            animation: modalIn 0.3s ease;
        }

        @keyframes modalIn {
            from {
                opacity: 0;
                transform: scale(0.95) translateY(20px);
            }
            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        .modal-content .modal-close {
            position: absolute;
            top: 15px;
            right: 20px;
            font-size: 28px;
            color: #8895aa;
            cursor: pointer;
            background: none;
            border: none;
            transition: color 0.2s;
        }

        .modal-content .modal-close:hover {
            color: #1a3a5c;
        }

        .modal-content h2 {
            color: #1a3a5c;
            font-size: 24px;
            margin-bottom: 15px;
            padding-right: 30px;
        }

        .modal-content h2 span {
            color: #2c5aa0;
        }

        .modal-content .terms-text {
            color: #445566;
            font-size: 14px;
            line-height: 1.8;
        }

        .modal-content .terms-text h3 {
            color: #1a3a5c;
            font-size: 16px;
            margin-top: 20px;
            margin-bottom: 8px;
        }

        .modal-content .terms-text ul {
            padding-left: 20px;
            margin-bottom: 10px;
        }

        .modal-content .terms-text ul li {
            margin-bottom: 5px;
        }

        .modal-content .btn-accept {
            width: 100%;
            padding: 12px;
            background: #2c5aa0;
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 20px;
            transition: all 0.3s ease;
        }

        .modal-content .btn-accept:hover {
            background: #1e4080;
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 1024px) {
            .register-container {
                width: 92%;
                border-radius: 24px;
            }

            .register-left {
                padding: 40px 35px;
                max-height: 750px;
            }

            .register-left .form-header h2 {
                font-size: 28px;
            }

            .register-right {
                flex: 0 0 35%;
                padding: 35px 25px;
                min-height: 550px;
            }

            .register-right .illustration-wrapper {
                max-width: 280px;
            }

            .register-right .illustration-wrapper img {
                max-height: 250px;
            }

            .register-right .welcome-text {
                font-size: 13px;
                max-width: 280px;
            }

            .outer-ring {
                display: none;
            }
        }

        @media (max-width: 820px) {
            body {
                padding: 15px 10px;
                padding-top: 20px;
                padding-bottom: 20px;
            }

            .register-container {
                flex-direction: column-reverse;
                width: 100%;
                border-radius: 20px;
            }

            .register-left {
                flex: none;
                width: 100%;
                padding: 30px 25px;
                max-height: none;
                overflow-y: visible;
            }

            .register-left .form-header {
                margin-bottom: 20px;
            }

            .register-left .form-header h2 {
                font-size: 24px;
            }

            .register-left .form-header p {
                font-size: 13px;
            }

            .register-right {
                flex: none;
                height: 280px;
                width: 100%;
                padding: 25px 20px;
                border-radius: 0 0 20px 20px;
                min-height: 250px;
            }

            .register-right .illustration-wrapper {
                max-width: 200px;
            }

            .register-right .illustration-wrapper img {
                max-height: 150px;
            }

            .register-right .welcome-text {
                font-size: 12px;
                max-width: 280px;
            }

            .register-right .welcome-text strong {
                font-size: 14px;
            }

            .form-group {
                margin-bottom: 14px;
            }

            .form-group label {
                font-size: 13px;
            }

            .form-group input, .form-group select, .form-group textarea {
                padding: 11px 15px;
                font-size: 14px;
            }

            .form-group textarea {
                min-height: 60px;
            }

            .form-row {
                grid-template-columns: 1fr 1fr;
                gap: 12px;
            }

            .btn-register {
                padding: 14px;
                font-size: 15px;
            }

            .form-options {
                font-size: 13px;
                margin: 16px 0 20px 0;
            }

            .login-link {
                font-size: 14px;
            }

            .outer-blob-1, .outer-blob-2, .outer-circle-1, .outer-circle-2,
            .outer-sparkle-1, .outer-sparkle-2, .outer-sparkle-3, .outer-sparkle-4,
            .outer-ring {
                display: none;
            }

            .deco-blob-1, .deco-blob-2, .deco-arc, .deco-dots {
                display: none;
            }

            .deco-circle-1, .deco-circle-2, .deco-circle-3 {
                display: none;
            }

            .sparkle-1, .sparkle-2, .sparkle-3, .sparkle-4, .sparkle-5 {
                display: none;
            }
        }

        @media (max-width: 600px) {
            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 10px 8px;
                padding-top: 15px;
                padding-bottom: 15px;
            }

            .register-container {
                border-radius: 16px;
            }

            .register-left {
                padding: 20px 16px;
            }

            .register-left .form-header .page-indicator {
                font-size: 11px;
                padding: 4px 14px;
            }

            .register-left .form-header h2 {
                font-size: 22px;
            }

            .register-left .form-header p {
                font-size: 12px;
            }

            .register-right {
                height: 200px;
                padding: 15px;
                border-radius: 0 0 16px 16px;
                min-height: 180px;
            }

            .register-right .illustration-wrapper {
                max-width: 140px;
            }

            .register-right .illustration-wrapper img {
                max-height: 100px;
            }

            .register-right .welcome-text {
                display: none;
            }

            .form-group {
                margin-bottom: 12px;
            }

            .form-group label {
                font-size: 12px;
            }

            .form-group input, .form-group select, .form-group textarea {
                padding: 10px 14px;
                font-size: 13px;
            }

            .form-group textarea {
                min-height: 50px;
            }

            .form-options {
                font-size: 12px;
                margin: 12px 0 16px 0;
            }

            .btn-register {
                padding: 12px;
                font-size: 14px;
            }

            .login-link {
                font-size: 13px;
                margin-top: 16px;
            }

            .privacy-note {
                font-size: 11px;
                margin-top: 12px;
            }
        }
    </style>
</head>
<body>
    <!-- ===== OUTER DECORATIVE SHAPES ===== -->
    <div class="outer-blob-1"></div>
    <div class="outer-blob-2"></div>
    <div class="outer-circle-1"></div>
    <div class="outer-circle-2"></div>
    <div class="outer-sparkle-1"></div>
    <div class="outer-sparkle-2"></div>
    <div class="outer-sparkle-3"></div>
    <div class="outer-sparkle-4"></div>
    <div class="outer-ring"></div>

    <!-- ===== TERMS & CONDITIONS MODAL ===== -->
    <div class="modal-overlay" id="termsModal">
        <div class="modal-content">
            <button class="modal-close" onclick="closeTerms()">✕</button>
            <h2>📋 Terms & <span>Conditions</span></h2>
            
            <div class="terms-text">
                <p><strong>Last Updated:</strong> June 2026</p>

                <h3>1. Acceptance of Terms</h3>
                <p>By registering as a parent on the IEP Management System, you agree to comply with and be bound by these terms and conditions. If you do not agree with any part of these terms, please do not use our services.</p>

                <h3>2. Parent Account Registration</h3>
                <ul>
                    <li>You must provide accurate and complete information during registration.</li>
                    <li>You are responsible for maintaining the confidentiality of your account credentials.</li>
                    <li>You agree to notify us immediately of any unauthorized use of your account.</li>
                    <li>Parent accounts require admin approval before activation.</li>
                </ul>

                <h3>3. Privacy & Data Protection</h3>
                <ul>
                    <li>Your personal information and your child's data are protected under applicable privacy laws.</li>
                    <li>We collect and store information necessary for educational planning and progress tracking.</li>
                    <li>Your data will only be shared with authorized teachers and administrators directly involved in your child's education.</li>
                    <li>You have the right to request access to, correction of, or deletion of your data.</li>
                </ul>

                <h3>4. User Responsibilities</h3>
                <ul>
                    <li>You agree to use the system only for legitimate educational purposes.</li>
                    <li>You will not share your account access with unauthorized individuals.</li>
                    <li>You are responsible for all activities that occur under your account.</li>
                    <li>You will not misuse or attempt to disrupt the system's functionality.</li>
                </ul>

                <h3>5. Child's Data & Progress</h3>
                <ul>
                    <li>You will have access to your child's IEP goals, progress reports, and educational plans.</li>
                    <li>Information provided by teachers and administrators is for educational purposes only.</li>
                    <li>You agree to use this information constructively to support your child's development.</li>
                </ul>

                <h3>6. Termination</h3>
                <ul>
                    <li>We reserve the right to suspend or terminate accounts that violate these terms.</li>
                    <li>You may request account deactivation by contacting the centre administration.</li>
                    <li>Upon termination, your access to the system will be revoked.</li>
                </ul>

                <h3>7. Modifications</h3>
                <p>We reserve the right to update these terms at any time. Continued use of the system constitutes acceptance of the updated terms.</p>

                <h3>8. Contact Us</h3>
                <p>For questions regarding these terms, please contact your centre administration.</p>
            </div>

            <button class="btn-accept" onclick="acceptTerms()">I Understand & Accept</button>
        </div>
    </div>

    <!-- ===== MAIN REGISTER CARD ===== -->
    <div class="register-container">
        <!-- LEFT PANEL - Form (LARGER) -->
        <div class="register-left">
            <div class="form-header">
                <span class="page-indicator">👨‍👩‍👧 Parent Registration</span>
                <h2>Create <span>Account</span></h2>
                <p>Please fill in all required fields to create your account.</p>
            </div>

            @if(session('error'))
                <div class="alert alert-error">⚠️ {{ session('error') }}</div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">✅ {{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="error-list">
                    @foreach($errors->all() as $error)
                        <p>• {{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('parent.register') }}">
                @csrf

                <div class="form-row">
                    <div class="form-group">
                        <label>Full Name <span class="required">*</span></label>
                        <input type="text" name="name" placeholder="Enter your full name" value="{{ old('name') }}" required>
                    </div>

                    <div class="form-group">
                        <label>IC Number <span class="required">*</span></label>
                        <input type="text" name="ic_number" placeholder="Enter your IC number" value="{{ old('ic_number') }}" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Email <span class="required">*</span></label>
                        <input type="email" name="email" placeholder="Enter your email address" value="{{ old('email') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Phone Number <span class="required">*</span></label>
                        <input type="text" name="phone" placeholder="Enter your phone number" value="{{ old('phone') }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Home Address <span class="required">*</span></label>
                    <textarea name="address" placeholder="Enter your full home address" rows="2" required>{{ old('address') }}</textarea>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Relationship <span class="required">*</span></label>
                        <select name="relationship" required>
                            <option value="">Select relationship</option>
                            <option value="Mother" {{ old('relationship') == 'Mother' ? 'selected' : '' }}>Mother</option>
                            <option value="Father" {{ old('relationship') == 'Father' ? 'selected' : '' }}>Father</option>
                            <option value="Guardian" {{ old('relationship') == 'Guardian' ? 'selected' : '' }}>Guardian</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Child's IC Number <span class="required">*</span></label>
                        <input type="text" name="child_ic" placeholder="Enter your child's IC number" value="{{ old('child_ic') }}" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Password <span class="required">*</span></label>
                        <div class="password-wrapper">
                            <input type="password" name="password" id="password" placeholder="Enter your password" required>
                            <button type="button" class="toggle-password" onclick="togglePassword('password', 'toggleBtn1')" id="toggleBtn1">👁️</button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Confirm Password <span class="required">*</span></label>
                        <div class="password-wrapper">
                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm your password" required>
                            <button type="button" class="toggle-password" onclick="togglePassword('password_confirmation', 'toggleBtn2')" id="toggleBtn2">👁️</button>
                        </div>
                    </div>
                </div>

                <div class="form-options">
                    <input type="checkbox" id="termsCheckbox" required>
                    <label for="termsCheckbox">I confirm all information is correct and agree to the <a href="#" onclick="openTerms(event)">Terms & Conditions</a></label>
                </div>

                <button type="submit" class="btn-register">Register Now</button>
            </form>

            <div class="login-link">
                Already have an account? <a href="{{ route('login') }}">Login here</a>
            </div>

            <div class="privacy-note">
                <span></span> We respect your privacy and protect your personal information.
            </div>
        </div>

        <!-- RIGHT PANEL - Illustration (SMALLER) -->
        <div class="register-right">
            <!-- Inner decorative shapes -->
            <div class="deco-blob-1"></div>
            <div class="deco-blob-2"></div>
            <div class="deco-circle-1"></div>
            <div class="deco-circle-2"></div>
            <div class="deco-circle-3"></div>
            <div class="deco-arc"></div>

            <div class="deco-dots">
                <span></span><span></span><span></span><span></span><span></span>
                <span></span><span></span><span></span><span></span><span></span>
                <span></span><span></span><span></span><span></span><span></span>
                <span></span><span></span><span></span><span></span><span></span>
                <span></span><span></span><span></span><span></span><span></span>
            </div>

            <div class="sparkle sparkle-1"></div>
            <div class="sparkle sparkle-2"></div>
            <div class="sparkle sparkle-3"></div>
            <div class="sparkle sparkle-4"></div>
            <div class="sparkle sparkle-5"></div>

            <!-- Illustration -->
            <div class="illustration-wrapper">
                <img src="{{ asset('images/register_picture.png') }}" alt="Register Illustration">
            </div>

            <div class="welcome-text">
                <strong>Welcome!</strong>
                Create your parent account to access your child's IEP goals,<br>progress reports and important updates.
            </div>
        </div>
    </div>

    <script>
        function togglePassword(inputId, btnId) {
            const passwordInput = document.getElementById(inputId);
            const toggleBtn = document.getElementById(btnId);

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleBtn.textContent = '🙈';
            } else {
                passwordInput.type = 'password';
                toggleBtn.textContent = '👁️';
            }
        }

        function openTerms(event) {
            event.preventDefault();
            document.getElementById('termsModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeTerms() {
            document.getElementById('termsModal').classList.remove('active');
            document.body.style.overflow = '';
        }

        function acceptTerms() {
            document.getElementById('termsCheckbox').checked = true;
            closeTerms();
        }

        document.getElementById('termsModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeTerms();
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeTerms();
            }
        });
    </script>
</body>
</html>