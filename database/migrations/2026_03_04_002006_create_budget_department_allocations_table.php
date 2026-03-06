<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('budget_department_allocations', function (Blueprint $table) {
        $table->id();
        $table->foreignId('budget_id')->constrained()->onDelete('cascade');
        $table->foreignId('department_id')->constrained()->onDelete('cascade');
        $table->decimal('allocated_amount', 15, 2);
        $table->decimal('balance', 15, 2);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budget_department_allocations');
    }
};
