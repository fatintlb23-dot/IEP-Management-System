<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('ic_number')->unique()->after('email');
            $table->string('phone')->after('ic_number');
            $table->text('address')->nullable()->after('phone');
            $table->enum('role', ['admin', 'teacher', 'parent'])->default('parent')->after('password');
            $table->enum('status', ['pending', 'active', 'rejected'])->default('pending')->after('role');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['ic_number', 'phone', 'address', 'role', 'status']);
        });
    }
};