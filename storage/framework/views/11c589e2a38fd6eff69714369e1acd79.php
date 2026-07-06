<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parent Dashboard - IEP System</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            display: flex;
            min-height: 100vh;
            background: #F6F5F2;
            position: relative;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            pointer-events: none;
            opacity: 0.04;
            z-index: 0;
            background-image: 
                url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='1'/%3E%3C/svg%3E");
            background-repeat: repeat;
            background-size: 150px 150px;
        }

        body::after {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            pointer-events: none;
            z-index: 0;
            background: radial-gradient(ellipse at center, transparent 60%, rgba(236, 234, 231, 0.4) 100%);
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, #F7F7F8 0%, #F1F1F3 100%);
            padding: 28px 20px;
            position: fixed;
            height: 100vh;
            display: flex;
            flex-direction: column;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.05);
            z-index: 100;
            transition: transform 0.3s ease;
            border-right: 1px solid #E5E7EB;
        }

        .sidebar::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            pointer-events: none;
            opacity: 0.03;
            background-image: 
                url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='1'/%3E%3C/svg%3E");
            background-repeat: repeat;
            background-size: 150px 150px;
            border-radius: 0 20px 20px 0;
        }

        /* ===== LOGO ===== */
        .sidebar .logo-section {
            padding: 0 4px 28px 4px;
            border-bottom: 1px solid #E5E7EB;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 16px;
            position: relative;
            z-index: 1;
        }

        .sidebar .logo-section .logo-img {
            width: 72px;
            height: 72px;
            object-fit: contain;
            flex-shrink: 0;
        }

        .sidebar .logo-section .logo-text {
            font-size: 28px;
            font-weight: 700;
            color: #0B1E33;
            letter-spacing: -0.5px;
            line-height: 1.1;
        }

        .sidebar .logo-section .logo-text span {
            background: linear-gradient(135deg, #2563EB, #3B82F6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .sidebar .logo-section .logo-text small {
            display: block;
            font-size: 11px;
            font-weight: 500;
            color: #94A3B8;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-top: 0px;
            -webkit-text-fill-color: #94A3B8;
        }

        /* ===== NAVIGATION ===== */
        .sidebar .nav-section {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 4px;
            position: relative;
            z-index: 1;
        }

        .sidebar .nav-section .nav-label {
            font-size: 11px;
            font-weight: 600;
            color: #94A3B8;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            padding: 8px 12px 14px 12px;
        }

        .sidebar .nav-section a {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 0 14px;
            height: 44px;
            border-radius: 10px;
            color: #64748B;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            cursor: pointer;
        }

        .sidebar .nav-section a .nav-icon {
            font-size: 18px;
            width: 28px;
            text-align: center;
            flex-shrink: 0;
            opacity: 0.6;
            transition: all 0.25s ease;
        }

        .sidebar .nav-section a .nav-text {
            transition: all 0.25s ease;
        }

        .sidebar .nav-section a:not(.active):hover {
            background: rgba(255, 255, 255, 0.6);
            color: #0B1E33;
            transform: translateX(4px);
        }

        .sidebar .nav-section a:not(.active):hover .nav-icon {
            opacity: 1;
            transform: scale(1.05);
        }

        .sidebar .nav-section a.active {
            background: linear-gradient(180deg, #2F4E8A 0%, #3A5EA8 100%);
            color: white;
            box-shadow: 0 6px 18px rgba(47, 78, 138, 0.18);
            height: 44px;
            padding: 0 14px;
            border-radius: 10px;
        }

        .sidebar .nav-section a.active .nav-icon {
            opacity: 1;
            color: white;
        }

        .sidebar .nav-section a.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            height: 22px;
            width: 3px;
            background: white;
            border-radius: 10px;
            box-shadow: none;
        }

        .sidebar .nav-section a.active:hover {
            background: linear-gradient(180deg, #3A5EA8 0%, #4A6EB8 100%);
            box-shadow: 0 6px 22px rgba(47, 78, 138, 0.25);
            transform: none;
        }

        .sidebar .nav-section a.active:hover .nav-icon {
            transform: none;
        }

        /* ===== ICON COLORS ===== */
        .sidebar .nav-section a .nav-icon.dashboard { color: #2563EB; }
        .sidebar .nav-section a .nav-icon.profile { color: #8B5CF6; }
        .sidebar .nav-section a .nav-icon.goals { color: #22C55E; }
        .sidebar .nav-section a .nav-icon.reports { color: #F59E0B; }
        .sidebar .nav-section a .nav-icon.settings { color: #06B6D4; }
        .sidebar .nav-section a .nav-icon.logout { color: #EF4444; }

        .sidebar .nav-section a.active .nav-icon.dashboard { color: white; }
        .sidebar .nav-section a.active .nav-icon.profile { color: white; }
        .sidebar .nav-section a.active .nav-icon.goals { color: white; }
        .sidebar .nav-section a.active .nav-icon.reports { color: white; }
        .sidebar .nav-section a.active .nav-icon.settings { color: white; }

        /* ===== LOGOUT ===== */
        .sidebar .nav-section .logout-link {
            margin-top: auto;
            border-top: 1px solid #E5E7EB;
            padding-top: 14px;
            color: #94A3B8;
        }

        .sidebar .nav-section .logout-link:hover {
            color: #EF4444;
            background: #FEF2F2;
            transform: translateX(4px);
        }

        .sidebar .nav-section .logout-link:hover .nav-icon.logout {
            color: #EF4444;
            opacity: 1;
        }

        /* ===== MAIN CONTENT ===== */
        .main {
            margin-left: 280px;
            padding: 32px 40px;
            width: 100%;
            min-height: 100vh;
            background: linear-gradient(180deg, #F6F5F2 0%, #F2F1EE 50%, #ECEAE7 100%);
            position: relative;
            z-index: 1;
        }

        .main::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            pointer-events: none;
            opacity: 0.035;
            z-index: 0;
            background-image: 
                url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='1'/%3E%3C/svg%3E");
            background-repeat: repeat;
            background-size: 150px 150px;
            border-radius: 0 20px 20px 0;
        }

        .main::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            pointer-events: none;
            z-index: 0;
            background: radial-gradient(ellipse at center, transparent 60%, rgba(236, 234, 231, 0.3) 100%);
            border-radius: 0 20px 20px 0;
        }

        /* ===== TOP HEADER ===== */
        .top-header {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 4px 0 20px 0;
            margin-bottom: 8px;
            border-bottom: 1px solid #E5E7EB;
            flex-wrap: wrap;
            gap: 16px;
            position: relative;
            z-index: 10;
        }

        /* ===== USER MENU ===== */
        .top-header .user-menu {
            position: relative;
            cursor: pointer;
            flex-shrink: 0;
            z-index: 99999;
        }

        .top-header .user-menu .user-trigger {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 6px 12px 6px 6px;
            border-radius: 50px;
            background: white;
            border: 1px solid #E5E7EB;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.04);
            transition: all 0.3s ease;
            position: relative;
            z-index: 99999;
        }

        .top-header .user-menu .user-trigger:hover {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border-color: #DBEAFE;
        }

        .top-header .user-menu .user-trigger .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #2563EB, #7C3AED);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 16px;
            flex-shrink: 0;
        }

        .top-header .user-menu .user-trigger .user-name {
            font-size: 14px;
            font-weight: 600;
            color: #0B1E33;
        }

        .top-header .user-menu .user-trigger .user-chevron {
            color: #94A3B8;
            font-size: 14px;
            transition: transform 0.3s ease;
        }

        .top-header .user-menu .user-trigger .user-chevron.open {
            transform: rotate(180deg);
        }

        /* ===== DROPDOWN ===== */
        .top-header .user-menu .dropdown {
            position: absolute;
            top: calc(100% + 8px);
            right: 0;
            background: white;
            border-radius: 16px;
            box-shadow: 0 16px 48px rgba(0, 0, 0, 0.12);
            border: 1px solid #E5E7EB;
            min-width: 200px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-8px) scale(0.96);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
            z-index: 999999;
        }

        .top-header .user-menu .dropdown.active {
            opacity: 1;
            visibility: visible;
            transform: translateY(0) scale(1);
        }

        .top-header .user-menu .dropdown .dropdown-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 18px;
            color: #64748B;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s ease;
            border: none;
            background: none;
            width: 100%;
            cursor: pointer;
            font-family: inherit;
        }

        .top-header .user-menu .dropdown .dropdown-item:hover {
            background: #F8FAFC;
            color: #0B1E33;
        }

        .top-header .user-menu .dropdown .dropdown-item .dd-icon {
            font-size: 18px;
            width: 24px;
            text-align: center;
        }

        .top-header .user-menu .dropdown .dropdown-item.danger {
            color: #EF4444;
        }

        .top-header .user-menu .dropdown .dropdown-item.danger:hover {
            background: #FEF2F2;
            color: #DC2626;
        }

        .top-header .user-menu .dropdown .dropdown-divider {
            height: 1px;
            background: #E5E7EB;
            margin: 4px 12px;
        }

        .top-header .user-menu .dropdown .dropdown-user-info {
            padding: 14px 18px;
            border-bottom: 1px solid #E5E7EB;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .top-header .user-menu .dropdown .dropdown-user-info .du-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, #2563EB, #7C3AED);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 14px;
            flex-shrink: 0;
        }

        .top-header .user-menu .dropdown .dropdown-user-info .du-name {
            font-weight: 600;
            color: #0B1E33;
            font-size: 14px;
        }

        .top-header .user-menu .dropdown .dropdown-user-info .du-role {
            font-size: 12px;
            color: #94A3B8;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                width: 300px;
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .main {
                margin-left: 0;
                padding: 20px 16px;
            }

            .hamburger {
                display: flex !important;
            }

            .top-header {
                padding-top: 56px;
                flex-direction: column;
                align-items: flex-start;
            }

            .top-header .user-menu {
                align-self: flex-end;
            }
        }

        @media (max-width: 480px) {
            .top-header .user-menu .user-trigger .user-name {
                font-size: 12px;
            }

            .top-header .user-menu .user-trigger .user-avatar {
                width: 32px;
                height: 32px;
                font-size: 13px;
            }
        }

        .hamburger {
            display: none;
            position: fixed;
            top: 16px;
            left: 16px;
            z-index: 200;
            background: white;
            border: none;
            padding: 10px 14px;
            border-radius: 12px;
            box-shadow: 0 2px 16px rgba(0, 0, 0, 0.08);
            font-size: 22px;
            cursor: pointer;
            color: #0B1E33;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.3);
            z-index: 99;
            backdrop-filter: blur(4px);
        }

        .overlay.active {
            display: block;
        }
    </style>
</head>
<body>
    <button class="hamburger" onclick="toggleSidebar()">☰</button>
    <div class="overlay" id="overlay" onclick="toggleSidebar()"></div>

    <!-- ===== SIDEBAR ===== -->
    <div class="sidebar" id="sidebar">
        <div class="logo-section">
            <img src="<?php echo e(asset('images/logo.png')); ?>" alt="IEP System" class="logo-img">
            <div class="logo-text">
                IEP<span>System</span>
                <small>Parent Portal</small>
            </div>
        </div>

        <div class="nav-section">
            <div class="nav-label">Main</div>

            <a href="<?php echo e(route('parent.dashboard')); ?>" class="<?php echo e(request()->routeIs('parent.dashboard') ? 'active' : ''); ?>">
                <span class="nav-icon dashboard">🏠</span>
                <span class="nav-text">Dashboard</span>
            </a>

            <a href="<?php echo e(route('parent.child')); ?>" class="<?php echo e(request()->routeIs('parent.child') ? 'active' : ''); ?>">
                <span class="nav-icon profile">👨‍👧</span>
                <span class="nav-text">My Child's Profile</span>
            </a>

            <a href="<?php echo e(route('parent.goals')); ?>" class="<?php echo e(request()->routeIs('parent.goals') ? 'active' : ''); ?>">
                <span class="nav-icon goals">📋</span>
                <span class="nav-text">IEP Goals</span>
            </a>

            <a href="<?php echo e(route('parent.progress')); ?>" class="<?php echo e(request()->routeIs('parent.progress') ? 'active' : ''); ?>">
                <span class="nav-icon reports">📊</span>
                <span class="nav-text">Progress Reports</span>
            </a>

            <a href="<?php echo e(route('parent.profile.index')); ?>" class="<?php echo e(request()->routeIs('parent.profile.*') ? 'active' : ''); ?>">
                <span class="nav-icon settings">👤</span>
                <span class="nav-text">My Profile</span>
            </a>

            <!-- Logout with confirmation -->
            <a href="#" class="logout-link" onclick="event.preventDefault(); showLogoutConfirmation();">
                <span class="nav-icon logout">➜]</span>
                <span class="nav-text">Logout</span>
            </a>

            <form id="logout-form" method="POST" action="<?php echo e(route('logout')); ?>" style="display:none;">
                <?php echo csrf_field(); ?>
            </form>
        </div>
    </div>

    <!-- ===== MAIN CONTENT ===== -->
    <div class="main">
        <?php
            $parent = auth()->user();
        ?>

        <!-- Top Header -->
        <div class="top-header">
            <div class="user-menu" id="userMenu">
                <div class="user-trigger" onclick="toggleDropdown()">
                    <div class="user-avatar"><?php echo e(substr($parent->name, 0, 1)); ?></div>
                    <span class="user-name"><?php echo e(ucfirst(explode(' ', $parent->name)[0])); ?></span>
                    <span class="user-chevron" id="chevron">▼</span>
                </div>

                <div class="dropdown" id="dropdown">
                    <div class="dropdown-user-info">
                        <div class="du-avatar"><?php echo e(substr($parent->name, 0, 1)); ?></div>
                        <div>
                            <div class="du-name"><?php echo e(ucfirst(explode(' ', $parent->name)[0])); ?></div>
                            <div class="du-role">Parent</div>
                        </div>
                    </div>

                    <a href="<?php echo e(route('parent.profile.index')); ?>" class="dropdown-item">
                        <span class="dd-icon">👤</span>
                        My Profile
                    </a>

                    <div class="dropdown-divider"></div>

                    <a href="#" class="dropdown-item danger" onclick="event.preventDefault(); showLogoutConfirmation();">
                        <span class="dd-icon">➜]</span>
                        Logout
                    </a>
                </div>
            </div>
        </div>

        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <script>
        function showLogoutConfirmation() {
            if (confirm('Are you sure you want to logout?')) {
                document.getElementById('logout-form').submit();
            }
        }

        function toggleDropdown() {
            const dropdown = document.getElementById('dropdown');
            const chevron = document.getElementById('chevron');
            dropdown.classList.toggle('active');
            chevron.classList.toggle('open');
        }

        document.addEventListener('click', function(event) {
            const userMenu = document.getElementById('userMenu');
            if (!userMenu.contains(event.target)) {
                document.getElementById('dropdown').classList.remove('active');
                document.getElementById('chevron').classList.remove('open');
            }
        });

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            sidebar.classList.toggle('open');
            overlay.classList.toggle('active');
        }
    </script>
</body>
</html><?php /**PATH C:\Users\fatin\iep-system\resources\views/layouts/parent.blade.php ENDPATH**/ ?>