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
        Schema::create('reporting_disability_type', function (Blueprint $table) {
            $table->unsignedBigInteger('reporting_id');
            $table->foreign('reporting_id')->references('id')->on('reportings')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('disability_type_id');
            $table->foreign('disability_type_id')->references('id')->on('disability_types')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reporting_disability_type', function (Blueprint $table) {
            $table->dropForeign(['reporting_id']);
            $table->dropForeign(['disability_type_id']);
        });

        Schema::dropIfExists('reporting_disability_type');
    }
};
