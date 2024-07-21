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
        Schema::create('hours', function (Blueprint $table) {
            $table->id();
            $table->string('employee_dui');
            $table->unsignedBigInteger('month_id');
            $table->decimal('hour');
            $table->foreign('employee_dui')
                  ->references('dui')
                  ->on('employees')
                  ->onDelete('cascade');
            $table->foreign('month_id')
                  ->references('id')
                  ->on('months')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hours');
    }
};
