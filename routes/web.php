<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Teacher\ProfileController;

// Parent Registration Routes
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('parent.register');

// Login Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes
Route::middleware('auth')->group(function () {

    // ==================== ADMIN ROUTES ====================
    
    // Admin Dashboard
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Admin - Manage Teachers
    Route::get('/admin/teachers', [App\Http\Controllers\Admin\TeacherController::class, 'index'])->name('admin.teachers.index');
    Route::get('/admin/teachers/create', [App\Http\Controllers\Admin\TeacherController::class, 'create'])->name('admin.teachers.create');
    Route::post('/admin/teachers', [App\Http\Controllers\Admin\TeacherController::class, 'store'])->name('admin.teachers.store');
    Route::delete('/admin/teachers/{id}', [App\Http\Controllers\Admin\TeacherController::class, 'destroy'])->name('admin.teachers.destroy');

    // Admin - Manage Parents 
    Route::get('/admin/parents', [App\Http\Controllers\Admin\ParentController::class, 'index'])->name('admin.parents.index');
    Route::get('/admin/parents/{id}', [App\Http\Controllers\Admin\ParentController::class, 'show'])->name('admin.parents.show');
    Route::post('/admin/parents/approve/{id}', [App\Http\Controllers\Admin\ParentController::class, 'approve'])->name('admin.parents.approve');
    Route::post('/admin/parents/reject/{id}', [App\Http\Controllers\Admin\ParentController::class, 'reject'])->name('admin.parents.reject');
    Route::delete('/admin/parents/{id}', [App\Http\Controllers\Admin\ParentController::class, 'destroy'])->name('admin.parents.destroy');

    // Admin - View All Students
    Route::get('/admin/students', [App\Http\Controllers\Admin\StudentController::class, 'index'])->name('admin.students.index');
    Route::get('/admin/students/{id}', [App\Http\Controllers\Admin\StudentController::class, 'show'])->name('admin.students.show');

    // Admin - Reports
    Route::get('/admin/reports', [App\Http\Controllers\Admin\ReportController::class, 'index'])->name('admin.reports.index');
    Route::post('/admin/reports/generate', [App\Http\Controllers\Admin\ReportController::class, 'generate'])->name('admin.reports.generate');
    Route::get('/admin/reports/{id}', [App\Http\Controllers\Admin\ReportController::class, 'show'])->name('admin.reports.show');

    // Admin - Profile
    Route::get('/admin/profile', [App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('admin.profile.index');
    Route::put('/admin/profile', [App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('admin.profile.update');
    Route::post('/admin/profile/password', [App\Http\Controllers\Admin\ProfileController::class, 'updatePassword'])->name('admin.profile.password');

    // Admin - View All IEPs
    Route::get('/admin/ieps', [App\Http\Controllers\Admin\IepController::class, 'index'])->name('admin.ieps.index');

    // Admin - Profile Avatar
    Route::put('/admin/profile/avatar', [App\Http\Controllers\Admin\ProfileController::class, 'updateAvatar'])->name('admin.profile.avatar.update');
    Route::get('/admin/profile/avatar/remove', [App\Http\Controllers\Admin\ProfileController::class, 'removeAvatar'])->name('admin.profile.avatar.remove');

    // ==================== TEACHER ROUTES ====================
    
    // Teacher Dashboard
    Route::get('/teacher/dashboard', function () {
        return view('teacher.dashboard');
    })->name('teacher.dashboard');

    // Teacher - Manage Students
    Route::get('/teacher/students', [App\Http\Controllers\Teacher\StudentController::class, 'index'])->name('teacher.students.index');
    Route::get('/teacher/students/create', [App\Http\Controllers\Teacher\StudentController::class, 'create'])->name('teacher.students.create');
    Route::post('/teacher/students', [App\Http\Controllers\Teacher\StudentController::class, 'store'])->name('teacher.students.store');
    Route::get('/teacher/students/{id}', [App\Http\Controllers\Teacher\StudentController::class, 'show'])->name('teacher.students.show');
    Route::get('/teacher/students/{id}/edit', [App\Http\Controllers\Teacher\StudentController::class, 'edit'])->name('teacher.students.edit');
    Route::put('/teacher/students/{id}', [App\Http\Controllers\Teacher\StudentController::class, 'update'])->name('teacher.students.update');
    Route::delete('/teacher/students/{id}', [App\Http\Controllers\Teacher\StudentController::class, 'destroy'])->name('teacher.students.destroy');

    // Teacher - IEP Goals
    Route::get('/teacher/goals', [App\Http\Controllers\Teacher\IepGoalController::class, 'index'])->name('teacher.goals.index');
    Route::get('/teacher/goals/create', [App\Http\Controllers\Teacher\IepGoalController::class, 'create'])->name('teacher.goals.create');
    Route::post('/teacher/goals', [App\Http\Controllers\Teacher\IepGoalController::class, 'store'])->name('teacher.goals.store');
    Route::delete('/teacher/goals/{id}', [App\Http\Controllers\Teacher\IepGoalController::class, 'destroy'])->name('teacher.goals.destroy');

    // Teacher - Update Progress
    Route::get('/teacher/progress', [App\Http\Controllers\Teacher\ProgressController::class, 'index'])->name('teacher.progress.index');
    Route::get('/teacher/progress/create/{goal_id}', [App\Http\Controllers\Teacher\ProgressController::class, 'create'])->name('teacher.progress.create');
    Route::post('/teacher/progress', [App\Http\Controllers\Teacher\ProgressController::class, 'store'])->name('teacher.progress.store');

    // Teacher - Reports
    Route::get('/teacher/reports', [App\Http\Controllers\Teacher\ReportController::class, 'index'])->name('teacher.reports.index');
    Route::post('/teacher/reports/generate', [App\Http\Controllers\Teacher\ReportController::class, 'generate'])->name('teacher.reports.generate');
    Route::get('/teacher/reports/{id}', [App\Http\Controllers\Teacher\ReportController::class, 'show'])->name('teacher.reports.show');

    // Teacher - Profile
    Route::get('/teacher/profile', [App\Http\Controllers\Teacher\ProfileController::class, 'index'])->name('teacher.profile.index');
    Route::put('/teacher/profile', [App\Http\Controllers\Teacher\ProfileController::class, 'update'])->name('teacher.profile.update');
    Route::post('/teacher/profile/password', [App\Http\Controllers\Teacher\ProfileController::class, 'updatePassword'])->name('teacher.profile.password');
    Route::post('/teacher/profile/avatar', [App\Http\Controllers\Teacher\ProfileController::class, 'updateAvatar'])->name('teacher.profile.avatar');
    Route::delete('/teacher/profile/avatar', [App\Http\Controllers\Teacher\ProfileController::class, 'removeAvatar'])->name('teacher.profile.avatar.remove');

    // Teacher - Student Notes
    Route::post('/teacher/students/{id}/notes', [App\Http\Controllers\Teacher\StudentNoteController::class, 'store'])->name('teacher.students.notes.store');
    Route::delete('/teacher/students/notes/{id}', [App\Http\Controllers\Teacher\StudentNoteController::class, 'destroy'])->name('teacher.students.notes.destroy');

    // Teacher - Delete Progress
    Route::delete('/teacher/progress/{id}', [App\Http\Controllers\Teacher\ProgressController::class, 'destroy'])->name('teacher.progress.destroy');

    // ==================== PARENT ROUTES ====================
    
    // Parent Dashboard
    Route::get('/parent/dashboard', function () {
        return view('parent.dashboard');
    })->name('parent.dashboard');

    // Parent - View Child Profile
    Route::get('/parent/child', [App\Http\Controllers\Parent\StudentController::class, 'index'])->name('parent.child');

    // Parent - View IEP Goals
    Route::get('/parent/goals', [App\Http\Controllers\Parent\GoalController::class, 'index'])->name('parent.goals');

    // Parent - View Progress
    Route::get('/parent/progress', [App\Http\Controllers\Parent\ProgressController::class, 'index'])->name('parent.progress');

    // Parent - Profile
    Route::get('/parent/profile', [App\Http\Controllers\Parent\ProfileController::class, 'index'])->name('parent.profile.index');
    Route::put('/parent/profile', [App\Http\Controllers\Parent\ProfileController::class, 'update'])->name('parent.profile.update');
    Route::post('/parent/profile/password', [App\Http\Controllers\Parent\ProfileController::class, 'updatePassword'])->name('parent.profile.password');
    Route::post('/parent/profile/avatar', [App\Http\Controllers\Parent\ProfileController::class, 'updateAvatar'])->name('parent.profile.avatar');
    Route::delete('/parent/profile/avatar', [App\Http\Controllers\Parent\ProfileController::class, 'removeAvatar'])->name('parent.profile.avatar.remove');

    // Home redirect
    Route::get('/', function () {
        $user = auth()->user();
        if ($user->role === 'admin') return redirect()->route('admin.dashboard');
        if ($user->role === 'teacher') return redirect()->route('teacher.dashboard');
        return redirect()->route('parent.dashboard');
    });
    
});