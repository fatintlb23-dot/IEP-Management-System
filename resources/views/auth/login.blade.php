<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - IEP Management System</title>
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
            align-items: center;
            min-height: 100vh;
            background: #e8f0fe;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }

        /* ========== OUTER DECORATIVE SHAPES ========== */

        /* Top-left floating blob */
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

        /* Bottom-right floating blob */
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

        /* Top-right circle */
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

        /* Bottom-left circle */
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

        /* Small sparkle dots outside */
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

        /* Floating ring */
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

        /* ========== MAIN LOGIN CARD ========== */
        .login-container {
            display: flex;
            width: 85%;
            max-width: 1100px;
            height: 80vh;
            max-height: 750px;
            min-height: 500px;
            background: white;
            border-radius: 28px;
            box-shadow: 0 25px 80px rgba(0, 0, 0, 0.12), 0 10px 30px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            position: relative;
            z-index: 1;
        }

        /* ========== LEFT PANEL ========== */
        .login-left {
            flex: 0 0 52%;
            background: linear-gradient(145deg, #EDF5FF, #DCEAFE);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px;
            text-align: center;
            color: #1a3a5c;
            position: relative;
            overflow: hidden;
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
        .login-left .illustration-wrapper {
            width: 100%;
            max-width: 500px;
            margin-bottom: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .login-left .illustration-wrapper img {
            width: 100%;
            height: auto;
            max-height: 400px;
            object-fit: contain;
            position: relative;
            z-index: 2;
        }

        .login-left .welcome-text {
            font-size: 14px;
            opacity: 0.9;
            line-height: 1.6;
            max-width: 350px;
            position: relative;
            z-index: 2;
            color: #1a3a5c;
        }

        .login-left .welcome-text strong {
            font-size: 17px;
            display: block;
            margin-bottom: 2px;
            color: #1a3a5c;
        }

        /* ========== RIGHT PANEL ========== */
        .login-right {
            flex: 1;
            padding: 60px 55px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: white;
            overflow-y: auto;
        }

        .login-right .form-header {
            margin-bottom: 35px;
        }

        .login-right .form-header h2 {
            font-size: 32px;
            color: #1a3a5c;
            font-weight: 700;
        }

        .login-right .form-header h2 span {
            color: #2c5aa0;
        }

        .login-right .form-header p {
            color: #8895aa;
            font-size: 15px;
            margin-top: 4px;
        }

        .login-right .form-header p strong {
            color: #2c5aa0;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            font-size: 14px;
            color: #445566;
        }

        .form-group .password-wrapper {
            position: relative;
            width: 100%;
        }

        .form-group input {
            width: 100%;
            padding: 13px 18px;
            border: 2px solid #e8edf3;
            border-radius: 12px;
            font-size: 14px;
            transition: all 0.25s ease;
            background: #f7f9fc;
            color: #1a2a3a;
        }

        .form-group input:focus {
            outline: none;
            border-color: #2c5aa0;
            background: white;
            box-shadow: 0 0 0 5px rgba(44, 90, 160, 0.08);
        }

        .form-group input::placeholder {
            color: #b0bccd;
        }

        .form-group .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 18px;
            color: #8895aa;
            background: none;
            border: none;
            padding: 5px;
            transition: color 0.2s;
        }

        .form-group .toggle-password:hover {
            color: #2c5aa0;
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 22px 0 28px 0;
            font-size: 14px;
        }

        .form-options .remember {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #556677;
            cursor: pointer;
            font-weight: 500;
        }

        .form-options .remember input[type="checkbox"] {
            width: 17px;
            height: 17px;
            accent-color: #2c5aa0;
            cursor: pointer;
        }

        .btn-signin {
            width: 100%;
            padding: 15px;
            background: #2c5aa0;
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-signin:hover {
            background: #1e4080;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(44, 90, 160, 0.30);
        }

        .register-link {
            text-align: center;
            margin-top: 25px;
            font-size: 14px;
            color: #8895aa;
        }

        .register-link a {
            color: #2c5aa0;
            text-decoration: none;
            font-weight: 600;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .alert {
            padding: 12px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
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
            padding: 12px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
            border-left: 4px solid #c62828;
            font-size: 14px;
        }

        .error-list p {
            margin: 3px 0;
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 1024px) {
            .login-container {
                width: 92%;
                height: 85vh;
                max-height: 700px;
                border-radius: 24px;
            }

            .login-left {
                flex: 0 0 50%;
                padding: 30px;
            }

            .login-left .illustration-wrapper {
                max-width: 380px;
            }

            .login-left .illustration-wrapper img {
                max-height: 300px;
            }

            .login-right {
                padding: 45px 40px;
            }

            .login-right .form-header h2 {
                font-size: 28px;
            }

            .outer-ring {
                display: none;
            }
        }

        @media (max-width: 820px) {
            .login-container {
                flex-direction: column;
                width: 95%;
                height: auto;
                min-height: auto;
                max-height: none;
                border-radius: 20px;
                margin: 20px auto;
            }

            .login-left {
                flex: none;
                height: 350px;
                width: 100%;
                padding: 25px;
                border-radius: 20px 20px 0 0;
            }

            .login-left .illustration-wrapper {
                max-width: 250px;
            }

            .login-left .illustration-wrapper img {
                max-height: 180px;
            }

            .login-left .welcome-text {
                font-size: 13px;
                max-width: 280px;
            }

            .login-left .welcome-text strong {
                font-size: 16px;
            }

            .login-right {
                padding: 35px 30px;
                flex: none;
                overflow-y: visible;
            }

            .login-right .form-header {
                margin-bottom: 25px;
            }

            .login-right .form-header h2 {
                font-size: 26px;
            }

            .form-group {
                margin-bottom: 16px;
            }

            .form-group input {
                padding: 11px 15px;
            }

            .btn-signin {
                padding: 13px;
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

        @media (max-width: 480px) {
            body {
                padding: 10px;
                align-items: flex-start;
                padding-top: 20px;
            }

            .login-container {
                width: 100%;
                border-radius: 16px;
                margin: 0;
            }

            .login-left {
                height: 280px;
                padding: 20px;
                border-radius: 16px 16px 0 0;
            }

            .login-left .illustration-wrapper {
                max-width: 180px;
            }

            .login-left .illustration-wrapper img {
                max-height: 140px;
            }

            .login-left .welcome-text {
                display: none;
            }

            .login-right {
                padding: 25px 18px;
            }

            .login-right .form-header h2 {
                font-size: 22px;
            }

            .login-right .form-header p {
                font-size: 13px;
            }

            .form-options {
                flex-direction: column;
                gap: 10px;
                align-items: flex-start;
                margin: 16px 0 20px 0;
            }

            .btn-signin {
                padding: 12px;
                font-size: 14px;
            }

            .register-link {
                font-size: 13px;
                margin-top: 18px;
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

    <!-- ===== MAIN LOGIN CARD ===== -->
    <div class="login-container">
        <!-- LEFT PANEL -->
        <div class="login-left">
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
                <img src="{{ asset('images/login_picture.png') }}" alt="Login Illustration">
            </div>

            <div class="welcome-text">
                <strong>Empowering Every Child</strong>
                to reach their full potential through<br>personalized education plans.
            </div>
        </div>

        <!-- RIGHT PANEL -->
        <div class="login-right">
            <div class="form-header">
                <h2>Hello <span>Again!</span></h2>
                <p>Welcome back! You've been <strong>missed</strong>.</p>
            </div>

            @if(session('error'))
                <div class="alert alert-error">{{ session('error') }}</div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="error-list">
                    @foreach($errors->all() as $error)
                        <p>• {{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" name="email" placeholder="admin@iep.com" value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <div class="password-wrapper">
                        <input type="password" name="password" id="password" placeholder="Enter your password" required>
                        <button type="button" class="toggle-password" onclick="togglePassword()" id="toggleBtn">👁️</button>
                    </div>
                </div>

                <div class="form-options">
                    <label class="remember">
                        <input type="checkbox" name="remember"> Remember me
                    </label>
                </div>

                <button type="submit" class="btn-signin">Sign In</button>
            </form>

            <div class="register-link">
                Don't have an account? <a href="{{ route('register') }}">Register now</a>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleBtn = document.getElementById('toggleBtn');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleBtn.textContent = '🙈';
            } else {
                passwordInput.type = 'password';
                toggleBtn.textContent = '👁️';
            }
        }
    </script>
</body>
</html>