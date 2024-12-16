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
        Schema::create('proctor', function (Blueprint $table) {
            $table->integer('Year');
            $table->unsignedInteger('Block_Id');
            $table->string('ProId', 10);

            $table->primary(['Block_Id', 'ProId']);

            // Foreign Keys
            $table->foreign('Block_Id')->references('BlockId')->on('block')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ProId')->references('EmpId')->on('staff')->onDelete('cascade')->onUpdate('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proctor');
    }
};
