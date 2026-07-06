

<?php $__env->startSection('content'); ?>
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

    /* ===== SEARCH BAR ===== */
    .search-filter-bar {
        display: flex;
        align-items: center;
        gap: 16px;
        background: white;
        padding: 12px 20px;
        border-radius: 16px;
        border: 1px solid #EEF2F6;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        margin-bottom: 20px;
        flex-wrap: wrap;
    }

    .search-filter-bar .search-input-wrapper {
        flex: 2;
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

    .search-filter-bar .search-input-wrapper:focus-within {
        border-color: #4F7CFF;
        box-shadow: 0 0 0 3px rgba(79, 124, 255, 0.08);
        background: white;
    }

    .search-filter-bar .search-input-wrapper .search-icon {
        color: #94A3B8;
        font-size: 16px;
    }

    .search-filter-bar .search-input-wrapper input {
        border: none;
        background: transparent;
        padding: 10px 0;
        font-size: 14px;
        color: #0B1E33;
        width: 100%;
        outline: none;
        font-family: inherit;
    }

    .search-filter-bar .search-input-wrapper input::placeholder {
        color: #94A3B8;
    }

    .search-filter-bar .filter-select {
        flex: 1;
        min-width: 150px;
        padding: 10px 16px;
        border: 1px solid #EEF2F6;
        border-radius: 10px;
        font-size: 14px;
        color: #0B1E33;
        background: #F8FAFC;
        font-family: inherit;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .search-filter-bar .filter-select:focus {
        outline: none;
        border-color: #4F7CFF;
        box-shadow: 0 0 0 3px rgba(79, 124, 255, 0.08);
        background: white;
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

    .table-container table tbody td .student-info {
        display: flex;
        flex-direction: column;
    }

    .table-container table tbody td .student-info .student-name {
        font-weight: 600;
        color: #0B1E33;
        text-transform: uppercase;
        transition: color 0.2s;
    }

    .table-container table tbody td .student-info .student-name:hover {
        color: #4F7CFF;
    }

    .table-container table tbody td .student-info .student-diagnosis {
        font-size: 12px;
        color: #94A3B8;
    }

    .diagnosis-badge {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 500;
        background: #EEF4FF;
        color: #4F7CFF;
    }

    .goal-tag {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 500;
        margin: 2px 4px 2px 0;
        background: #F1F5F9;
        color: #64748B;
    }

    .goal-tag.academic { background: #EEF4FF; color: #4F7CFF; }
    .goal-tag.communication { background: #ECFDF5; color: #22C55E; }
    .goal-tag.behaviour { background: #FFFBEB; color: #F59E0B; }
    .goal-tag.self-help { background: #F5F3FF; color: #8B5CF6; }

    .progress-link {
        display: flex;
        align-items: center;
        gap: 10px;
        text-decoration: none;
        color: inherit;
        cursor: pointer;
        transition: opacity 0.2s;
    }

    .progress-link:hover {
        opacity: 0.8;
    }

    .progress-bar {
        width: 100px;
        height: 8px;
        background: #F1F5F9;
        border-radius: 10px;
        overflow: hidden;
        flex-shrink: 0;
    }

    .progress-bar .progress-fill {
        height: 100%;
        border-radius: 10px;
        transition: width 0.8s ease;
        display: block;
    }

    .progress-bar .progress-fill.green { background: #22C55E; }
    .progress-bar .progress-fill.yellow { background: #F59E0B; }
    .progress-bar .progress-fill.red { background: #EF4444; }

    .progress-text {
        font-weight: 600;
        font-size: 14px;
        min-width: 50px;
    }

    .view-link {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 14px;
        background: #EEF4FF;
        color: #4F7CFF;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .view-link:hover {
        background: #DBEAFE;
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
        flex-wrap: wrap;
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
        .search-filter-bar {
            flex-direction: column;
            align-items: stretch;
        }
        .search-filter-bar .search-input-wrapper {
            min-width: auto;
        }
        .search-filter-bar .filter-select {
            min-width: auto;
        }
    }

    @media (max-width: 768px) {
        .table-container {
            padding: 12px;
        }
        .table-container table thead th,
        .table-container table tbody td {
            padding: 8px 10px;
            font-size: 12px;
        }
        .table-container table tbody td .progress-bar {
            width: 60px;
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
        .table-container table thead th,
        .table-container table tbody td {
            padding: 6px 8px;
            font-size: 11px;
        }
        .table-container table tbody td .progress-bar {
            width: 50px;
        }
        .view-link {
            font-size: 11px;
            padding: 4px 10px;
        }
        .goal-tag {
            font-size: 10px;
            padding: 2px 8px;
        }
    }
</style>

<div class="page-wrapper">
    <!-- ===== HERO BANNER ===== -->
    <div class="hero-banner">
        <div class="wave-pattern"></div>

        <div class="hero-left">
            <div class="hero-label">IEP Management</div>
            <h1>View All <span>IEPs</span></h1>
            <div class="hero-subtitle">View all students' IEP goals and their latest progress.</div>
        </div>

        <div class="hero-right">
            <div class="illustration">🎯</div>
        </div>
    </div>

    <!-- ===== SEARCH & FILTER ===== -->
    <div class="search-filter-bar">
        <div class="search-input-wrapper">
            <span class="search-icon">🔎︎</span>
            <input type="text" id="studentSearch" placeholder="Search by name or IC..." onkeyup="searchStudents()">
        </div>
        <select class="filter-select" id="teacherFilter" onchange="filterByTeacher()">
            <option value="">All Teachers</option>
            <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($teacher->id); ?>"><?php echo e($teacher->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <!-- ===== TABLE ===== -->
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Student</th>
                    <th>Diagnosis</th>
                    <th>Teacher</th>
                    <th>Goals</th>
                    <th>Average Progress</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="studentTableBody">
                <?php $__empty_1 = true; $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php
                    $goals = App\Models\IepGoal::where('student_id', $student->student_id)->get();
                    $goalCount = $goals->count();
                    $totalProgress = 0;
                    $goalCategories = [];
                    foreach ($goals as $goal) {
                        $goalCategories[] = $goal->goal_category;
                        $latest = App\Models\Progress::where('goal_id', $goal->goal_id)->latest()->first();
                        if ($latest) {
                            $totalProgress += $latest->progress_percentage;
                        }
                    }
                    $avgProgress = $goalCount > 0 ? round($totalProgress / $goalCount) : 0;
                    $progressColor = $avgProgress >= 70 ? 'green' : ($avgProgress >= 40 ? 'yellow' : 'red');
                    $progressTextColor = $avgProgress >= 70 ? '#22C55E' : ($avgProgress >= 40 ? '#F59E0B' : '#EF4444');
                    $uniqueCategories = array_unique($goalCategories);
                ?>
                <tr class="student-row" data-teacher="<?php echo e($student->teacher_id); ?>" data-name="<?php echo e(strtolower($student->student_name)); ?>" data-ic="<?php echo e($student->student_ic); ?>">
                    <td><?php echo e($students->firstItem() + $index); ?></td>
                    <td>
                        <a href="<?php echo e(route('admin.students.show', $student->student_id)); ?>" style="text-decoration: none; color: inherit;">
                            <div class="student-info">
                                <span class="student-name"><?php echo e(strtoupper($student->student_name)); ?></span>
                            </div>
                        </a>
                    </td>
                    <td>
                        <span class="diagnosis-badge"><?php echo e($student->student_diagnosis); ?></span>
                    </td>
                    <td><?php echo e($student->teacher ? strtoupper($student->teacher->name) : '-'); ?></td>
                    <td>
                        <div style="display: flex; flex-wrap: wrap; gap: 4px; align-items: center;">
                            <?php $__currentLoopData = $uniqueCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="goal-tag <?php echo e(strtolower($category)); ?>"><?php echo e($category); ?></span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if($goalCount > 0): ?>
                                <span style="font-size: 12px; color: #94A3B8;">(<?php echo e($goalCount); ?> goals)</span>
                            <?php else: ?>
                                <span style="font-size: 12px; color: #94A3B8;">No goals</span>
                            <?php endif; ?>
                        </div>
                    </td>
                    <td>
                        <?php if($avgProgress > 0): ?>
                            <a href="<?php echo e(route('admin.students.show', $student->student_id)); ?>" class="progress-link">
                                <div class="progress-bar">
                                    <div class="progress-fill <?php echo e($progressColor); ?>" style="width: <?php echo e($avgProgress); ?>%; min-width: 4px;"></div>
                                </div>
                                <span class="progress-text" style="color: <?php echo e($progressTextColor); ?>;">
                                    <?php echo e($avgProgress); ?>%
                                </span>
                            </a>
                        <?php else: ?>
                            <span style="color: #94A3B8; font-size: 13px;">No data</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?php echo e(route('admin.students.show', $student->student_id)); ?>" class="view-link">
                            View Details
                        </a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="7" style="text-align: center; padding: 40px 20px; color: #94A3B8;">
                        No students found.
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- ===== PAGINATION ===== -->
        <div class="pagination-section">
            <div class="pagination-info">
                Showing <strong id="showingStart"><?php echo e($students->firstItem() ?? 0); ?></strong> to <strong id="showingEnd"><?php echo e($students->lastItem() ?? 0); ?></strong> of <strong id="totalCount"><?php echo e($students->total()); ?></strong> students
            </div>
            <div class="pagination-links" id="paginationLinks">
                <?php echo e($students->appends(request()->query())->links()); ?>

            </div>
        </div>
    </div>
</div>

<script>
    function searchStudents() {
        const input = document.getElementById('studentSearch');
        const filter = input.value.toLowerCase();
        const rows = document.querySelectorAll('.student-row');
        const teacherFilter = document.getElementById('teacherFilter').value;
        let visibleCount = 0;
        let firstVisible = 0;
        let lastVisible = 0;
        let index = 0;

        rows.forEach(row => {
            const name = row.getAttribute('data-name') || '';
            const ic = row.getAttribute('data-ic') || '';
            const teacher = row.getAttribute('data-teacher') || '';
            
            const matchesSearch = name.includes(filter) || ic.includes(filter);
            const matchesTeacher = (teacherFilter === '' || teacher === teacherFilter);
            
            if (matchesSearch && matchesTeacher) {
                row.style.display = '';
                visibleCount++;
                index++;
                const num = index;
                row.querySelector('td:first-child').textContent = num;
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

    function filterByTeacher() {
        searchStudents();
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\fatin\iep-system\resources\views/admin/ieps/index.blade.php ENDPATH**/ ?>