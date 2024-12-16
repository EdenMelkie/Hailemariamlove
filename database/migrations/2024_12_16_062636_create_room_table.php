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
        Schema::create('room', function (Blueprint $table) {
            $table->increments('RoomId');
            $table->integer('Capacity');
            $table->unsignedInteger('BlockNum');
            $table->string('status', 10);
            $table->string('Disability', 40);

            // Foreign Keys
            $table->foreign('BlockNum')->references('BlockId')->on('block')->onDelete('cascade')->onUpdate('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room');
    }
};
