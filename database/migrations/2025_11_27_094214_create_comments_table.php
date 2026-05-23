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
        if (!Schema::hasTable('comments')) {

            Schema::create('comments', function (Blueprint $table) {
                $table->id();

                // Kapcsolás a users táblához
                $table->foreignId('user_id')
                      ->constrained()
                      ->onDelete('cascade');

                // A komment szövege
                $table->text('content');

                // Létrehozva / frissítve időbélyegek
                $table->timestamps();
            });

        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
