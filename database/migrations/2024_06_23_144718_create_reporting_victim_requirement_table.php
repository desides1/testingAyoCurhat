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
        Schema::create('reporting_victim_requirement', function (Blueprint $table) {
            $table->unsignedBigInteger('reporting_id');
            $table->foreign('reporting_id')->references('id')->on('reportings')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('victim_requirement_id');
            $table->foreign('victim_requirement_id')->references('id')->on('victim_requirements')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reporting_victim_requirement', function (Blueprint $table) {
            $table->dropForeign(['reporting_id']);
            $table->dropForeign(['victim_requirement_id']);
        });

        Schema::dropIfExists('reporting_victim_requirement');
    }
};
