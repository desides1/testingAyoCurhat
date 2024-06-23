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
        Schema::create('regencies', function (Blueprint $table) {
            $table->string('id', 8)->primary()->unique();
            $table->string('province_id', 8);
            $table->string('name', 128);
            $table->timestamps();
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('regencies', function (Blueprint $table) {
            $table->dropForeign(['province_id']);
        });

        Schema::dropIfExists('regencies');
    }
};
