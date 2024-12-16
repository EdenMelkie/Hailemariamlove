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
        Schema::create('staff', function (Blueprint $table) {
            $table->string('EmpId', 10)->primary();
            $table->string('first_name', 30);
            $table->string('middleName', 30);
            $table->string('last_name', 30);
            $table->string('Email', 50);
            $table->bigInteger('phone');
            $table->string('address', 30);
            $table->string('Sex', 10);
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
