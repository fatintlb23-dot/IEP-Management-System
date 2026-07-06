@extends('layouts.admin')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');

    .dashboard-wrapper {
        max-width: 1320px;
        margin: 0 auto;
        background: transparent;
    }

    /* ============================================================
       HERO BANNER
    ============================================================ */
    .hero-banner {
        background: linear-gradient(145deg, #244A87, #355D9E);
        border-radius: 24px;
        padding: 36px 44px;
        height: 200px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: relative;
        overflow: hidden;
        box-shadow: 0 16px 48px rgba(36, 74, 135, 0.25);
        margin-bottom: 32px;
        z-index: 1;
    }

    /* Soft wave patterns */
    .hero-banner .wave-pattern {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 100%;
        opacity: 0.06;
        background-image: 
            radial-gradient(circle at 20% 80%, white 2px, transparent 2px),
            radial-gradient(circle at 60% 70%, white 1px, transparent 1px),
            radial-gradient(circle at 80% 90%, white 2px, transparent 2px),
            radial-gradient(circle at 40% 90%, white 1px, transparent 1px);
        background-size: 80px 80px, 60px 60px, 100px 100px, 70px 70px;
        pointer-events: none;
    }

    /* Geometric line illustration */
    .hero-banner .geo-lines {
        position: absolute;
        right: 15%;
        top: 10%;
        opacity: 0.06;
        pointer-events: none;
    }

    .hero-banner .geo-lines svg {
        width: 200px;
        height: 200px;
    }

    /* Floating graduation cap */
    .hero-banner .float-cap {
        position: absolute;
        right: 8%;
        bottom: 15%;
        font-size: 48px;
        opacity: 0.10;
        pointer-events: none;
        z-index: 0;
        animation: floatCap 6s ease-in-out infinite;
    }

    @keyframes floatCap {
        0%, 100% { transform: translateY(0px) rotate(-2deg); }
        50% { transform: translateY(-10px) rotate(2deg); }
    }

    .hero-left {
        position: relative;
        z-index: 1;
        flex: 1;
    }

    .hero-left .hero-date {
        font-size: 13px;
        color: rgba(255, 255, 255, 0.6);
        font-weight: 400;
        margin-bottom: 8px;
        letter-spacing: 0.5px;
    }

    .hero-left h1 {
        font-size: 38px;
        font-weight: 800;
        color: white;
        letter-spacing: -0.5px;
        line-height: 1.1;
    }

    .hero-left h1 span {
        background: rgba(255, 255, 255, 0.10);
        padding: 0 6px;
        border-radius: 4px;
    }

    .hero-left .hero-subtitle {
        font-size: 15px;
        color: rgba(255, 255, 255, 0.75);
        margin-top: 6px;
        font-weight: 400;
    }

    /* Right illustration */
    .hero-right {
        position: relative;
        z-index: 1;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 160px;
        height: 160px;
        pointer-events: none;
    }

    .hero-right .illustration {
        font-size: 100px;
        opacity: 0.85;
        filter: drop-shadow(0 8px 30px rgba(0, 0, 0, 0.08));
        animation: floatIllustration 5s ease-in-out infinite;
        pointer-events: none;
        user-select: none;
        z-index: 0;
        position: relative;
    }

    @keyframes floatIllustration {
        0%, 100% { transform: translateY(0px) scale(1); }
        50% { transform: translateY(-8px) scale(1.02); }
    }

    /* ============================================================
       STATISTICS CARDS - 3 CARDS
    ============================================================ */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-bottom: 32px;
    }

    .stat-card {
        background: #FFFFFF;
        border-radius: 16px;
        padding: 22px 24px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        border: 1px solid #EEF2F6;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06);
    }

    .stat-card .stat-left {
        display: flex;
        flex-direction: column;
    }

    .stat-card .stat-icon {
        font-size: 18px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 44px;
        height: 44px;
        border-radius: 12px;
        margin-bottom: 10px;
        background: #F1F5F9;
        color: #64748B;
    }

    .stat-card .stat-icon.blue { background: #EFF6FF; color: #355D9E; }
    .stat-card .stat-icon.green { background: #ECFDF5; color: #22C55E; }
    .stat-card .stat-icon.purple { background: #F5F3FF; color: #6D63FF; }

    .stat-card .stat-number {
        font-size: 28px;
        font-weight: 700;
        color: #0B1E33;
        letter-spacing: -0.5px;
        line-height: 1.1;
    }

    .stat-card .stat-label {
        font-size: 13px;
        color: #94A3B8;
        font-weight: 400;
        margin-top: 2px;
    }

    .stat-card .stat-illustration {
        font-size: 48px;
        opacity: 0.06;
        pointer-events: none;
        flex-shrink: 0;
    }

    /* ============================================================
       QUICK ACTIONS
    ============================================================ */
    .quick-section {
        margin-bottom: 28px;
    }

    .quick-section .quick-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 18px;
    }

    .quick-section .quick-header h3 {
        font-size: 18px;
        font-weight: 600;
        color: #0B1E33;
    }

    .quick-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 18px;
    }

    .quick-card {
        border-radius: 16px;
        padding: 24px 22px;
        text-decoration: none;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        color: white;
        min-height: 140px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        border: 1px solid rgba(255, 255, 255, 0.08);
    }

    .quick-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
    }

    .quick-card .qc-content {
        position: relative;
        z-index: 1;
    }

    .quick-card .qc-icon {
        font-size: 26px;
        margin-bottom: 10px;
        display: block;
        opacity: 0.9;
    }

    .quick-card .qc-title {
        font-weight: 600;
        font-size: 16px;
        color: white;
    }

    .quick-card .qc-desc {
        font-size: 13px;
        opacity: 0.80;
        margin-top: 2px;
        font-weight: 400;
    }

    .quick-card .qc-arrow-btn {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.20);
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        color: white;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 12px;
        position: relative;
        z-index: 1;
        backdrop-filter: blur(4px);
        text-decoration: none;
    }

    .quick-card:hover .qc-arrow-btn {
        background: rgba(255, 255, 255, 0.30);
        transform: translateX(4px);
    }

    .quick-card .qc-illustration {
        position: absolute;
        bottom: -10px;
        right: -5px;
        font-size: 64px;
        opacity: 0.10;
        pointer-events: none;
        transform: rotate(4deg);
        transition: all 0.4s ease;
    }

    .quick-card:hover .qc-illustration {
        opacity: 0.15;
        transform: rotate(0deg) scale(1.05);
    }

    /* Quick Card Colors */
    .quick-card.card-terracotta {
        background: linear-gradient(145deg, #B8654A, #D4896E);
        box-shadow: 0 2px 8px rgba(184, 101, 74, 0.15);
    }
    .quick-card.card-terracotta:hover { box-shadow: 0 8px 24px rgba(184, 101, 74, 0.20); }

    .quick-card.card-mustard {
        background: linear-gradient(145deg, #C49A3A, #DDB85A);
        box-shadow: 0 2px 8px rgba(196, 154, 58, 0.15);
    }
    .quick-card.card-mustard:hover { box-shadow: 0 8px 24px rgba(196, 154, 58, 0.20); }

    .quick-card.card-deepblue {
        background: linear-gradient(145deg, #2A7A96, #4A9FB5);
        box-shadow: 0 2px 8px rgba(42, 122, 150, 0.15);
    }
    .quick-card.card-deepblue:hover { box-shadow: 0 8px 24px rgba(42, 122, 150, 0.20); }

    .quick-card.card-purple {
        background: linear-gradient(145deg, #7A70E8, #A094F5);
        box-shadow: 0 2px 8px rgba(122, 112, 232, 0.15);
    }
    .quick-card.card-purple:hover { box-shadow: 0 8px 24px rgba(122, 112, 232, 0.20); }

    /* ============================================================
       RESPONSIVE
    ============================================================ */
    @media (max-width: 1200px) {
        .stats-grid { grid-template-columns: repeat(3, 1fr); }
        .quick-grid { grid-template-columns: repeat(2, 1fr); }
    }

    @media (max-width: 992px) {
        .hero-banner {
            height: auto;
            padding: 28px 30px;
            flex-direction: column;
            text-align: center;
        }
        .hero-left h1 { font-size: 30px; }
        .hero-right { width: 120px; height: 120px; margin-top: 10px; }
        .hero-right .illustration { font-size: 72px; }
        .hero-banner .float-cap { display: none; }
        .hero-banner .geo-lines { display: none; }
        .hero-banner .wave-pattern { display: none; }
    }

    @media (max-width: 768px) {
        .stats-grid { grid-template-columns: 1fr 1fr; gap: 14px; }
        .quick-grid { grid-template-columns: 1fr 1fr; gap: 14px; }
        .stat-card { padding: 18px 18px; }
        .stat-card .stat-number { font-size: 22px; }
        .hero-left h1 { font-size: 26px; }
        .hero-left .hero-subtitle { font-size: 14px; }
        .hero-banner { padding: 24px 20px; }
        .quick-card { min-height: 120px; padding: 20px 18px; }
        .quick-card .qc-illustration { font-size: 48px; }
    }

    @media (max-width: 480px) {
        .stats-grid { grid-template-columns: 1fr 1fr; gap: 10px; }
        .quick-grid { grid-template-columns: 1fr; }
        .stat-card .stat-number { font-size: 18px; }
        .hero-left h1 { font-size: 22px; }
        .hero-right { width: 80px; height: 80px; }
        .hero-right .illustration { font-size: 52px; }
        .hero-banner { padding: 20px 16px; }
        .quick-card { min-height: 110px; }
        .quick-card .qc-illustration { font-size: 40px; }
    }
</style>

<div class="dashboard-wrapper">
    @php
        $admin = auth()->user();
        $totalTeachers = App\Models\User::where('role', 'teacher')->count();
        // Only count parents with status = 'active' (accepted)
        $totalParents = App\Models\User::where('role', 'parent')->where('status', 'active')->count();
        $totalStudents = App\Models\Student::count();
    @endphp

    <!-- ============================================================
         HERO BANNER
    ============================================================ -->
    <div class="hero-banner">
        <!-- Wave pattern -->
        <div class="wave-pattern"></div>

        <!-- Geometric lines -->
        <div class="geo-lines">
            <svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M40 160 L160 40" stroke="white" stroke-width="2" stroke-linecap="round"/>
                <path d="M20 180 L180 20" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                <path d="M80 170 L170 80" stroke="white" stroke-width="1" stroke-linecap="round"/>
                <path d="M30 150 L150 30" stroke="white" stroke-width="1" stroke-linecap="round"/>
                <circle cx="100" cy="100" r="60" stroke="white" stroke-width="1.5" stroke-dasharray="4 8"/>
            </svg>
        </div>

        <!-- Floating graduation cap -->
        <div class="float-cap">🎓</div>

        <!-- Left Content -->
        <div class="hero-left">
            <div class="hero-date">{{ date('F j, Y') }}</div>
            <h1>Good Afternoon, <span>Admin</span></h1>
            <div class="hero-subtitle">Welcome back! Here's an overview of your IEP Management System.</div>
        </div>

        <!-- Right Illustration -->
        <div class="hero-right">
            <div class="illustration">🎓</div>
        </div>
    </div>

    <!-- ============================================================
         STATISTICS CARDS - 3 CARDS
    ============================================================ -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-left">
                <div class="stat-icon blue">👨‍🎓</div>
                <div class="stat-number">{{ $totalStudents }}</div>
                <div class="stat-label">Total Students</div>
            </div>
            <div class="stat-illustration">📚</div>
        </div>

        <div class="stat-card">
            <div class="stat-left">
                <div class="stat-icon green">👩‍🏫</div>
                <div class="stat-number">{{ $totalTeachers }}</div>
                <div class="stat-label">Total Teachers</div>
            </div>
            <div class="stat-illustration">✏️</div>
        </div>

        <div class="stat-card">
            <div class="stat-left">
                <div class="stat-icon purple">👨‍👩‍👧</div>
                <div class="stat-number">{{ $totalParents }}</div>
                <div class="stat-label">Total Parents (Active)</div>
            </div>
            <div class="stat-illustration">👪</div>
        </div>
    </div>

    <!-- ============================================================
         QUICK ACTIONS
    ============================================================ -->
    <div class="quick-section">
        <div class="quick-header">
            <h3>Quick Actions</h3>
        </div>

        <div class="quick-grid">
            <!-- Manage Teachers - Terracotta -->
            <a href="{{ route('admin.teachers.index') }}" class="quick-card card-terracotta">
                <div class="qc-content">
                    <span class="qc-icon">👩‍🏫</span>
                    <div class="qc-title">Manage Teachers</div>
                    <div class="qc-desc">Add or remove teachers</div>
                    <div class="qc-arrow-btn">→</div>
                </div>
                <div class="qc-illustration">📚</div>
            </a>

            <!-- Manage Parents - Mustard -->
            <a href="{{ route('admin.parents.index') }}" class="quick-card card-mustard">
                <div class="qc-content">
                    <span class="qc-icon">👨‍👩‍👧</span>
                    <div class="qc-title">Manage Parents</div>
                    <div class="qc-desc">Approve or reject parents</div>
                    <div class="qc-arrow-btn">→</div>
                </div>
                <div class="qc-illustration">👪</div>
            </a>

            <!-- View Students - Deep Blue -->
            <a href="{{ route('admin.students.index') }}" class="quick-card card-deepblue">
                <div class="qc-content">
                    <span class="qc-icon">👩‍🎓</span>
                    <div class="qc-title">View Students</div>
                    <div class="qc-desc">View all students &amp; IEPs</div>
                    <div class="qc-arrow-btn">→</div>
                </div>
                <div class="qc-illustration">📖</div>
            </a>

            <!-- Generate Reports - Purple -->
            <a href="{{ route('admin.reports.index') }}" class="quick-card card-purple">
                <div class="qc-content">
                    <span class="qc-icon">📄</span>
                    <div class="qc-title">Generate Reports</div>
                    <div class="qc-desc">Overall progress report</div>
                    <div class="qc-arrow-btn">→</div>
                </div>
                <div class="qc-illustration">📊</div>
            </a>
        </div>
    </div>
</div>
@endsection