<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('autok', function (Blueprint $table) {

            $table->integer('ar')->nullable()->after('raktaron');
            $table->string('kep')->nullable()->after('ar');
            $table->boolean('kiemelt')->default(0)->after('kep');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('autok', function (Blueprint $table) {

            $table->dropColumn(['ar','kep','kiemelt']);

        });
    }
};
