@extends('layouts.admin')

@section('content')
<style>
    .page-wrapper {
        max-width: 1100px;
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

    /* ===== PROFILE SECTION ===== */
    .profile-section {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 24px;
    }

    /* ===== PROFILE CARD ===== */
    .profile-card {
        background: white;
        border-radius: 16px;
        padding: 28px 30px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        border: 1px solid #EEF2F6;
    }

    .profile-card .card-title {
        font-size: 18px;
        font-weight: 700;
        color: #0B1E33;
        margin-bottom: 20px;
        padding-bottom: 12px;
        border-bottom: 1px solid #EEF2F6;
    }

    /* ===== PROFILE AVATAR ===== */
    .profile-avatar {
        display: flex;
        align-items: center;
        gap: 30px;
        margin-bottom: 24px;
        padding-bottom: 20px;
        border-bottom: 1px solid #EEF2F6;
    }

    .profile-avatar .avatar-wrapper {
        position: relative;
        width: 120px;
        height: 120px;
        flex-shrink: 0;
    }

    .profile-avatar .avatar-wrapper .avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: linear-gradient(135deg, #4F7CFF, #7C3AED);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 48px;
        font-weight: 600;
        text-transform: uppercase;
        object-fit: cover;
        border: 3px solid #EEF2F6;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        cursor: pointer;
        transition: opacity 0.3s ease;
    }

    .profile-avatar .avatar-wrapper .avatar:hover {
        opacity: 0.85;
    }

    .profile-avatar .avatar-wrapper .avatar img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
    }

    .profile-avatar .avatar-wrapper .avatar .avatar-initial {
        font-size: 48px;
        font-weight: 600;
        color: white;
        text-transform: uppercase;
    }

    .profile-avatar .avatar-info {
        display: flex;
        flex-direction: column;
        gap: 2px;
    }

    .profile-avatar .avatar-info .name {
        font-size: 24px;
        font-weight: 700;
        color: #0B1E33;
        text-transform: uppercase;
        line-height: 1.2;
    }

    .profile-avatar .avatar-info .role {
        font-size: 15px;
        color: #94A3B8;
        font-weight: 400;
    }

    .profile-avatar .avatar-info .position {
        font-size: 14px;
        color: #4F7CFF;
        font-weight: 500;
        margin-top: 2px;
    }

    /* ===== PROFILE INFO ===== */
    .profile-info .info-row {
        display: flex;
        padding: 10px 0;
        border-bottom: 1px solid #F1F5F9;
    }

    .profile-info .info-row:last-child {
        border-bottom: none;
    }

    .profile-info .info-row .info-label {
        width: 140px;
        font-weight: 600;
        color: #94A3B8;
        font-size: 14px;
        flex-shrink: 0;
    }

    .profile-info .info-row .info-value {
        flex: 1;
        color: #0B1E33;
        font-size: 14px;
        font-weight: 500;
        text-transform: uppercase;
    }

    /* ===== SETTINGS BUTTONS ===== */
    .settings-list {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .settings-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 14px 18px;
        border-radius: 12px;
        background: #F8FAFC;
        cursor: pointer;
        transition: all 0.3s ease;
        border: 1px solid transparent;
    }

    .settings-item:hover {
        background: #EEF4FF;
        border-color: #DBEAFE;
    }

    .settings-item .settings-left {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .settings-item .settings-left .settings-icon {
        font-size: 20px;
        width: 36px;
        height: 36px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #EEF4FF;
        color: #4F7CFF;
    }

    .settings-item .settings-left .settings-text .settings-title {
        font-weight: 600;
        color: #0B1E33;
        font-size: 15px;
    }

    .settings-item .settings-left .settings-text .settings-desc {
        font-size: 13px;
        color: #94A3B8;
    }

    .settings-item .settings-arrow {
        color: #94A3B8;
        font-size: 18px;
    }

    /* ===== MODAL OVERLAY ===== */
    .modal-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(6px);
        z-index: 9999;
        justify-content: center;
        align-items: center;
        padding: 20px;
        animation: fadeIn 0.3s ease;
    }

    .modal-overlay.active {
        display: flex;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes slideUp {
        from { transform: translateY(30px) scale(0.95); opacity: 0; }
        to { transform: translateY(0) scale(1); opacity: 1; }
    }

    .modal-content {
        background: white;
        border-radius: 20px;
        max-width: 480px;
        width: 100%;
        padding: 32px 36px;
        box-shadow: 0 25px 80px rgba(0, 0, 0, 0.2);
        animation: slideUp 0.3s ease;
        max-height: 90vh;
        overflow-y: auto;
        position: relative;
    }

    .modal-content .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
        padding-bottom: 16px;
        border-bottom: 1px solid #EEF2F6;
    }

    .modal-content .modal-header .modal-title {
        font-size: 20px;
        font-weight: 700;
        color: #0B1E33;
    }

    .modal-content .modal-header .modal-close {
        background: none;
        border: none;
        font-size: 24px;
        color: #94A3B8;
        cursor: pointer;
        transition: color 0.2s;
        padding: 4px;
        line-height: 1;
    }

    .modal-content .modal-header .modal-close:hover {
        color: #0B1E33;
    }

    /* ===== PHOTO MODAL ===== */
    .photo-modal .modal-content {
        max-width: 380px;
        text-align: center;
        padding: 0;
        overflow: hidden;
        border-radius: 20px;
    }

    .photo-modal .modal-content .photo-header {
        padding: 32px 36px 16px 36px;
        border-bottom: 1px solid #EEF2F6;
    }

    .photo-modal .modal-content .photo-header .photo-avatar {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        margin: 0 auto 12px;
        background: linear-gradient(135deg, #4F7CFF, #7C3AED);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 32px;
        font-weight: 600;
        text-transform: uppercase;
        overflow: hidden;
    }

    .photo-modal .modal-content .photo-header .photo-avatar img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
    }

    .photo-modal .modal-content .photo-header .photo-avatar .photo-initial {
        font-size: 32px;
        font-weight: 600;
        color: white;
        text-transform: uppercase;
    }

    .photo-modal .modal-content .photo-header h3 {
        font-size: 18px;
        font-weight: 700;
        color: #0B1E33;
        text-transform: uppercase;
    }

    .photo-modal .modal-content .photo-header p {
        font-size: 13px;
        color: #94A3B8;
        margin-top: 2px;
    }

    .photo-modal .modal-content .photo-actions {
        padding: 12px 0;
    }

    .photo-modal .modal-content .photo-actions .photo-btn {
        display: block;
        width: 100%;
        padding: 14px 20px;
        border: none;
        background: none;
        font-size: 15px;
        font-weight: 500;
        cursor: pointer;
        transition: background 0.2s;
        font-family: inherit;
        text-align: center;
        border-top: 1px solid #EEF2F6;
    }

    .photo-modal .modal-content .photo-actions .photo-btn:first-child {
        border-top: none;
    }

    .photo-modal .modal-content .photo-actions .photo-btn:hover {
        background: #F8FAFC;
    }

    .photo-modal .modal-content .photo-actions .photo-btn.primary {
        color: #4F7CFF;
        font-weight: 600;
    }

    .photo-modal .modal-content .photo-actions .photo-btn.danger {
        color: #EF4444;
        font-weight: 600;
    }

    .photo-modal .modal-content .photo-actions .photo-btn.cancel {
        color: #64748B;
        font-weight: 500;
    }

    /* ===== FORM ===== */
    .form-group {
        margin-bottom: 16px;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        font-size: 13px;
        color: #0B1E33;
        margin-bottom: 4px;
    }

    .form-group input {
        width: 100%;
        padding: 10px 14px;
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
        border-color: #4F7CFF;
        box-shadow: 0 0 0 3px rgba(79, 124, 255, 0.08);
        background: white;
    }

    .form-group input::placeholder {
        color: #94A3B8;
    }

    .btn-submit {
        width: 100%;
        padding: 11px;
        border: none;
        border-radius: 10px;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: inherit;
        color: white;
        margin-top: 4px;
    }

    .btn-submit.blue {
        background: #1A3C78;
    }

    .btn-submit.blue:hover {
        background: #12306B;
        transform: translateY(-2px);
        box-shadow: 0 4px 16px rgba(26, 60, 120, 0.25);
    }

    .btn-submit.green {
        background: #1A3C78;
    }

    .btn-submit.green:hover {
        background: #12306B;
        transform: translateY(-2px);
        box-shadow: 0 4px 16px rgba(26, 60, 120, 0.25);
    }

    /* ===== ALERT MESSAGES ===== */
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
        animation: slideDown 0.3s ease;
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
        animation: slideDown 0.3s ease;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* ===== TOAST NOTIFICATION ===== */
    .toast {
        position: fixed;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        background: #22C55E;
        color: white;
        padding: 12px 24px;
        border-radius: 12px;
        font-size: 14px;
        font-weight: 500;
        box-shadow: 0 4px 20px rgba(0,0,0,0.15);
        z-index: 99999;
        animation: slideUp 0.3s ease;
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
        .profile-section {
            grid-template-columns: 1fr;
        }
        .photo-modal .modal-content {
            max-width: 340px;
        }
    }

    @media (max-width: 768px) {
        .profile-card {
            padding: 20px;
        }
        .profile-info .info-row {
            flex-direction: column;
            gap: 2px;
            padding: 8px 0;
        }
        .profile-info .info-row .info-label {
            width: 100%;
            font-size: 12px;
        }
        .profile-info .info-row .info-value {
            font-size: 13px;
        }
        .profile-avatar {
            flex-direction: column;
            text-align: center;
            gap: 16px;
        }
        .profile-avatar .avatar-wrapper {
            width: 100px;
            height: 100px;
        }
        .profile-avatar .avatar-wrapper .avatar {
            width: 100px;
            height: 100px;
            font-size: 40px;
        }
        .profile-avatar .avatar-wrapper .avatar .avatar-initial {
            font-size: 40px;
        }
        .profile-avatar .avatar-info .name {
            font-size: 20px;
        }
        .profile-avatar .avatar-info .role {
            font-size: 14px;
        }
        .profile-avatar .avatar-info .position {
            font-size: 13px;
        }
        .settings-item {
            padding: 12px 14px;
        }
        .settings-item .settings-left .settings-text .settings-title {
            font-size: 14px;
        }
        .settings-item .settings-left .settings-text .settings-desc {
            font-size: 12px;
        }
        .modal-content {
            padding: 24px 20px;
            margin: 10px;
        }
        .photo-modal .modal-content {
            max-width: 320px;
        }
        .photo-modal .modal-content .photo-header {
            padding: 24px 20px 12px 20px;
        }
        .photo-modal .modal-content .photo-actions .photo-btn {
            padding: 12px 16px;
            font-size: 14px;
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
        .profile-card {
            padding: 16px;
        }
        .modal-content {
            padding: 20px 16px;
        }
        .modal-content .modal-header .modal-title {
            font-size: 17px;
        }
        .profile-avatar .avatar-wrapper {
            width: 80px;
            height: 80px;
        }
        .profile-avatar .avatar-wrapper .avatar {
            width: 80px;
            height: 80px;
            font-size: 32px;
        }
        .profile-avatar .avatar-wrapper .avatar .avatar-initial {
            font-size: 32px;
        }
        .photo-modal .modal-content {
            max-width: 300px;
        }
        .photo-modal .modal-content .photo-header .photo-avatar {
            width: 64px;
            height: 64px;
            font-size: 24px;
        }
    }
</style>

<div class="page-wrapper">
    @php
        $admin = auth()->user();
    @endphp

    <!-- ===== HERO BANNER ===== -->
    <div class="hero-banner">
        <div class="wave-pattern"></div>

        <div class="hero-left">
            <div class="hero-label">Profile Management</div>
            <h1>My <span>Profile</span></h1>
            <div class="hero-subtitle">View and manage your account information.</div>
        </div>

        <div class="hero-right">
            <div class="illustration">👤</div>
        </div>
    </div>

    <!-- ===== ALERT MESSAGES ===== -->
    @if(session('success'))
        <div class="alert-success" id="successMessage">
            {{ session('success') }}
        </div>
        <script>
            setTimeout(function() {
                var msg = document.getElementById('successMessage');
                if (msg) {
                    msg.style.transition = 'opacity 0.5s';
                    msg.style.opacity = '0';
                    setTimeout(function() {
                        if (msg.parentNode) {
                            msg.remove();
                        }
                    }, 500);
                }
            }, 4000);
        </script>
    @endif

    @if(session('error'))
        <div class="alert-error" id="errorMessage">
            {{ session('error') }}
        </div>
        <script>
            setTimeout(function() {
                var msg = document.getElementById('errorMessage');
                if (msg) {
                    msg.style.transition = 'opacity 0.5s';
                    msg.style.opacity = '0';
                    setTimeout(function() {
                        if (msg.parentNode) {
                            msg.remove();
                        }
                    }, 500);
                }
            }, 4000);
        </script>
    @endif

    @if($errors->any())
        <div class="alert-error">
            @foreach($errors->all() as $error)
                <p style="margin: 2px 0;">• {{ $error }}</p>
            @endforeach
        </div>
    @endif

    <!-- ===== PROFILE SECTION ===== -->
    <div class="profile-section">
        <!-- LEFT: Profile Information -->
        <div class="profile-card">
            <div class="card-title">Profile Information</div>

            <div class="profile-avatar">
                <div class="avatar-wrapper">
                    <div class="avatar" id="profileAvatar" onclick="openPhotoModal()">
                        @if($admin->avatar && file_exists(storage_path('app/public/' . $admin->avatar)))
                            <img src="{{ asset('storage/' . $admin->avatar) }}?t={{ time() }}" alt="{{ $admin->name }}" id="avatarImage" style="width:100%;height:100%;border-radius:50%;object-fit:cover;">
                        @else
                            <span class="avatar-initial">{{ substr($admin->name, 0, 1) }}</span>
                        @endif
                    </div>
                </div>
                <div class="avatar-info">
                    <div class="name">{{ $admin->name }}</div>
                    <div class="role">Administrator</div>
                    <div class="position">{{ strtoupper($admin->position ?? 'Centre Manager') }}</div>
                </div>
            </div>

            <div class="profile-info">
                <div class="info-row">
                    <span class="info-label">Full Name</span>
                    <span class="info-value">{{ strtoupper($admin->name) }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">IC Number</span>
                    <span class="info-value">{{ $admin->ic_number }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Email</span>
                    <span class="info-value" style="text-transform: lowercase;">{{ $admin->email }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Phone Number</span>
                    <span class="info-value">{{ $admin->phone }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Position</span>
                    <span class="info-value">{{ strtoupper($admin->position ?? 'Centre Manager') }}</span>
                </div>
            </div>
        </div>

        <!-- RIGHT: Settings -->
        <div class="profile-card">
            <div class="card-title">Settings and Activity</div>

            <div class="settings-list">
                <!-- Edit Profile -->
                <div class="settings-item" onclick="openModal('editProfileModal')">
                    <div class="settings-left">
                        <div class="settings-icon">✎</div>
                        <div class="settings-text">
                            <div class="settings-title">Edit Profile</div>
                            <div class="settings-desc">Update your personal information</div>
                        </div>
                    </div>
                    <div class="settings-arrow">›</div>
                </div>

                <!-- Change Password -->
                <div class="settings-item" onclick="openModal('changePasswordModal')">
                    <div class="settings-left">
                        <div class="settings-icon">🔒︎</div>
                        <div class="settings-text">
                            <div class="settings-title">Change Password</div>
                            <div class="settings-desc">Update your password</div>
                        </div>
                    </div>
                    <div class="settings-arrow">›</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ===== PHOTO MODAL ===== -->
<div class="modal-overlay photo-modal" id="photoModal" onclick="closeModalOutside(event, 'photoModal')">
    <div class="modal-content">
        <div class="photo-header">
            <div class="photo-avatar" id="photoAvatar">
                @if($admin->avatar && file_exists(storage_path('app/public/' . $admin->avatar)))
                    <img src="{{ asset('storage/' . $admin->avatar) }}?t={{ time() }}" alt="{{ $admin->name }}" style="width:100%;height:100%;border-radius:50%;object-fit:cover;">
                @else
                    <span class="photo-initial">{{ substr($admin->name, 0, 1) }}</span>
                @endif
            </div>
            <h3>{{ strtoupper($admin->name) }}</h3>
            <p>Change Profile Photo</p>
        </div>
        <div class="photo-actions">
            <button class="photo-btn primary" onclick="document.getElementById('photoInput').click()">
                Upload Photo
            </button>
            <input type="file" id="photoInput" name="avatar" accept="image/*" style="display:none;" onchange="uploadAvatarFromModal(this)">
            @if($admin->avatar && file_exists(storage_path('app/public/' . $admin->avatar)))
                <button class="photo-btn danger" onclick="removeAvatar()">
                    Remove Current Photo
                </button>
            @endif
            <button class="photo-btn cancel" onclick="closeModal('photoModal')">
                Cancel
            </button>
        </div>
    </div>
</div>

<!-- ===== EDIT PROFILE MODAL ===== -->
<div class="modal-overlay" id="editProfileModal" onclick="closeModalOutside(event, 'editProfileModal')">
    <div class="modal-content">
        <div class="modal-header">
            <div class="modal-title">Edit Profile</div>
            <button class="modal-close" onclick="closeModal('editProfileModal')">✕</button>
        </div>

        <form method="POST" action="{{ route('admin.profile.update') }}">
            @csrf
            @method('PUT')

            @if($errors->any() && !str_contains($errors->first(), 'password'))
                <div style="background: #FEF2F2; color: #EF4444; padding: 12px 16px; border-radius: 8px; margin-bottom: 16px; border-left: 4px solid #EF4444; font-size: 13px;">
                    @foreach($errors->all() as $error)
                        <p style="margin: 2px 0;">• {{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="name" value="{{ old('name', $admin->name) }}" required>
                @error('name')
                    <div style="color: #EF4444; font-size: 12px; margin-top: 4px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>IC Number</label>
                <input type="text" name="ic_number" value="{{ old('ic_number', $admin->ic_number) }}" required>
                @error('ic_number')
                    <div style="color: #EF4444; font-size: 12px; margin-top: 4px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email', $admin->email) }}" required>
                @error('email')
                    <div style="color: #EF4444; font-size: 12px; margin-top: 4px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" name="phone" value="{{ old('phone', $admin->phone) }}" required>
                @error('phone')
                    <div style="color: #EF4444; font-size: 12px; margin-top: 4px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Position</label>
                <input type="text" name="position" value="{{ old('position', $admin->position ?? 'Centre Manager') }}" required>
                @error('position')
                    <div style="color: #EF4444; font-size: 12px; margin-top: 4px;">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn-submit blue">Save Changes</button>
        </form>
    </div>
</div>

<!-- ===== CHANGE PASSWORD MODAL ===== -->
<div class="modal-overlay" id="changePasswordModal" onclick="closeModalOutside(event, 'changePasswordModal')">
    <div class="modal-content">
        <div class="modal-header">
            <div class="modal-title">Change Password</div>
            <button class="modal-close" onclick="closeModal('changePasswordModal')">✕</button>
        </div>

        <form method="POST" action="{{ route('admin.profile.password') }}">
            @csrf

            @if($errors->any() && str_contains($errors->first(), 'password'))
                <div style="background: #FEF2F2; color: #EF4444; padding: 12px 16px; border-radius: 8px; margin-bottom: 16px; border-left: 4px solid #EF4444; font-size: 13px;">
                    @foreach($errors->all() as $error)
                        <p style="margin: 2px 0;">• {{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <div class="form-group">
                <label>Current Password</label>
                <input type="password" name="current_password" required>
                @error('current_password')
                    <div style="color: #EF4444; font-size: 12px; margin-top: 4px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>New Password</label>
                <input type="password" name="new_password" required>
                @error('new_password')
                    <div style="color: #EF4444; font-size: 12px; margin-top: 4px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Confirm New Password</label>
                <input type="password" name="new_password_confirmation" required>
                @error('new_password_confirmation')
                    <div style="color: #EF4444; font-size: 12px; margin-top: 4px;">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn-submit green">Change Password</button>
        </form>
    </div>
</div>

<script>
    function openModal(modalId) {
        document.getElementById(modalId).classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.remove('active');
        document.body.style.overflow = '';
    }

    function closeModalOutside(event, modalId) {
        if (event.target === event.currentTarget) {
            closeModal(modalId);
        }
    }

    function openPhotoModal() {
        openModal('photoModal');
    }

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            document.querySelectorAll('.modal-overlay.active').forEach(function(modal) {
                modal.classList.remove('active');
                document.body.style.overflow = '';
            });
        }
    });

    // Auto-open modal if there are validation errors
    document.addEventListener('DOMContentLoaded', function() {
        @if($errors->any())
            var errorMessages = @json($errors->all());
            var errorString = errorMessages.join(' ');
            
            if (errorString.includes('password') || errorString.includes('Current')) {
                document.getElementById('changePasswordModal').classList.add('active');
                document.body.style.overflow = 'hidden';
            } else {
                document.getElementById('editProfileModal').classList.add('active');
                document.body.style.overflow = 'hidden';
            }
        @endif
    });

    function uploadAvatarFromModal(input) {
        if (input.files && input.files[0]) {
            var file = input.files[0];
            
            if (file.size > 40 * 1024 * 1024) {
                alert('File is too large. Please select an image under 40MB.');
                input.value = '';
                return;
            }

            var formData = new FormData();
            formData.append('avatar', file);
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('_method', 'PUT');

            // Show loading state
            var avatarDiv = document.getElementById('profileAvatar');
            avatarDiv.innerHTML = '<span style="font-size:20px; color:white;">⏳</span>';
            
            var photoAvatar = document.getElementById('photoAvatar');
            photoAvatar.innerHTML = '<span style="font-size:32px; color:white;">⏳</span>';

            fetch('{{ route("admin.profile.avatar.update") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update both avatars
                    var avatarDiv = document.getElementById('profileAvatar');
                    avatarDiv.innerHTML = '<img src="{{ asset('storage/') }}/' + data.path + '?t=' + new Date().getTime() + '" alt="Avatar" style="width:100%;height:100%;border-radius:50%;object-fit:cover;">';
                    
                    var photoAvatar = document.getElementById('photoAvatar');
                    photoAvatar.innerHTML = '<img src="{{ asset('storage/') }}/' + data.path + '?t=' + new Date().getTime() + '" alt="Avatar" style="width:100%;height:100%;border-radius:50%;object-fit:cover;">';
                    
                    closeModal('photoModal');
                    showToast('Profile picture updated successfully!');
                    
                    setTimeout(function() {
                        location.reload();
                    }, 1500);
                } else {
                    alert('Upload failed: ' + data.message);
                    location.reload();
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error uploading image. Please try again.');
                location.reload();
            });
        }
    }

    function removeAvatar() {
        if (confirm('Are you sure you want to remove your profile picture?')) {
            fetch('{{ route("admin.profile.avatar.remove") }}', {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    var avatarDiv = document.getElementById('profileAvatar');
                    avatarDiv.innerHTML = '<span class="avatar-initial">{{ substr($admin->name, 0, 1) }}</span>';
                    
                    var photoAvatar = document.getElementById('photoAvatar');
                    if (photoAvatar) {
                        photoAvatar.innerHTML = '<span class="photo-initial">{{ substr($admin->name, 0, 1) }}</span>';
                    }
                    
                    closeModal('photoModal');
                    showToast('Profile picture removed successfully!');
                    
                    setTimeout(function() {
                        location.reload();
                    }, 1500);
                } else {
                    alert('Failed to remove profile picture: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error removing profile picture. Please try again.');
            });
        }
    }

    function showToast(message) {
        var toast = document.createElement('div');
        toast.className = 'toast';
        toast.textContent = message;
        document.body.appendChild(toast);
        
        setTimeout(function() {
            toast.style.opacity = '0';
            toast.style.transition = 'opacity 0.5s';
            setTimeout(function() {
                if (toast.parentNode) {
                    toast.remove();
                }
            }, 500);
        }, 3000);
    }
</script>
@endsection