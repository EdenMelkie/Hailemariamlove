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
        Schema::create('accounts', function (Blueprint $table) {
            $table->string('UserName', 10)->primary();
            $table->string('U_Type', 20);
            $table->string('Photo', 36);
            $table->string('password', 40);
            $table->string('Status', 10);
            $table->unsignedInteger('OfficeRoomNo')->nullable();
            $table->unsignedInteger('OfficeBlockId')->nullable();

            // Foreign Keys
            $table->foreign('OfficeRoomNo')->references('RoomId')->on('room')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('OfficeBlockId')->references('BlockId')->on('block')->onDelete('cascade')->onUpdate('cascade');
        });
    }
     /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }

};
