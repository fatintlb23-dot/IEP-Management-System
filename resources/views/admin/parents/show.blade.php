@extends('layouts.admin')

@section('content')
<style>
    .page-wrapper {
        max-width: 900px;
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

    /* ===== DETAIL CARD ===== */
    .detail-card {
        background: white;
        border-radius: 16px;
        padding: 32px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        border: 1px solid #EEF2F6;
    }

    .detail-card .profile-header {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 24px;
        padding-bottom: 20px;
        border-bottom: 1px solid #EEF2F6;
    }

    .detail-card .profile-header .avatar {
        width: 72px;
        height: 72px;
        border-radius: 50%;
        background: linear-gradient(135deg, #4F7CFF, #7C3AED);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 32px;
        font-weight: 600;
        flex-shrink: 0;
    }

    .detail-card .profile-header .info .name {
        font-size: 24px;
        font-weight: 700;
        color: #0B1E33;
    }

    .detail-card .profile-header .info .status {
        margin-top: 4px;
    }

    .detail-card .details-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px 40px;
    }

    .detail-card .details-grid .detail-item {
        display: flex;
        flex-direction: column;
        gap: 2px;
    }

    .detail-card .details-grid .detail-item .label {
        font-size: 11px;
        font-weight: 600;
        color: #94A3B8;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .detail-card .details-grid .detail-item .value {
        font-size: 15px;
        color: #0B1E33;
        font-weight: 500;
    }

    .detail-card .actions {
        display: flex;
        gap: 12px;
        margin-top: 28px;
        padding-top: 20px;
        border-top: 1px solid #EEF2F6;
    }

    .detail-card .actions .btn-back {
        background: #F1F5F9;
        color: #64748B;
        border: none;
        padding: 10px 24px;
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

    .detail-card .actions .btn-back:hover {
        background: #E5E7EB;
        color: #0B1E33;
    }

    .detail-card .actions .btn-edit {
        background: #4F7CFF;
        color: white;
        border: none;
        padding: 10px 24px;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: inherit;
    }

    .detail-card .actions .btn-edit:hover {
        background: #3B6AE8;
        transform: translateY(-2px);
        box-shadow: 0 4px 16px rgba(79, 124, 255, 0.25);
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 4px 14px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 500;
    }

    .status-badge .dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        display: inline-block;
    }

    .status-badge.active {
        background: #ECFDF5;
        color: #22C55E;
    }
    .status-badge.active .dot { background: #22C55E; }

    .status-badge.pending {
        background: #FFFBEB;
        color: #F59E0B;
    }
    .status-badge.pending .dot { background: #F59E0B; }

    .status-badge.rejected {
        background: #FEF2F2;
        color: #EF4444;
    }
    .status-badge.rejected .dot { background: #EF4444; }

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
        .detail-card .details-grid {
            grid-template-columns: 1fr;
            gap: 12px;
        }
    }

    @media (max-width: 768px) {
        .detail-card {
            padding: 20px;
        }
        .detail-card .profile-header {
            flex-direction: column;
            text-align: center;
        }
        .detail-card .profile-header .avatar {
            width: 60px;
            height: 60px;
            font-size: 24px;
        }
        .detail-card .profile-header .info .name {
            font-size: 20px;
        }
        .detail-card .actions {
            flex-direction: column;
        }
        .detail-card .actions .btn-back,
        .detail-card .actions .btn-edit {
            width: 100%;
            justify-content: center;
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
        .detail-card {
            padding: 16px;
        }
        .detail-card .profile-header .avatar {
            width: 50px;
            height: 50px;
            font-size: 20px;
        }
        .detail-card .profile-header .info .name {
            font-size: 17px;
        }
    }
</style>

<div class="page-wrapper">
    <!-- ===== HERO BANNER ===== -->
    <div class="hero-banner">
        <div class="wave-pattern"></div>

        <div class="hero-left">
            <div class="hero-label">👨‍👩‍👧 Parent Details</div>
            <h1>Parent <span>Profile</span></h1>
            <div class="hero-subtitle">View detailed information about the parent account.</div>
        </div>

        <div class="hero-right">
            <div class="illustration">👨‍👩‍👧</div>
        </div>
    </div>

    <!-- ===== DETAIL CARD ===== -->
    <div class="detail-card">
        <div class="profile-header">
            <div class="avatar">{{ substr($parent->name, 0, 1) }}</div>
            <div class="info">
                <div class="name">{{ $parent->name }}</div>
                <div class="status">
                    @if($parent->status == 'active')
                        <span class="status-badge active"><span class="dot"></span>Active</span>
                    @elseif($parent->status == 'pending')
                        <span class="status-badge pending"><span class="dot"></span>Pending</span>
                    @else
                        <span class="status-badge rejected"><span class="dot"></span>Rejected</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="details-grid">
            <div class="detail-item">
                <span class="label">Full Name</span>
                <span class="value">{{ $parent->name }}</span>
            </div>
            <div class="detail-item">
                <span class="label">IC Number</span>
                <span class="value">{{ $parent->ic_number }}</span>
            </div>
            <div class="detail-item">
                <span class="label">Email Address</span>
                <span class="value">{{ $parent->email }}</span>
            </div>
            <div class="detail-item">
                <span class="label">Phone Number</span>
                <span class="value">{{ $parent->phone }}</span>
            </div>
            <div class="detail-item">
                <span class="label">Home Address</span>
                <span class="value">{{ $parent->address ?? 'Not provided' }}</span>
            </div>
            <div class="detail-item">
                <span class="label">Relationship</span>
                <span class="value">{{ $parent->relationship ?? 'Not specified' }}</span>
            </div>
            <div class="detail-item">
                <span class="label">Linked Student</span>
                <span class="value">{{ $child ? $child->student_name : 'Not linked' }}</span>
            </div>
            <div class="detail-item">
                <span class="label">Registration Date</span>
                <span class="value">{{ $parent->created_at->format('d F Y') }}</span>
            </div>
        </div>

        <div class="actions">
            <a href="{{ route('admin.parents.index') }}" class="btn-back">← Back</a>
            <button class="btn-edit" onclick="window.location.href='{{ route('admin.parents.edit', $parent->id) }}'">✎ Edit Profile</button>
        </div>
    </div>
</div>
@endsection