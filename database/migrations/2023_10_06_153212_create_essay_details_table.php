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
        Schema::create('essay_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('essay_id')->constrained()->cascadeOnDelete();
            $table->dateTime("show_date")->nullable();
            $table->string("user_ip")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('essay_details');
    }
};
