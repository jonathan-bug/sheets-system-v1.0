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
        Schema::create('employees', function (Blueprint $table) {
            $table->string('dui')->primary();
            $table->string('first_name');
            $table->string('second_name');
            $table->string('first_lastname');
            $table->string('second_lastname');
            $table->date('birth_date');
            $table->date('entry_date');
            $table->date('calculated_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
