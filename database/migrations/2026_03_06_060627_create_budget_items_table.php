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
      Schema::create('budget_items', function (Blueprint $table) {
    $table->id();
    $table->year('fiscal_year');
    $table->string('program_name');
    $table->string('category');

    $table->decimal('personal_services', 15,2)->default(0);
    $table->decimal('mooe', 15,2)->default(0);
    $table->decimal('capital_outlay', 15,2)->default(0);
    $table->decimal('total', 15,2)->default(0);

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budget_items');
    }
};
