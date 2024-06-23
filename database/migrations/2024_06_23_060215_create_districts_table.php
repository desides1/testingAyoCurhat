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
        Schema::create('districts', function (Blueprint $table) {
            $table->string('id', 8)->primary()->unique();
            $table->string('regency_id', 8);
            $table->string('name', 128);
            $table->timestamps();
            $table->foreign('regency_id')->references('id')->on('regencies')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('districts', function (Blueprint $table) {
            $table->dropForeign(['regency_id']);
        });

        Schema::dropIfExists('districts');
    }
};
