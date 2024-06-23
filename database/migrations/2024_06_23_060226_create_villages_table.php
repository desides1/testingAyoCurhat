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
        Schema::create('villages', function (Blueprint $table) {
            $table->string('id', 16)->primary()->unique();
            $table->string('district_id', 8);
            $table->string('name', 128);
            $table->timestamps();
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('villages', function (Blueprint $table) {
            $table->dropForeign(['district_id']);
        });

        Schema::dropIfExists('villages');
    }
};
