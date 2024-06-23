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
        Schema::create('reporting_reporting_reason', function (Blueprint $table) {
            $table->unsignedBigInteger('reporting_id');
            $table->foreign('reporting_id')->references('id')->on('reportings')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('reporting_reason_id');
            $table->foreign('reporting_reason_id')->references('id')->on('reporting_reasons')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reporting_reporting_reason', function (Blueprint $table) {
            $table->dropForeign(['reporting_id']);
            $table->dropForeign(['reporting_reason_id']);
        });

        Schema::dropIfExists('reporting_reporting_reason');
    }
};
