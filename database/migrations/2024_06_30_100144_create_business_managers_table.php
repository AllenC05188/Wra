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
        Schema::create('business_managers', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->decimal('credit_limit', 15, 2);
            $table->decimal('current_budget', 15, 2);
            $table->string('parent_bm_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_managers');
    }
};
