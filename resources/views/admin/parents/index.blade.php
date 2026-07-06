@extends('layouts.admin')

@section('content')
<style>
    .page-wrapper {
        max-width: 1440px;
        margin: 0 auto;
        position: relative;
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

    /* ===== MAIN CONTENT ===== */
    .main-content {
        display: flex;
        gap: 24px;
        transition: all 0.3s ease;
        align-items: flex-start;
    }

    .main-content .left-section {
        flex: 1;
        min-width: 0;
        transition: all 0.3s ease;
    }

    .main-content .left-section.shrink {
        flex: 0 0 70%;
        max-width: 70%;
    }

    .main-content .right-section {
        flex: 0 0 30%;
        max-width: 30%;
        display: none;
        position: sticky;
        top: 20px;
        animation: slideIn 0.3s ease;
    }

    .main-content .right-section.active {
        display: block;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateX(20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* ===== FILTER TABS + SEARCH ===== */
    .filter-search-bar {
        display: flex;
        align-items: center;
        gap: 16px;
        background: white;
        padding: 8px 20px;
        border-radius: 16px;
        border: 1px solid #EEF2F6;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        margin-bottom: 20px;
        flex-wrap: wrap;
    }

    .filter-tabs {
        display: flex;
        gap: 6px;
        flex-wrap: wrap;
        flex: 2;
    }

    .filter-tab {
        padding: 8px 18px;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 500;
        color: #64748B;
        cursor: pointer;
        transition: all 0.3s ease;
        border: none;
        background: none;
        font-family: inherit;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .filter-tab:hover {
        background: #F1F5F9;
        color: #0B1E33;
    }

    .filter-tab.active {
        background: #EEF4FF;
        color: #4F7CFF;
    }

    .filter-tab .tab-count {
        background: #F1F5F9;
        color: #64748B;
        padding: 0px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }

    .filter-tab.active .tab-count {
        background: #4F7CFF;
        color: white;
    }

    .filter-tab .tab-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        display: inline-block;
    }

    .filter-tab .tab-dot.all { background: #4F7CFF; }
    .filter-tab .tab-dot.pending { background: #F59E0B; }
    .filter-tab .tab-dot.active { background: #22C55E; }
    .filter-tab .tab-dot.rejected { background: #EF4444; }

    /* ===== SEARCH INPUT ===== */
    .search-input-wrapper {
        display: flex;
        align-items: center;
        gap: 12px;
        background: #F8FAFC;
        border-radius: 10px;
        padding: 0 18px;
        border: 1px solid #EEF2F6;
        transition: all 0.3s ease;
        flex: 1.5;
        min-width: 280px;
        max-width: 450px;
    }

    .search-input-wrapper:focus-within {
        border-color: #4F7CFF;
        box-shadow: 0 0 0 3px rgba(79, 124, 255, 0.08);
        background: white;
    }

    .search-input-wrapper .search-icon {
        color: #94A3B8;
        font-size: 16px;
    }

    .search-input-wrapper input {
        border: none;
        background: transparent;
        padding: 10px 0;
        font-size: 14px;
        color: #0B1E33;
        width: 100%;
        outline: none;
        font-family: inherit;
    }

    .search-input-wrapper input::placeholder {
        color: #94A3B8;
    }

    /* ===== TABLE ===== */
    .table-container {
        background: white;
        border-radius: 16px;
        padding: 20px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        border: 1px solid #EEF2F6;
        overflow-x: auto;
    }

    .table-container table {
        width: 100%;
        border-collapse: collapse;
    }

    .table-container table thead th {
        text-align: left;
        padding: 12px 14px;
        font-size: 11px;
        font-weight: 600;
        color: #94A3B8;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border-bottom: 1px solid #EEF2F6;
        white-space: nowrap;
    }

    .table-container table tbody td {
        padding: 12px 14px;
        font-size: 14px;
        color: #0B1E33;
        border-bottom: 1px solid #F1F5F9;
        vertical-align: middle;
    }

    .table-container table tbody tr:last-child td {
        border-bottom: none;
    }

    .table-container table tbody tr:hover {
        background: #F8FAFC;
    }

    .table-container table tbody td .parent-name {
        font-weight: 600;
        color: #0B1E33;
        text-transform: uppercase;
    }

    /* ===== STATUS BADGE ===== */
    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 4px 14px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 500;
    }

    .status-badge .dot {
        width: 6px;
        height: 6px;
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

    /* ===== ACTION BUTTONS ===== */
    .action-btns {
        display: flex;
        align-items: center;
        gap: 6px;
        flex-wrap: wrap;
    }

    .action-btns .btn-view {
        background: #EEF4FF;
        color: #4F7CFF;
        border: none;
        padding: 6px 14px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        gap: 6px;
        font-family: inherit;
    }

    .action-btns .btn-view:hover {
        background: #DBEAFE;
    }

    .action-btns .btn-delete {
        background: #FEF2F2;
        color: #EF4444;
        border: 1px solid #FEE2E2;
        padding: 6px 14px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
        font-family: inherit;
    }

    .action-btns .btn-delete:hover {
        background: #FEE2E2;
        border-color: #FCA5A5;
    }

    /* ===== DETAILS PANEL ===== */
    .details-panel {
        background: white;
        border-radius: 16px;
        padding: 24px 28px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.06);
        border: 1px solid #EEF2F6;
        max-height: 80vh;
        overflow-y: auto;
    }

    .details-panel::-webkit-scrollbar {
        width: 4px;
    }

    .details-panel::-webkit-scrollbar-track {
        background: #F1F5F9;
        border-radius: 4px;
    }

    .details-panel::-webkit-scrollbar-thumb {
        background: #CBD5E1;
        border-radius: 4px;
    }

    .panel-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 20px;
        padding-bottom: 16px;
        border-bottom: 1px solid #EEF2F6;
    }

    .panel-header .panel-title {
        font-size: 18px;
        font-weight: 600;
        color: #0B1E33;
    }

    .panel-header .panel-close {
        background: none;
        border: none;
        font-size: 20px;
        color: #94A3B8;
        cursor: pointer;
        transition: color 0.2s;
        padding: 4px;
    }

    .panel-header .panel-close:hover {
        color: #0B1E33;
    }

    .panel-profile {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 20px;
        padding: 16px;
        background: #F8FAFC;
        border-radius: 12px;
    }

    .panel-profile .profile-avatar {
        width: 56px;
        height: 56px;
        border-radius: 50%;
        background: linear-gradient(135deg, #4F7CFF, #7C3AED);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 24px;
        font-weight: 600;
        flex-shrink: 0;
        text-transform: uppercase;
    }

    .panel-profile .profile-info .profile-name {
        font-size: 18px;
        font-weight: 700;
        color: #0B1E33;
        text-transform: uppercase;
    }

    .panel-profile .profile-info .profile-status {
        margin-top: 4px;
    }

    .panel-body {
        display: flex;
        flex-direction: column;
        gap: 14px;
    }

    .panel-body .info-group {
        display: flex;
        flex-direction: column;
        gap: 2px;
    }

    .panel-body .info-group .info-label {
        font-size: 11px;
        font-weight: 600;
        color: #94A3B8;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .panel-body .info-group .info-value {
        font-size: 14px;
        color: #0B1E33;
        font-weight: 500;
    }

    .panel-body .info-group .info-value .status-badge {
        font-size: 12px;
        text-transform: none;
    }

    .panel-divider {
        height: 1px;
        background: #EEF2F6;
        margin: 4px 0;
    }

    /* ===== APPROVE/REJECT BUTTONS IN PANEL ===== */
    .btn-approve-panel {
        background: #ECFDF5;
        color: #22C55E;
        border: 1px solid #A7F3D0;
        padding: 8px 24px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        font-family: inherit;
        transition: all 0.2s;
    }
    .btn-approve-panel:hover {
        background: #D1FAE5;
    }

    .btn-reject-panel {
        background: #FEF2F2;
        color: #EF4444;
        border: 1px solid #FCA5A5;
        padding: 8px 24px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        font-family: inherit;
        transition: all 0.2s;
    }
    .btn-reject-panel:hover {
        background: #FEE2E2;
    }

    /* ===== REJECTION MODAL ===== */
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
    }

    .modal-overlay.active {
        display: flex;
    }

    .modal {
        background: white;
        border-radius: 16px;
        padding: 32px;
        max-width: 500px;
        width: 90%;
        max-height: 90vh;
        overflow-y: auto;
        box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        animation: modalSlideIn 0.3s ease;
    }

    @keyframes modalSlideIn {
        from {
            transform: translateY(-30px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .modal-header {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 20px;
        padding-bottom: 16px;
        border-bottom: 2px solid #f1f5f9;
    }

    .modal-header .icon {
        font-size: 28px;
    }

    .modal-header h3 {
        font-size: 20px;
        color: #0b1e33;
        margin: 0;
    }

    .modal-body {
        margin-bottom: 24px;
    }

    .modal-body .modal-info {
        color: #64748b;
        font-size: 14px;
        margin-bottom: 16px;
    }

    .modal-body .modal-info strong {
        color: #0b1e33;
    }

    .form-group {
        margin-bottom: 18px;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        font-size: 14px;
        color: #0b1e33;
        margin-bottom: 6px;
    }

    .form-group label .optional {
        font-weight: 400;
        color: #94a3b8;
        font-size: 12px;
    }

    .form-group label .required {
        color: #ef4444;
    }

    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 10px 14px;
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        font-size: 14px;
        font-family: inherit;
        transition: all 0.3s ease;
        background: #f8fafc;
    }

    .form-group select:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #3A5EA8;
        box-shadow: 0 0 0 3px rgba(58, 94, 168, 0.08);
        background: white;
    }

    .form-group textarea {
        resize: vertical;
        min-height: 80px;
    }

    .modal-footer {
        display: flex;
        justify-content: flex-end;
        gap: 12px;
        padding-top: 16px;
        border-top: 2px solid #f1f5f9;
    }

    .btn-cancel {
        padding: 10px 24px;
        background: #f1f5f9;
        color: #64748b;
        border: none;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: inherit;
    }

    .btn-cancel:hover {
        background: #e2e8f0;
        color: #0b1e33;
    }

    .btn-reject-modal {
        padding: 10px 28px;
        background: #dc2626;
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: inherit;
    }

    .btn-reject-modal:hover {
        background: #b91c1c;
        transform: translateY(-2px);
        box-shadow: 0 4px 16px rgba(220, 38, 38, 0.3);
    }

    /* ===== PAGINATION ===== */
    .pagination-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 16px;
        flex-wrap: wrap;
        gap: 12px;
    }

    .pagination-section .pagination-info {
        font-size: 14px;
        color: #94A3B8;
    }

    .pagination-section .pagination-info strong {
        color: #0B1E33;
    }

    .pagination-section .pagination-links {
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .pagination-section .pagination-links a,
    .pagination-section .pagination-links span {
        padding: 8px 14px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 500;
        color: #64748B;
        text-decoration: none;
        transition: all 0.2s ease;
        border: 1px solid transparent;
    }

    .pagination-section .pagination-links a:hover {
        background: #F1F5F9;
    }

    .pagination-section .pagination-links .active span {
        background: #4F7CFF;
        color: white;
        border-color: #4F7CFF;
        border-radius: 8px;
    }

    .pagination-section .pagination-links .disabled span {
        color: #CBD5E1;
        cursor: not-allowed;
    }

    /* ===== ALERTS ===== */
    .alert {
        padding: 14px 20px;
        border-radius: 12px;
        margin-bottom: 20px;
        font-size: 14px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .alert-success {
        background: #ECFDF5;
        color: #22C55E;
        border-left: 4px solid #22C55E;
    }

    .alert-error {
        background: #FEF2F2;
        color: #EF4444;
        border-left: 4px solid #EF4444;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 1200px) {
        .main-content .left-section.shrink {
            flex: 0 0 100%;
            max-width: 100%;
        }
        .main-content .right-section {
            flex: 0 0 100%;
            max-width: 100%;
            position: static;
        }
        .main-content {
            flex-direction: column;
        }
        .search-input-wrapper {
            min-width: 220px;
            max-width: 100%;
        }
    }

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
        .search-input-wrapper {
            min-width: 200px;
        }
    }

    @media (max-width: 768px) {
        .filter-search-bar {
            flex-direction: column;
            align-items: stretch;
            padding: 12px 16px;
        }
        .filter-tabs {
            justify-content: center;
            flex: 1;
        }
        .filter-tab {
            padding: 6px 14px;
            font-size: 13px;
        }
        .search-input-wrapper {
            min-width: auto;
            max-width: 100%;
            flex: 1;
        }
        .table-container {
            padding: 12px;
        }
        .table-container table thead th,
        .table-container table tbody td {
            padding: 8px 10px;
            font-size: 12px;
        }
        .action-btns {
            flex-direction: column;
        }
        .action-btns .btn-view,
        .action-btns .btn-delete {
            width: 100%;
            text-align: center;
            justify-content: center;
        }
        .details-panel {
            padding: 18px;
        }
        .panel-profile {
            padding: 12px;
        }
        .panel-profile .profile-avatar {
            width: 44px;
            height: 44px;
            font-size: 18px;
        }
        .panel-profile .profile-info .profile-name {
            font-size: 16px;
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
        .pagination-section {
            flex-direction: column;
            align-items: center;
        }
        .modal {
            padding: 24px;
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
        .filter-tab {
            font-size: 11px;
            padding: 4px 10px;
        }
        .filter-tab .tab-count {
            font-size: 10px;
            padding: 0px 6px;
        }
        .search-input-wrapper {
            padding: 0 12px;
        }
        .search-input-wrapper input {
            font-size: 13px;
            padding: 8px 0;
        }
        .table-container table thead th,
        .table-container table tbody td {
            padding: 6px 8px;
            font-size: 11px;
        }
        .details-panel {
            padding: 14px;
        }
        .modal {
            padding: 18px;
        }
        .modal-footer {
            flex-direction: column;
        }
        .modal-footer button {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<div class="page-wrapper">
    <!-- ===== HERO BANNER ===== -->
    <div class="hero-banner">
        <div class="wave-pattern"></div>

        <div class="hero-left">
            <div class="hero-label">Parent Management</div>
            <h1>Manage <span>Parent Accounts</span></h1>
            <div class="hero-subtitle">Review and approve or reject parent account registrations.</div>
        </div>

        <div class="hero-right">
            <div class="illustration">👨‍👩‍👧</div>
        </div>
    </div>

    @php
        $totalParents = App\Models\User::where('role', 'parent')->count();
        $pendingParents = App\Models\User::where('role', 'parent')->where('status', 'pending')->count();
        $activeParents = App\Models\User::where('role', 'parent')->where('status', 'active')->count();
        $rejectedParents = App\Models\User::where('role', 'parent')->where('status', 'rejected')->count();
    @endphp

    <!-- ===== ALERTS ===== -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif

    <!-- ===== MAIN CONTENT ===== -->
    <div class="main-content" id="mainContent">
        <!-- LEFT SECTION -->
        <div class="left-section" id="leftSection">
            <!-- ===== FILTER TABS + SEARCH ===== -->
            <div class="filter-search-bar">
                <div class="filter-tabs">
                    <button class="filter-tab active" data-filter="all" onclick="filterParents('all')">
                        <span class="tab-dot all"></span>
                        All
                        <span class="tab-count">{{ $totalParents }}</span>
                    </button>
                    <button class="filter-tab" data-filter="pending" onclick="filterParents('pending')">
                        <span class="tab-dot pending"></span>
                        Pending
                        <span class="tab-count">{{ $pendingParents }}</span>
                    </button>
                    <button class="filter-tab" data-filter="active" onclick="filterParents('active')">
                        <span class="tab-dot active"></span>
                        Approved
                        <span class="tab-count">{{ $activeParents }}</span>
                    </button>
                    <button class="filter-tab" data-filter="rejected" onclick="filterParents('rejected')">
                        <span class="tab-dot rejected"></span>
                        Rejected
                        <span class="tab-count">{{ $rejectedParents }}</span>
                    </button>
                </div>

                <div class="search-input-wrapper">
                    <span class="search-icon">🔍︎</span>
                    <input type="text" id="parentSearch" placeholder="Search by name, email or IC number..." onkeyup="searchParents()">
                </div>
            </div>

            <!-- ===== TABLE ===== -->
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Parent Name</th>
                            <th>Email</th>
                            <th>Linked Student</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="parentTableBody">
                        @forelse($parents as $index => $parent)
                        @php
                            $child = App\Models\Student::where('parent_id', $parent->id)->first();
                            $cleanPhone = str_replace('-', '', $parent->phone ?? '');
                            $formattedPhone = $cleanPhone && strlen($cleanPhone) >= 6 ? substr($cleanPhone, 0, 3) . '-' . substr($cleanPhone, 3) : ($parent->phone ?? '-');
                        @endphp
                        <tr class="parent-row" data-id="{{ $parent->id }}" data-status="{{ $parent->status }}" data-name="{{ strtolower($parent->name) }}" data-ic="{{ $parent->ic_number }}" data-email="{{ strtolower($parent->email) }}">
                            <td>{{ $parents->firstItem() + $index }}</td>
                            <td>
                                <div class="parent-name">{{ strtoupper($parent->name) }}</div>
                            </td>
                            <td>{{ $parent->email }}</td>
                            <td>
                                {{ $child ? strtoupper($child->student_name) : '-' }}
                            </td>
                            <td>{{ $formattedPhone }}</td>
                            <td>
                                @if($parent->status == 'active')
                                    <span class="status-badge active"><span class="dot"></span>Active</span>
                                @elseif($parent->status == 'pending')
                                    <span class="status-badge pending"><span class="dot"></span>Pending</span>
                                @else
                                    <span class="status-badge rejected"><span class="dot"></span>Rejected</span>
                                @endif
                            </td>
                            <td>
                                <div class="action-btns">
                                    <button class="btn-view" onclick="showDetails({{ $parent->id }}, '{{ addslashes($parent->name) }}', '{{ $parent->ic_number }}', '{{ $parent->email }}', '{{ $parent->phone }}', '{{ addslashes($parent->address) }}', '{{ $parent->relationship }}', '{{ $parent->status }}', '{{ $parent->created_at }}', '{{ $child ? addslashes($child->student_name) : '' }}')"> View</button>
                                    <form method="POST" action="{{ route('admin.parents.destroy', $parent->id) }}" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this parent?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" style="text-align: center; padding: 40px 20px; color: #94A3B8;">
                                No parents found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- ===== PAGINATION ===== -->
                <div class="pagination-section">
                    <div class="pagination-info">
                        Showing <strong id="showingStart">{{ $parents->firstItem() ?? 0 }}</strong> to <strong id="showingEnd">{{ $parents->lastItem() ?? 0 }}</strong> of <strong id="totalCount">{{ $parents->total() }}</strong> parents
                    </div>
                    <div class="pagination-links" id="paginationLinks">
                        {{ $parents->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGHT SECTION - DETAILS PANEL -->
        <div class="right-section" id="rightSection">
            <div class="details-panel" id="detailsPanel">
                <div class="panel-header">
                    <span class="panel-title">Parent Details</span>
                    <button class="panel-close" onclick="closeDetails()">✕</button>
                </div>

                <div class="panel-profile">
                    <div class="profile-avatar" id="profileAvatar">S</div>
                    <div class="profile-info">
                        <div class="profile-name" id="profileName">Loading...</div>
                        <div class="profile-status" id="profileStatus"></div>
                    </div>
                </div>

                <div class="panel-body" id="panelBody">
                    <!-- Dynamic content will be loaded here -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ============================================ -->
<!-- REJECTION MODAL -->
<!-- ============================================ -->
<div class="modal-overlay" id="rejectModal">
    <div class="modal">
        <div class="modal-header">
            <span class="icon"></span>
            <h3>Reject Parent Registration</h3>
        </div>
        
        <form id="rejectForm" method="POST">
            @csrf
            <div class="modal-body">
                <p class="modal-info">
                    You are about to reject <strong id="modalParentName"></strong>'s registration.
                </p>
                
                <div class="form-group">
                    <label>Reason for Rejection <span class="required">*</span></label>
                    <select name="reason" id="reasonSelect" required>
                        <option value="">-- Select a reason --</option>
                        <option value="Child is not enrolled in this school">⚠️ Child is not enrolled in this school</option>
                        <option value="Student IC number not found in our system">⚠️ Student IC number not found</option>
                        <option value="Duplicate registration - account already exists">⚠️ Duplicate registration</option>
                        <option value="Incomplete or invalid information provided">⚠️ Incomplete or invalid information</option>
                        <option value="Unable to verify parent-child relationship">⚠️ Unable to verify relationship</option>
                        <option value="School policy violation">⚠️ School policy violation</option>
                        <option value="Suspicious activity detected">⚠️ Suspicious activity detected</option>
                        <option value="Other (please specify in notes)">⚠️ Other (specify in notes)</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Additional Notes <span class="optional">(Optional)</span></label>
                    <textarea name="notes" id="notesInput" placeholder="Please provide any additional details or context for this rejection..."></textarea>
                </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn-cancel" onclick="closeRejectModal()">Cancel</button>
                <button type="submit" class="btn-reject-modal" onclick="return confirm('Are you sure you want to reject this parent?')">
                    Reject Registration
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    let currentFilter = 'all';
    let currentParentId = null;

    // ===== FILTER FUNCTIONS =====
    function filterParents(filter) {
        currentFilter = filter;
        
        document.querySelectorAll('.filter-tab').forEach(tab => {
            tab.classList.remove('active');
            if (tab.dataset.filter === filter) {
                tab.classList.add('active');
            }
        });
        
        const rows = document.querySelectorAll('.parent-row');
        let visibleCount = 0;
        let firstVisible = 0;
        let lastVisible = 0;
        let index = 0;
        
        rows.forEach(row => {
            const status = row.dataset.status;
            const shouldShow = (filter === 'all' || status === filter);
            
            if (shouldShow) {
                row.style.display = '';
                visibleCount++;
                index++;
                row.querySelector('td:first-child').textContent = index;
                if (firstVisible === 0) firstVisible = index;
                lastVisible = index;
            } else {
                row.style.display = 'none';
            }
        });
        
        updatePaginationInfo(visibleCount, firstVisible, lastVisible);
    }

    function searchParents() {
        const input = document.getElementById('parentSearch');
        const filter = input.value.toLowerCase();
        const rows = document.querySelectorAll('.parent-row');
        let visibleCount = 0;
        let firstVisible = 0;
        let lastVisible = 0;
        let index = 0;
        
        rows.forEach(row => {
            const name = row.getAttribute('data-name') || '';
            const ic = row.getAttribute('data-ic') || '';
            const email = row.getAttribute('data-email') || '';
            const status = row.dataset.status;
            const statusFilter = currentFilter;
            
            const matchesSearch = name.includes(filter) || ic.includes(filter) || email.includes(filter);
            const matchesStatus = (statusFilter === 'all' || status === statusFilter);
            
            if (matchesSearch && matchesStatus) {
                row.style.display = '';
                visibleCount++;
                index++;
                row.querySelector('td:first-child').textContent = index;
                if (firstVisible === 0) firstVisible = index;
                lastVisible = index;
            } else {
                row.style.display = 'none';
            }
        });

        updatePaginationInfo(visibleCount, firstVisible, lastVisible);
    }

    function updatePaginationInfo(visibleCount, firstVisible, lastVisible) {
        const showingStart = document.getElementById('showingStart');
        const showingEnd = document.getElementById('showingEnd');
        const totalCount = document.getElementById('totalCount');
        
        if (visibleCount === 0) {
            showingStart.textContent = '0';
            showingEnd.textContent = '0';
            totalCount.textContent = '0';
        } else {
            showingStart.textContent = firstVisible;
            showingEnd.textContent = lastVisible;
            totalCount.textContent = visibleCount;
        }
    }

    // ===== DETAILS PANEL =====
    function showDetails(id, name, ic, email, phone, address, relationship, status, created_at, childName) {
        currentParentId = id;
        const leftSection = document.getElementById('leftSection');
        const rightSection = document.getElementById('rightSection');
        
        leftSection.classList.add('shrink');
        rightSection.classList.add('active');

        const avatar = document.getElementById('profileAvatar');
        const profileName = document.getElementById('profileName');
        const profileStatus = document.getElementById('profileStatus');
        const body = document.getElementById('panelBody');

        avatar.textContent = name.charAt(0).toUpperCase();
        profileName.textContent = name.toUpperCase();

        const statusClass = status === 'active' ? 'active' : (status === 'pending' ? 'pending' : 'rejected');
        const statusLabel = status.charAt(0).toUpperCase() + status.slice(1);
        profileStatus.innerHTML = `<span class="status-badge ${statusClass}"><span class="dot"></span>${statusLabel}</span>`;

        const child = childName ? childName.toUpperCase() : '-';
        
        const cleanPhone = phone ? phone.replace(/-/g, '') : '';
        const formattedPhone = cleanPhone && cleanPhone.length >= 6 ? cleanPhone.substring(0, 3) + '-' + cleanPhone.substring(3) : (phone || '-');
        const relationshipDisplay = relationship && relationship !== 'NOT SPECIFIED' ? relationship : 'Not specified';

        let actionButtons = '';

        if (status === 'pending') {
            actionButtons = `
                <div style="display:flex; gap:10px; margin-top:16px; flex-wrap:wrap; padding-top:16px; border-top:1px solid #EEF2F6;">
                    <form method="POST" action="/admin/parents/approve/${id}" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn-approve-panel" onclick="return confirm('Approve this parent?')">Approve</button>
                    </form>
                    <button type="button" class="btn-reject-panel" onclick="openRejectModal(${id}, '${name}')">Reject</button>
                </div>
            `;
        }

        body.innerHTML = `
            <div class="info-group">
                <span class="info-label">Full Name</span>
                <span class="info-value">${name.toUpperCase()}</span>
            </div>
            <div class="info-group">
                <span class="info-label">IC Number</span>
                <span class="info-value">${ic}</span>
            </div>
            <div class="info-group">
                <span class="info-label">Email Address</span>
                <span class="info-value" style="text-transform:lowercase;">${email}</span>
            </div>
            <div class="info-group">
                <span class="info-label">Phone Number</span>
                <span class="info-value">${formattedPhone}</span>
            </div>
            <div class="info-group">
                <span class="info-label">Home Address</span>
                <span class="info-value">${(address || 'Not provided').toUpperCase()}</span>
            </div>
            <div class="info-group">
                <span class="info-label">Relationship</span>
                <span class="info-value">${relationshipDisplay.toUpperCase()}</span>
            </div>
            <div class="info-group">
                <span class="info-label">Linked Student</span>
                <span class="info-value">${child}</span>
            </div>
            <div class="panel-divider"></div>
            <div class="info-group">
                <span class="info-label">Registration Date</span>
                <span class="info-value">${new Date(created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' })}</span>
            </div>
            ${actionButtons}
        `;
    }

    function closeDetails() {
        const leftSection = document.getElementById('leftSection');
        const rightSection = document.getElementById('rightSection');
        leftSection.classList.remove('shrink');
        rightSection.classList.remove('active');
        currentParentId = null;
    }

    // ===== REJECTION MODAL =====
    function openRejectModal(parentId, parentName) {
        const modal = document.getElementById('rejectModal');
        const form = document.getElementById('rejectForm');
        const nameDisplay = document.getElementById('modalParentName');
        
        form.action = '/admin/parents/reject/' + parentId;
        nameDisplay.textContent = parentName;
        
        document.getElementById('reasonSelect').value = '';
        document.getElementById('notesInput').value = '';
        
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeRejectModal() {
        const modal = document.getElementById('rejectModal');
        modal.classList.remove('active');
        document.body.style.overflow = 'auto';
    }

    // Close modal when clicking outside
    document.getElementById('rejectModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeRejectModal();
        }
    });

    // Close panel when clicking outside
    document.addEventListener('click', function(event) {
        const panel = document.getElementById('rightSection');
        const isViewButton = event.target.classList.contains('btn-view');
        const isPanelClick = panel.contains(event.target);
        
        if (!isPanelClick && !isViewButton && panel.classList.contains('active')) {
            closeDetails();
        }
    });
</script>
@endsection