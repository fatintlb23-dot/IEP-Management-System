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

    /* ===== STUDENT INFO CARD ===== */
    .student-info-card {
        background: white;
        border-radius: 16px;
        padding: 24px 28px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        border: 1px solid #EEF2F6;
        margin-bottom: 24px;
    }

    .student-info-card .student-header {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 16px;
    }

    .student-info-card .student-avatar {
        width: 64px;
        height: 64px;
        border-radius: 50%;
        background: linear-gradient(135deg, #4F7CFF, #7C3AED);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 28px;
        font-weight: 600;
        flex-shrink: 0;
        text-transform: uppercase;
    }

    .student-info-card .student-name-title {
        font-size: 24px;
        font-weight: 700;
        color: #0B1E33;
        text-transform: uppercase;
    }

    .student-info-card .student-details-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 8px 40px;
        padding-top: 16px;
        border-top: 1px solid #F1F5F9;
    }

    .student-info-card .student-details-grid .detail-item {
        display: flex;
        gap: 8px;
    }

    .student-info-card .student-details-grid .detail-item .detail-label {
        font-size: 14px;
        color: #64748B;
        min-width: 70px;
    }

    .student-info-card .student-details-grid .detail-item .detail-value {
        font-size: 14px;
        color: #0B1E33;
        font-weight: 500;
        text-transform: uppercase;
    }

    /* ===== GOAL CARDS ===== */
    .goal-card {
        background: white;
        border-radius: 16px;
        padding: 24px 28px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        border: 1px solid #EEF2F6;
        margin-bottom: 20px;
        transition: all 0.3s ease;
    }

    .goal-card:hover {
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
    }

    .goal-card .goal-title {
        font-size: 18px;
        font-weight: 700;
        color: #0B1E33;
        margin-bottom: 4px;
        text-transform: uppercase;
    }

    .goal-card .goal-description {
        font-size: 15px;
        color: #475569;
        margin-bottom: 14px;
        padding-left: 4px;
    }

    .goal-card .goal-meta {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px 40px;
        margin-bottom: 16px;
        padding: 12px 16px;
        background: #F8FAFC;
        border-radius: 8px;
    }

    .goal-card .goal-meta .meta-item {
        display: flex;
        flex-direction: column;
        gap: 1px;
    }

    .goal-card .goal-meta .meta-item .meta-label {
        font-size: 11px;
        font-weight: 600;
        color: #94A3B8;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .goal-card .goal-meta .meta-item .meta-value {
        font-size: 14px;
        color: #0B1E33;
        font-weight: 500;
    }

    .goal-card .goal-progress-section {
        display: flex;
        align-items: center;
        gap: 20px;
        padding: 16px 0;
        border-top: 1px solid #F1F5F9;
        flex-wrap: wrap;
    }

    .goal-card .goal-progress-section .progress-label {
        font-size: 14px;
        font-weight: 600;
        color: #0B1E33;
        min-width: 120px;
    }

    .goal-card .goal-progress-section .progress-wrapper {
        flex: 1;
        min-width: 150px;
    }

    .goal-card .goal-progress-section .progress-track {
        width: 100%;
        height: 8px;
        background: #F1F5F9;
        border-radius: 10px;
        overflow: hidden;
    }

    .goal-card .goal-progress-section .progress-track .progress-fill {
        height: 100%;
        border-radius: 10px;
        transition: width 0.8s ease;
        min-width: 4px;
    }

    .goal-card .goal-progress-section .progress-track .progress-fill.green { background: #22C55E; }
    .goal-card .goal-progress-section .progress-track .progress-fill.yellow { background: #F59E0B; }
    .goal-card .goal-progress-section .progress-track .progress-fill.red { background: #EF4444; }

    .goal-card .goal-progress-section .progress-percentage {
        font-size: 20px;
        font-weight: 700;
        min-width: 60px;
        text-align: center;
    }

    .goal-card .goal-notes {
        margin-top: 12px;
        padding: 12px 16px;
        background: #F8FAFC;
        border-radius: 8px;
        font-size: 14px;
        color: #64748B;
    }

    .goal-card .goal-notes strong {
        color: #0B1E33;
    }

    .goal-card .goal-updated {
        margin-top: 8px;
        font-size: 13px;
        color: #94A3B8;
        text-align: right;
    }

    /* ===== BACK BUTTON ===== */
    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
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
        font-family: inherit;
        margin-top: 8px;
    }

    .back-btn:hover {
        background: #E5E7EB;
        color: #0B1E33;
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
        .student-info-card .student-details-grid {
            grid-template-columns: 1fr;
            gap: 6px;
        }
        .goal-card .goal-meta {
            grid-template-columns: 1fr;
            gap: 8px;
        }
    }

    @media (max-width: 768px) {
        .student-info-card {
            padding: 18px;
        }
        .student-info-card .student-header {
            flex-direction: column;
            text-align: center;
        }
        .student-info-card .student-avatar {
            width: 56px;
            height: 56px;
            font-size: 24px;
        }
        .student-info-card .student-name-title {
            font-size: 20px;
        }
        .student-info-card .student-details-grid .detail-item {
            flex-direction: column;
            gap: 2px;
        }
        .goal-card {
            padding: 18px;
        }
        .goal-card .goal-title {
            font-size: 16px;
        }
        .goal-card .goal-progress-section {
            flex-direction: column;
            align-items: flex-start;
        }
        .goal-card .goal-progress-section .progress-percentage {
            text-align: left;
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
        .student-info-card {
            padding: 14px;
        }
        .goal-card {
            padding: 14px;
        }
        .goal-card .goal-meta {
            padding: 10px 12px;
        }
    }
</style>

<div class="page-wrapper">
    <!-- ===== HERO BANNER ===== -->
    <div class="hero-banner">
        <div class="wave-pattern"></div>

        <div class="hero-left">
            <div class="hero-label">📋 Student IEP Detail</div>
            <h1>IEP <span>Overview</span></h1>
            <div class="hero-subtitle">View detailed IEP goals and progress for the student.</div>
        </div>

        <div class="hero-right">
            <div class="illustration">📋</div>
        </div>
    </div>

    <!-- ===== STUDENT INFO CARD ===== -->
    <div class="student-info-card">
        <div class="student-header">
            <div class="student-avatar">{{ substr($student->student_name, 0, 1) }}</div>
            <div class="student-name-title">{{ strtoupper($student->student_name) }}</div>
        </div>

        <div class="student-details-grid">
            <div class="detail-item">
                <span class="detail-label">Diagnosis</span>
                <span class="detail-value">{{ $student->student_diagnosis }}</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Age</span>
                <span class="detail-value">{{ $student->student_age }} years old</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">IC Number</span>
                <span class="detail-value">{{ $student->student_ic }}</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Teacher</span>
                <span class="detail-value">{{ $student->teacher ? strtoupper($student->teacher->name) : '-' }}</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Parent</span>
                <span class="detail-value">{{ $student->parent ? strtoupper($student->parent->name) : '-' }}</span>
            </div>
        </div>
    </div>

    <!-- ===== IEP GOALS ===== -->
    @forelse($goals as $goal)
    @php
        $latestProgress = App\Models\Progress::where('goal_id', $goal->goal_id)->latest()->first();
        $percent = $latestProgress ? $latestProgress->progress_percentage : 0;
        $color = $percent >= 70 ? '#22C55E' : ($percent >= 40 ? '#F59E0B' : '#EF4444');
        $bgColor = $percent >= 70 ? 'green' : ($percent >= 40 ? 'yellow' : 'red');
    @endphp
    <div class="goal-card">
        <div class="goal-title">{{ $goal->goal_category }}</div>
        <div class="goal-description">{{ $goal->goal_description }}</div>

        <div class="goal-meta">
            <div class="meta-item">
                <span class="meta-label">Target Date</span>
                <span class="meta-value">{{ date('d M Y', strtotime($goal->goal_target_date)) }}</span>
            </div>
            <div class="meta-item">
                <span class="meta-label">Methods / Strategies</span>
                <span class="meta-value">{{ $goal->goal_methods }}</span>
            </div>
        </div>

        <div class="goal-progress-section">
            <span class="progress-label">Current Progress</span>
            <div class="progress-wrapper">
                <div class="progress-track">
                    <div class="progress-fill {{ $bgColor }}" style="width: {{ $percent > 0 ? $percent : 0 }}%; min-width: {{ $percent > 0 ? '4px' : '0' }};"></div>
                </div>
            </div>
            <span class="progress-percentage" style="color: {{ $color }};">
                {{ $percent > 0 ? $percent . '%' : 'No data' }}
            </span>
        </div>

        @if($latestProgress && $latestProgress->progress_notes)
        <div class="goal-notes">
            <strong>Teacher Notes:</strong> {{ $latestProgress->progress_notes }}
        </div>
        @endif

        <div class="goal-updated">
            Last Updated: {{ $latestProgress ? date('d M Y', strtotime($latestProgress->created_at)) : 'No progress recorded' }}
        </div>
    </div>
    @empty
    <div style="background: white; border-radius: 16px; padding: 40px; text-align: center; border: 1px solid #EEF2F6;">
        <p style="color: #94A3B8; font-size: 16px;">No IEP goals have been set for this student.</p>
    </div>
    @endforelse

    <!-- ===== BACK BUTTON ===== -->
    <a href="{{ route('admin.ieps.index') }}" class="back-btn">
        ← Back to IEPs
    </a>
</div>
@endsection