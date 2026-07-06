

<?php $__env->startSection('content'); ?>
<style>
    .page-wrapper {
        max-width: 1200px;
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

    /* ===== ALERTS ===== */
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

    /* ===== FORM CONTAINER ===== */
    .form-container {
        background: white;
        border-radius: 20px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
        border: 1px solid #EEF2F6;
        overflow: hidden;
        max-width: 700px;
        margin: 0 auto;
    }

    .form-header {
        background: linear-gradient(135deg, #F8FAFC, #F1F5F9);
        padding: 20px 32px;
        border-bottom: 1px solid #EEF2F6;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .form-header .header-icon {
        font-size: 24px;
    }

    .form-header .header-title {
        font-size: 18px;
        font-weight: 700;
        color: #0B1E33;
    }

    .form-header .header-badge {
        margin-left: auto;
        background: #EEF4FF;
        color: #4F7CFF;
        padding: 4px 14px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }

    .form-body {
        padding: 32px 36px;
    }

    /* ===== STEP INDICATOR ===== */
    .steps-indicator {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0;
        margin-bottom: 32px;
        position: relative;
        padding: 0 20px;
    }

    .step-item {
        display: flex;
        align-items: center;
        gap: 10px;
        position: relative;
        flex: 1;
        justify-content: center;
    }

    .step-item .step-number {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: #E5E7EB;
        color: #94A3B8;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 14px;
        transition: all 0.3s ease;
        flex-shrink: 0;
    }

    .step-item.active .step-number {
        background: #4F7CFF;
        color: white;
        box-shadow: 0 4px 12px rgba(79, 124, 255, 0.30);
    }

    .step-item.completed .step-number {
        background: #22C55E;
        color: white;
    }

    .step-item .step-label {
        font-size: 14px;
        font-weight: 500;
        color: #94A3B8;
        white-space: nowrap;
        transition: all 0.3s ease;
    }

    .step-item.active .step-label {
        color: #0B1E33;
        font-weight: 600;
    }

    .step-item.completed .step-label {
        color: #22C55E;
    }

    .step-line {
        flex: 0 0 30px;
        height: 2px;
        background: #E5E7EB;
        position: relative;
        min-width: 20px;
    }

    .step-line.completed {
        background: #22C55E;
    }

    /* ===== STEP CONTENT ===== */
    .step-content {
        display: none;
        animation: fadeIn 0.4s ease;
    }

    .step-content.active {
        display: block;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .step-content .step-title {
        font-size: 20px;
        font-weight: 700;
        color: #0B1E33;
        margin-bottom: 6px;
    }

    .step-content .step-desc {
        font-size: 14px;
        color: #94A3B8;
        margin-bottom: 20px;
    }

    /* ===== FORM GROUPS ===== */
    .form-group {
        margin-bottom: 20px;
    }

    .form-group:last-child {
        margin-bottom: 0;
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

    .form-group select {
        width: 100%;
        padding: 12px 16px;
        border: 1px solid #E5E7EB;
        border-radius: 12px;
        font-size: 14px;
        color: #0B1E33;
        background: #F8FAFC;
        transition: all 0.3s ease;
        font-family: inherit;
    }

    .form-group select:focus {
        outline: none;
        border-color: #4F7CFF;
        box-shadow: 0 0 0 3px rgba(79, 124, 255, 0.08);
        background: white;
    }

    .form-group select option {
        padding: 8px;
    }

    /* ===== REPORT TYPE OPTIONS ===== */
    .report-type-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
    }

    .report-type-option {
        padding: 20px;
        border: 2px solid #E5E7EB;
        border-radius: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
        background: #F8FAFC;
        text-align: center;
        position: relative;
    }

    .report-type-option:hover {
        border-color: #4F7CFF;
        background: #EEF4FF;
        transform: translateY(-2px);
    }

    .report-type-option.selected {
        border-color: #4F7CFF;
        background: #EEF4FF;
        box-shadow: 0 0 0 3px rgba(79, 124, 255, 0.08);
    }

    .report-type-option .option-icon {
        font-size: 32px;
        display: block;
        margin-bottom: 6px;
    }

    .report-type-option .option-title {
        font-weight: 600;
        font-size: 15px;
        color: #0B1E33;
    }

    .report-type-option .option-desc {
        font-size: 12px;
        color: #94A3B8;
        margin-top: 2px;
    }

    .report-type-option input[type="radio"] {
        display: none;
    }

    .report-type-option .check-mark {
        position: absolute;
        top: 10px;
        right: 10px;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background: #E5E7EB;
        display: none;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        color: white;
    }

    .report-type-option.selected .check-mark {
        display: flex;
        background: #4F7CFF;
    }

    /* ===== BUTTONS ===== */
    .step-actions {
        display: flex;
        gap: 12px;
        margin-top: 28px;
        padding-top: 20px;
        border-top: 1px solid #F1F5F9;
    }

    .btn-prev {
        padding: 12px 28px;
        background: #F1F5F9;
        color: #64748B;
        border: 1px solid #E5E7EB;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: inherit;
    }

    .btn-prev:hover {
        background: #E5E7EB;
        color: #0B1E33;
    }

    .btn-next {
        padding: 12px 32px;
        background: #1A3C78;
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: inherit;
        margin-left: auto;
    }

    .btn-next:hover {
        background: #3B6AE8;
        transform: translateY(-2px);
        box-shadow: 0 4px 16px rgba(79, 124, 255, 0.25);
    }

    .btn-next:disabled {
        opacity: 0.5;
        cursor: not-allowed;
        transform: none;
    }

    .btn-submit {
        padding: 12px 32px;
        background: #1A3C78;
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: inherit;
        margin-left: auto;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 16px rgba(99, 90, 180, 0.3);
    }

    .btn-submit:disabled {
        opacity: 0.5;
        cursor: not-allowed;
        transform: none;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 992px) {
        .hero-banner {
            flex-direction: column;
            text-align: center;
            padding: 24px 20px;
            height: auto;
        }
        .hero-left h1 {
            font-size: 28px;
        }
        .hero-right {
            width: 100px;
            height: 100px;
            margin-top: 10px;
        }
        .hero-right .illustration {
            font-size: 60px;
        }
        .hero-banner .wave-pattern {
            display: none;
        }
        .form-body {
            padding: 24px 20px;
        }
        .steps-indicator {
            flex-wrap: wrap;
            gap: 8px;
        }
        .step-item .step-label {
            font-size: 12px;
        }
        .step-line {
            flex: 0 0 15px;
            min-width: 10px;
        }
    }

    @media (max-width: 768px) {
        .hero-left h1 {
            font-size: 24px;
        }
        .hero-left .hero-subtitle {
            font-size: 13px;
        }
        .hero-banner {
            padding: 20px 16px;
        }
        .form-body {
            padding: 18px 14px;
        }
        .form-header {
            padding: 14px 18px;
        }
        .report-type-grid {
            grid-template-columns: 1fr;
        }
        .step-actions {
            flex-wrap: wrap;
        }
        .btn-next,
        .btn-submit {
            width: 100%;
            margin-left: 0;
            justify-content: center;
        }
        .btn-prev {
            width: 100%;
            justify-content: center;
        }
        .step-item .step-label {
            display: none;
        }
        .steps-indicator {
            gap: 4px;
        }
        .step-line {
            flex: 0 0 20px;
            min-width: 15px;
        }
        .step-item .step-number {
            width: 32px;
            height: 32px;
            font-size: 12px;
        }
    }

    @media (max-width: 480px) {
        .hero-banner {
            padding: 16px 14px;
        }
        .hero-left h1 {
            font-size: 20px;
        }
        .hero-right {
            width: 70px;
            height: 70px;
        }
        .hero-right .illustration {
            font-size: 40px;
        }
        .form-body {
            padding: 14px 10px;
        }
        .form-header {
            padding: 12px 14px;
        }
        .form-header .header-title {
            font-size: 16px;
        }
        .step-content .step-title {
            font-size: 17px;
        }
    }
</style>

<div class="page-wrapper">
    <!-- ===== HERO BANNER ===== -->
    <div class="hero-banner">
        <div class="wave-pattern"></div>

        <div class="hero-left">
            <div class="hero-label">Report Management</div>
            <h1>Generate <span>Report</span></h1>
            <div class="hero-subtitle">Create comprehensive progress reports for your students</div>
        </div>

        <div class="hero-right">
            <div class="illustration">📄</div>
        </div>
    </div>

    <!-- ===== ALERTS ===== -->
    <?php if(session('success')): ?>
        <div class="alert-success" id="successMessage">
            <?php echo e(session('success')); ?>

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
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="alert-error" id="errorMessage">
            <?php echo e(session('error')); ?>

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
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <div class="alert-error">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p style="margin: 2px 0;">• <?php echo e($error); ?></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>

    <!-- ===== FORM CONTAINER ===== -->
    <div class="form-container">
        <div class="form-header">
            <span class="header-icon"></span>
            <span class="header-title">Create New Report</span>
            <span class="header-badge">Step 1 of 2</span>
        </div>

        <div class="form-body">
            <form id="reportForm" method="POST" action="<?php echo e(route('teacher.reports.generate')); ?>">
                <?php echo csrf_field(); ?>

                <!-- ===== STEPS INDICATOR ===== -->
                <div class="steps-indicator">
                    <div class="step-item active" id="step1Indicator">
                        <div class="step-number">1</div>
                        <span class="step-label">Select Student</span>
                    </div>
                    <div class="step-line" id="line1"></div>
                    <div class="step-item" id="step2Indicator">
                        <div class="step-number">2</div>
                        <span class="step-label">Select Report Type</span>
                    </div>
                </div>

                <!-- ===== STEP 1: SELECT STUDENT ===== -->
                <div class="step-content active" id="step1">
                    <div class="step-title">1. Select Student</div>
                    <div class="step-desc">Choose the student you want to generate a report for.</div>

                    <div class="form-group">
                        <label>Select Student <span class="required">*</span></label>
                        <select name="student_id" id="studentSelect" required>
                            <option value="">Select Student</option>
                            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($student->student_id); ?>">
                                    <?php echo e(strtoupper($student->student_name)); ?> 
                                    <?php if($student->student_diagnosis): ?>
                                        (<?php echo e($student->student_diagnosis); ?>)
                                    <?php endif; ?>
                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="step-actions">
                        <button type="button" class="btn-next" onclick="goToStep(2)">Next →</button>
                    </div>
                </div>

                <!-- ===== STEP 2: SELECT REPORT TYPE ===== -->
                <div class="step-content" id="step2">
                    <div class="step-title">2. Select Report Type</div>
                    <div class="step-desc">Choose the type of report you want to generate.</div>

                    <div class="form-group">
                        <label>Report Type <span class="required">*</span></label>
                        <div class="report-type-grid">
                            <label class="report-type-option" onclick="selectReportType('Weekly')">
                                <input type="radio" name="report_type" value="Weekly">
                                <span class="check-mark">✓</span>
                                <span class="option-icon">📊</span>
                                <span class="option-title">Weekly Summary</span>
                                <span class="option-desc">Last 7 days progress</span>
                            </label>
                            <label class="report-type-option" onclick="selectReportType('6-Month')">
                                <input type="radio" name="report_type" value="6-Month">
                                <span class="check-mark">✓</span>
                                <span class="option-icon">📈</span>
                                <span class="option-title">6-Month Evaluation</span>
                                <span class="option-desc">Last 6 months progress</span>
                            </label>
                        </div>
                    </div>

                    <div class="step-actions">
                        <button type="button" class="btn-prev" onclick="goToStep(1)">← Back</button>
                        <button type="submit" class="btn-submit">Generate Report</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    let currentStep = 1;

    function goToStep(step) {
        // Validate current step
        if (step === 2 && currentStep === 1) {
            const studentSelect = document.getElementById('studentSelect');
            if (!studentSelect.value) {
                alert('Please select a student first.');
                return;
            }
        }

        // Hide all steps
        document.querySelectorAll('.step-content').forEach(el => {
            el.classList.remove('active');
        });

        // Show target step
        document.getElementById('step' + step).classList.add('active');

        // Update indicators
        document.querySelectorAll('.step-item').forEach(el => {
            el.classList.remove('active', 'completed');
        });

        for (let i = 1; i <= 2; i++) {
            const indicator = document.getElementById('step' + i + 'Indicator');
            if (i < step) {
                indicator.classList.add('completed');
            } else if (i === step) {
                indicator.classList.add('active');
            }
        }

        // Update lines
        for (let i = 1; i <= 1; i++) {
            const line = document.getElementById('line' + i);
            if (i < step) {
                line.classList.add('completed');
            } else {
                line.classList.remove('completed');
            }
        }

        // Update badge
        document.querySelector('.header-badge').textContent = 'Step ' + step + ' of 2';

        currentStep = step;
    }

    function selectReportType(type) {
        document.querySelectorAll('.report-type-option').forEach(el => {
            el.classList.remove('selected');
            const radio = el.querySelector('input[type="radio"]');
            if (radio && radio.value === type) {
                el.classList.add('selected');
                radio.checked = true;
            }
        });
    }

    // Auto-select first report type on load
    document.addEventListener('DOMContentLoaded', function() {
        const firstOption = document.querySelector('.report-type-option');
        if (firstOption) {
            firstOption.classList.add('selected');
            const radio = firstOption.querySelector('input[type="radio"]');
            if (radio) {
                radio.checked = true;
            }
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.teacher', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\fatin\iep-system\resources\views/teacher/reports/index.blade.php ENDPATH**/ ?>