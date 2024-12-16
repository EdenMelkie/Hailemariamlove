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
        Schema::create('studplacement', function (Blueprint $table) {
            $table->increments('AssignmentId');
            $table->string('Stud_Id', 10)->unique();
            $table->unsignedInteger('BlockId');
            $table->unsignedInteger('RoomNo');
            $table->year('AcadamicYear');

            // Foreign Keys
            $table->foreign('Stud_Id')->references('StudId')->on('student')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('BlockId')->references('BlockId')->on('block')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('RoomNo')->references('RoomId')->on('room')->onDelete('cascade')->onUpdate('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studplacement');
    }
};
