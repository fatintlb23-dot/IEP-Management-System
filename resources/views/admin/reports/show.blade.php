@extends('layouts.admin')

@section('content')
<style>
    .page-wrapper {
        max-width: 1320px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* ===== HERO BANNER ===== */
    .hero-banner {
        background: linear-gradient(145deg, #244A87, #355D9E);
        border-radius: 24px;
        padding: 36px 44px;
        height: 180px;
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
        font-size: 34px;
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
        margin-top: 4px;
        font-weight: 400;
    }

    .hero-right {
        position: relative;
        z-index: 1;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 140px;
        height: 140px;
    }

    .hero-right .illustration {
        font-size: 80px;
        opacity: 0.85;
        filter: drop-shadow(0 8px 30px rgba(0, 0, 0, 0.08));
        animation: floatIllustration 5s ease-in-out infinite;
    }

    @keyframes floatIllustration {
        0%, 100% { transform: translateY(0px) scale(1); }
        50% { transform: translateY(-8px) scale(1.02); }
    }

    /* ===== ACTION BAR ===== */
    .action-bar {
        display: flex;
        justify-content: flex-end;
        gap: 12px;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }

    .action-bar .btn-print {
        padding: 10px 28px;
        background: linear-gradient(135deg, #2F4E8A, #4A6EB8);
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: 'Arial', 'Helvetica', sans-serif;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 2px 12px rgba(47, 78, 138, 0.15);
    }

    .action-bar .btn-print:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 20px rgba(47, 78, 138, 0.25);
    }

    .action-bar .btn-back {
        padding: 10px 28px;
        background: #F1F5F9;
        color: #64748B;
        border: 1px solid #E5E7EB;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-family: 'Arial', 'Helvetica', sans-serif;
    }

    .action-bar .btn-back:hover {
        background: #E5E7EB;
        color: #0B1E33;
    }

    /* ===== DOCUMENT STYLES ===== */
    .document-container {
        background: white;
        border-radius: 20px;
        box-shadow: 0 2px 16px rgba(0, 0, 0, 0.04);
        border: 1px solid #EEF2F6;
        overflow: hidden;
        padding: 40px 50px;
        font-family: 'Arial', 'Helvetica', sans-serif;
        color: #1a1a1a;
        line-height: 1.5;
    }

    /* ===== DOCUMENT HEADER ===== */
    .doc-header {
        text-align: center;
        border-bottom: 3px double #1a3a5c;
        padding-bottom: 20px;
        margin-bottom: 25px;
    }

    .doc-header .org-name {
        font-size: 20px;
        font-weight: 700;
        letter-spacing: 1px;
        color: #1a3a5c;
        text-transform: uppercase;
    }

    .doc-header .org-sub {
        font-size: 12px;
        color: #666;
        letter-spacing: 0.5px;
        margin-top: 2px;
    }

    .doc-header .doc-title {
        font-size: 24px;
        font-weight: 700;
        color: #1a3a5c;
        margin-top: 10px;
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    .doc-header .doc-subtitle {
        font-size: 15px;
        color: #444;
        font-weight: 600;
        margin-top: 4px;
    }

    .doc-header .doc-ref {
        font-size: 11px;
        color: #888;
        margin-top: 4px;
        font-style: italic;
    }

    /* ===== SUMMARY STATS ===== */
    .summary-stats-doc {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 12px;
        margin-bottom: 20px;
    }

    .summary-stat-doc {
        background: #f5f7fa;
        border-radius: 8px;
        padding: 12px 16px;
        text-align: center;
    }

    .summary-stat-doc .stat-number {
        font-size: 20px;
        font-weight: 700;
        color: #1a3a5c;
    }

    .summary-stat-doc .stat-label {
        font-size: 12px;
        color: #666;
    }

    /* ===== STUDENT INFO TABLE ===== */
    .student-info-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        border: 1px solid #e8e8e8;
        border-radius: 6px;
        overflow: hidden;
    }

    .student-info-table td {
        padding: 8px 12px;
        border-bottom: 1px solid #e8e8e8;
        font-size: 13px;
        font-family: 'Arial', 'Helvetica', sans-serif;
    }

    .student-info-table tr:last-child td {
        border-bottom: none;
    }

    .student-info-table .label {
        font-weight: 600;
        color: #444;
        background: #f5f7fa;
        width: 150px;
    }

    .student-info-table .value {
        color: #1a1a1a;
    }

    .student-info-table .value.highlight {
        font-weight: 600;
        color: #1a3a5c;
    }

    .student-info-table .value .diagnosis-text {
        font-weight: 600;
        color: #c0392b;
    }

    /* ===== GOALS TABLE ===== */
    .table-container-doc {
        overflow-x: auto;
    }

    .table-container-doc table {
        width: 100%;
        border-collapse: collapse;
        font-size: 13px;
        font-family: 'Arial', 'Helvetica', sans-serif;
    }

    .table-container-doc table thead th {
        text-align: left;
        padding: 10px 12px;
        font-weight: 600;
        color: #1a1a1a;
        border-bottom: 2px solid #1a3a5c;
        background: #f5f7fa;
        font-size: 12px;
        letter-spacing: 0.3px;
    }

    .table-container-doc table tbody td {
        padding: 10px 12px;
        border-bottom: 1px solid #e8e8e8;
        vertical-align: middle;
    }

    .table-container-doc table tbody tr:last-child td {
        border-bottom: none;
    }

    .table-container-doc table tbody td .goal-category {
        font-weight: 600;
        color: #1a3a5c;
    }

    .table-container-doc table tbody td .goal-desc {
        font-size: 13px;
    }

    .table-container-doc table tbody td .goal-methods {
        font-size: 12px;
        color: #555;
        font-style: italic;
    }

    .table-container-doc table tbody td .goal-target {
        font-size: 12px;
        color: #666;
        white-space: nowrap;
    }

    .table-container-doc table tbody td .progress-text {
        font-weight: 700;
        font-size: 14px;
    }

    .table-container-doc table tbody td .progress-text.completed {
        color: #27ae60;
    }

    /* ===== FOOTER ===== */
    .doc-footer {
        margin-top: 30px;
        padding-top: 20px;
        border-top: 2px solid #1a3a5c;
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 30px;
    }

    .doc-footer .signature-block {
        flex: 1;
        min-width: 180px;
    }

    .doc-footer .signature-block .sig-label {
        font-size: 12px;
        font-weight: 600;
        color: #444;
        margin-bottom: 2px;
        font-family: 'Arial', 'Helvetica', sans-serif;
    }

    .doc-footer .signature-block .sig-line {
        border-bottom: 1px solid #1a1a1a;
        width: 200px;
        height: 28px;
    }

    .doc-footer .signature-block .sig-name {
        font-size: 13px;
        font-weight: 600;
        color: #1a1a1a;
        margin-top: 2px;
        font-family: 'Arial', 'Helvetica', sans-serif;
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
        .summary-stats-doc {
            grid-template-columns: repeat(2, 1fr);
        }
        .document-container {
            padding: 30px 25px !important;
        }
        .student-info-table .label {
            width: 120px;
        }
    }

    @media (max-width: 768px) {
        .action-bar {
            justify-content: center;
            flex-wrap: wrap;
        }
        .action-bar .btn-print,
        .action-bar .btn-back {
            flex: 1;
            justify-content: center;
        }
        .document-container {
            padding: 20px 16px !important;
        }
        .summary-stats-doc {
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }
        .summary-stat-doc .stat-number {
            font-size: 18px;
        }
        .table-container-doc table thead th,
        .table-container-doc table tbody td {
            padding: 8px 10px;
            font-size: 12px;
        }
        .student-info-table td {
            font-size: 12px;
            padding: 6px 8px;
        }
        .student-info-table .label {
            width: 100px;
            font-size: 11px;
        }
        .doc-header .doc-title {
            font-size: 22px;
        }
        .doc-header .org-name {
            font-size: 18px;
        }
        .doc-footer {
            flex-direction: column;
            gap: 15px;
        }
        .doc-footer .signature-block .sig-line {
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
        .document-container {
            padding: 14px 12px !important;
        }
        .summary-stats-doc {
            grid-template-columns: 1fr 1fr;
            gap: 8px;
        }
        .summary-stat-doc {
            padding: 8px 10px;
        }
        .summary-stat-doc .stat-number {
            font-size: 16px;
        }
        .table-container-doc table thead th,
        .table-container-doc table tbody td {
            padding: 6px 8px;
            font-size: 11px;
        }
        .student-info-table td {
            font-size: 11px;
            padding: 4px 6px;
        }
        .student-info-table .label {
            width: 80px;
            font-size: 10px;
        }
        .doc-header .doc-title {
            font-size: 18px;
        }
        .doc-header .org-name {
            font-size: 16px;
        }
    }

    /* ===== PRINT STYLES ===== */
    @media print {
        body * {
            visibility: hidden !important;
        }
        
        .document-container,
        .document-container * {
            visibility: visible !important;
        }
        
        .document-container {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            width: 100% !important;
            padding: 30px 40px !important;
            box-shadow: none !important;
            border: none !important;
            border-radius: 0 !important;
            background: white !important;
            margin: 0 !important;
            z-index: 9999 !important;
        }

        .action-bar {
            display: none !important;
        }
        
        .hero-banner {
            display: none !important;
        }
        
        .page-wrapper {
            padding: 0 !important;
            margin: 0 !important;
            max-width: 100% !important;
        }

        .summary-stat-doc {
            background: #f5f5f5 !important;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

        .student-info-table .label {
            background: #f5f5f5 !important;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

        .table-container-doc table thead th {
            background: #f5f5f5 !important;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

        .doc-header {
            border-bottom: 3px double #1a3a5c !important;
        }

        .doc-footer {
            border-top: 2px solid #1a3a5c !important;
        }

        .doc-footer .signature-block .sig-line {
            border-bottom: 1px solid #1a1a1a !important;
        }
    }
</style>

<div class="page-wrapper">
    @php
        $totalAvg = 0;
        $count = count($data);
        foreach($data as $row) {
            $totalAvg += $row['avg_progress'];
        }
        $overallAvg = $count > 0 ? round($totalAvg / $count, 2) : 0;
        
        // Calculate students above 75% and below 50%
        $studentsAbove75 = 0;
        $studentsBelow50 = 0;
        foreach($data as $row) {
            if ($row['avg_progress'] >= 75) {
                $studentsAbove75++;
            } elseif ($row['avg_progress'] < 50) {
                $studentsBelow50++;
            }
        }
    @endphp

    <!-- ===== HERO BANNER ===== -->
    <div class="hero-banner">
        <div class="wave-pattern"></div>

        <div class="hero-left">
            <div class="hero-label">Report View</div>
            <h1>Overall <span>Progress Report</span></h1>
            <div class="hero-subtitle">Detailed overview of student progress.</div>
        </div>

        <div class="hero-right">
            <div class="illustration">📄</div>
        </div>
    </div>

    <!-- ===== ACTION BAR ===== -->
    <div class="action-bar">
        <button onclick="window.print()" class="btn-print">Print Document</button>
        <a href="{{ route('admin.reports.index') }}" class="btn-back">← Back</a>
    </div>

    <!-- ===== DOCUMENT ===== -->
    <div class="document-container" id="reportContent">
        <!-- Document Header -->
        <div class="doc-header">
            <div class="org-name">Ministry of Education</div>
            <div class="org-sub">Special Education Department</div>
            <div class="doc-title">Overall Progress Report</div>
            <div class="doc-subtitle">{{ $reportType }} Report</div>
            <div class="doc-ref">
                Teacher: {{ $teacherName }} | Period: {{ date('d M Y', strtotime($start)) }} to {{ date('d M Y', strtotime($end)) }} | Generated: {{ date('d/m/Y H:i') }}
            </div>
        </div>

        <!-- Summary Stats -->
        <div class="summary-stats-doc">
            <div class="summary-stat-doc">
                <div class="stat-number">{{ $count }}</div>
                <div class="stat-label">Total Students</div>
            </div>
            <div class="summary-stat-doc">
                <div class="stat-number">{{ $overallAvg }}%</div>
                <div class="stat-label">Overall Average</div>
            </div>
            <div class="summary-stat-doc">
                <div class="stat-number">{{ $studentsAbove75 }}</div>
                <div class="stat-label">Above 75%</div>
            </div>
            <div class="summary-stat-doc">
                <div class="stat-number">{{ $studentsBelow50 }}</div>
                <div class="stat-label">Below 50%</div>
            </div>
        </div>

        <!-- ===== STUDENT DETAILS & IEP GOALS ===== -->
        @foreach($data as $index => $row)
                @php
                    $student = $row['student'];
                    // Get goals directly from database
                    $goals = App\Models\IepGoal::where('student_id', $student->student_id)->get();
                    $progress = $row['avg_progress'];
                    $progressColor = $progress >= 70 ? '#22C55E' : ($progress >= 40 ? '#F59E0B' : '#EF4444');
                @endphp

            <div style="margin-bottom: 30px; border: 1px solid #e8e8e8; border-radius: 8px; overflow: hidden; page-break-inside: avoid;">
                <!-- Student Header -->
                <div style="background: #f5f7fa; padding: 14px 20px; border-bottom: 2px solid #1a3a5c; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;">
                    <div style="font-weight: 700; font-size: 16px; color: #1a3a5c; text-transform: uppercase; font-family: 'Arial', 'Helvetica', sans-serif;">
                        Student: {{ strtoupper($student->student_name) }}
                    </div>
                    <div style="font-size: 14px; color: #1a3a5c; font-weight: 600; font-family: 'Arial', 'Helvetica', sans-serif;">
                        Overall Progress: <span style="color: {{ $progressColor }};">{{ $progress }}%</span>
                    </div>
                </div>

                <!-- Student Info Table -->
                <table class="student-info-table">
                    <tr>
                        <td class="label">Student Name</td>
                        <td class="value highlight">{{ strtoupper($student->student_name) }}</td>
                        <td class="label">IC Number</td>
                        <td class="value">{{ $student->student_ic }}</td>
                    </tr>
                    <tr>
                        <td class="label">Diagnosis</td>
                        <td class="value"><span class="diagnosis-text">{{ $student->student_diagnosis }}</span></td>
                        <td class="label">Age</td>
                        <td class="value">{{ $student->student_age }} years</td>
                    </tr>
                    <tr>
                        <td class="label">Teacher</td>
                        <td class="value">{{ $student->teacher->name ?? 'Not assigned' }}</td>
                        <td class="label">Report Period</td>
                        <td class="value">{{ date('d M Y', strtotime($start)) }} to {{ date('d M Y', strtotime($end)) }}</td>
                    </tr>
                    <tr>
                        <td class="label">Strengths</td>
                        <td class="value">{{ $student->student_strengths ?: '-' }}</td>
                        <td class="label">Weaknesses</td>
                        <td class="value">{{ $student->student_weaknesses ?: '-' }}</td>
                    </tr>
                    <tr>
                        <td class="label">IEP Goals</td>
                        <td class="value" colspan="3"><strong>{{ $row['goals'] }}</strong> goals</td>
                    </tr>
                </table>

                <!-- Goals Table -->
                @if($row['goals'] > 0)
                    <div style="padding: 0 0 16px 0;">
                        <div style="padding: 12px 20px 8px 20px; font-weight: 600; font-size: 14px; color: #1a3a5c; font-family: 'Arial', 'Helvetica', sans-serif;">
                            IEP Goal Details
                        </div>
                        <div class="table-container-doc" style="padding: 0 20px;">
                            <table>
                                <thead>
                                    <tr>
                                        <th style="width:15%;">Category</th>
                                        <th style="width:30%;">Description</th>
                                        <th style="width:25%;">Methods / Strategies</th>
                                        <th style="width:15%;">Target Date</th>
                                        <th style="width:15%;">Progress</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($goals as $goal)
                                        @php
                                            $latestProgress = App\Models\Progress::where('goal_id', $goal->goal_id)->latest()->first();
                                            $goalPercent = $latestProgress ? $latestProgress->progress_percentage : 0;
                                            $isCompleted = $goalPercent >= 100;
                                        @endphp
                                        <tr>
                                            <td class="goal-category">{{ $goal->goal_category }}</td>
                                            <td class="goal-desc">{{ $goal->goal_description }}</td>
                                            <td class="goal-methods">{{ $goal->goal_methods ?? 'Not specified' }}</td>
                                            <td class="goal-target">{{ date('d/m/Y', strtotime($goal->goal_target_date)) }}</td>
                                            <td>
                                                <span class="progress-text {{ $isCompleted ? 'completed' : '' }}" style="color: {{ $goalPercent >= 70 ? '#22C55E' : ($goalPercent >= 40 ? '#F59E0B' : '#EF4444') }};">
                                                    {{ $goalPercent }}%
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        @endforeach

        <!-- Footer -->
        <div class="doc-footer">
            <div class="signature-block">
                <div class="sig-label">Administrator's Signature</div>
                <div class="sig-line"></div>
                <div class="sig-name">{{ auth()->user()->name }}</div>
            </div>
            <div class="signature-block">
                <div class="sig-label">Date</div>
                <div class="sig-line"></div>
                <div class="sig-name">{{ date('d/m/Y') }}</div>
            </div>
        </div>
    </div>
</div>
@endsection