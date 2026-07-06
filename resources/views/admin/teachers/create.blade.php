@extends('layouts.admin')

@section('content')
<style>
    .page-wrapper {
        max-width: 1320px;
        margin: 0 auto;
    }

    /* ===== HERO BANNER ===== */
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
    }

    .hero-banner::before {
        content: '';
        position: absolute;
        top: -30%;
        right: -10%;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.06), transparent 70%);
        border-radius: 50%;
        pointer-events: none;
    }

    .hero-banner::after {
        content: '';
        position: absolute;
        bottom: -20%;
        left: 10%;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(124, 58, 237, 0.08), transparent 70%);
        border-radius: 50%;
        pointer-events: none;
    }

    .hero-banner .wave-pattern {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 100%;
        opacity: 0.05;
        background-image: 
            radial-gradient(circle at 20% 80%, white 2px, transparent 2px),
            radial-gradient(circle at 60% 70%, white 1px, transparent 1px),
            radial-gradient(circle at 80% 90%, white 2px, transparent 2px);
        background-size: 80px 80px, 60px 60px, 100px 100px;
        pointer-events: none;
    }

    .hero-left {
        position: relative;
        z-index: 1;
        flex: 1;
    }

    .hero-left .hero-label {
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

    .hero-right {
        position: relative;
        z-index: 1;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 160px;
        height: 160px;
    }

    .hero-right .illustration {
        font-size: 100px;
        opacity: 0.85;
        filter: drop-shadow(0 8px 30px rgba(0, 0, 0, 0.08));
        animation: floatIllustration 5s ease-in-out infinite;
    }

    @keyframes floatIllustration {
        0%, 100% { transform: translateY(0px) scale(1); }
        50% { transform: translateY(-8px) scale(1.02); }
    }

    /* ===== FORM SECTION ===== */
    .form-section {
        background: white;
        border-radius: 16px;
        padding: 32px 36px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        border: 1px solid #EEF2F6;
        margin-bottom: 24px;
    }

    .form-section .section-title {
        font-size: 18px;
        font-weight: 600;
        color: #0B1E33;
        margin-bottom: 4px;
    }

    .form-section .section-subtitle {
        font-size: 14px;
        color: #94A3B8;
        margin-bottom: 24px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        font-size: 14px;
        color: #0B1E33;
        margin-bottom: 6px;
    }

    .form-group label .required {
        color: #EF4444;
        margin-left: 2px;
    }

    .form-group input {
        width: 100%;
        padding: 12px 16px;
        border: 1px solid #E5E7EB;
        border-radius: 10px;
        font-size: 14px;
        color: #0B1E33;
        background: #F8FAFC;
        transition: all 0.3s ease;
        font-family: inherit;
    }

    .form-group input:focus {
        outline: none;
        border-color: #3A5EA8;
        box-shadow: 0 0 0 3px rgba(58, 94, 168, 0.08);
        background: white;
    }

    .form-group input::placeholder {
        color: #94A3B8;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    /* ===== FORM ACTIONS ===== */
    .form-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 8px;
        gap: 16px;
        flex-wrap: wrap;
    }

    .btn-back {
        background: #F1F5F9;
        color: #64748B;
        border: none;
        padding: 12px 28px;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-family: inherit;
    }

    .btn-back:hover {
        background: #E5E7EB;
        color: #0B1E33;
    }

    .btn-submit {
        background: linear-gradient(145deg, #2F4E8A, #3A5EA8);
        color: white;
        border: none;
        padding: 12px 36px;
        border-radius: 10px;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 16px rgba(47, 78, 138, 0.15);
        font-family: inherit;
    }

    .btn-submit:hover {
        background: linear-gradient(145deg, #3A5EA8, #4A6EB8);
        transform: translateY(-2px);
        box-shadow: 0 6px 24px rgba(47, 78, 138, 0.20);
    }

    /* ===== SUCCESS/ERROR MESSAGES ===== */
    .alert-success {
        background: #ECFDF5;
        color: #22C55E;
        padding: 14px 20px;
        border-radius: 12px;
        margin-bottom: 20px;
        border-left: 4px solid #22C55E;
        font-size: 14px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .alert-error {
        background: #FEF2F2;
        color: #EF4444;
        padding: 14px 20px;
        border-radius: 12px;
        margin-bottom: 20px;
        border-left: 4px solid #EF4444;
        font-size: 14px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 992px) {
        .hero-banner {
            flex-direction: column;
            text-align: center;
            padding: 28px 24px;
            height: auto;
        }
        .hero-left h1 {
            font-size: 30px;
        }
        .hero-right {
            width: 120px;
            height: 120px;
            margin-top: 10px;
        }
        .hero-right .illustration {
            font-size: 72px;
        }
        .hero-banner .wave-pattern {
            display: none;
        }
    }

    @media (max-width: 768px) {
        .form-row {
            grid-template-columns: 1fr;
            gap: 0;
        }
        
        .form-section {
            padding: 20px;
        }

        .form-actions {
            flex-direction: column;
            align-items: stretch;
        }

        .btn-back,
        .btn-submit {
            justify-content: center;
            width: 100%;
        }

        .hero-left h1 {
            font-size: 26px;
        }
        .hero-left .hero-subtitle {
            font-size: 14px;
        }
        .hero-banner {
            padding: 24px 20px;
        }
    }

    @media (max-width: 480px) {
        .hero-banner {
            padding: 20px 16px;
        }
        .hero-left h1 {
            font-size: 22px;
        }
        .hero-right {
            width: 80px;
            height: 80px;
        }
        .hero-right .illustration {
            font-size: 52px;
        }
        .form-section {
            padding: 16px;
        }
    }
</style>

<div class="page-wrapper">
    <!-- ===== HERO BANNER ===== -->
    <div class="hero-banner">
        <div class="wave-pattern"></div>

        <div class="hero-left">
            <div class="hero-label">Teacher Management</div>
            <h1>Add <span>Teacher</span></h1>
            <div class="hero-subtitle">Create a new teacher account for the system.</div>
        </div>

        <div class="hero-right">
            <div class="illustration">👩‍🏫</div>
        </div>
    </div>

    <!-- ===== SUCCESS/ERROR MESSAGES ===== -->
    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert-error">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert-error">
            @foreach($errors->all() as $error)
                <p style="margin: 2px 0;">• {{ $error }}</p>
            @endforeach
        </div>
    @endif

    <!-- ===== FORM SECTION ===== -->
    <div class="form-section">
        <div class="section-title">Teacher Information</div>
        <div class="section-subtitle">Complete the details below to create a new teacher account.</div>

        <form method="POST" action="{{ route('admin.teachers.store') }}">
            @csrf

            <div class="form-row">
                <div class="form-group">
                    <label>Full Name <span class="required">*</span></label>
                    <input type="text" name="name" placeholder="Enter full name" value="{{ old('name') }}" required>
                </div>

                <div class="form-group">
                    <label>IC Number <span class="required">*</span></label>
                    <input type="text" name="ic_number" placeholder="Enter IC number" value="{{ old('ic_number') }}" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Email <span class="required">*</span></label>
                    <input type="email" name="email" placeholder="Enter email address" value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                    <label>Phone Number <span class="required">*</span></label>
                    <input type="text" name="phone" placeholder="Enter phone number" value="{{ old('phone') }}" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Position <span class="required">*</span></label>
                    <input type="text" name="position" placeholder="e.g. Special Needs Teacher" value="{{ old('position') }}" required>
                </div>

                <div class="form-group">
                    <label>Qualification <span class="required">*</span></label>
                    <input type="text" name="qualification" placeholder="e.g. Bachelor of Special Education" value="{{ old('qualification') }}" required>
                </div>
            </div>
            <!-- Add this info note after section-subtitle -->
<div style="background: #EFF6FF; padding: 14px 18px; border-radius: 10px; border-left: 4px solid #3A5EA8; margin-bottom: 24px;">
    <p style="font-size: 14px; color: #1a3a5c; margin: 0;">
        <strong>Email Notification:</strong> The teacher will receive a welcome email with 
        their temporary password after account creation.
    </p>
</div>

            <!-- ===== FORM ACTIONS ===== -->
            <div class="form-actions">
                <a href="{{ route('admin.teachers.index') }}" class="btn-back">
                    ← Back
                </a>
                <button type="submit" class="btn-submit">Create Teacher</button>
            </div>
        </form>
    </div>
</div>
@endsection