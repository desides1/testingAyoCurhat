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
        Schema::create('reportings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reporter_id');
            $table->foreign('reporter_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->enum('reporter_as', ['saksi', 'korban']);
            $table->unsignedBigInteger('case_type_id');
            $table->foreign('case_type_id')->references('id')->on('case_types')->onUpdate('cascade')->onDelete('restrict');
            $table->text('case_description');
            $table->text('chronology');
            $table->unsignedBigInteger('reported_status_id');
            $table->foreign('reported_status_id')->references('id')->on('reported_statuses')->onUpdate('cascade')->onDelete('restrict');
            $table->unsignedBigInteger('disability_type_id');
            $table->foreign('disability_type_id')->references('id')->on('disability_types')->onUpdate('cascade')->onDelete('restrict');
            $table->string('optional_disability_type')->nullable();
            $table->unsignedBigInteger('reporting_reason_id');
            $table->foreign('reporting_reason_id')->references('id')->on('reporting_reasons')->onUpdate('cascade')->onDelete('restrict');
            $table->text('optional_reporting_reason')->nullable();
            $table->string('optional_phone_number')->nullable();
            $table->string('optional_email')->nullable();
            $table->unsignedBigInteger('victim_requirement_id');
            $table->foreign('victim_requirement_id')->references('id')->on('victim_requirements')->onUpdate('cascade')->onDelete('restrict');
            $table->string('optional_victim_requirement')->nullable();
            $table->string('reporter_signature')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reportings', function (Blueprint $table) {
            $table->dropForeign(['reporter_id']);
            $table->dropForeign(['case_type_id']);
            $table->dropForeign(['reported_status_id']);
            $table->dropForeign(['disability_type_id']);
            $table->dropForeign(['reporting_reason_id']);
            $table->dropForeign(['victim_requirement_id']);
        });

        Schema::dropIfExists('reportings');
    }
};
