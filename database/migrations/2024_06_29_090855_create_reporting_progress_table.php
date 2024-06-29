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
        Schema::create('reporting_progress', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reporting_id');
            $table->foreign('reporting_id')->references('id')->on('reportings')->onUpdate('cascade')->onDelete('cascade');
            $table->text('note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reporting_progress', function (Blueprint $table) {
            $table->dropForeign(['reporting_id']);
        });

        Schema::dropIfExists('reporting_progress');
    }
};
