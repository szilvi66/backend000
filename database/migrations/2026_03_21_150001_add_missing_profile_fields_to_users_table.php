<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'first_name')) $table->string('first_name')->nullable()->after('username');
            if (!Schema::hasColumn('users', 'last_name')) $table->string('last_name')->nullable()->after('first_name');
            if (!Schema::hasColumn('users', 'phone')) $table->string('phone')->nullable()->after('password');
            if (!Schema::hasColumn('users', 'birthdate')) $table->date('birthdate')->nullable()->after('phone');
            if (!Schema::hasColumn('users', 'address')) $table->string('address')->nullable()->after('birthdate');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            foreach (['first_name','last_name','phone','birthdate','address'] as $col) {
                if (Schema::hasColumn('users', $col)) $table->dropColumn($col);
            }
        });
    }
};
