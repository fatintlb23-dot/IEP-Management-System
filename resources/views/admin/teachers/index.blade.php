@extends('layouts.admin')

@section('content')
<style>
    .page-wrapper {
        max-width: 1320px;
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

    /* ===== SEARCH BAR ===== */
    .search-bar {
        background: white;
        border-radius: 16px;
        padding: 14px 20px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        border: 1px solid #EEF2F6;
        margin-bottom: 24px;
        display: flex;
        align-items: center;
        gap: 16px;
        flex-wrap: wrap;
    }

    .search-bar .search-input-wrapper {
        flex: 1;
        min-width: 200px;
        display: flex;
        align-items: center;
        gap: 12px;
        background: #F8FAFC;
        border-radius: 10px;
        padding: 0 16px;
        border: 1px solid #EEF2F6;
        transition: all 0.3s ease;
    }

    .search-bar .search-input-wrapper:focus-within {
        border-color: #3A5EA8;
        box-shadow: 0 0 0 3px rgba(58, 94, 168, 0.08);
        background: white;
    }

    .search-bar .search-input-wrapper .search-icon {
        color: #94A3B8;
        font-size: 16px;
    }

    .search-bar .search-input-wrapper input {
        border: none;
        background: transparent;
        padding: 10px 0;
        font-size: 14px;
        color: #0B1E33;
        width: 100%;
        outline: none;
        font-family: inherit;
    }

    .search-bar .search-input-wrapper input::placeholder {
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
        margin-bottom: 80px;
    }

    .table-container table {
        width: 100%;
        border-collapse: collapse;
    }

    .table-container table thead th {
        text-align: left;
        padding: 14px 16px;
        font-size: 11px;
        font-weight: 600;
        color: #94A3B8;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border-bottom: 1px solid #EEF2F6;
        white-space: nowrap;
    }

    .table-container table tbody td {
        padding: 14px 16px;
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

    .table-container table tbody td .teacher-name {
        font-weight: 600;
        color: #0B1E33;
    }

    .table-container table tbody td .teacher-ic {
        font-size: 13px;
        color: #94A3B8;
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

    .status-badge.active .dot {
        background: #22C55E;
    }

    .status-badge.inactive {
        background: #FEF2F2;
        color: #EF4444;
    }

    .status-badge.inactive .dot {
        background: #EF4444;
    }

    /* ===== ACTION BUTTONS ===== */
    .action-btns {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .action-btns .btn-delete {
        background: #FEF2F2;
        color: #EF4444;
        border: none;
        padding: 6px 16px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
        font-family: inherit;
    }

    .action-btns .btn-delete:hover {
        background: #FEE2E2;
    }

    /* ===== PAGINATION ===== */
    .pagination-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
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
        background: #3A5EA8;
        color: white;
        border-color: #3A5EA8;
        border-radius: 8px;
    }

    .pagination-section .pagination-links .disabled span {
        color: #CBD5E1;
        cursor: not-allowed;
    }

    /* ===== SUCCESS MESSAGE ===== */
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

    /* ===== FLOATING ADD BUTTON ===== */
    .floating-add-btn {
        position: fixed;
        bottom: 40px;
        right: 40px;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: linear-gradient(145deg, #2F4E8A, #3A5EA8);
        color: white;
        border: none;
        font-size: 32px;
        font-weight: 300;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 8px 32px rgba(47, 78, 138, 0.30);
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        z-index: 50;
    }

    .floating-add-btn:hover {
        transform: scale(1.08);
        background: linear-gradient(145deg, #3A5EA8, #4A6EB8);
        box-shadow: 0 12px 40px rgba(47, 78, 138, 0.40);
    }

    .floating-add-btn:active {
        transform: scale(0.95);
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 1200px) {
        .table-container table {
            font-size: 13px;
        }
        .table-container table thead th,
        .table-container table tbody td {
            padding: 12px 14px;
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

        .search-bar {
            flex-direction: column;
            align-items: stretch;
        }

        .search-bar .search-input-wrapper {
            min-width: auto;
        }

        .floating-add-btn {
            bottom: 24px;
            right: 24px;
            width: 54px;
            height: 54px;
            font-size: 28px;
        }
    }

    @media (max-width: 768px) {
        .table-container table {
            font-size: 12px;
        }
        .table-container table thead th,
        .table-container table tbody td {
            padding: 10px 12px;
        }

        .action-btns {
            flex-direction: column;
            gap: 4px;
        }
        .action-btns .btn-delete {
            width: 100%;
            text-align: center;
            padding: 6px 12px;
            font-size: 12px;
        }

        .pagination-section {
            flex-direction: column;
            align-items: center;
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

        .floating-add-btn {
            bottom: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
            font-size: 26px;
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

        .table-container {
            padding: 12px;
        }
        .table-container table thead th,
        .table-container table tbody td {
            padding: 8px 10px;
            font-size: 11px;
        }

        .floating-add-btn {
            bottom: 16px;
            right: 16px;
            width: 48px;
            height: 48px;
            font-size: 24px;
        }
    }
</style>

<div class="page-wrapper">
    <!-- ===== HERO BANNER ===== -->
    <div class="hero-banner">
        <div class="wave-pattern"></div>

        <div class="hero-left">
            <div class="hero-label">Teacher Management</div>
            <h1>Manage <span>Teacher Accounts</span></h1>
            <div class="hero-subtitle">View, manage, and control teacher accounts across the system.</div>
        </div>

        <div class="hero-right">
            <div class="illustration">👩‍🏫</div>
        </div>
    </div>

    <!-- ===== SUCCESS MESSAGE ===== -->
    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- ===== SEARCH BAR - Auto Search ===== -->
    <div class="search-bar">
        <div class="search-input-wrapper">
            <span class="search-icon">🔍︎</span>
            <input type="text" id="teacherSearch" placeholder="Search by name, email or IC number..." onkeyup="searchTeachers()">
        </div>
    </div>

    <!-- ===== TABLE ===== -->
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Teacher Name</th>
                    <th>IC Number</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Position</th>
                    <th>Students</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="teacherTableBody">
                @forelse($teachers as $index => $teacher)
                <tr class="teacher-row" 
                    data-name="{{ strtolower($teacher->name) }}" 
                    data-ic="{{ $teacher->ic_number }}" 
                    data-email="{{ strtolower($teacher->email) }}"
                    data-id="{{ $teacher->id }}">
                    <td>{{ $teachers->firstItem() + $index }}</td>
                    <td>
                        <div class="teacher-name">{{ $teacher->name }}</div>
                    </td>
                    <td><span class="teacher-ic">{{ $teacher->ic_number }}</span></td>
                    <td>{{ $teacher->email }}</td>
                    <td>{{ $teacher->phone }}</td>
                    <td>{{ $teacher->position ?? 'Special Needs Teacher' }}</td>
                    <td>{{ \App\Models\Student::where('teacher_id', $teacher->id)->count() }}</td>
                    <td>
                        <span class="status-badge {{ $teacher->status == 'active' ? 'active' : 'inactive' }}">
                            <span class="dot"></span>
                            {{ ucfirst($teacher->status) }}
                        </span>
                    </td>
                    <td>
                        <div class="action-btns">
                            <form method="POST" action="{{ route('admin.teachers.destroy', $teacher->id) }}" onsubmit="return confirm('Are you sure you want to delete this teacher?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" style="text-align: center; padding: 40px 20px; color: #94A3B8;">
                        No teachers found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <!-- ===== PAGINATION ===== -->
        <div class="pagination-section">
            <div class="pagination-info">
                Showing <strong id="showingStart">{{ $teachers->firstItem() ?? 0 }}</strong> to <strong id="showingEnd">{{ $teachers->lastItem() ?? 0 }}</strong> of <strong id="totalCount">{{ $teachers->total() }}</strong> teachers
            </div>
            <div class="pagination-links" id="paginationLinks">
                {{ $teachers->appends(request()->query())->links() }}
            </div>
        </div>
    </div>

    <!-- ===== FLOATING ADD BUTTON ===== -->
    <a href="{{ route('admin.teachers.create') }}" class="floating-add-btn" title="Add New Teacher">
        +
    </a>
</div>

<script>
    // ===== SEARCH FUNCTION =====
    function searchTeachers() {
        const input = document.getElementById('teacherSearch');
        const filter = input.value.toLowerCase();
        const rows = document.querySelectorAll('.teacher-row');
        let visibleCount = 0;
        let firstVisible = 0;
        let lastVisible = 0;

        rows.forEach(row => {
            const name = row.getAttribute('data-name') || '';
            const ic = row.getAttribute('data-ic') || '';
            const email = row.getAttribute('data-email') || '';
            
            if (name.includes(filter) || ic.includes(filter) || email.includes(filter)) {
                row.style.display = '';
                visibleCount++;
                const num = parseInt(row.querySelector('td:first-child').textContent);
                if (firstVisible === 0) firstVisible = num;
                lastVisible = num;
            } else {
                row.style.display = 'none';
            }
        });

        const showingStart = document.getElementById('showingStart');
        const showingEnd = document.getElementById('showingEnd');
        const totalCount = document.getElementById('totalCount');
        
        if (visibleCount === 0) {
            showingStart.textContent = '0';
            showingEnd.textContent = '0';
        } else {
            showingStart.textContent = firstVisible;
            showingEnd.textContent = lastVisible;
            totalCount.textContent = visibleCount;
        }
    }
</script>
@endsection